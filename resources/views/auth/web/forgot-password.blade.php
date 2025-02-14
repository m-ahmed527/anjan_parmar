@extends('layouts.web.app')

@section('content')
    <div class="password-reset-container">
        <a href="{{ route('index') }}">
            <img src="{{ asset('assets/web/images/logo-headers.png') }}" alt="" class="logo img-fluid mb-3">
        </a>
        <div class="card password-reset-card">
            <h2 class="text-center mb-4">Forgot Password</h2>
            <form method="POST" action="{{ route('password.email') }}" id="forgot-password-form">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email address"
                        id="email" required>
                </div>
                <button type="button" class="btn btn-primary w-100 text-decoration-none"
                    id="forgot-password-btn">Send</button>
            </form>
            <p class="mt-3 text-center">
                <a href="{{ route('login') }}" id="backToLogin" class="back-to-login">Back to Login</a>
            </p>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '#forgot-password-btn', function(e) {
            e.preventDefault();
            let form = $('#forgot-password-form');
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
                        // setTimeout(function() {
                        //     window.location.href = "{{ route('index') }}";
                        // }, 1500)
                    } else {
                        Swal.fire({
                            position: "center",
                            icon: "warning",
                            title: response.message,
                            showConfirmButton: false,
                            timer: 2000
                        })
                    }
                },
                error: function(error) {
                    $.LoadingOverlay("hide");
                    console.log(error);
                    let errors = error.responseJSON.errors;
                    $('.error-message').remove();
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
