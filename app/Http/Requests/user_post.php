<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class user_post extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'FullName'=>'required|string|max:250',
            'Email'=>'required|email|max:100|unique:user',
            'Phone'=>'nullable|regex:/^[0-9]{9,12}$/',
            'Address'=>'nullable|string',
            'Avatar'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'Password' => 'required|min:6'
        ];
    }
    public function messages()
    {
        return [
            'FullName.required' => 'Bạn chưa nhập họ và tên',
            'FullName.string' => 'Họ và tên phải là chữ',
            'FullName.max' => 'Đã vượt quá ký tự',
            'Email.required'=>'Bạn chưa nhập email',
            'Email.email'=>'Không đúng định dạng email',
            'Email.max'=>'Đã vượt quá ký tự',
            'Email.unique'=>'Email đã được đăng ký',
            'Phone.regex' => 'Số điện thoại phải từ 9 đến 12 chữ số',
            'Address.string' => 'Địa chỉ phải là chữ',
            'Avatar.image' => 'Tệp phải là hình ảnh',
            'Avatar.mimes' => 'Hình ảnh phải là loại tệp: jpeg, png, jpg, gif',
            'Avatar.max' => 'Hình ảnh không được lớn hơn 2048 kilobyte',
            'Password.required' => 'Bạn chưa nhập mật khẩu',
            'Password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
        ];
    }
}
