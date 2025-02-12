<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Interfaces\AuthRepositoryInterface;
use App\Interfaces\LoginRepositoryInterface;
use App\Traits\HasAuth;
use Illuminate\Http\Request;
use Exception;

class AuthController extends Controller
{
    public function __construct(public AuthRepositoryInterface $register, public LoginRepositoryInterface $login) {}

    public function loginView()
    {
        return view('auth.web.login');
    }

    public function login(LoginRequest $request)
    {
        $response = $this->login->attemptLogin(false);
        $decoded = json_decode($response->getContent(), true);

        $success = $decoded['success'];
        $message = $decoded['message'];
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
    public function registerView()
    {
        // dd(auth()->user());
        return view('auth.web.register');
    }
    public function register(RegisterRequest $request)
    {
        // dd($request->sanitized());
        $response = $this->register->registerByEmailPassword($request->sanitized(), false);
        $decoded = json_decode($response->getContent(), true);
        // dd($decoded);
        $success = $decoded['success'];
        $message = $decoded['message'];

        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    public function logout()
    {
        try {
            auth()->logout();
            return response()->json(['success' => true, 'message' => 'Logged out successfully']);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error']);
        }
    }
}
