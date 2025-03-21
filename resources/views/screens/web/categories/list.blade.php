@foreach ($categories as $index => $categoryItem)
    <a href="{{ route('web.products.index', ['category' => $categoryItem->slug]) }}" class="text-decoration-none">
        <div class="cat-card-wrper">
            <div class="card-categories back-category-{{ $index + 1 }}">
                <img src="{{ $categoryItem->getFirstMediaUrl('category') }}" class="img-fluid" alt="">
            </div>
            <p class="cat-text">{{ $categoryItem->name }}</p>
        </div>
    </a>
@endforeach
