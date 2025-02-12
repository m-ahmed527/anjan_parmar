@extends('layouts.web.app')

@section('content')
    <div class="password-reset-container">
        <a href="{{ route('index') }}">
            <img src="{{ asset('assets/web/images/logo-headers.png') }}" alt="" class="logo img-fluid mb-3">
        </a>
        <div class="card password-reset-card">
            <h2 class="text-center mb-4">Reset Password</h2>
            <form>

                <div class="mb-3">
                    <label for="new-password" class="form-label">New Password</label>
                    <input type="password" class="form-control" placeholder="Enter a new password" id="new-password"
                        required>
                </div>
                <div class="mb-3">
                    <label for="confirm-password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" placeholder="Confirm your password" id="confirm-password"
                        required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Reset Password</button>
            </form>
            <p class="mt-3 text-center">
                <a href="{{ route('login') }}" id="backToLogin" class="back-to-login">Back to Login</a>
            </p>
        </div>
    </div>
@endsection
