<script>
    $(document).on('click', '.cart-btn', function(e) {
        e.preventDefault(); // Prevent default link behavior

        $.ajax({
            url: "{{ route('web.cart.index') }}",
            method: "GET",
            success: function(response) {
                console.log(response.success);

                // if (response.success) {
                window.location.href =
                    "{{ route('web.cart.index') }}"; // Open Wishlist if allowed
                // }
            },
            error: function(xhr) {
                if (xhr.status === 401 || xhr.status === 403) { // Unauthorized or Empty Wishlist
                    Swal.fire({
                        icon: "info",
                        title: xhr.responseJSON.message,
                        showConfirmButton: true
                    });
                }
            }
        });
    });
</script>
