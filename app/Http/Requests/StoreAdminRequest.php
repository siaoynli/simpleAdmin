<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class AdminCreateRequest
 * @package App\Http\Requests
 */
class StoreAdminRequest extends FormRequest
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
            'name' => 'required|min:6|max:30|unique:users,name,'.$this->admins,
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|min:6|confirmed',
        ];
    }


    /**
     * @return array
     */
    public  function messages()
    {
        return  [
            'name.required'=>'用户名必须填写',
            'name.min'=>'用户名长度6到30位',
            'name.max'=>'用户名长度6到30位',
            'name.unique'=>'用户名已经存在',
            'email.required'=>'邮箱必须填写',
            'email.email'=>'邮箱格式不正确',
            'email.max'=>'邮箱长度最长100位',
            'email.unique'=>'邮箱已经存在',
            'password.required'=>'密码必须填写',
            'password.min'=>'密码长度最少6位',
            'password.confirmed'=>'确认密码不正确',
        ];
    }
}
