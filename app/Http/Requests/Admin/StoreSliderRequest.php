<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreSliderRequest extends FormRequest
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
            'category' => 'required|array',
            'category.*' => 'required',
            'title' => 'required|array',
            'title.*' => 'required',
            'sub_title' => 'sometimes|array',
            'sub_title.*' => 'sometimes',
            'slider_image' => 'required|array',
            'slider_image.*' => 'required',
        ];
    }

    function sanitized() : array {
        $data = [];
        foreach($this->title as $key => $t)
        {
            $data[] = [
                'category_id' => $this->category[$key],
                'slug' => \Str::slug($t),
                'title' => $t,
                'sub_title' => $this->sub_title[$key],
            ];
        }
        return $data;
    }
}
