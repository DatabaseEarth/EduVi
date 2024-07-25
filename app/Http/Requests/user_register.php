<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class user_register extends FormRequest
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
            'FullName' => 'required|string|max:250',
            'Email' => 'required|email|unique:user',
            'Password' => 'required|min:6',
        ];
    }
    public function messages()
    {
        return [
            'FullName.required' => 'Bạn chưa nhập họ và tên',
            'FullName.string' => 'Họ và tên phải là chữ',
            'FullName.max' => 'Họ và tên đã vượt quá 250 ký tự',
            'Email.required' => 'Bạn chưa nhập email',
            'Email.email' => 'Không đúng định dạng email',
            'Email.unique' => 'Email đã được đăng ký',
            'Password.required' => 'Bạn chưa nhập mật khẩu',
            'Password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
        ];
    }
}
