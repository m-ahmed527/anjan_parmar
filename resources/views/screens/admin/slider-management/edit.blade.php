@extends('layouts.admin.app')
@push('styles')
    {{-- <style>
        .gap-20 {
            gap: 20px;
        }
    </style> --}}
@endpush
@section('content')
    <div class="content-wrapper" style="">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Slider</h1>
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

                                <form action="{{ route('admin.slider.management.update', $slider->slug) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="">Select Category *</label>
                                            <select name="category" class="form-control" id="">
                                                <option value="" class="form-control" disabled>Select
                                                    Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" class="form-control"
                                                        {{ $slider->category_id == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category*')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">Slider Title *</label>
                                            <input type="text" class="form-control" id="" name="title"
                                                value="{{ $slider->title }}" placeholder="Enter Slider Title">
                                            @error('title*')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">Slider Sub-Title *</label>
                                            <input type="text" class="form-control" id="" name="sub_title"
                                                value="{{ $slider->sub_title }}" placeholder="Enter Slider Sub-Title">
                                            @error('sub_title*')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">Image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="slider_image" class="custom-file-input"
                                                        id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                            @error('slider_image*')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-9 mt-2">
                                            <img src="{{ $slider->getFirstMediaUrl('slider_image') }}" alt=""
                                                style="max-width: 200px; max-height: 200px;">

                                        </div>

                                    </div>
                                    {{-- <div>
                                        Add More Sliders
                                    </div> --}}
                                    <div class="card-footer">
                                        <a href="{{ route('admin.slider.management.index') }}"
                                            class="btn btn-secondary">Back</a>
                                        <button class="btn btn-primary">Update</button>
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
    <script>
        // $(document).ready(function() {
        //     $(document).on("click", ".add-variant", function(e) {
        //         e.preventDefault();
        //         let toClone = $(this).closest(".variant").clone();
        //         toClone.find("input").val("");
        //         $(this).closest(".variant").after(toClone);
        //     });
        //     $(document).on("click", ".remove-variant", function(e) {
        //         e.preventDefault();
        //         $(this).closest(".variant").remove();
        //     });
        // });
    </script>
@endsection
