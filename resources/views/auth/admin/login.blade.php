<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/web/images/logo-headers.png') }}" type="image/x-icon" />
    <title>SEAL OFFER | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-box {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .login-box .btn-facebook {
            background-color: #3b5998;
            color: white;
        }

        .login-box .btn-google {
            background-color: #dd4b39;
            color: white;
        }
    </style>
</head>

<body>
    <div class="login-box text-center">
        <a href="{{ route('index') }}">
            <img src="{{ asset('assets/web/images/logo-headers.png') }}" alt="seal offer" style="width: 100px;">
        </a>
        <h2>SEAL THE DEAL</h2>
        <h3>Admin</h3>
        <p class="mb-4">Sign in </p>
        <form method="POST" action="{{ route('login') }}" id="login-form">
            @csrf
            <div class="mb-3">
                <input type="email" class="form-control" name="email" placeholder="Email" required>

            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password" required>

            </div>

            <button type="button" class="btn btn-primary w-100 mb-3" id="login-btn">Sign In</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    @include('includes.login-script', ['redirectUrl' => route('admin.index')])
</body>

</html>
