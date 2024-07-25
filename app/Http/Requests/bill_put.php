<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class bill_put extends FormRequest
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
            'Name_Orderer'=>'required|string|max:250',
            'Email_Orderer'=>'required|email|max:250',
            'Phone_Orderer'=>'required|numeric|max:999999999999',
            'Address_Orderer'=>'required|string|max:250',
            'Name_recipient'=>'required|string|max:250',
        ];
    }
    public function messages()
    {
        return [
            'Name_Orderer.required'=>'Bạn chưa nhập tên người đặt',
            'Name_Orderer.string'=>'Tên phải là chữ',
            'Name_Orderer.max'=>'Vượt quá giới hạn ký tự',
            'Email_Orderer.required'=>'Bạn chưa nhập email người đặt',
            'Email_Orderer.email'=>'Không đúng định dạng email',
            'Email_Orderer.max'=>'Vượt quá giới hạn ký tự',
            'Phone_Orderer.required'=>'Bạn chưa nhập số điện thoại người đặt',
            'Phone_Orderer.numeric'=>'Số điện thoại phải là số',
            'Phone_Orderer.max'=>'Vượt quá giới hạn ký tự',
            'Address_Orderer.required'=>'Bạn chưa nhập địa chỉ',
            'Address_Orderer.string'=>'Địa chỉ phải là chữ',
            'Address_Orderer.max'=>'Vượt quá giới hạn ký tự',
            'Name_recipient.required'=>'Bạn chưa nhập tên người nhận',
            'Name_recipient.string'=>'Tên phải là chữ',
            'Name_recipient.max'=>'Vượt quá giới hạn ký tự',
        ];
    }
}
