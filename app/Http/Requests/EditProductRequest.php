<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditProductRequest extends FormRequest
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
                'max:255',
                Rule::unique('products')->ignore($this->id)
            ],
            'price' => [
                'required',
                'numeric',
                Rule::unique('products')->ignore($this->id)
            ],
            'quantity' => "required",
            'description' => "required",
            'detail' => "required",
        ];
    }

    public function messages()
{
    return [
        'name.required' => 'Tên phòng không được để trống!',
        'name.max' => 'Tên phòng không được lớn hơn 255 ký tự!',
        'name.unique' => 'Tên phòng đã tồn tại!',

        'price.required' => 'Giá phòng không được để trống!',
        'price.numeric' => 'Giá phòng không phải là số!',

        'quantity.required' => 'Số lượng không được để trống!',

        'description.required' => 'Mô tả ngắn không được để trống!',
        'detail.required' => 'Thông tin chi tiết phòng khách sạn không được để trống!',
    ];
}
}
