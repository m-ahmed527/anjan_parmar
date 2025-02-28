<script>
    let noimage = "{{ asset('assets/web/images/no-user.jpg') }}";

    let image_Url = document.getElementById('img-url');
    let image_view = document.getElementById('image-preview');

    image_Url.addEventListener('change', () => {
        let url = image_Url?.files[0];
        if (url) {
            let image = URL.createObjectURL(url);
            console.log(url);
            let form = $("#profile-image-form");
            let formData = new FormData(form[0]);
            $.ajax({
                url: form.attr("action"),
                type: form.attr("method"),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);

                    $.LoadingOverlay('hide');
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1000
                    });
                    image_view.src = image;
                },
                error: function(error) {
                    $.LoadingOverlay('hide');
                    console.log(error);
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1000
                    });
                }
            })

        } else {
            Swal.fire({
                position: "center",
                icon: "info",
                text: "No image was selected",
                showConfirmButton: false,
                timer: 1000
            });
        }
    })
</script>
