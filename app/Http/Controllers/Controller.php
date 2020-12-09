<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {

    }

    /**
    *	アップロード処理の種類の指定
    *	@param  object $model モデル
    */
    function setUploadType(object $model)
    {
        \View::share('uploadType', $model->uploadType);
    }

    /**
     * エラーチェック
     * @param $request  入力値
     * @return array
     */
    public function checkForm($request) : array{

        //変数の初期化
        $isConfirmation = false;
        $errors = [];

        $inputs = $request->input();

        $request->session()->pull('inputs');

        //エラーチェック
        $validator = $request->getValidator();

        //ファイルアップロードがあれば一時保存する処理
        $files = $request->file();

        if ($files){
            $UploadClass = app("UploadClass");


            foreach ($files as $key =>$file){
                if (!$validator->errors()->get($key)){
                    $fileData[$key]['fileName'] = uniqid(rand()) . '.' . $file->extension();
                    $inputs[$key] = $fileData[$key]['fileName'];

                    $UploadClass->setStatic($file->getRealPath(), $inputs[$key]);
                }else{
                    unset($inputs[$key]);
                }
            }

        }

        if ($validator->fails()) {
            // エラーの場合
            $errors = $validator->errors();

        }else{
            // エラーがない場合
            $datas = $inputs;

            $request->session()->put('inputs' . $request->input('_token'),$datas);

            $isConfirmation = true;
            if ($request->input('reInput')){
                //確認画面で修正を押した場合
                $errors = [];
                $isConfirmation = false;
            }

            if ($request->input('end')){
                //完了処理の場合
                $this->datas = $datas;

                return $datas;
            }
        }

        return [
            'errors' => $errors,
            'inputs' => $inputs,
            'isConfirmation' => $isConfirmation,
        ];
    }

}
