@extends('layouts.admin.app')
@push('styles')
@endpush
@section('title', 'Update Testimonial')
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

                                <form action="{{ route('admin.testimonial.update', $testimonial->slug) }}" method="POST"
                                    enctype="multipart/form-data" id="update-form">
                                    @csrf
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Testimonial Title/ Name *</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $testimonial->name }}" placeholder="Tile / Name">

                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Description *</label>
                                            <textarea name="description" class="form-control" rows="8">{{ $testimonial->description }}</textarea>
                                        </div>

                                    </div>
                                    <div class="card-footer d-flex gap-20">
                                        <a href="{{ route('admin.testimonial.index') }}" class="btn btn-secondary">Back</a>
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
    @include('includes.admin.scripts.update-script', ['redirectUrl' => route('admin.testimonial.index')]);
@endsection
