<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class lesson_post extends FormRequest
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
            'Id_Chapter'=>'required|numeric',
            'Describe'=>'nullable|string',
            'Video_Lesson'=>'required',
            'STT'=>'nullable|numeric',
        ];
    }
    public function messages(): array
    {
        return [
            'Title.required' => 'Bạn chưa nhập tiêu đề.',
            'Title.string' => 'Tiêu đề phải là chuỗi ký tự.',
            'Title.max' => 'Tiêu đề không được vượt quá 250 ký tự.',
            
            'Id_Chapter.required' => 'Bạn chưa chọn chương.',
            'Id_Chapter.numeric' => 'Chương phải là số.',
            
            'Describe.string' => 'Mô tả phải là chuỗi ký tự.',
            
            'Video_Lesson.required' => 'Bạn chưa nhập bài giảng video.',
            
            'STT.numeric' => 'STT phải là số.',
        ];
    }
}
