<?php

    namespace App\Http\Middleware;

    use Closure;
    use Tymon\JWTAuth\Exceptions\JWTException;
    use Tymon\JWTAuth\Facades\JWTAuth;
    use Tymon\JWTAuth\Exceptions\TokenExpiredException;
    use Tymon\JWTAuth\Exceptions\TokenInvalidException;
    use Illuminate\Support\Facades\Config;

    class JwtCheck
    {
        /**
         * リクエストのヘッダーのトークンを検証
         *
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \Closure  $next
         * @return mixed
         */
        public function handle($request, Closure $next)
        {

            $ApiClass = app("ApiClass");

            $string = $token = JWTAuth::getToken();

            // ヘッダーにAuthorizationが存在するかをチェック
            /*if ((!$request->header('Authorization'))) {
                return $ApiClass->responseError("Authorizationが存在しません");
            }*/

            try {
                // トークンに含まれているユーザは存在するかをチェック
                if (!$user = JWTAuth::parseToken()->authenticate()) {
                    return $ApiClass->responseError("ユーザーが存在しません");
                }
            } catch (TokenInvalidException $e) {
                // 無効なリフレッシュトークンによるエラー
                return $ApiClass->responseError("無効なリフレッシュトークン");
            } catch (TokenExpiredException $e) {
                // リフレッシュトークンの有効期限切れによるエラー
                return $ApiClass->responseError("有効期限エラー");
            } catch (JWTException $e) {
                // その他の原因によるトークンのエラー
                return $ApiClass->responseError("その他のエラー");
            }

            if (!$user->onoff){
                return $ApiClass->responseError("停止中のユーザー");
            }


            // コントローラにリクエストを送る
            $response = $next($request);

            return $response;
        }
    }
