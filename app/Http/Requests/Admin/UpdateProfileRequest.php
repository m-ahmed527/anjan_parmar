<?php

namespace App\Http\Requests\Admin;

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
            // 'avatar' => ['nullable', 'image','mimes:jpeg,png,jpg,gif','max:2048'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required'],
            'user_address' => ['required', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'state' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],
            'zip' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'First name is required',
            'last_name.required' => 'Last name is required',
            'email.required' => 'Email is required',
            'phone.required' => 'Phone is required',
            'user_address.required' => 'Address is required',
        ];
    }

    public function sanitized(): array
    {
        return [
            'first_name' => $this->first_name ?? auth()->user()->first_name,
            'last_name' => $this->last_name ?? auth()->user()->last_name,
            // 'email' => $this->email ?? auth()->user()->email,
            'phone' => str_replace([' ', '(', ')', '-'], '', $this->phone) ?? auth()->user()->phone,
            'user_address' => $this->user_address ?? auth()->user()->user_address,
            'city' => $this->city ?? auth()->user()->city,
            'state' => $this->state ?? auth()->user()->state,
            'country' => $this->country ?? auth()->user()->country,
            'zip' => $this->zip ?? auth()->user()->zip,
        ];
    }
}
