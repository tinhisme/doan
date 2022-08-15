<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BackendProductRequest extends FormRequest
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
            'name' =>'required','unique:products,name,'. $this->id,
            'category_id' => 'required',
            'price' => 'required',
            'price_entry' => 'required',
        ];
    }

    public function messages()
    {
        return [ 
            'name.required' => 'Vui lòng nhập tên',
            'name.unique' => 'Tên đã tồn tại',
            'price.required' => 'Vui lòng nhập giá bán',
            'category_id.required' => 'Chọn tên danh mục',
            'price_entry.required' => 'Vui lòng nhập giá mua',
        ];

    }
}
