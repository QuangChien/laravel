<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule; 

class EditUserRequest extends FormRequest
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
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($this->id)
            ],
            're-password' => 'required_with:password|same:password',
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Họ và tên không được để trống',
            'name.max' => 'Họ và tên không được vượt quá 50 ký tự',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Không đúng định dạng email',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải lớn hơn 6 ký tự',
            're-password.required_with' => 'Mật khẩu nhập lại phải được nhập',
            're-password.same' => 'Mật khẩu nhập lại không đúng',
        ];
    }
}
