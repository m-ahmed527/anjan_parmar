<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class StoreNewUserRequest extends FormRequest
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
            'name' => 'sometimes',
            'name' => 'required',
            'last_name' => 'sometimes',
            'company_name' => 'sometimes',
            'email' => 'required|email|unique:users,email',
            'phone' => 'sometimes',
            'address' => 'sometimes',
            'street_appartment' => 'sometimes',
            'country' => 'sometimes',
            'city' => 'sometimes',
            'state' => 'sometimes',
            'zip' => 'sometimes',
            'password' => 'required|confirmed',
            'avatar' => 'sometimes|image',
        ];
    }

    public function sanitized() : array {
        return [
            'slug' => \Str::slug($this->name),
            'name' => $this->name,
            'last_name' => $this->last_name ? $this->last_name : '' ,
            'company_name' => $this->company_name ? $this->company_name : '',
            'email' => $this->email,
            'phone' => $this->phone ? $this->phone : '',
            'address' => $this->address ? $this->address : '',
            'billing_address' => $this->address ? $this->address : '',
            'street_appartment' => $this->street_appartment ? $this->street_appartment : '',
            'billing_street_appartment' => $this->street_appartment ? $this->street_appartment : '',
            'country' => $this->country ? $this->country : '',
            'billing_country' => $this->country ? $this->country : '',
            'city' => $this->city ? $this->city : '',
            'billing_city' => $this->city ? $this->city : '',
            'state' => $this->state ? $this->state : '',
            'billing_state' => $this->state ? $this->state : '',
            'zip' => $this->zip ? $this->zip : '',
            'billing_zip' => $this->zip ? $this->zip : '',
            'password' => Hash::make($this->password),
        ];
    }
}
