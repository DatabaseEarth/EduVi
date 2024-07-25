<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class product_put extends FormRequest
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
            'Name' => 'required|string|max:255',
            'Price' => 'required|numeric|max:99999999999',
            'Image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Thêm validation cho ảnh
            'Describe' => 'required|string',
            'Quantity' => 'required|numeric',
            'Id_Category'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'Name.required'=>'Bạn chưa nhập tên sản phẩm',
            'Price.required'=>'Bạn chưa nhập giá',
            'Price.numeric'=>'Giá phải là số',
            'Price.max'=>'Giá đã vượt quá giới hạn',
            'Image.image' => 'Tệp phải là hình ảnh',
            'Image.mimes' => 'Hình ảnh phải là loại tệp: jpeg, png, jpg, gif',
            'Describe.required'=>'Bạn chưa nhập mô tả sản phẩm',
            'Describe.string'=>'Mô tả phải là chuỗi',
            'Quantity.required' => 'Bạn chưa nhập số lượng',
            'Id_Category.required'=>'Bạn chưa chọn danh mục'
        ];
    }
}
