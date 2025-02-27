<?php

namespace App\Http\Requests\Admin;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

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

            'category' => 'required',
            'name' => 'required',
            'search_keyword' => 'sometimes',
            'price' => 'required|numeric',
            // 'discount' => 'nullable|numeric',
            // 'discount' => 'nullable|numeric',
            // 'discount' => [
            //     'nullable',
            //     'numeric',
            //     function ($attribute, $value, $fail) {
            //         if (request()->has('is_percent')) {
            //             // If the discount is a percentage, it must be <= 100
            //             if ($value > 100) {
            //                 $fail('Discount percentage cannot be greater than 100.');
            //             }
            //         } else {
            //             // If the discount is a fixed amount, it must be <= price
            //             if ($value > request()->input('price')) {
            //                 $fail('Discount cannot be greater than the price. ' .'('. request()->input('price') .')');
            //             }
            //         }
            //     }
            // ],
            'discount' => [
                'nullable',
                'numeric',
                Rule::when(request()->has('is_percent'), 'max:100'),
                Rule::when(!request()->has('is_percent'), 'lte:price'),
            ],
            'description' => 'sometimes',
            'long_description' => 'sometimes',
            'attributes' => 'sometimes',
            'attributes.*' => 'sometimes|array',
            'variant_price.*' => 'nullable|numeric',
            'quantity.*' => 'nullable|numeric',
            'images' => 'sometimes',
            'images.*' => 'sometimes|image',
            'featured_image' => 'required|image',
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
            'discount' => $this->discount ?? 0,
            'discount_type' => isset($this->is_percent) && $this->is_percent == 'on' ? 'percent' : 'price',
            'description' => $this->description ?? null,
            'long_description' => $this->long_description ?? null,
        ];
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
