<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class UpdateSliderRequest extends FormRequest
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
            'category' => 'required',
            'title' => 'required',
            'sub_title' => 'sometimes',
            'slider_image' => 'sometimes',
        ];
    }

    function sanitized() : array {
        return [
            'category_id' => $this->category,
            'slug' => \Str::slug($this->title),
            'title' => $this->title,
            'sub_title' => $this->sub_title,
        ];

    }
}
