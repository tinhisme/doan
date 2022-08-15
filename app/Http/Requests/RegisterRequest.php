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
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required','min:10' ,'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6','max:20' ,'confirmed'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Tên không được để trống",
            'email.required' => "Email không được để trống",
            'email.unique' => "Email đã tồn tại",
            'email.email' => "Không đúng định dạng email",
            'phone.required' => "SDT không được để trống",
            'phone.unique' => "SDT đã tồn tại",
            'phone.min' => "SDT tối thiểu 10 số",
            'password.required' => "Password không được để trống",
            'password.min' => "passsword tối thiểu 6 kí tự",
            'password.max' => "passsword tối đa 20 kí tự",
            'password.confirmed' => "Password xác nhận không để trống",
        ];  
    }
}
