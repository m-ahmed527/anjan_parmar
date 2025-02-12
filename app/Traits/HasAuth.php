<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

trait HasAuth
{
    public function authenticate(array $credentials, $remember = false)
    {
        // dd($this->validatedRequest(request()->all()));
        if ($this->validatedRequest(request()->all()) && empty($credentials)) {
            
            Auth::login($this->validatedRequest(request()->all()), $remember);
            return true;
        } else {
            if (Auth::attempt($credentials, $remember)) {

                return true;
            }
        }
        return false;
    }

    public function validatedRequest($request)
    {
        if (isset($request['input_field'])) {
            // dd($request);
            return User::whereAny(['email', 'phone'], $request['input_field'])->first();
            // return User::whereAny(['user_name', 'email', 'phone'], $request['input_field'])->first();
        }
        return null;
    }
}
