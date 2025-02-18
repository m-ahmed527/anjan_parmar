@extends('layouts.admin.app')
@push('styles')
@endpush
@section('content')
    <div class="content-wrapper" style="">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create New Blog</h1>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8">
                            <div class="card card-primary">

                                <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Blog Category *</label>
                                            <select name="blog_category_id" class="form-control" id="">
                                                <option selected disabled>Select Blog category</option>
                                                @forelse ($blogCategories as $blogCategory)
                                                    <option value="{{ $blogCategory->id }}">{{ $blogCategory->name }}
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
                                                placeholder="Blog Tile / Name">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Blog Short Description (optional)</label>
                                            <input type="text" class="form-control" name="short_description" id=""
                                                placeholder="Blog Tile / Name">
                                            @error('short_description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Description *</label>
                                            <textarea name="content" class="form-control"></textarea>
                                            @error('content')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Featured Image </label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="featured_image" class="custom-file-input"
                                                        id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                            @error('featured_image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex gap-20">
                                        <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary">Back</a>
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
    <script src="{{ asset('assets/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script>
        //  CKEDITOR.replace('content', {
        //     filebrowserUploadUrl: "{{ route('admin.blog.store.content.image', ['_token' => csrf_token()]) }}",
        //     filebrowserUploadMethod: "form",
        // });
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection