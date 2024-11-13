<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, 
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
        ];
    }
    public function message(): array
    {
        return [
            'name.required' => 'Tên danh mục bắt buộc phải duy nhất!', 
        ];
    }
}
