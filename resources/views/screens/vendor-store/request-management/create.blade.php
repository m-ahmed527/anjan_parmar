@extends('layouts.vendor-store.app')
@push('styles')
@endpush

@section('title', 'Create Request')

@section('content')
    <div class="content-wrapper" style="">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Request</h1>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <form action="{{ route('vendor.requests.store') }}" method="POST" id="create-form">
                                    @csrf
                                    <div class="card-body">
                                        <br>
                                        <div class="row">

                                            <div class="form-group col-md-12">
                                                <label for="exampleInputPassword1">Subject *</label>
                                                <input type="text" class="form-control" name="subject" id=""
                                                    placeholder="Subject">

                                            </div>

                                            <div class="form-group col-md-12">
                                                <label for="exampleInputPassword1">Message *</label>
                                                <textarea type="text" class="form-control" rows="10" name="message" id=""
                                                    placeholder="Type your message..."></textarea>
                                            </div>
                                        </div>
                                        <div class="card-footer d-flex gap-20">

                                            <a href="{{ route('vendor.requests.index') }}"
                                                class="btn btn-secondary">Back</a>
                                            <button type="button" class="btn btn-primary" id="create-btn">Submit</button>
                                        </div>

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
    @include('includes.vendor-store.scripts.create-script', [
        'redirectUrl' => route('vendor.requests.index'),
    ])
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush
