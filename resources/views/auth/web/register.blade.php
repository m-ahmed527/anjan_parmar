@extends('layouts.web.app')

@section('content')
    <div class="password-reset-container">
        <a href="{{ route('index') }}">
            <img src="{{ asset('assets/web/images/logo-headers.png') }}" alt="" class="logo img-fluid mb-3">
        </a>
        <div class="card password-reset-card">
            <h2 class="text-center mb-4">User Registration</h2>
            <form method="POST" action="{{ route('register') }}" id="register-form">
                @csrf
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" name="first_name" class="form-control" placeholder="First name" id="first_name">
                </div>
                @error('first_name')
                    <span>{{ $message }}</span>
                @enderror
                <div class="mb-3">
                    <label for="last_name" class="form-label">Email address</label>
                    <input type="text" name="last_name" class="form-control" placeholder="Last name" id="last_name">
                </div>
                @error('last_name')
                    <span>{{ $message }}</span>
                @enderror
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email address"
                        id="email">
                </div>
                @error('email')
                    <span>{{ $message }}</span>
                @enderror
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" name="phone" class="form-control" placeholder="Enter your phone number"
                        id="phone">
                </div>
                @error('phone')
                    <span>{{ $message }}</span>
                @enderror
                <div class="mb-3">
                    <label for="new-password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter a password"
                        id="new-password">
                </div>
                @error('password')
                    <span>{{ $message }}</span>
                @enderror
                <div class="mb-3">
                    <label for="confirm-password" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control"
                        placeholder="Confirm your password" id="confirm-password">
                </div>

                <div class="d-flex flex-column my-4">
                    <button type="button" class="btn btn-primary w-100 mb-3" id="register-btn">Register</button>
                    <a href="{{ route('login') }}" id="showLogin" class="text-center">Already have an account? Login</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var phoneInput = document.getElementById('phone');
        phoneInput.addEventListener('input', function(e) {
            var x = e.target.value.replace(/\D/g, '').match(/(\d{0,1})(\d{0,3})(\d{0,3})(\d{0,4})/);

            e.target.value = !x[3] ? '+1 ' + x[2] : '+1 (' + x[2] + ') ' + x[3] + (x[4] ? '-' + x[4] : '');
        });

        $(document).ready(function() {
            $(document).on('click', '#register-btn', function(e) {
                e.preventDefault();
                let form = $('#register-form');
                let formData = new FormData(form[0]);
                $.LoadingOverlay("show");
                $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $.LoadingOverlay("hide");
                        console.log(response);
                        if (response.success) {
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                            setTimeout(function() {
                                window.location.href = "{{ route('index') }}";
                            }, 1500)
                        } else {
                            Swal.fire({
                                position: "center",
                                icon: "error",
                                title: "Something went wrong",
                                showConfirmButton: true,
                                timer: 2000
                            })
                        }
                    },
                    error: function(error) {
                        $.LoadingOverlay("hide");
                        console.log(error);
                        let errors = error.responseJSON.errors;
                        $('.error-message')
                            .remove();
                        $.each(errors, function(key, value) {
                            let inputField = $(`input[name="${key}"]`);
                            let errorMessage = $(
                                `<span class='error-message text-danger'>
                               ${ value }
                                </span>`);
                            inputField.after(errorMessage);
                        })
                    }
                })
            })

        })
        $(document).on('input change keydown', 'input, select, textarea', function() {
            $(this).next('span.error-message').text('');
        });
    </script>
@endsection
