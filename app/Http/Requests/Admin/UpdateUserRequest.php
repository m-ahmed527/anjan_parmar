<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UpdateUserRequest extends FormRequest
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
            'image' => 'sometimes',
            'name' => 'required',
            'last_name' => 'sometimes',
            'company_name' => 'sometimes',
            'email' => 'required|email|exists:users,email',
            'phone' => 'sometimes',
            'address' => 'sometimes',
            'street_appartment' => 'sometimes',
            'country' => 'sometimes',
            'city' => 'sometimes',
            'state' => 'sometimes',
            'zip' => 'sometimes',
            'password' => 'sometimes|confirmed',
            'avatar' => 'sometimes|image',
        ];
    }

    public function sanitized() : array {
        // dd(request()->user->password);
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
            'password' => $this->password ? (Hash::check($this->password,request()->user->password) ??  Hash::make($this->password)) : request()->user->password,
        ];
    }

    public function sanitizedImage() {
        if(request()->hasFile('avatar'))
        {
            // dd(13);
            return $this->avatar;
        }
        return false;
    }
}
