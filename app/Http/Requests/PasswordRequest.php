<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

/**
 *  パスワード関連のバリデーション
 */
class PasswordRequest extends FormRequest
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
        return [
            "password" => ["required", "password", 'same:password_confirmation'],
        ];

    }


}
