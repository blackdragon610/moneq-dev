<?php

namespace App\Libs;

/* アップロードファイル管理クラス */

use Illuminate\Support\Facades\Storage;

class UploadClass
{

    /**
     * 外部ストレージか内部ストレージか
     * @param $type 内部ストレージの種類
     * @return string
     */
    public function getType($type){
        if (env("IS_STORAGE")){
            return "s3";
        }

        return $type;
    }

    /**
     * ファイルの一時保存
     * @param $fileNameFrom ファイルの保存元
     * @param $fileNameTo   一時ファイルの名称
     */
    public function setStatic($fileNameFrom, $fileNameTo){
		    $disk = Storage::disk('static');

    		copy($fileNameFrom, $disk->path('') . $fileNameTo);
	  }

    /**
     * 一時保存から実際の保存先に移動
     * @param string $fileName ファイルの名前
     * @param string $uploadType   アップロード先のディレクトリ
     */
    public function setStorage(string $fileName, string $uploadType){
        $diskStatic = Storage::disk('static');

        if ($diskStatic->exists($fileName)){
            $this->setStorageBinary($fileName, $uploadType, file_get_contents($diskStatic->path($fileName)));
            $diskStatic->delete($fileName);
        }
    }

    /**
     * バイナリデータで保存する
     * @param string $fileName ファイルの名前
     * @param string $uploadType   アップロード先のディレクトリ
     * @param string $binary   バイナリデータ
     */
    public function setStorageBinary(string $fileName,string $uploadType, string $binary){
        $diskApp = Storage::disk($this->getType($uploadType));

        $diskApp->put($fileName, $binary);
        $this->deleteThumnailAll($fileName, $uploadType);
    }

    /**
     * ファイルを指定しレスポンスを返す
     * @param  string  $uploadType  アップロード先のディレクトリ
     * @param  string  $fileName  ファイル名
     * @return mixed
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function view(string $uploadType, string $fileName){
        $diskApp = Storage::disk($this->getType($uploadType));

        $this->contents = $diskApp->get($fileName);
        $this->mimeType = $diskApp->mimeType($fileName);

        $response = $diskApp->response($fileName);

        return $response;
    }

    function deleteThumnailAll($fileName, $uploadType){
        $diskApp = Storage::disk($this->getType($uploadType));

        $path = $diskApp->path("");

        $ImageClass = app("ImageClass");
        foreach ($ImageClass->sizes as $key => $size){
            if (file_exists($path . $key . '/' . $fileName)){
                unlink($path . $key . '/' . $fileName);
            }
        }
    }
}
