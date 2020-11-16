<?php

namespace App\Libs;
use Session;

/*
*	共通使用
*/
class UtilityClass{

    /**
     * @param $type 種類
     * @return bool
     */
    function checkType($type)
    {
		if (\Route::current()->getAction('type') == $type){
			return $type;
		}

		return false;
	}
}

?>
