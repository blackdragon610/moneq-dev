<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

/**
 *  ユーザー関連のバリデーション
 */
class UserLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * メッセージカスタマイズ
     *
     * @return array
     */
    public function messages()
    {
        return [

        ];
    }

    protected function failedValidation(Validator $validator)
    {
    }

    public function getValidator()
    {
        return $this->getValidatorInstance();
    }

    /**
     * バリデーションルール
     *
     * @return array
     */
    public function rules()
    {
        if ($this->get("expert")){
            //専門家
            $results = $rules = [
                "email" => ["required", "email", "unique:experts,email,".$this->input("id").",id,deleted_at,NULL"],
                "tel" => ["required", "tel"],
            ];
        }else{
            //通常
            $results = $rules = [
                "email" => ["required", "email", "unique:users,email,".$this->input("id").",id,deleted_at,NULL"],
                "tel" => ["required", "tel"],
            ];
        }


        if ($this->input("mode") == "email"){
            $results = [];

            //メールアドレス登録の場合
            $results["email"] = $rules["email"];
        }

        return $results;
    }


}
