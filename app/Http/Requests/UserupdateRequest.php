<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserupdateRequest extends FormRequest
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
            'username' => 'required|regex:/^\w{6,16}$/',


            'phone'=>'regex:/^1[3456789]\d{9}$/',
            'email'=>'email',

        ];
    }

    /**
     * 获取已定义验证规则的错误消息。
     *
     * @return array
     */
    public function messages()
    {
        return [
            'username.required' => '用户名不能为空',
            'username.regex'=>'用户名格式不正确',


            'phone.regex'=>'手机号码格式不正确',
            'email.email'=>'邮箱格式不正确',

        ];
    }
}
