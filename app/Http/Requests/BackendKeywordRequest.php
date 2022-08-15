<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BackendKeywordRequest extends FormRequest
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
            'name' => [
                'required',
                'unique:keywords,name,'. $this->id,
            ],
        ];
    }

    /**
    * Get the error messages for the defined validation rules.
    *
    * @return array
    */
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên',
            'name.unique' => 'Tên đã tồn tại',
        ];
    }
}
