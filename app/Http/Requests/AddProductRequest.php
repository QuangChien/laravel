<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'name' => 'required|unique:products|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required',
            'img' => 'required',
            'prd_img_name' => 'required',
            'description' => 'required',
            'detail' => 'required',

        ];
    }

    public function messages()
{
    return [
        'name.required' => 'Tên phòng không được để trống!',
        'name.unique' => 'Tên phòng đã tồn tại!',
        'name.max' => 'Tên phòng không được lớn hơn 255 ký tự!',

        'price.required' => 'Giá phòng không được để trống!',
        'price.numeric' => 'Giá phòng không phải là số!',

        'quantity.required' => 'Số lượng không được để trống!',
        'img.required' => 'Ảnh phòng khách sạn không được để trống!',

        'prd_img_name.required' => 'Ảnh chi tiết phòng khách sạn không được để trống!',
        'description.required' => 'Mô tả ngắn không được để trống!',
        'detail.required' => 'Thông tin chi tiết phòng khách sạn không được để trống!',
    ];
}
}
