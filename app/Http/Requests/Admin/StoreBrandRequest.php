<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandRequest extends FormRequest
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
            'image' => 'sometimes|image',
        ];
    }

    public function sanitized(): array
    {
        return [
            'slug' => \Str::slug($this->name),
            'name' => $this->name,
        ];
    }

    public function sanitizedImage()
    {
        if (request()->hasFile('image')) {
            return $this->image;
        }
        return false;
    }
}
