<?php

namespace App\Http\Requests\Admin;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;


class UpdateProductRequest extends FormRequest
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
            'name' => 'required',
            'search_keyword' => 'sometimes',
            'price' => 'required|numeric',
            'discount' => 'sometimes|numeric',
            'description' => 'sometimes',
            'long_description' => 'sometimes',
            'attributes' => 'sometimes',
            'attributes.*' => 'sometimes|array',
            // 'variant_price' => 'sometimes',
            'variant_price.*' => 'numeric',
            // 'quantity' => 'sometimes',
            'quantity.*' => 'numeric',
            'images' => 'sometimes',
            'images.*' => 'sometimes|image',
            'featured_image' => 'sometimes|image',
        ];
    }

    public function sanitized(): array
    {
        $category = Category::where('slug', $this->category)->first();
        // dd($category->id);
        return [
            'category_id' => $category->id,
            'slug' => Str::slug($this->name),
            'name' => $this->name,
            'search_keywords' => $this->search_keyword ?? null,
            'price' => $this->price,
            'discount' => $this->discount,
            'discount_type' => isset($this->is_percent) && $this->is_percent == 'on' ? 'percent' : 'price',
            'description' => $this->description ?? null,
            'long_description' => $this->long_description ?? null,
        ];
    }

    public function sanitizedVariants(): array
    {

        $variatData = [];

        foreach ($this->variant as $key => $variant) {

            $variatData[$variant] =
                [
                    'add_on_price' => isset($this->add_on_price[$key]) ? $this->add_on_price[$key] : 0,
                    // 'discount_type' => isset($this->is_percent[$key]) && $this->is_percent[$key] == 'on' ? 'percent' : 'price',
                    // 'discount' => isset($this->discount[$key]) ? $this->discount[$key] : 0,
                    'quantity' => isset($this->quantity[$key]) ? $this->quantity[$key] : 0,
                ];
        }
        // dd($variatData);
        return $variatData;
    }

    public function sanitizedAttributes(): array
    {
        $attributes = [];
        foreach (array_unique($this->attribute) as $attr) {
            $attributes[] = [
                'attribute_id' => $attr
            ];
        }
        return $attributes;
    }

    public function sanitizedImages()
    {
        return [
            'images' => $this->images
        ];
    }
}
