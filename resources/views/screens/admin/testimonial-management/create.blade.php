@extends('layouts.admin.app')
@push('styles')
@endpush
@section('content')
    <div class="content-wrapper" style="">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create New Testimonial</h1>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8">
                            <div class="card card-primary">

                                <form action="{{ route('admin.testimonial.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Testimonial Title/ Name *</label>
                                            <input type="text" class="form-control" name="name" id=""
                                                placeholder="Blog Tile / Name">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Description *</label>
                                            <textarea name="description" class="form-control"></textarea>
                                            @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        {{-- <div class="form-group">
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
                                        </div> --}}
                                    </div>
                                    <div class="card-footer d-flex gap-20">
                                        <a href="{{ route('admin.testimonial.index') }}" class="btn btn-secondary">Back</a>
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
        // CKEDITOR.replace('description', {
        //     // filebrowserUploadUrl: "{{ route('admin.blog.store.content.image', ['_token' => csrf_token()]) }}",
        //     // filebrowserUploadMethod: "form",
        // });
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
