<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

use function PHPSTORM_META\map;

class UpdateBlogRequest extends FormRequest
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
            'short_description' => 'required',
            'long_description' => 'required',
            // 'blog_image' => 'required'
        ];
    }


    public function sanitized(): array
    {
        return
            [
                'slug' => Str::slug($this->name),
                'name' => $this->name,
                'short_description' => $this->short_description,
                'long_description' => $this->long_description,
            ];
    }
}
