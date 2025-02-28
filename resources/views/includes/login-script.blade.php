<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    var redirectUrl = @json($redirectUrl);
    // console.log(redirectUrl);
    $(document).ready(function() {
        $(document).on('click', '#login-btn', function(e) {
            e.preventDefault();
            let form = $('#login-form');
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
                            window.location.href = redirectUrl;
                        }, 1500)
                    } else {
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: response.message,
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
