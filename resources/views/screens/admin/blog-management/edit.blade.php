@extends('layouts.admin.app')
@section('content')
    <div class="content-wrapper" style="">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit {{ $blog->name }} Blog</h1>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row d-flex justify-content-center">

                        <div class="col-md-9">

                            <div class="card card-primary">
                                <form action="{{ route('admin.blog.update', $blog->slug) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Blog Category *</label>
                                            <select name="blog_category_id" class="form-control" id="">
                                                <option disabled>Select Blog category</option>
                                                @forelse ($blogCategories as $blogCategory)
                                                    <option value="{{ $blogCategory->id }}" {{ $blog->blog_category_id == $blogCategory->id ? 'selected' : '' }} >{{ $blogCategory->name }}
                                                    </option>
                                                @empty
                                                    ...........
                                                @endforelse
                                            </select>
                                            @error('blog_category_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Blog Title/ Name *</label>
                                            <input type="text" class="form-control" name="name" id=""
                                                value="{{ $blog->name ?? '' }}" placeholder="Blog Tile / Name">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Blog Short Description (optional)</label>
                                            <input type="text" class="form-control" name="short_description" value="{{ $blog->short_description ?? '' }}"
                                                placeholder="Blog Tile / Name">
                                            @error('short_description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Description *</label>
                                            <textarea name="content" class="form-control">{{ $blog->content ?? '' }}</textarea>
                                            @error('content')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Featured Image </label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="featured_image"
                                                        value="{{ $blog->getFirstMediaUrl('blog-featured-image') }}"
                                                        class="custom-file-input" id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                            @error('featured_image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        @if ($blog->getFirstMediaUrl('blog-featured-image') != null)
                                            <div class="form-group">
                                                <img src="{{ $blog->getFirstMediaUrl('blog-featured-image') }}"
                                                    alt="">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="card-footer">
                                        <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary">Back</a>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </section>
        </section>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script src="{{ asset('assets/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        // CKEDITOR.replace('content', {
        //     filebrowserUploadUrl: "{{ route('admin.blog.store.content.image', ['_token' => csrf_token()]) }}",
        //     filebrowserUploadMethod: "form",
        // });
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
