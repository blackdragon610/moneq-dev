<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

/**
 *  管理ユーザー関連のバリデーション
 */
class AdminRequest extends FormRequest
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
        $results = $rules = [
            "admin_name" => ["required", "unique:admins,login_id,".$this->input("id").",id,deleted_at,NULL"],
            "password" => ["required", "password"],
        ];

        if ($this->input("id")){
            unset($results["password"]);
        }

        return $results;
    }


}
