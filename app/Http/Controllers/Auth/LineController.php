<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use GuzzleHttp\Client;
use App\Models\UserToken;
use Socialite;
use App\Libs\Common;
use Cookie;


class LineController extends Controller
{
    private const LINE_OAUTH_URL = 'https://access.line.me/oauth2/v2.1/authorize?';
    private const LINE_TOKEN_API_URL = 'https://api.line.me/oauth2/v2.1/';
    private const LINE_PROFILE_API_URL = 'https://api.line.me/v2/';
    private $client_id;
    private $client_secret;
    private $callback_url;

    public function __construct() {
        $this->client_id = Config('line.client_id');
        $this->client_secret = Config('line.client_secret');
        $this->callback_url = Config('line.callback_url');
    }

    public function redirectToProvider()
    {
        $csrf_token = Str::random(32);
        $query_data = [
            'response_type' => 'code',
            'client_id' => $this->client_id,
            'redirect_uri' => $this->callback_url,
            'state' => $csrf_token,
            'scope' => 'profile openid',
        ];
        $query_str = http_build_query($query_data, '', '&');
        return redirect(self::LINE_OAUTH_URL . $query_str);
    }

    public function handleProviderCallback(Request $request)
    {
        $code = $request->query('code');
        $token_info = $this->fetchTokenInfo($code);
        $user_info = $this->fetchUserInfo($token_info->access_token);

        //  ログイン処理
        $datas = array();
        $datas["email"] = $user_info->email;
        $datas["token_sns"] = $token_info->access_token;

        $userCheckModel = User::getUserCheckBySnsToken($user_info->email);
        if ($userCheckModel) {

            \Auth::login($userCheckModel, true);
            $auto_login = 0;
            if (isset($_COOKIE['auto_login']))
                $auto_login = $_COOKIE['auto_login'];

            $user_id = $userCheckModel->id;
            $email = $userCheckModel->email;
            $custom_token = Common::tokenSet($auto_login, $user_id, $email);

            if ($auto_login == 0) Cookie::queue('custom_token', $custom_token, 120);

            if ($auto_login == 1) Cookie::queue('custom_token', $custom_token, 7200);

            return redirect('/');
        }


        $userToken = new UserToken();
        $userModel = $userToken->saveSNSEntry($datas);
        $token = $userModel->token;
        return redirect()->route('entry.password', compact('token'));
}

    private function fetchUserInfo($access_token)
    {
        $base_uri = ['base_uri' => self::LINE_PROFILE_API_URL];
        $method = 'GET';
        $path = 'profile';
        $headers = ['headers' =>
            [
                'Authorization' => 'Bearer ' . $access_token
            ]
        ];
        $user_info = $this->sendRequest($base_uri, $method, $path, $headers);
        return $user_info;
    }

    private function fetchTokenInfo($code)
    {
        $base_uri = ['base_uri' => self::LINE_TOKEN_API_URL];
        $method = 'POST';
        $path = 'token';
        $headers = ['headers' =>
            [
                'Content-Type' => 'application/x-www-form-urlencoded'
            ]
        ];
        $form_params = ['form_params' =>
            [
                'code'          => $code,
                'client_id' => $this->client_id,
                'client_secret' => $this->client_secret,
                'redirect_uri'  => $this->callback_url,
                'grant_type'    => 'authorization_code'
            ]
        ];
        $token_info = $this->sendRequest($base_uri, $method, $path, $headers, $form_params);
        return $token_info;
    }

    private function sendRequest($base_uri, $method, $path, $headers, $form_params = null)
    {
        try {
            $client = new Client($base_uri);
            if ($form_params) {
                $response = $client->request($method, $path, $form_params, $headers);
            } else {
                $response = $client->request($method, $path, $headers);
            }
        } catch(\Exception $ex) {
            //　例外処理
        }
        $result_json = $response->getbody()->getcontents();
        $result = json_decode($result_json);
        return $result;
    }
}
