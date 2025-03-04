<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdateAttributeRequest extends FormRequest
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
            'name' => 'required',
            'values.*' => 'required'
        ];
    }

    public function sanitized(): array
    {
        return [
            // 'slug' => Str::slug($this->name),
            'value' => $this->value,
        ];
    }
    public function sanitizedVariants(): array
    {

        return [
            'variants' => $this->variants,
        ];
    }
}
