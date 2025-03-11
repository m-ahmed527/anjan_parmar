<script>
    var redirectUrl = @json($redirectUrl);
    console.log(redirectUrl);
    let deletedValues = [];

    $(document).on('click', '.remove-variant', function() {
        let variantRow = $(this).closest('.variant');
        let variantId = variantRow.find('input[name="ids[]"]').val();

        if (variantId) {
            deletedValues.push(variantId); // Save deleted ID
        }

        variantRow.remove();
    });

    $(document).ready(function() {
        $('#update-form').on('keypress', function(e) {
            if (e.which === 13) { // 13 is the Enter key
                e.preventDefault();
            }
        });
        $(document).on('click', '#update-btn', function(e) {
            e.preventDefault();
            let form = $('#update-form');
            let formData = new FormData(form[0]);
            let variants = [];
            $(".attribute-variants").each(function() {
                let variantData = {
                    price: $(this).find(".variant_price").val(),
                    quantity: $(this).find(".quantity").val(),
                    attributes: {}
                };

                // Get selected attributes
                $(this).find(".variant-dropdown").each(function() {
                    let attrName = $(this).attr("data-attribute");
                    let attrValue = $(this).val();
                    if (attrValue) {
                        variantData.attributes[attrName] = attrValue;
                    }
                });
                console.log();

                variants.push(variantData);
            });
            // Convert variants array to JSON and append it to FormData
            formData.append("variants", JSON.stringify(variants));
            formData.append('deleted_values', JSON.stringify(deletedValues));
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
                    } else {
                        Swal.fire({
                            position: "center",
                            icon: "warning",
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
                    if (errors) {
                        handleValidationErrors(errors);
                    } else {
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: error.responseJSON.message,
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



    // Function to handle validation errors
    function handleValidationErrors(errors) {
        $('.error-message')
            .remove();
        $.each(errors, function(key, value) {
            if (@json(request()->url()).includes('attribute')) {


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
            } else if (@json(request()->url()).includes('product')) {
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
            }
        });
    }
</script>
