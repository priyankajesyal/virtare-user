<?php

namespace App\Http\Requests\GlobalCode;

use Urameshibr\Requests\FormRequest;


class GlobalCodeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'globalCodeCategory' => 'required',
            'name' => 'required',
            'description' => 'required',
        ];
    }
}
