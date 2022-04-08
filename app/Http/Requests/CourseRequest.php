<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        $rules = [
            'name' => 'bail|required|max:255',
            'qualtity' => 'bail|required|integer|min:1|max:12',
            'major_id' => 'bail|required',
        ];

        return $rules;
    }
    public function messages()
    {
        return [
            'name.required' => "Tên học phần phải bắt buộc nhập",
            'name.max' => "Tên học phần phải nhỏ hơn 255 kí tự",
            'qualtity.required' => "Số tín chỉ phải bắt buộc nhập",
            'qualtity.max' => "Số tín chỉ tối đa là 12",
            'qualtity.integer' => "Số tín chỉ phải là số nguyên dương",
            'qualtity.min' => "Số tín chỉ phải lớn hơn 1",
            'major_id.required' => "Bắt buộc phải chọn ngành",
        ];
    }
}
