<script>
    $(document).on('click', '.wishlist-btn-header', function(e) {
        e.preventDefault(); // Prevent default link behavior

        $.ajax({
            url: "{{ route('web.wishlist.index') }}",
            method: "GET",
            success: function(response) {
                console.log(response.success);

                // if (response.success) {
                window.location.href =
                    "{{ route('web.wishlist.index') }}"; // Open Wishlist if allowed
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
