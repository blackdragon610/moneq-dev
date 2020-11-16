<?php
namespace App\Validation;
		
	class RuleValidator{
		
		public function validateHiragana($attribute, $value, $parameters){
					
			if (preg_match("/^[ぁ-んァ-ヶー一-龠]+$/u", $value)) {			
				return true;
			}
			
			return false;
		}
		
		
		public function validateKatakana($attribute, $value, $parameters){
			
			if (preg_match("/^[ァ-ヶー]+$/u", $value)) {
				return true;
			}
			
			return false;
		}


		public function validateStringMax($attribute, $value, $parameters){

			$count = strlen(mb_convert_encoding($value, 'SJIS', 'UTF-8')) / 2;
			

			if ($count > $parameters[0]){
				return false;
			}
						
			
			return true;
		}

	}
?>