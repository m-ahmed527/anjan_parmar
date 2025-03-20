<div id="showing-results" class="small text-muted d-none">
    Showing <span class="fw-semibold">{{ $blogs->firstItem() }}</span>
    to <span class="fw-semibold">{{ $blogs->lastItem() }}</span>
    of <span class="fw-semibold">{{ $blogs->total() }}</span> results
</div>
@forelse ($blogs as $blog)
    <div class="col-lg-6 col-xl-12 px-4 mb-5">
        <div class="blog-sect-card">
            <div class="blog-img-area">
                <img src="{{ asset('assets/web/images/blogs-main-image.jpg') }}" class="img-fluid cont-images  m-0"
                    alt="" />
                <span class="img-banner">{{ $blog->created_at }}</span>
            </div>
            <div class="blog-content">
                <h2 class="card-main-heading heading-blg text-sm-start">
                    {{ $blog->name }}
                </h2>
                <p class="para gray my-3">{{ $blog->short_description }}</p>
                <a href="{{ route('web.blogs.show', $blog->slug) }}" class="link-btn">Read More</a>
            </div>
        </div>
    </div>
@empty
    <p class="text-center">No blog found.</p>
@endforelse
<div class="col-12 mt-5">
    <div class="pagination-btns">
        {{ $blogs->links('pagination::bootstrap-5') }}
    </div>
</div>
