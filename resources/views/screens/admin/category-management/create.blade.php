@extends('layouts.admin.app')
@push('styles')
@endpush
@section('content')
    <div class="content-wrapper" style="">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Category</h1>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row d-flex justify-content-center">

                        <div class="col-md-6">
                            <div class="card card-primary">

                                <form action="{{ route('admin.category.store') }}" method="POST"
                                    enctype="multipart/form-data" id="category-form">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Category Name *</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ old('name') }}" placeholder="Category Name">
                                            @error('name*')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputFile">Image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="image" class="custom-file-input"
                                                        id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>

                                            </div>
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Banner Image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="banner_image" class="custom-file-input"
                                                        id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>

                                            </div>
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="card-footer d-flex gap-20">
                                        <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">Back</a>
                                        <button type="submit" class="btn btn-primary" id="category-btn">Submit</button>
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

    <script>
        $(document).ready(function() {
            $(document).on('click', '#category-btn', function(e) {
                e.preventDefault();
                let form = $('#category-form');
                let formData = new FormData(form[0]);
                $.LoadingOverlay("show");
                $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $.LoadingOverlay("hide");
                        console.log(response);
                        if (response.success) {
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                            setTimeout(function() {
                                window.location.href =
                                    "{{ route('admin.category.index') }}";
                            }, 1500)
                        } else {
                            Swal.fire({
                                position: "center",
                                icon: "error",
                                title: response.message,
                                showConfirmButton: true,
                                timer: 2000
                            })
                        }
                    },
                    error: function(error) {
                        $.LoadingOverlay("hide");
                        console.log(error);
                        let errors = error.responseJSON.errors;
                        if (errors) {
                            $('.error-message')
                                .remove();
                            $.each(errors, function(key, value) {
                                console.log(value);

                                let inputField = $(`input[name="${key}"]`);
                                let errorMessage = $(
                                    `<span class='error-message text-danger'>
                               ${ value }
                                </span>`);
                                inputField.after(errorMessage);
                                if (key == 'image' || key == 'banner_image') {
                                    let inputField = $(`.custom-file`);
                                    let errorMessage = $(
                                        `<span class='error-message text-danger'>${ value } </span>`
                                    );
                                    inputField.after(errorMessage);
                                }
                            })
                        } else {
                            Swal.fire({
                                position: "center",
                                icon: "error",
                                title: error.message,
                                showConfirmButton: true,
                                timer: 2000
                            })
                        }

                    }
                })
            })

        })
        $(document).on('input change keydown', 'input, select, textarea', function() {
            $(this).next('span.error-message').text('');
        });
    </script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
