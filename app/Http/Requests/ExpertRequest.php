<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

/**
 *  専門家関連のバリデーション
 */
class ExpertRequest extends FormRequest
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
            "expert_name_second" => ["required", "stringMax:122,全角"],
            "expert_name_first" => ["required", "stringMax:122,全角"],
            "expert_name_kana_second" => ["required", "stringMax:122,全角"],
            "expert_name_kana_first" => ["required", "stringMax:122,全角"],
            "gender" => ["required"],
            //"image" => ["dimensions:min_width=300,min_height=300"],
            "specialties" => ["required"],
            "zip1" => ["required"],
            "zip2" => ["required"],
            "address" => ["required", "stringMax:1000,全角"],
        ];

    }


}
