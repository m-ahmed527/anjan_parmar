<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

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
            'blog_category_id' => 'required',
            'short_description' => 'sometimes',
            'name' => 'required',
            'content' => 'required',
            'image' => 'sometimes'
        ];
    }


    public function sanitized() : array {
        return
        [
            'blog_category_id' => $this->blog_category_id,
            'slug' => \Str::slug($this->name),
            'name' => $this->name,
            'short_description' => $this->short_description ? $this->short_description : null,
            'content' => $this['content'],
        ];
    }
}
