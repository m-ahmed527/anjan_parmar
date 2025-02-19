<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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

            'category' => 'sometimes',
            'category.*' => 'sometimes',
            'name' => 'sometimes',
            'search_keywords*' => 'sometimes',
            'price' => 'sometimes',
            'wholesale_price' => 'sometimes',
            'description' => 'sometimes',
            'long_description' => 'sometimes',
            'attribute' => 'sometimes',
            'attribute*' => 'sometimes|array',
            'variant' => 'sometimes|array',
            'variant.*' => 'sometimes',
            'add_on_price*' => 'somtimes',
            'discount' => 'sometimes',
            'images*' => 'sometimes',
            'featured_image' => 'required',
        ];
    }

    public function sanitized(): array
    {
        $product = [];
        foreach ($this->name as $key => $n) {
            $product[] = [
                'brand_id' => $this->brand[$key] ?? null,
                'style_number' => $this->style_number[$key] ?? null,
                'p_id' => $this->p_id[$key] ?? null,
                'parent_id' => $this->parent_id[$key] ?? null,
                'slug' => \Str::slug($n),
                'name' => $n,
                'matal' => $this->matal[$key] ?? null,
                'stone_type' => $this->stone_type[$key] ?? null,
                'stone_shape' => $this->stone_shape[$key] ?? null,
                'stone_count' => $this->stone_count[$key] ?? null,
                'stone_size' => $this->stone_size[$key] ?? null,
                'stone_weight' => $this->stone_weight[$key] ?? null,
                'search_keywords' => $this->search_keywords[$key] ?? null,
                'price' => $this->price[$key],
                'wholesale_price' => $this->wholesale_price[$key],
                'override_retail_price' => $this->override_retail_price[$key] ?? null,
                'discount' => $this->discount[$key],
                'discount_type' => isset($this->is_percent[$key]) && $this->is_percent[$key] == 'on' ? 'percent' : 'price',
                'description' => $this->description[$key],
                'short_description' => $this->short_description[$key],
                'weight' => $this->weight[$key],
                'length' => $this->length[$key],
                'height' => $this->height[$key],
                'width' => $this->width[$key],
                'radius' => $this->radius[$key],
            ];
        }
        return $product;
    }

    public function sanitizedVariants(): array
    {
        $variant = [];
        foreach ($this->variant as $key => $var) {

            $variant[] = [
                'variant_id' => $var,
                'add_on_price' => isset($this->add_on_price[$key]) ? $this->add_on_price[$key] : 0,
                // 'discount_type' => isset($this->is_percent[$key]) && $this->is_percent[$key] == 'on' ? 'percent' : 'price',
                // 'discount' => isset($this->discount[$key]) ? $this->discount[$key] : 0,
                'quantity' => isset($this->quantity[$key]) ? $this->quantity[$key] : 0,
            ];
        }
        // dd($variant);
        return $variant;
    }

    public function sanitizedAttributes(): array
    {
        $attributes = [];
        foreach ($this->attribute as $attr) {

            $attributes[] = [
                'attribute_id' => $attr
            ];
        }
        return $attributes;
    }

    function sanitizedImages()
    {
        return [
            'images' => $this->images
        ];
    }
}
