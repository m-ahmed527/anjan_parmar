<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Interfaces\AuthRepositoryInterface;
use App\Interfaces\LoginRepositoryInterface;
use App\Models\Category;
use App\Traits\HasAuth;
use Illuminate\Http\Request;
use Exception;

class AuthController extends Controller
{
    public function __construct(public AuthRepositoryInterface $register, public LoginRepositoryInterface $login) {}

    public function vendorRegisterView()
    {
        $categories = Category::all();
        return view('auth.web.vendors-register', get_defined_vars());
    }
    public function loginView()
    {
        return view('auth.web.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password'); // Extract credentials from request
        $response = $this->login->attemptLogin($credentials, false);
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
        $response = $this->register->registerByEmailPassword($request->sanitized(), false);
        $decoded = json_decode($response->getContent(), true);
        $success = $decoded['success'];
        $message = $decoded['message'];
        // dd($message);
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

    public function forgotPasswordView()
    {
        return view('auth.web.forgot-password');
    }
    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $response = $this->login->forgotPassword($request->email);
        $decoded = json_decode($response->getContent(), true);
        $success = $decoded['success'];
        $message = $decoded['message'];
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    public function resetPasswordView(Request $request)
    {
        $token = $request->token;
        $email = $request->email;

        return view('auth.web.reset-password', get_defined_vars());
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);
        $response = $this->login->resetPassword($request->all());
        $decoded = json_decode($response->getContent(), true);
        $success = $decoded['success'];
        $message = $decoded['message'];
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
