<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
        // dd($this->all());
        return [
            'billing_first_name' => 'required',
            'billing_last_name' => 'required',
            'billing_email' => 'required|email',
            'billing_phone' => ['required', function ($attribute, $value, $fail) {
                // Remove all non-digit characters
                $digitsOnly = preg_replace('/\D/', '', $value);
                // dd($digitsOnly);
                // US numbers should be 11 digits with country code (e.g., +15646546464)
                // So if it's just +1 (only country code), digitsOnly will be '1'
                // if ($digitsOnly === '1') {
                //     $fail('The phone number is incomplete or invalid.');
                // }
                // Should be exactly 11 digits and start with '1' (for US)
                if (!preg_match('/^1\d{10}$/', $digitsOnly)) {
                    $fail('Please enter a valid and complete US phone number.');
                }
            }],
            'billing_address' => 'required',
            'billing_city' => 'required|string',
            'billing_country' => 'required|string',
            'billing_state' => 'required|string',
            'billing_zip_code' => 'required|string',
            'shipping_address' => 'required_unless:same_as_billing,on',
            'shipping_city' => 'required_unless:same_as_billing,on',
            'shipping_country' => 'required_unless:same_as_billing,on',
            'shipping_state' => 'required_unless:same_as_billing,on',
            'shipping_zip_code' => 'required_unless:same_as_billing,on',

        ];
    }
    public function messages(): array
    {
        return [
            'billing_first_name.required' => 'First name is required',
            'billing_last_name.required' => 'Last name is required',
            'billing_email.required' => 'Email is required',
            'billing_email.email' => 'Email must be a valid email address',
            'billing_phone.required' => 'Phone number is required',
            'billing_address.required' => 'Address is required',
            'billing_city.required' => 'City is required',
            'billing_country.required' => 'Country is required',
            'billing_state.required' => 'State is required',
            'billing_zip_code.required' => 'Zip code is required',

            'shipping_address.required_unless' => 'Shipping address is required',
            'shipping_city.required_unless' => 'Shipping city is required',
            'shipping_country.required_unless' => 'Shipping country is required',
            'shipping_state.required_unless' => 'Shipping state is required',
            'shipping_zip_code.required_unless' => 'Shipping zip code is required',
        ];
    }
    public function billingSanitized()
    {

        $data = [
            'user_id' => auth()->user()->id,
            'first_name' => $this->billing_first_name,
            'last_name' => $this->billing_last_name,
            'email' => $this->billing_email,
            'phone' => str_replace([' ', '(', ')', '-'], '', $this->billing_phone),
            'address' => $this->billing_address,
            'city' => $this->billing_city,
            'country' => $this->billing_country,
            'state' => $this->billing_state,
            'zip_code' => $this->billing_zip_code,
            'same_as_billing' => $this->same_as_billing == 'on' ? 1 : 0,
        ];
        return $data;
    }

    public function shippingSanitized()
    {
        if ($this->same_as_billing == 'on') {
            return [];
        }
        $data = [
            'user_id' => auth()->user()->id,
            'address' => $this->shipping_address,
            'city' => $this->shipping_city,
            'country' => $this->shipping_country,
            'state' => $this->shipping_state,
            'zip_code' => $this->shipping_zip_code,
        ];
        return $data;
    }
}
