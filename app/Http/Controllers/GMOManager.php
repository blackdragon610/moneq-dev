<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GMO\API\Defaults;
use GMO\ImmediatePayment;
use App\Models\User;
use App\Models\UserPayment;
use Illuminate\Support\Facades\Validator;

class GMOManager extends Controller
{
    /**
     * For test UI mockup views
     *
     * @return Factory|View
     */
    public function index(Request $request, $sheetId, $member)
    {

        return view('payment.index', compact('sheetId', 'member'));
    }

    public function input($sheetId, $member){
        return view('payment.payment', compact('sheetId', 'member'));
    }

    public function end(){
        return view('payment.end');

    }
    public function paymentByCreditCard(Request $request, UserPayment $UserPayment, User $User)
    {

        $validator = Validator::make($request->all(),[
            'cardno' => 'required|numeric|digits_between:10,16',
            'holdername' => 'required',
            'securitycode' => 'required'
        ]);

        // dd($request->member);
        if($validator->fails()){
            $inputs = $request->input();
            $errors = $validator->errors();
            return view('payment.payment', [
                'inputs' => $inputs,
                'errors' => $errors,
                'member' => $request->member,
                'sheetId' => $request->sheet
            ]);
        }

        Defaults::setShopId(env('GMO_SHOP_ID'));
        Defaults::setShopName(env('GMO_SHOP_NAME'));
        Defaults::setPassword(env('GMO_SHOP_PASSWORD'));
        define('GMO_TRIAL_MODE', env('GMO_TRIAL_MODE'));

        //本番環境

        $paymentId = $this->getOrderId();
        $payment = new ImmediatePayment();
        $payment->paymentId = $paymentId; // Unique ID for every payment; see above
        $payment->amount = config('app.memberCost')[$request->member];
        $payment->token = $request->pay_token;

        // Returns false on an error.
        if (!$payment->execute()) {
            $errors = $payment->getErrors();
            $errorStr = '';
            foreach ($errors as $errorCode => $errorDescription) {
                $errorStr .= $errorDescription.' ';
            }

            $inputs = $request->input();
            $errors = $validator->errors();
            return view('payment.payment', [
                'inputs' => $inputs,
                'errors' => $errors,
                'member' => $request->member,
                'sheetId' => $request->sheet,
                'errorStr' => $errorStr,
            ]);
        }

        // Success!
        $response = $payment->getResponse();

        $User->setPayStatus($request->member);
        $UserPayment->savePayment($response->OrderID, $request->member, 1, config('app.memberCost')[$request->member]);

        if($request->sheet == 2){
            return redirect()->route('profile.edit');
        }
        return redirect()->route('payment.end');
    }

    public function paymentByAu(Request $request, UserPayment $UserPayment, User $User, $sheet, $member)
    {
        Defaults::setShopId(env('GMO_SHOP_ID'));
        Defaults::setShopName(env('GMO_SHOP_NAME'));
        Defaults::setPassword(env('GMO_SHOP_PASSWORD'));
        define('GMO_TRIAL_MODE', env('GMO_TRIAL_MODE'));
        // リクエストコネクションの設定
        $curl=curl_init();
        curl_setopt( $curl, CURLOPT_POST, true );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $curl, CURLOPT_URL, 'https://pt01.mul-pay.jp/payment/EntryTranAu.idPass' );

        $paymentId = $this->getOrderId();

        $param = [
            'ShopID'    => env('GMO_SHOP_ID'),
            'ShopPass'  => env('GMO_SHOP_PASSWORD'),
            'OrderID'   => $paymentId,
            'JobCd'     => 'CAPTURE',
            'Amount'    => config('app.memberCost')[$request->member],
            'Tax'       => config('app.memberCost')[$request->member]/config('app.tex')
        ];
        // リクエストボディの生成
        curl_setopt( $curl, CURLOPT_POSTFIELDS, http_build_query( $param ) );

        // リクエスト送信
        $response = curl_exec( $curl );
        $curlinfo = curl_getinfo( $curl );
        curl_close( $curl );

        // レスポンスチェック
        if( $curlinfo[ 'http_code' ] != 200 ){
            // エラー
            header("Location:/error/payment/");
            exit();
        }


        // レスポンスのエラーチェック
        parse_str( $response, $data );
        if( array_key_exists( 'ErrCode', $data ) ){
            // エラー
            header("Location:/error/payment");
            exit();
        }

        $UserPayment->savePayment($paymentId, $member, 2, config('app.memberCost')[$member]);
        $User->setPayStatus($member);

        if($sheet == 2){
            return redirect()->route('profile.edit');
        }

        return redirect()->route('payment.end');
    }

    public function paymentByDocomo(Request $request, UserPayment $UserPayment, User $User, $sheet, $member)
    {
        Defaults::setShopId(env('GMO_SHOP_ID'));
        Defaults::setShopName(env('GMO_SHOP_NAME'));
        Defaults::setPassword(env('GMO_SHOP_PASSWORD'));
        define('GMO_TRIAL_MODE', env('GMO_TRIAL_MODE'));
        // リクエストコネクションの設定
        $curl=curl_init();
        curl_setopt( $curl, CURLOPT_POST, true );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $curl, CURLOPT_URL, 'https://pt01.mul-pay.jp/payment/EntryTranDocomo.idPass' );

        $paymentId = $this->getOrderId();
        $param = [
            'ShopID'    => env('GMO_SHOP_ID'),
            'ShopPass'  => env('GMO_SHOP_PASSWORD'),
            'OrderID'   => $paymentId,
            'JobCd'     => 'CAPTURE',
            'Amount'    => config('app.memberCost')[$request->member],
            'Tax'       => config('app.memberCost')[$request->member]/config('app.tex')
        ];
        // リクエストボディの生成
        curl_setopt( $curl, CURLOPT_POSTFIELDS, http_build_query( $param ) );

        // リクエスト送信
        $response = curl_exec( $curl );
        $curlinfo = curl_getinfo( $curl );
        curl_close( $curl );

        // レスポンスチェック
        if( $curlinfo[ 'http_code' ] != 200 ){
            // エラー
            header("Location:/error/payment/");
            exit();
        }

        // レスポンスのエラーチェック
        parse_str( $response, $data );
        if( array_key_exists( 'ErrCode', $data ) ){
            // エラー
            header("Location:/error/payment/");
            exit();
        }

        // 正常
        $UserPayment->savePayment($paymentId, $member, 3, config('app.memberCost')[$member]);
        $User->setPayStatus($member);
        if($sheet == 2){
            return redirect()->route('profile.edit');
        }

        return redirect()->route('payment.end');
    }

    public function paymentBySoftbank(Request $request, UserPayment $UserPayment, User $User, $sheet, $member)
    {
        Defaults::setShopId(env('GMO_SHOP_ID'));
        Defaults::setShopName(env('GMO_SHOP_NAME'));
        Defaults::setPassword(env('GMO_SHOP_PASSWORD'));
        define('GMO_TRIAL_MODE', env('GMO_TRIAL_MODE'));
        // リクエストコネクションの設定
        $curl=curl_init();
        curl_setopt( $curl, CURLOPT_POST, true );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $curl, CURLOPT_URL, 'https://pt01.mul-pay.jp/payment/EntryTranSb.idPass' );

        $paymentId = $this->getOrderId();
        $param = [
            'ShopID'    => env('GMO_SHOP_ID'),
            'ShopPass'  => env('GMO_SHOP_PASSWORD'),
            'OrderID'   => $paymentId,
            'JobCd'     => 'CAPTURE',
            'Amount'    => config('app.memberCost')[$request->member],
            'Tax'       => config('app.memberCost')[$request->member]/config('app.tex')
        ];
        // リクエストボディの生成
        curl_setopt( $curl, CURLOPT_POSTFIELDS, http_build_query( $param ) );

        // リクエスト送信
        $response = curl_exec( $curl );
        $curlinfo = curl_getinfo( $curl );
        curl_close( $curl );

        // レスポンスチェック
        if( $curlinfo[ 'http_code' ] != 200 ){
            // エラー
            header("Location:/error/payment/");
            exit();
        }

        // レスポンスのエラーチェック
        parse_str( $response, $data );
        if( array_key_exists( 'ErrCode', $data ) ){
            // エラー
            header("Location:/error/payment/");
            exit();
        }

        // 正常
        $UserPayment->savePayment($paymentId, $member, 4, config('app.memberCost')[$member]);
        $User->setPayStatus($member);

        if($sheet == 2){
            return redirect()->route('profile.edit');
        }
        return redirect()->route('payment.end');
    }

    public function getOrderId(){
        $dateTime = new \DateTime();
        $orderId = $dateTime->getTimestamp().\Auth::user()->id;

        return $orderId;
    }

    public function autoCreditsPayment(){
        $orderId = $this->order_id;
        if($orderId == 0)   $this->delete();
    }

    public function autoCarriorPayment(){
        $orderId = $this->order_id;
        if($orderId == 0)   $this->delete();
        $kind = $this->kind;

        Defaults::setShopId(env('GMO_SHOP_ID'));
        Defaults::setShopName(env('GMO_SHOP_NAME'));
        Defaults::setPassword(env('GMO_SHOP_PASSWORD'));
        define('GMO_TRIAL_MODE', env('GMO_TRIAL_MODE'));
        // リクエストコネクションの設定
        $curl=curl_init();
        curl_setopt( $curl, CURLOPT_POST, true );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );

        switch($kind){
            case 1:    //au
                curl_setopt( $curl, CURLOPT_URL, 'https://pt01.mul-pay.jp/payment/EntryTranAu.idPass' );
            break;
            case 2:    //docomo
                curl_setopt( $curl, CURLOPT_URL, 'https://pt01.mul-pay.jp/payment/EntryTranDocomo.idPass' );
            break;
            case 3:     //softbank
                curl_setopt( $curl, CURLOPT_URL, 'https://pt01.mul-pay.jp/payment/EntryTranSb.idPass' );
            break;
        }
    }
}
?>
