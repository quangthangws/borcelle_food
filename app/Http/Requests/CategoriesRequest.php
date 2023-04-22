<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Response;


class CategoriesRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:categories,name,' . $this->id,
            'image' => 'required|mimes:png,jpg,jpeg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'vui lòng nhập trường này!',
            'name.unique' => 'danh mục này đã tồn tại!',
            'image.required' => 'không để ảnh trống',
            'image.mimes' => 'định dạng ảnh gồm (png, jpg, jpeg, gif, svg)',
            'image.max' => 'ảnh quá lớn (không vượt quá 2048KB)',
        ];
    }

    // public function failedValidation(Validator $validator) 
    // {
    //     $response = new Response([
    //         'errors' => $validator->errors()
    //     ], Response::HTTP_UNPROCESSABLE_ENTITY);
    //     throw(new ValidationException($validator, $response));
    // }
}
