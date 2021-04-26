<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'fullname' => 'required|max:50',
            'phone' => 'required|numeric|digits:10',
            // 'phone' => 'required|regex:/(03|07|08|09|01[2|6|8|9])+([0-9]{8})/',
            'email' => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'Họ và tên không được để trống',
            'fullname.max' => 'Họ và tên không được vượt quá 50 ký tự',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.numeric' => 'Không đúng định dạng số điện thoại',
            'phone.digits' => 'Số điện thoại phải bao gồm 10 chữ số',
            // 'phone.regex' => "Không đúng định dạng số điện thoại",
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không được để trống',
        ];
    }
}
