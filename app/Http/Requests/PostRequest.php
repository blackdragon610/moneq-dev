<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

/**
 *  相談関連のバリデーション
 */
class PostRequest extends FormRequest
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
        return [];
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
            "post_name" => ["required", "stringMax:255,半角"],
            "sub_category_id" => ["required"],
            "body" => ["required", "stringMax:1600,半角"]

        ];

    }


}
