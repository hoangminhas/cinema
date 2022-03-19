<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            //
            'name'=> 'bail|required|',
            'email'=>'bail|required|email',
            'password' => 'bail|required|min:6',
            'confirmPassword' => 'bail|same:password'
        ];
    }

    public function messages()
    {
        return [
            'password.min'=>'Độ dài mật khẩu không đủ',
            'confirmPassword.same' => "Mật khẩu không khớp"
        ];
    }
}
