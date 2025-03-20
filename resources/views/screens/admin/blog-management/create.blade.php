@extends('layouts.admin.app')
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
@endpush
@section('title', 'Create Blog')
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

                                <form action="{{ route('admin.blog.store') }}" id="create-form" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Blog Title/ Name *</label>
                                            <input type="text" class="form-control" name="name" id=""
                                                placeholder="Blog Tile / Name">

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Blog Short Description *</label>
                                            <textarea name="short_description" class="form-control" rows="10"></textarea>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Blog Long Description *</label>
                                            {{-- <textarea name="long_description" id="editor" class="form-control" rows="15"></textarea> --}}
                                            <div id="editor" class="form-control" style="height: 300px;"></div>
                                            <!-- Quill Editor -->
                                        </div>
                                        <input type="hidden" name="long_description" id="hidden_description">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Blog Image </label>
                                            <div class="input-group blog-image-parent">
                                                <div class="custom-file">
                                                    <input type="file" name="blog_image" class="custom-file-input"
                                                        id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="card-footer d-flex gap-20">
                                        <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary">Back</a>
                                        <button type="button" class="btn btn-primary" id="create-btn">Submit</button>
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
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    @include('includes.admin.scripts.create-script', ['redirectUrl' => route('admin.blog.index')])
    <script>
        const quill = new Quill('#editor', {
            theme: 'snow'
        });
        document.getElementById("hidden_description").value = quill.root.innerHTML;
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
