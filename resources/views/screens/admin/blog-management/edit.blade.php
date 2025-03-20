@extends('layouts.admin.app')
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
@endpush
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
                                    enctype="multipart/form-data" id="update-form">
                                    @csrf
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Blog Title/ Name *</label>
                                            <input type="text" class="form-control" name="name" id=""
                                                value="{{ $blog->name ?? '' }}" placeholder="Blog Tile / Name">

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Blog Short Description *</label>
                                            <textarea name="short_description" class="form-control" rows="10">{{ $blog->short_description }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Blog Long Description *</label>
                                            {{-- <textarea name="content" class="form-control">{{ $blog->long_description ?? '' }}</textarea> --}}
                                            <div id="editor" class="form-control" style="height: 300px;">
                                                {!! $blog->long_description ?? '' !!}</div>
                                            <!-- Quill Editor -->
                                        </div>
                                        <input type="hidden" name="long_description" id="hidden_description">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Featured Image </label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="blog_image" class="custom-file-input"
                                                        id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                            @error('featured_image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        @if ($blog->getFirstMediaUrl('blog_image') != null)
                                            <div class="form-group">
                                                <img src="{{ $blog->getFirstMediaUrl('blog_image') }}" alt="">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="card-footer">
                                        <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary">Back</a>
                                        <button type="button" class="btn btn-primary" id="update-btn">Update</button>
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
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <script src="{{ asset('assets/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    @include('includes.admin.scripts.update-script', ['redirectUrl' => route('admin.blog.index')])
    <script>
        const quill = new Quill('#editor', {
            theme: 'snow'
        });
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
