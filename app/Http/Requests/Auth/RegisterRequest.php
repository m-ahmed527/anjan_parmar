<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // dd($this->all());
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
            'first_name' => 'required|string',
            'last_name' => 'sometimes|required|string',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required|string|min:8|confirmed',

            // Conditional validation for vendor fields
            'business_name' => 'sometimes|required|unique:users,business_name|max:255',
            'business_address' => 'sometimes|required|string|max:500',
            'category' => 'required_if:role,Vendor|array',
            'category.*' => 'exists:categories,id', // Ensuring category exists in the database
            'avatar' => 'sometimes|image',
            'role' => 'sometimes|required',

        ];
    }


    public function messages(): array
    {
        return [
            'first_name.required' => 'Name is required',
            'category.required_if' => 'Select a category',
        ];
    }
    public function sanitized()
    {

        return [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'slug' => Str::slug($this->first_name . '_' . $this->last_name),
            'email' => $this->email,
            'phone' => str_replace([' ', '(', ')', '-'], '', $this->phone),
            'password' => $this->password,

            'business_name' => $this->business_name ?? null,
            'business_address' => $this->business_address ?? null,
            'category' => $this->category ?? [],
            'avatar' =>  $this->avatar ?? null,
        ];
    }
}
