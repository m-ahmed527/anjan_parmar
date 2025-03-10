<script>
    $(document).ready(function() {
        $(document).on('click', '#delete-btn', function(e) {
            e.preventDefault();
            console.log(123);

            let form = $(this).closest('form');
            let formData = new FormData(form[0]);
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
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
                                window.location.reload();
                            }
                        },
                        error: function(error) {
                            $.LoadingOverlay("hide");
                            // console.log(error.responseJSON.message);
                            Swal.fire({
                                position: "center",
                                icon: "error",
                                title: error.responseJSON.message,
                                showConfirmButton: false,
                                timer: 2000
                            })
                        }
                    })
                }
            })

        })

    })
</script>
