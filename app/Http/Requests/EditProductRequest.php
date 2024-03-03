<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditProductRequest extends FormRequest
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
            //
            "name" => "required",
            "code" => [
                "required",
                Rule::unique("products")->ignore($this->id),
            ],
            "info" => "required",
            "describer" => "required",
            "price" => "required",
        ];
    }
    public function messages()
    {
        return [
            "name.required" => "Tên sản phẩm không được để trống!",
            "code.required" => "Mã sản phẩm không được để trống!",
            "code.unique" => "Mã sản phẩm không được trùng!",
            "info.required" => "Thông tin sản phẩm không được để trống!",
            "describer.required" => "Mô tả sản phẩm không được để trống!",
            "price.required" => "Giá sản phẩm không được để trống!",
        ];
    }
}
