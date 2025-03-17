<script>
    $(document).on('click', '.wishlist-btn', function() {
        let slug = $(this).data('slug');
        let icon = $(this).find('i'); // ✅ Get <i> inside the button
        console.log(icon); // Check if <i> is selected

        $.ajax({
            url: "{{ route('web.wishlist.store', '') }}/" + slug,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    if (icon.hasClass('fa-regular')) {
                        icon.removeClass('fa-regular').addClass('fa-solid');
                        // icon.css('color', 'rgb(255, 114, 114)'); // Optional: Change color
                    } else {
                        icon.removeClass('fa-solid').addClass('fa-regular');
                        // icon.css('color', 'black'); // Optional: Reset color
                    }
                    $('.wishlist-count').text(response.wishlist_count);
                } else {

                    Swal.fire({
                        position: "center",
                        icon: "warning",
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    // $(this).html(
                    //     `<i class="fa-regular fa-heart" style="color: rgb(255, 114, 114)"></i>`);
                }
            },
            error: function(error) {
                console.log(error);
            }

        });
    })
</script>
