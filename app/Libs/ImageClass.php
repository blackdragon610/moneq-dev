<?php

    namespace App\Libs;
    use Exception;

    /*
    *	画像関係の処理
    */
    class ImageClass{
        var $strImgFile;		//画像ファイル名
        var $strImgFileData;
        var $strImgFileT;		//サムネイルのファイル名
        var $arrayImgInfo;		//画像の情報
        var $w;					//サムネイルの横サイズ
        var $h;					//サムネイルの縦サイズ
        public $sizes = [
            'Thum' => '150x0',
            'Logo' => '0x100',
            'Big' => '800x0'
        ];
        /*
        *	コンストラクタ
        *	@params $srtImgFile ファイル名 $w 横幅 $h 縦幅
        */
        function create($strImgFile='', $w=0, $h=0, $strImgFileT=''){
            if ($strImgFile){
                $this->strImgFile = $strImgFile;

                //リサイズがある場合
                if (($w) || ($h) ){
                    $pos = strrpos($strImgFile, '/');

                    if ($strImgFileT){
                        $dir = $strImgFileT;
                    }else{
                        $dir = substr($strImgFile, 0, $pos) . '/' . $w  . 'x' . $h;
                    }



                    if (!file_exists($dir) ){
                        mkdir($dir, 0777, true);
                        chmod($dir, 0777);
                    }

                    $this->strImgFileT = $dir . substr($strImgFile, $pos);
                    $this->fileName = $dir . substr($strImgFile, $pos);

                }
            }

            $this->w = $w;
            $this->h = $h;
        }

        /*
        *	画像ファイルからの取得
        */
        function getImage($fileName, $binary=''){

            if ($binary){
                $arrayImgInfo['image'] = imagecreatefromstring($binary);
                $arrayImgInfo[0] = imagesx($arrayImgInfo['image']);
                $arrayImgInfo[1] = imagesy($arrayImgInfo['image']);
                $arrayImgInfo['mime'] = 'png';
            }else{
                $arrayImgInfo = getimagesize($fileName, $imageinfo);
                $arrayImgInfo['mime'] = str_replace('image/', '', $arrayImgInfo['mime']);

                if ($arrayImgInfo['mime'] == 'png') {
                    $arrayImgInfo['image'] = imagecreatefrompng($fileName);
                } else if ( ($arrayImgInfo['mime'] == 'jpeg') || ($arrayImgInfo['mime'] == 'pjpeg') ){
                    $arrayImgInfo['image'] = \imagecreatefromjpeg($fileName);
                    $exif = exif_read_data($fileName, 0, true);
                    $arrayImgInfo['image'] = $this->rotate($arrayImgInfo['image'], $exif);
                    $arrayImgInfo[0] = imagesx($arrayImgInfo['image']);
                    $arrayImgInfo[1] = imagesy($arrayImgInfo['image']);
                } else if ($arrayImgInfo['mime'] == 'gif') {
                    $arrayImgInfo['image'] = imagecreatefromgif($fileName);
                }

            }


            $this->arrayImgInfo = $arrayImgInfo;


        }

        /*
        *	画像の表示
        */
        function view($fileName=''){
            if ($fileName){
                $this->getImage($fileName);
            }

            if ($this->arrayImgInfo['mime'] == 'png') {
                header("Content-type: png");
                //ブレンドモードを無効にする
                imagealphablending($this->arrayImgInfo['image'], false);
                //完全なアルファチャネル情報を保存するフラグをonにする
                imagesavealpha($this->arrayImgInfo['image'], true);
                imagepng($this->arrayImgInfo['image']);
            } else if ( ($this->arrayImgInfo['mime'] == 'jpeg') || ($this->arrayImgInfo['mime'] == 'pjpeg') ){
                header("Content-type: jpeg");

                imagejpeg($this->arrayImgInfo['image']);
            }else if ($this->arrayImgInfo['mime'] == 'gif') {
                header("Content-type: gif");
                imagegif($this->arrayImgInfo['image']);
            }
        }



        /*
        *	画像の拡大、縮小
        */
        function scale($file, $size='Thum', $binary='', $isJudg=false){
            $this->getImage($file, $binary);

            if (isset($this->sizes[$size]) ){
                $size = $this->sizes[$size];
            }else{
                $size = $this->sizes['Thum'];
            }

            list($this->w, $this->h) = explode('x', $size);

            //片方のサイズを指定しない場合は最大サイズ以下にする
            if (!$this->h){
                if ($this->w > $this->arrayImgInfo[0]){
                    $this->w = $this->arrayImgInfo[0];
                }
            }


            if (!$this->w){$isJudg = true;$this->w = intval($this->arrayImgInfo[0] * ($this->h / $this->arrayImgInfo[1]));}
            if (!$this->h){$isJudg = true;$this->h = intval($this->arrayImgInfo[1] * ($this->w / $this->arrayImgInfo[0]));}


            if ($this->arrayImgInfo['mime'] == 'gif'){
                $dst = imagecreate($this->w, $this->h);
            }else	if ($this->arrayImgInfo['mime'] == 'png'){
                $dst = imagecreatetruecolor($this->w, $this->h);
                //ブレンドモードを無効にする
                imagealphablending($dst, false);
                //完全なアルファチャネル情報を保存するフラグをonにする
                imagesavealpha($dst, true);
            }else{
                $dst = imagecreatetruecolor($this->w, $this->h);
            }

            $sw = $this->arrayImgInfo[0];
            $sh = $this->arrayImgInfo[1];
            $gw = $sw/ $this->w;
            $gh = $sh / $this->h;

            if (!$isJudg){
                //どちらかが0の場合
                if ($gw < $gh) {

                    $cut = ceil((($gh - $gw) * $this->h) / 2);
                    imagecopyresampled($dst, $this->arrayImgInfo['image'], 0, 0, 0, $cut, $this->w, $this->h, $sw, $sh - ($cut * 2));
                }else if ($gh < $gw) {
                    $cut = ceil((($gw - $gh) * $this->w) / 2);
                    imagecopyresampled($dst, $this->arrayImgInfo['image'], 0, 0, $cut, 0, $this->w, $this->h, $sw - ($cut * 2), $sh);
                }else{
                    imagecopyresampled($dst, $this->arrayImgInfo['image'], 0, 0, 0, 0, $this->w, $this->h, $this->arrayImgInfo[0], $this->arrayImgInfo[1]);
                }
            }else{
                //両方共指定のある場合
                imagecopyresampled($dst, $this->arrayImgInfo['image'], 0, 0, 0, 0, $this->w, $this->h, $this->arrayImgInfo[0], $this->arrayImgInfo[1]);
            }

            $this->arrayImgInfo['image'] = $dst;

        }

        /**
         * 画像を回転させる
         */
        private function rotate($src_image, $exif_data) {
            $degrees = 0;
            $mode    = '';

            if (isset($exif_data["IFD0"]["Orientation"])){
                $exif_data['Orientation'] = $exif_data["IFD0"]["Orientation"];
            }

            if (isset($exif_data['Orientation'])){
                switch($exif_data['Orientation'])
                {
                    case 2: // 水平反転
                        $mode = IMG_FLIP_VERTICAL;
                        break;
                    case 3: // 180度回転
                        $degrees = 180;
                        break;
                    case 4: // 垂直反転
                        $mode = IMG_FLIP_HORIZONTAL;
                        break;
                    case 5: // 水平反転、 反時計回りに270回転
                        $degrees = 270;
                        $mode    = IMG_FLIP_VERTICAL;
                        break;
                    case 6: // 反時計回りに270回転
                        $degrees = 270;
                        break;
                    case 7: // 反時計回りに90度回転（反時計回りに90度回転） 水平反転
                        $degrees = 90;
                        $mode    = IMG_FLIP_VERTICAL;
                        break;
                    case 8: // 反時計回りに90度回転（反時計回りに90度回転）
                        $degrees = 90;
                        break;
                }


                if (!empty($mode))
                {
                    imageflip($src_image, $mode);
                }
                if ($degrees > 0)
                {
                    $src_image = imagerotate($src_image, $degrees, 0);
                }



            }

            return $src_image;
        }

        function all_delete($dir, $image){
            foreach ($this->sizes as $key => $size){
                if (file_exists($dir . $key . '/' . $image)){
                    unlink($dir . $key . '/' . $image);
                }
            }

            if (file_exists($dir . '/' . $image)){
                unlink($dir . '/' . $image);
            }else{
                //throw new Exception("not file");
            }
        }

        function saveThumnail($image){
            $fileName = basename($image);
            $dir = str_replace($fileName, "", $image);


            foreach ($this->sizes as $key => $size){
                if (!file_exists($dir . $key)){
                    mkdir($dir . $key);
                    chmod($dir . $key, 0777);
                }


                $this->scale($dir . $fileName, $key);
                $this->save($dir . $key . '/' . $fileName);
            }
        }

        /*
        *	画像の保存
        */
        function save($file_name){
            if ($this->arrayImgInfo['mime'] == 'png') {
                imagepng($this->arrayImgInfo['image'], $file_name);
            } else if ( ($this->arrayImgInfo['mime'] == 'jpeg') || ($this->arrayImgInfo['mime'] == 'pjpeg') ){
                imagejpeg($this->arrayImgInfo['image'], $file_name);
            }else if ($this->arrayImgInfo['mime'] == 'gif') {
                imagegif($this->arrayImgInfo['image'], $file_name);
            }
        }





    }
