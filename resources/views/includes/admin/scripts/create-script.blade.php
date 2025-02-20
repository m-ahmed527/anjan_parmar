<script>
    var redirectUrl = @json($redirectUrl);

    $(document).ready(function() {
        $(document).on('click', '#create-btn', function(e) {
            e.preventDefault();
            let form = $('#create-form');
            let formData = new FormData(form[0]);
            // console.log(form.attr('action'));

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
                            window.location.href =
                                redirectUrl;
                        }, 1500)
                    }
                },
                error: function(error) {
                    $.LoadingOverlay("hide");
                    console.log(error);
                    let errors = error.responseJSON.errors;
                    if (errors) {
                        $('.error-message')
                            .remove();
                        $.each(errors, function(key, value) {
                            console.log(value);
                            if (key == 'featured_image') {
                                let inputField = $(
                                    `.featured-image-ka-div`
                                );
                                let errorMessage = $(
                                    `<span class='error-message text-danger'>${value}</span>`
                                );
                                inputField.after(errorMessage);
                            } else {
                                let inputField = $(
                                    `input[name="${key}"], select[name="${key}"], textarea[name="${key}"]`
                                );
                                let errorMessage = $(
                                    `<span class='error-message text-danger'>${value}</span>`
                                );
                                inputField.after(errorMessage);
                            }

                            if (key === "name") {
                                let inputField = $(`input[name="${key}"]`);
                                let errorMessage = $(
                                    `<span class='error-message text-danger'>${value}</span>`
                                );
                                inputField.after(errorMessage);
                            }

                            // Handle errors for "variants" (array fields)
                            if (key.startsWith("variants.")) {
                                let index = key.split('.')[
                                    1]; // Extract the index (0,1,2...)
                                let variantField = $(`input[name="variants[]"]`).eq(
                                    index);
                                let errorMessage = $(
                                    `<span class='error-message text-danger'>${value[0]}</span>`
                                );
                                variantField.after(errorMessage);
                            }
                        })
                    } else {
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: error.message,
                            showConfirmButton: true,
                            timer: 2000
                        })
                    }

                }
            })
        })

    })
    $(document).on('input change keydown', 'input, select, textarea', function() {
        $(this).next('span.error-message').text('');
    });
</script>
