<?php

namespace App\Http\Requests\Vendor;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'owner_name' => ['required', 'string', 'max:255'],
            'store_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'business_address' => ['required', 'string'],
        ];
    }
    public function messages(): array
    {
        return [
            'owner_name.required' => 'The owner name  is required.',
            'owner_name.string' => 'The owner name must be a string.',
            'owner_name.max' => 'The owner name may not be greater than 255 characters.',
            'store_name.required' => 'The store name  is required.',
            'store_name.string' => 'The store name must be a string.',
            'store_name.max' => 'The store name may not be greater than 255 characters.',
            'phone.required' => 'The phone  is required.',
            'phone.string' => 'The phone must be a string.',
            'phone.max' => 'The phone may not be greater than 255 characters.',
            'business_address.required' => 'The business address  is required.',
            'business_address.string' => 'The business',
        ];
    }
    public function sanitized()
    {
        return [
            'first_name' => $this->owner_name ?? auth()->user->first_name,
            'business_name' => $this->store_name ?? auth()->user->business_name,
            'phone' => str_replace([' ', '(', ')', '-'], '', $this->phone) ?? auth()->user()->phone,
            'business_address' => $this->business_address ?? auth()->user()->business_address,
            'city' => $this->city ?? auth()->user()->city,
            'state' => $this->state ?? auth()->user()->state,
            'country' => $this->country ?? auth()->user()->country,
            'zip' => $this->zip ?? auth()->user()->zip,
        ];
    }
}
