@extends('layouts.admin.app')
@push('styles')
    {{-- <style>
        .gap-20 {
            gap: 20px;
        }
    </style> --}}
@endpush
@section('title', 'Edit Attribute')

@section('content')
    <div class="content-wrapper" style="">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Attribute</h1>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row d-flex justify-content-center">

                        <div class="col-md-6">

                            <div class="card card-primary">

                                <form action="{{ route('admin.attribute.update', $attribute->slug) }}" method="POST"
                                    id="update-form">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="">Attribute Name</label>
                                            <input type="text" class="form-control" id="" name="name"
                                                placeholder="Enter Attribute Name" value="{{ $attribute->name }}">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <h3>Variants</h3>
                                        @forelse ($attribute->variants as $variant)
                                            <div class="variants">
                                                <div class="row variant align-items-end mb-2">
                                                    <div class="col-8">
                                                        <div class="form-group mb-0">
                                                            <label for="">Variant:</label>
                                                            <input type="text" class="form-control" id=""
                                                                name="variants[]" placeholder="Enter Variant"
                                                                value="{{ $variant->name }}">
                                                        </div>
                                                        @error('variants*')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-4">
                                                        <a href="javascript:void(0)"
                                                            class="btn btn-success btn-md add-variant"><i
                                                                class="fas fa-plus"></i></a>
                                                        <a href="javascript:void(0)"
                                                            class="btn btn-danger btn-md remove-variant"><i
                                                                class="fas fa-trash"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="variants">
                                                <div class="row variant align-items-end mb-2">
                                                    <div class="col-8">
                                                        <div class="form-group mb-0">
                                                            <label for="">Variant:</label>
                                                            <input type="text" class="form-control" id=""
                                                                name="variants[]" placeholder="Enter Variant">
                                                        </div>
                                                        @error('variants*')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-4">
                                                        <a href="javascript:void(0)"
                                                            class="btn btn-success btn-md add-variant"><i
                                                                class="fas fa-plus"></i></a>
                                                        <a href="javascript:void(0)"
                                                            class="btn btn-danger btn-md remove-variant"><i
                                                                class="fas fa-trash"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>
                                    <div class="card-footer">
                                        <a href="{{ route('admin.attribute.index') }}" class="btn btn-secondary">Back</a>
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
    @include('includes.admin.scripts.update-script', [
        'redirectUrl' => route('admin.attribute.index'),
    ])
    <script>
        $(document).ready(function() {
            $(document).on("click", ".add-variant", function(e) {
                e.preventDefault();
                let toClone = $(this).closest(".variant").clone();
                toClone.find("input").val("");
                $(this).closest(".variant").after(toClone);
            });
            $(document).on("click", ".remove-variant", function(e) {
                e.preventDefault();
                $(this).closest(".variant").remove();
            });
        });
    </script>
@endsection
