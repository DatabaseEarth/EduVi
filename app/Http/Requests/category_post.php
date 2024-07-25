<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class category_post extends FormRequest
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
            'Name' => 'required|string|max:200',
            'Description' => 'nullable|string',
            'Image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Thêm validation cho ảnh
        ];
    }
    public function messages()
    {
        return [
            'Name.required' => 'Bạn chưa nhập tên danh mục',
            'Name.string' => 'Tên phải là chữ',
            'Name.max' => 'Tên đã vượt quá 200 ký tự',
            'Description.string' => 'Mô tả phải là chữ',
            'Image.required' => 'Bạn chưa nhập ảnh',
            'Image.image' => 'Tệp phải là hình ảnh',
            'Image.mimes' => 'Hình ảnh phải là loại tệp: jpeg, png, jpg, gif',
            'Image.max' => 'Hình ảnh không được lớn hơn 2048 kilobyte',
        ];
    }
}
