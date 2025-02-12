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
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required|string|min:8|confirmed',

        ];
    }

    public function sanitized()
    {
        return [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'slug' => Str::slug($this->first_name . '_' . $this->last_name),
            'role' => 'User',
            'email' => $this->email,
            'phone' => str_replace([' ', '(', ')', '-'], '', $this->phone),
            'password' => $this->password,
        ];
    }
}
