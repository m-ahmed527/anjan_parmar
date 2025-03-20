@extends('layouts.web.app')
@section('content')
    <section class="shop-banner-section">
        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-12">
                    <div class="shop-banner">
                        <div>
                            <h1 class="sh-head">Wishlist</h1>
                            <p class="sh-para"><a href="{{ route('index') }}" class="text-decoration-none">Home</a> / Wishlist
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sh-space">
        <div class="container-fluid">
            <div class="row">
                @if ($wishlists->isNotEmpty())
                    <table class="cart-table">
                        <tr>
                            <th></th>
                            <th>Images</th>
                            <th>Items</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($wishlists as $wishlist)
                            <tr class="tr-hover">
                                <td class="pr-title dlt-td">
                                    <button class="delete-btn btn" data-slug="{{ $wishlist->slug }}" type="button">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                </td>
                                <td class="pr-title">
                                    <span>
                                        <img src="{{ $wishlist->getFirstMediaUrl('featured_image') }}"
                                            class="img-fluid cart-images" alt="{{ $wishlist->name }}">
                                    </span>
                                </td>
                                <td class="pr-title">
                                    <span>
                                        <p>{{ $wishlist->name }}</p>
                                    </span>
                                </td>
                                <td class="pr-title"><span>${{ $wishlist->price }}</span></td>
                                <td class="pr-title">
                                    <span>
                                        <button href="{{ route('cart-page') }}"
                                            class="add-to-cart-btn text-decoration-none">Add To Cart</button>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    {{-- Show empty wishlist message when no items --}}
                    <div class="col-12 text-center">
                        <div class="wishlist-block">
                            <p class="wishlist-area">Your Wishlist is currently empty.</p>
                        </div>
                        <a href="{{ route('web.products.index') }}" class="return-shop">Return To Shop</a>
                    </div>
                @endif
            </div>
        </div>
    </section>

@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $(document).on("click", ".delete-btn", function() {
                var slug = $(this).data('slug');
                var row = $(this).closest("tr");

                $.ajax({
                    url: "{{ route('web.wishlist.delete', '') }}/" + slug,
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.success) {
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('.wishlist-count').text(response.wishlist_count);
                            // Remove the deleted row from the table
                            row.fadeOut(500, function() {
                                $(this).remove();
                            });
                            if (response.wishlist_count == 0) { // Only header row remains
                                setTimeout(function() {
                                    Swal.fire({
                                        position: "center",
                                        icon: "info",
                                        title: "Your wishlist is now empty!",
                                        showConfirmButton: true
                                    }).then(() => {
                                        window.location.href =
                                            "{{ route('index') }}"; // Redirect to products page
                                    });
                                }, 500);
                            }
                        } else {
                            Swal.fire({
                                position: "center",
                                icon: "warning",
                                title: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endpush
