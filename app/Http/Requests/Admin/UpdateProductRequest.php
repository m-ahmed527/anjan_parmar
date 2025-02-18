<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

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
            'brand' => 'sometimes',
            'style_number' => 'sometimes',
            'p_id' => 'required',
            'parent_id' => 'required',
            'category' => 'required',
            'name' => 'required',
            'metal' => 'sometimes',
            'stone_type' => 'sometimes',
            'stone_shape' => 'sometimes',
            'stone_count' => 'sometimes',
            'stone_size' => 'sometimes',
            'stone_weight' => 'sometimes',
            'search_keywords' => 'sometimes',
            'price' => 'required',
            'wholesale_price' => 'required',
            'override_retail_price' => 'sometimes',
            'description' => 'required',
            'short_description' => 'required',
            'weight' => 'sometimes',
            'length' => 'sometimes',
            'height' => 'sometimes',
            'width' => 'sometimes',
            'radius' => 'sometimes',
            'attribute' => 'required',
            'variant' => 'required|array',
            'variant.*' => 'required',
            'add_on_price' => 'sometimes',
            'discount' => 'sometimes',
            'images' => 'sometimes',
            'featured_image' => 'sometimes'
        ];
    }

    public function sanitized(): array
    {
        return [
            'brand_id' => $this->brand ?? null,
            'style_number' => $this->style_number ?? null,
            'p_id' => $this->p_id ?? null,
            'parent_id' => $this->parent_id ?? null,
            'slug' => \Str::slug($this->name),
            'name' => $this->name,
            'matal' => $this->metal ?? null,
            'stone_type' => $this->stone_type ?? null,
            'stone_shape' => $this->stone_shape ?? null,
            'stone_count' => $this->stone_count ?? null,
            'stone_size' => $this->stone_size ?? null,
            'stone_weight' => $this->stone_weight ?? null,
            'search_keywords' => $this->search_keywords ?? null,
            'price' => $this->price,
            'wholesale_price' => $this->wholesale_price,
            'override_retail_price' => $this->override_retail_price ?? null,
            'discount' => $this->discount,
            'discount_type' => isset($this->is_percent) && $this->is_percent == 'on' ? 'percent' : 'price',
            'description' => $this->description,
            'short_description' => $this->short_description,
            'weight' => $this->weight,
            'length' => $this->length,
            'height' => $this->height,
            'width' => $this->width,
            'radius' => $this->radius,
        ];
    }

    public function sanitizedVariants(): array
    {
        // $variant = [];
        // // dd(request()->variant);
        // foreach ($this->variant as $key => $var) {

        //     $variant[] = [
        //         'variant_id' => $var,
        //         'add_on_price' => isset($this->add_on_price[$key]) ? $this->add_on_price[$key] : 0,
        //         'discount_type' => isset($this->is_percent[$key]) && $this->is_percent[$key] == 'on' ? 'percent' : 'price',
        //         'discount' => isset($this->discount[$key]) ? $this->discount[$key] : 0,
        //         'quantity' => isset($this->quantity[$key]) ? $this->quantity[$key] : 0,
        //     ];
        // }
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
