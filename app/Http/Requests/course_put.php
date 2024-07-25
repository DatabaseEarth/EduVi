<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class course_put extends FormRequest
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
            'Title'=>'required|string|max:250',
            'Describe'=>'nullable|string',
            'Price'=>'numeric|max:99999999999',
            'Image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Thêm validation cho ảnh
            'Request' => 'required|string|max:500',
            'Achievement' => 'required|string|max:500',
            'Video_Intro' => 'required|string',
        ];
    }
    public function messages()
    {
        return [
            'Title.required' => 'Bạn chưa nhập tiêu đề',
            'Title.string' => 'Tiêu đề phải là chuỗi ký tự',
            'Title.max' => 'Tiêu đề không được vượt quá 250 ký tự',
            'Describe.string' => 'Mô tả phải là chuỗi ký tự',
            'Price.numeric' => 'Giá phải là một số',
            'Price.max' => 'Giá không được vượt quá 99999999999',
            // 'Image.required' => 'Bạn chưa chọn ảnh',
            'Image.image' => 'Tệp phải là hình ảnh',
            'Image.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif',
            'Image.max' => 'Kích thước hình ảnh không được vượt quá 2048 kilobytes',
            'Request.required' => 'Bạn chưa nhập yêu cầu',
            'Request.string' => 'Yêu cầu phải là chuỗi ký tự',
            'Request.max' => 'Yêu cầu không được vượt quá 500 ký tự',
            'Achievement.required' => 'Bạn chưa nhập thành tích',
            'Achievement.string' => 'Thành tích phải là chuỗi ký tự',
            'Achievement.max' => 'Thành tích không được vượt quá 500 ký tự',
            'Video_Intro.required' => 'Bạn chưa nhập liên kết video giới thiệu',
            'Video_Intro.string' => 'Liên kết video giới thiệu phải là chuỗi ký tự',
        ];
    }
}
