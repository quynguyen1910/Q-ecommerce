<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "ho"=> "required|min:1|max:25|regex:/^[a-zA-ZÀ-ỹ\s]+$/u",
            "ten"=> "required|min:1|max:25|regex:/^[a-zA-ZÀ-ỹ\s]+$/u",
            'gioitinh'=>['required','in:1,0'],
            'ngaysinh'=> ['required','date'],
            'sodt'=>['max:14'],
            'diachi'=>['max:255','min:2'],
        ];
    }
    public function messages(){
        return [
            'required'=> ':attribute không được để trống',
            'min'=> ':attribute phải lớn hơn :min ký tự',
            'max'=> ':attribute phải nhỏ hơn :max ký tự',
            'regex'=> ':attribute có chứa ký tự không hợp lệ',
        ];
    }
    public function attributes(){
        return [
            'ho'=> 'Họ',
            'ten'=> 'Tên',
            'gioitinh'=> 'Giới Tính',
            'ngaysinh'=> 'Ngày Sinh',
            'sodt'=> 'Số điện thoại',
            'diachi'=> 'Địa Chỉ',
        ] ;
    }
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        // Redirect back with errors and input data
        throw new \Illuminate\Validation\ValidationException($validator, redirect()->back()->withErrors($validator)->withInput());
    }
}
