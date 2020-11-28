<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GMO\API\Defaults;
use GMO\ImmediatePayment;

class GMOManager extends Controller
{
    /**
     * For test UI mockup views
     *
     * @return Factory|View
     */
    public function index(Request $request)
    {
    }
    
    public function paymentByCreditCard(Request $request)
    {
        Defaults::setShopId(env('GMO_SHOP_ID'));
        Defaults::setShopName(env('GMO_SHOP_NAME'));
        Defaults::setPassword(env('GMO_SHOP_PASSWORD'));
        define('GMO_TRIAL_MODE', true);
        //テスト環境
        // A wrapper object that does everything for you.
        $payment = new ImmediatePayment();
        // Unique ID for every payment; probably should be taken from an auto-increment field from the database.
        $payment->paymentId = 1234332434112;
        $payment->amount = 1000;
        // This card number can be used for tests.
        $payment->cardNumber = '4111111111111111';
        // A date in the future.
        $payment->cardYear = '2021';
        $payment->cardMonth = '7';
        $payment->cardCode = '123';

        //本番環境

        // $payment = new ImmediatePayment();
        // $payment->paymentId = 123; // Unique ID for every payment; see above
        // $payment->amount = 1000;
        // $payment->token = $_POST['token'];

        // Returns false on an error.
        if (!$payment->execute()) {
            $errors = $payment->getErrors();
            dd($errors);
            foreach ($errors as $errorCode => $errorDescription) {
                // Show an error code and a description to the customer? Your choice.
                // Probably you want to log the error too.
            }
            return;
        }

        // Success!
        $response = $payment->getResponse();
        dd($response);

    }

    public function paymentByAu(Request $request) 
    {
        Defaults::setShopId(env('GMO_SHOP_ID'));
        Defaults::setShopName(env('GMO_SHOP_NAME'));
        Defaults::setPassword(env('GMO_SHOP_PASSWORD'));
        define('GMO_TRIAL_MODE', true);
        // リクエストコネクションの設定
        $curl=curl_init();
        curl_setopt( $curl, CURLOPT_POST, true );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $curl, CURLOPT_URL, 'https://pt01.mul-pay.jp/payment/EntryTranAu.idPass' );
        $param = [
            'ShopID'    => env('GMO_SHOP_ID'),
            'ShopPass'  => env('GMO_SHOP_PASSWORD'),
            'OrderID'   => '1112112',
            'JobCd'     => 'AUTH',
            'Amount'    => '1000',
            'Tax'       => '100'
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

            return false;
        }

        // レスポンスのエラーチェック
        parse_str( $response, $data );
        if( array_key_exists( 'ErrCode', $data ) ){
            // エラー

            return false;
        }
        dd($response);

        // 正常
        // リクエストコネクションの設定
        // $curl=curl_init();
        curl_setopt( $curl, CURLOPT_POST, true );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $curl, CURLOPT_URL, 'https://pt01.mul-pay.jp/payment/ExecTranAu.idPass' );
        $param = [
            'ShopID'          => 'YourShopId',
            'ShopPass'        => 'YourShopPassword',
            'AccessID'        => 'SampleAccessID',
            'AccessPass'      => 'SampleAccessPass',
            'OrderID'         => 'SampleOrderID',
            'SiteID'          => 'YourSiteId',
            'SitePass'        => 'YourSitePassword',
            'MemberID'        => 'SampleMemberID',
            'MemberName'      => 'SampleMemberName',
            'CreateMember'    => '1',
            'ClientField1'    => 'SampleClientField1',
            'ClientField2'    => 'SampleClientField2',
            'ClientField3'    => 'SampleClientField3',
            'Commodity'       => '全角文字',
            'RetURL'          => 'https://example.com/xxxxx',
            'PaymentTermSec'  => '120',
            'ServiceName'     => '全角文字',
            'ServiceTel'      => '03xxxxxxxx'
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

            return false;
        }

        // レスポンスのエラーチェック
        parse_str( $response, $data );
        if( array_key_exists( 'ErrCode', $data ) ){
            // エラー

            return false;
        }

        // 正常

        return true;

    }

    public function paymentByDocomo(Request $request) 
    {
        Defaults::setShopId(env('GMO_SHOP_ID'));
        Defaults::setShopName(env('GMO_SHOP_NAME'));
        Defaults::setPassword(env('GMO_SHOP_PASSWORD'));
        define('GMO_TRIAL_MODE', true);
        // リクエストコネクションの設定
        $curl=curl_init();
        curl_setopt( $curl, CURLOPT_POST, true );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $curl, CURLOPT_URL, 'https://pt01.mul-pay.jp/payment/EntryTranDocomo.idPass' );
        $param = [
            'ShopID'    => env('GMO_SHOP_ID'),
            'ShopPass'  => env('GMO_SHOP_PASSWORD'),
            'OrderID'   => '11111',
            'JobCd'     => 'AUTH',
            'Amount'    => '1000',
            'Tax'       => '100'
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

            return false;
        }

        // レスポンスのエラーチェック
        parse_str( $response, $data );
        if( array_key_exists( 'ErrCode', $data ) ){
            // エラー

            return false;
        }

        // 正常
        dd($response);

        // リクエストコネクションの設定
        $curl=curl_init();
        curl_setopt( $curl, CURLOPT_POST, true );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $curl, CURLOPT_URL, 'https://pt01.mul-pay.jp/payment/ExecTranDocomo.idPass' );
        $param = [
            'ShopID'          => 'YourShopID',
            'ShopPass'        => 'YourShopPassword',
            'AccessID'        => 'SampleAccessID',
            'AccessPass'      => 'SampleAccessPass',
            'OrderID'         => 'SampleOrderID',
            'ClientField1'    => 'SampleClientField1',
            'ClientField2'    => 'SampleClientField2',
            'ClientField3'    => 'SampleClientField3',
            'DocomoDisp1'     => 'SampleDocomoDisp1',
            'DocomoDisp2'     => 'SampleDocomoDisp2',
            'RetURL'          => 'https://example.com/xxxxx',
            'PaymentTermSec'  => '180',
            'DispShopName'    => 'YourShopName',
            'DispPhoneNumber' => '03xxxxxxxx',
            'DispMailAddress' => 'SampleShopMailAddress',
            'DispShopUrl'     => 'https://example.com/xxxxx'
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

            return false;
        }

        // レスポンスのエラーチェック
        parse_str( $response, $data );
        if( array_key_exists( 'ErrCode', $data ) ){
            // エラー

            return false;
        }

        // 正常

        return true;
    }

    public function paymentBySoftbank(Request $request) 
    {
        Defaults::setShopId(env('GMO_SHOP_ID'));
        Defaults::setShopName(env('GMO_SHOP_NAME'));
        Defaults::setPassword(env('GMO_SHOP_PASSWORD'));
        define('GMO_TRIAL_MODE', true);
        // リクエストコネクションの設定
        $curl=curl_init();
        curl_setopt( $curl, CURLOPT_POST, true );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $curl, CURLOPT_URL, 'https://pt01.mul-pay.jp/payment/EntryTranSb.idPass' );
        $param = [
            'ShopID'    => env('GMO_SHOP_ID'),
            'ShopPass'  => env('GMO_SHOP_PASSWORD'),
            'OrderID'   => '11111',
            'JobCd'     => 'AUTH',
            'Amount'    => '1000',
            'Tax'       => '100'
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

            return false;
        }

        // レスポンスのエラーチェック
        parse_str( $response, $data );
        if( array_key_exists( 'ErrCode', $data ) ){
            // エラー

            return false;
        }

        // 正常
        dd($response);

        // リクエストコネクションの設定
        $curl=curl_init();
        curl_setopt( $curl, CURLOPT_POST, true );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $curl, CURLOPT_URL, 'https://pt01.mul-pay.jp/payment/ExecTranSb.idPass' );
        $param = [
            'ShopID'          => 'YourShopID',
            'ShopPass'        => 'YourShopPassword',
            'AccessID'        => 'SampleAccessID',
            'AccessPass'      => 'SampleAccessPass',
            'OrderID'         => 'SampleOrderID',
            'ClientField1'    => 'SampleClientField1',
            'ClientField2'    => 'SampleClientField2',
            'ClientField3'    => 'SampleClientField3',
            'RetURL'          => 'https://example.com/xxxxx',
            'PaymentTermSec'  => '180'
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

            return false;
        }

        // レスポンスのエラーチェック
        parse_str( $response, $data );
        if( array_key_exists( 'ErrCode', $data ) ){
            // エラー

            return false;
        }

        // 正常

        return true;
    }
}
?>