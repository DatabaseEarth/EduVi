<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class user_login extends FormRequest
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
            'Email' => 'required|email',
            'Password' => 'required|min:6',
        ];
    }
    public function messages()
    {
        return [
            'Email.required' => 'Bạn chưa nhập email',
            'Email.email' => 'Không đúng định dạng email',
            'Password.required' => 'Bạn chưa nhập mật khẩu',
            'Password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
        ];
    }
}
