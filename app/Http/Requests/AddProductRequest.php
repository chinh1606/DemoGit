<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            "code" => "required|unique:products",
            "info" => "required",
            "describer" => "required",
            "image" => "required",
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
            "image.required" => "Ảnh sản phẩm không được để trống!",
            "price.required" => "Giá sản phẩm không được để trống!",
        ];
    }
}
