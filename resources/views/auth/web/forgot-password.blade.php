@extends('layouts.web.app')

@section('content')
    <div class="password-reset-container">
        <a href="{{ route('index') }}">
            <img src="{{ asset('assets/web/images/logo-headers.png') }}" alt="" class="logo img-fluid mb-3">
        </a>
        <div class="card password-reset-card">
            <h2 class="text-center mb-4">Forgot Password</h2>
            <form>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" placeholder="Enter email address" id="email" required>
                </div>
                <a href="{{ route('reset-password') }}" type="submit"
                    class="btn btn-primary w-100 text-decoration-none">Send</a>
            </form>
        </div>
    </div>
@endsection
