<div id="showing-results" class="small text-muted d-none">
    Showing <span class="fw-semibold">{{ $products->firstItem() }}</span>
    to <span class="fw-semibold">{{ $products->lastItem() }}</span>
    of <span class="fw-semibold">{{ $products->total() }}</span> results
</div>

@forelse ($products as $product)
    <div class="col-xxl-4  col-md-6 col-sm-6 col-12 mb-3 column-grid-change">
        <div class="product-card sh-prod-card">
            <div class="products-img sh-prod">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <p class="top-img">{{ $product->category->name }}</p>
                    <button class="btn heart-save-btn p-0">
                        <i class="fa-regular fa-heart" style="color: rgb(255, 114, 114)"></i>
                    </button>
                </div>
                <img src="{{ $product->getFirstMediaUrl('featured_image') }}" class="img-fluid" alt="">
            </div>
            <div class="product-content">
                <h2 class="card-main-heading mb-4">{{ $product->name }}</h2>
                <div>
                    <div class="rating-stars mb-3">
                        @for ($i = 0; $i < 5; $i++)
                            @if ($product['id'] > $i)
                                <img src="{{ asset('assets/web/images/gold-star.png') }}" alt="Gold Star">
                            @else
                                <img src="{{ asset('assets/web/images/silver-star.png') }}" alt="Silver Star">
                            @endif
                        @endfor
                    </div>
                    <div class="bottom-price-area mb-3">
                        <p class="price-products">${{ $product->getMinPrice() }} - ${{ $product->getMaxPrice() }}</p>
                        <a href="{{ route('web.products.show', $product->slug) }}"
                            class="bid-btn text-decoration-none">Buy
                            Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@empty
    <div class="col-12">
        <div class="no-products">
            <h2 class="no-products-heading">No Products Found</h2>
            <p class="no-products-para">No products were found matching your selection.</p>
        </div>
    </div>
@endforelse

<div class="col-12 mt-5">
    <div class="pagination-btns">
        {{-- {{ $products->links('pagination::bootstrap-5') }} --}}
        {{-- @dd($products->appends(request()->query())) --}}
        {{ $products->appends(request()->query())->links('pagination::bootstrap-5') }}
    </div>
</div>
