@props([
    'headTitle' => $headTitle ?? 'Our Blogs',
    'subTitle' => $subTitle ?? 'Latest News & Update',
    'blogs' => $blogs ?? null,
])

<section class="blog-section mx-3">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="row align-items-center text-center justify-content-between mb-5">
                    <div class="col-12">
                        <div class="blog-hd-area" style="border-left: none">
                            <span class="exc-products">{{ $headTitle }}</span>
                            <h1 class="main-sec-heading mt-5">Latest News & Update</h1>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <hr class="blog-hr">
        <div class="row">
            @forelse ($blogs as $blog)
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 p-0">
                    <div class="blog-card">
                        <div class="blog-img-area">
                            <img class="img-fluid blog-img" src="{{ $blog->getFirstMediaUrl('blog_image') }}"
                                alt="">
                            <span class="img-banner">{{ $blog->created_at }}</span>
                        </div>
                        <div class="blog-text-area">
                            <h3 class="card-main-heading">{{ $blog->name }}</h3>
                            <p class="para gray">{{ \Str::limit($blog->short_description, 50, '...') }}</p>
                            <a href="{{ route('web.blogs.show', $blog->slug) }}" class="link-btn">Read More</a>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </div>








</section>
