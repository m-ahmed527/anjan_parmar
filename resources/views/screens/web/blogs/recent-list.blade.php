@forelse ($recentBlogs as $blog)
    <div class="blog-row">
        <img src="{{ $blog->getFirstMediaUrl('blog_image') }}" class="blog-image" alt="blogs">
        <a href="{{ route('web.blogs.show', $blog->slug) }}" >
            <div class="">
                <span class="text-area-blogs">{{ $blog->created_at }}</span>
                <h2 class="blog-main-heading mt-3">
                    {{ $blog->name }}
                </h2>
            </div>
        </a>
    </div>
@empty
    <p class="text-center">No blog found</p>
@endforelse
