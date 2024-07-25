<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class account_update extends FormRequest
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
            'Phone' => 'nullable|regex:/^[0-9]{9,12}$/', // Sử dụng regex để xác thực độ dài và số
            'Address' => 'nullable|string|max:255', // Đảm bảo địa chỉ là chuỗi và có độ dài tối đa 255 ký tự
            'Avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
    public function messages()
    {
        return [
            'FullName.required' => 'Bạn chưa nhập họ và tên',
            'FullName.string' => 'Họ và tên phải là chữ',
            'FullName.max' => 'Đã vượt quá ký tự',
            'Phone.regex' => 'Số điện thoại phải từ 9 đến 12 chữ số',
            'Address.string' => 'Địa chỉ phải là chữ',
            'Address.max' => 'Địa chỉ đã vượt quá 255 ký tự',
            'Avatar.image' => 'Tệp phải là hình ảnh',
            'Avatar.mimes' => 'Hình ảnh phải là loại tệp: jpeg, png, jpg, gif',
            'Avatar.max' => 'Hình ảnh không được lớn hơn 2048 kilobyte',
        ];
    }
}
