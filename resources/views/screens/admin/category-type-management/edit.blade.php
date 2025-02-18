@extends('layouts.admin.app')
@section('content')
    <div class="content-wrapper" style="">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit {{ $categoryType->name }} Category Type</h1>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row d-flex justify-content-center">

                        <div class="col-md-6">

                            <div class="card card-primary">
                                {{-- <div class="card-header">
                                    <h3 class="card-title">Quick Example</h3>
                                </div> --}}
                                <form action="{{ route('admin.category.type.update',$categoryType->slug) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Category Type Name</label>
                                            <input type="text" class="form-control" name="name" id=""
                                                placeholder="{{ $categoryType->name }}" value="{{ $categoryType->name }}">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="card-footer">
                                        <a href="{{ route('admin.category.type.index') }}" class="btn btn-secondary">Back</a>
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
    <script src="{{ asset('assets/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
