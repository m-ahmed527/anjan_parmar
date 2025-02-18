<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHomePageCategorySectionRequest extends FormRequest
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
            'lable' => 'sometimes',
            'title' => 'required',
            'sub_title' => 'sometimes',
            'url' => 'sometimes',
            'image' => 'required',
        ];
    }

    public function sanitiazed() : array {
        return [
            'category_id' => $this->category,
            'label' => $this->lable ?? null,
            'slug' => \Str::slug($this->title),
            'title' => $this->title,
            'sub_title' => $this->sub_title ?? null,
            'url' => $this->url ?? null,
        ];
    }
}
