<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => ['required'],
            'password' => ['required', 'min:6','max:20'],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => "Email không được để trống",
            'password.required' => "Password không được để trống",
            'password.min' => "passsword tối thiểu 6 kí tự",
            'password.max' => "passsword tối đa 20 kí tự",
        ];
    }
}
