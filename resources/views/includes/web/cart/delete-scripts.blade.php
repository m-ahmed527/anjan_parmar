<script>
    $(document).ready(function() {
        $('.delete-btn').click(function() {
            let cart_id = $(this).data('cart_id');
            var row = $(this).closest("tr");
            var cartCount = $('.cart-count');
            var cartItemsCount = $('.cart-items-count');
            var cartSubTotal = $('.cart-subtotal');
            var cartTotal = $('.cart-total');
            console.log(cart_id);
            $.ajax({
                url: "{{ route('web.cart.remove') }}",
                type: 'POST',
                data: {
                    cart_id: cart_id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    console.log(response);

                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Removed!',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 2000
                        });

                        cartCount.text(response.cart.total_items);
                        cartItemsCount.text(`Cart Total (${response.cart.total_items})`);
                        cartSubTotal.text("$" + response.cart.sub_total);
                        cartTotal.text("$" + response.cart.total);

                        row.fadeOut(500, function() {
                            $(this).remove();
                        });
                        if (response.cart.total_items == 0) { // Only header row remains
                            setTimeout(function() {
                                Swal.fire({
                                    position: "center",
                                    icon: "info",
                                    title: "Your Cart is now empty!",
                                    showConfirmButton: true
                                }).then(() => {
                                    window.location.href =
                                        "{{ route('index') }}"; // Redirect to products page
                                });
                            }, 500);
                        }
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>
