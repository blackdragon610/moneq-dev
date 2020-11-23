<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

/**
 *  ユーザーのプロフィール関連のバリデーション
 */
class UserProfileRequest extends FormRequest
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
        $rules = [
            "email" => ["required"],
            "nickname" => ["required"],
        ];

        return $rules;
    }


}
