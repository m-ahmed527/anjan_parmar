<script>
    $(document).ready(function() {
        $('#newsletter-form').on('keypress', function(e) {
            if (e.which === 13) { // 13 is the Enter key
                e.preventDefault();
            }
        });
        $(document).on('click', '#newsletter-btn', function(e) {
            e.preventDefault();
            let form = $('#newsletter-form');
            let formData = new FormData(form[0]);
            // console.log(form.attr('action'));
            $('.loader').LoadingOverlay("show");
            console.log(123);
            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {


                    $('.loader').LoadingOverlay("hide");
                    if (response.success) {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        });

                        form[0].reset();

                    }
                },
                error: function(error) {
                    $('.loader').LoadingOverlay("hide");
                    console.log(error);
                    let errors = error.responseJSON.errors;
                    if (errors) {
                        $('.error-text')
                            .remove();
                        $.each(errors, function(key, value) {
                            let inputField = $('.error-message');
                            let errorMessage = $(
                                `<span class='error-text text-danger'>${value}</span><br>`
                            );
                            inputField.before(errorMessage);
                        })
                    } else {
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: error.responseJSON.message,
                            showConfirmButton: false,
                            timer: 2000
                        })
                    }

                }
            })
        })

    })
    $(document).on('input change keydown', 'input, select, textarea', function() {
        $('span.error-text').text('');
    });
</script>
