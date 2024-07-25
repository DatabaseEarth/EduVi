<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class chapter_post extends FormRequest
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
            'Id_Course'=>'required|numeric',
            'STT'=>'nullable|numeric',
        ];
    }
    public function messages(){
        return [
            'Title.required'=>'Bạn chưa nhập tiêu đề',
            'Title.string'=>'Tiêu đề phải là chữ',
            'Title.max'=>'Đã vượt quá ký tự',
            'Id_Course.required'=>'Chưa chọn khóa học',
            'Id_Course.numeric'=>'Mã khóa học phải số',
            'STT.numeric'=>'Số thứ tự phải là số'
        ];
    }
}
