<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    var redirect = @json($redirectUrl);
    // console.log(redirectUrl);
    $(document).ready(function() {
        $(document).on('click', '#logout-btn', function(e) {
            e.preventDefault();
            let form = $('#logout-form');
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
                            window.location.href = redirect;
                        }, 1000)
                    }
                },
                error: function(error) {
                    $.LoadingOverlay("hide");

                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Something went wrong",
                        showConfirmButton: true,
                        timer: 2000
                    })

                }
            })
        })

    })
</script>
