<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class StoreOfferRequest extends FormRequest
{

    protected $product;

    public function __construct()
    {
        $this->product = request()->route('product'); // Product fetch from route
    }
    /**
     * Determine if the user is authorized to make this request.
     */

    public function authorize(): bool
    {
        // dd($this->product);
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
            'offer_price' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail)  {
                    if ($value > $this->product->price) {
                        $fail('Offer price must be less than or equal to the product price ($' . $this->product->price . ').');
                    }
                },
            ],
            'offer_quantity' => ['required', 'numeric', 'min:1', 'max:10'],
            'offer_description' => 'required|string',
        ];
    }

    public function sanitized()
    {
        return [
            'user_id' => auth()->user()->id,
            'offer_price' => $this->offer_price,
            'offer_quantity' => $this->offer_quantity,
            'total_price'=>(float) $this->offer_price * (float) $this->offer_quantity,
            'offer_description' => $this->offer_description,
        ];
    }
}
