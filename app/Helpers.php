<?php


    /**
     * 配列内に指定した変数が存在しない場合は空欄を入れて返す
     * @param  array  $str  配列
     * @param  string  $key  配列のキー
     * @return mixed|string 文字
     */
    function getVariable($str, string $key){
        if ($key){
            if (!isset($str[$key]) ){
                return '';
            }
        }else{
            if (!isset($str) ){
                $str = '';
            }
        }
        // dd($str);

        if (isset($str[$key])){
            return $str[$key];
        }else{
            return '';
        }
    }

    function getImage($dir, $img, $size=''){
        if (!$img){
            return '/img/noimage/' . $size . '.png';
        }else{
            return '/api/image/?dir=' . $dir . '&image=' . $img . '&size=' . $size;
        }
    }

    /**
     * ラジオボタン、プルダウンなどの項目取得
     * @param $file ファイル名又は配列
     * @param  string  $hex 値を設定
     * @param $keyValue キーと値を指定
     * @param  bool  $is_select
     * @return array|string
     */
    function viewConfig($file, $hex = '', $keyValue, $is_select=true){

        $hex = json_decode($hex, true);

        $option = [];

        if ($keyValue){
            $lists = [];
            foreach ($file as $value){
                $lists[$value[$keyValue[0]]] = $value[$keyValue[1]];
            }

        }else{
            $lists = $file;
        }

        foreach ($lists as $key => $list){
            $select = '';
            if (is_array($hex)){
                if (!empty($hex[$key])){
                    $select = ' selected';
                }
            }else{
                if (strlen($hex)){
                    if ($hex == $key){
                        $select = ' selected';
                    }
                }
            }

            if (!$is_select){
                $option[$key]['value'] = $list;
                $option[$key]['select'] = $select;
            }else{
                //$option.= '<option value="' . $key . '"' . $select . '>' . $list . '</option>';
            }
        }

        return $option;
    }


    /**
     * デフォルトの日時を取得
     * @param  string  $type   種類
     * @param  string  $date   日時
     * @return false|string
     */
    function dateDefault(string $type, ?string $date){
        if (!$date){
            return "-";
        }

        if ($type == "date"){
            return datetime("Y/m/d", $date);
        }
    }

    function datetime($format, $datetime, $isAm00=false){
        if ($isAm00){
            list($date1, $date2) = explode(':', $datetime);
            if ($date1 == '00'){
                return 'AM 00:' . $date2;
            }
        }
        $result = date($format, strtotime($datetime));

        return $result;
    }


	function out($str, $num=40){
		$str = strip_tags($str, '<br>');

		if ($num){
			$str = mb_strimwidth($str, 0, $num, '...', 'utf-8');
		}

		return $str;
	}

	function getMyURL(){
		return (empty($_SERVER['HTTPS']) ? 'http://' : 'https://').$_SERVER['HTTP_HOST'];
	}

	function getWeekColor($week){
		if (($week == '土')  || ($week == '日')){
			return '<span style="color:#FF0000;">' . $week . '</span>';
		}
		return $week;
	}

    /**
     * 住所の整形
     * @param $member ユーザー情報
     * @return string
     */
    function getAddress($member){
	    return config('utilities.prefecture')[$member->prefectures] .
        $member->city .
        $member->building;
    }

    function getAddressToPrefectures(string $address) : int{
        $prefectures = config("prefecture");

        foreach ($prefectures as $keyPrefecture => $prefecture){
            if (strpos($address, $prefecture) !== FALSE){
                return $keyPrefecture;
            }
        }
        return 0;
    }

    /**
     * CSSなどにキャッシュを付加するもの
     * @return string
     */
    function notCache(){
        if (env("APP_DEBUG")){
            return "?time=" . time();
        }
    }

    /**
     * グローバル変数の扱い
     * @param  string  $varName
     * @param  object|null  $var
     * @return mixed
     */
    function globalVariable(string $varName, object $var = null){
        if ($var){
            $GLOBALS[$varName] = $var;
        }

        return $GLOBALS[$varName];
    }

    function changeWeek($week)
    {
        if ($week == 0){
            $week = 7;
        }

        return $week;
    }

    function changeHashPassword($password)
    {
        return bcrypt($password);
    }


    function getTemplate(string $templateName, array $datas=[])
    {
        return view($templateName, $datas)->render();
    }

    function getIsExpert()
    {
        if (strpos($_SERVER['HTTP_HOST'], "xpert")){
            return 1;
        }else{
            return 0;
        }
    }


    /**
     * json形式でconfigを取得
     */
    function configJson($file)
    {
        return json_decode(file_get_contents(dirname(__FILE__) . "/../config/" .  $file . ".json"), true);
    }

    /**
     * モデルからデータ取得
     * @param $appName
     * @return array
     */
    function getSelect(string $appName) : array
    {
        $Model = app($appName);
        return $Model->getSelect();
    }

    function getUploadType(string $appName) : string
    {
        $Model = app($appName);

        return $Model->uploadType;
    }

    function getAge(string $birthDay) : string
    {
        $curDate = new \DateTime(date("Y-m-d"));
        $birthDate = new \DateTime($birthDay);
        $age = $curDate->diff($birthDate);
        return $age->y;
    }

    function getEra(string $birthDay) : string
    {
        $curDate = new \DateTime(date("Y-m-d"));
        $birthDate = new \DateTime($birthDay);
        $age = $curDate->diff($birthDate)->y;
        if($age > 9){
            $year = substr($age, 0, strlen($age)-1);
            $year.= '0';
            $sub = substr($age, -1);
            if($sub>5)  $sub = '代後半';
            else    $sub = '代前半';
            return $year.$sub;
        }
        return $age;
    }

    function isUser($id){
        if($id == \Auth::user()->id){
            return 1;
        }else{
            return 0;
        }
    }
?>
