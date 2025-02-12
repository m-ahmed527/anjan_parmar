<?php

namespace App\Repositories;

use App\Interfaces\LoginRepositoryInterface;
use App\Traits\HasAuth;
use Exception;

class LoginRepository implements LoginRepositoryInterface
{
    use HasAuth;

    function attemptLogin($remember = false)
    {
        try {

            $this->authenticate([], $remember);
            return response([
                'success' => true,
                'message' => 'Logged in successfully',
            ]);
        } catch (Exception $e) {
            return response([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
}
