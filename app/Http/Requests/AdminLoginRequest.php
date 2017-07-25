<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:30',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '用户名必须填写',
            'name.min' => '用户名长度为2到30位',
            'name.max' => '用户名长度为6到30位',
            'password.required' => '密码必须填写',
        ];
    }
}
