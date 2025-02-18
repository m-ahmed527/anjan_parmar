@extends('layouts.admin.app')
@push('styles')
@endpush
@section('content')
    <div class="content-wrapper" style="">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1></h1>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-11">
                            <div class="card card-primary">
                                <form action="{{ route('admin.home.page.category.section.update',$categorySection->slug) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="">Select Category *</label>
                                                <select name="category" class="form-control"
                                                    id="">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}" class="form-control" {{ $categorySection->category_id == $category->id ? 'selected' : ''}}>
                                                            {{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Lable (optional)</label>
                                                <input type="text" class="form-control" name="lable" id="" value="{{ $categorySection->lable ?? '' }}" placeholder="Lable">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Title *</label>
                                                <input type="text" class="form-control" name="title" id="" value="{{ $categorySection->title  }}"
                                                    placeholder="Title ">
                                                @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Sub Title</label>
                                                <input type="text" class="form-control" name="sub_title" id="" placeholder="Sub Title " value="{{ $categorySection->sub_title ?? '' }}">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Url</label>
                                                <input type="text" class="form-control" name="url" id="" placeholder="Inser Url " value="{{ $categorySection->url ?? '' }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputFile">Insert Image *</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="image"
                                                            class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                                            file</label>
                                                    </div>
                                                </div>
                                                @error('image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12 mt-2">
                                                <img src="{{ $categorySection->getFirstMediaUrl('category-section-image') ? $categorySection->getFirstMediaUrl('category-section-image') : 'no Image' }}"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer d-flex gap-20">

                                        <a href="{{ route('admin.home.page.category.section.index') }}" class="btn btn-secondary">Back</a>
                                        <button type="submit" class="btn btn-primary">update</button>
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
    <script src="{{ asset('assets/admin/plugins/select2/js/select2.full.min.js') }}"></script>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush
