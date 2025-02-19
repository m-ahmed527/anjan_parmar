<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreCategoryRequest extends FormRequest
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
            // 'parent_category' => 'sometimes|array',
            // 'parent_category.*' => 'sometimes',
            // 'category_type' => 'required|array',
            // 'category_type.*' => 'required',
            'name' => 'required',
            'attribute' => 'required|array',
            'image' => 'image',
            'banner_image' => 'image',

        ];
    }

    public function sanitized(): array
    {
        return [
            'name' => $this->name,
            'slug' => Str::slug($this->name),
        ];
    }

}
