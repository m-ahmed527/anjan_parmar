@extends('layouts.vendor-store.app')
@push('styles')
@endpush
@section('title', 'Edit Request')

@section('content')
    <div class="content-wrapper" style="">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Product</h1>
                    </div>
                </div>
            </div>
            {{-- @dd($product->variants) --}}
            <section class="content">
                <div class="container-fluid">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                {{-- <div class="card-header">
                                    <h3 class="card-title">Quick Example</h3>
                                </div> --}}
                                <form action="{{ route('vendor.requests.update', $vendorRequest->request_id) }}"
                                    method="POST" enctype="multipart/form-data" id="update-form">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            {{-- @dd($product->category) --}}
                                            <div class="form-group col-md-12">
                                                <label for="exampleInputPassword1">Subject *</label>
                                                <input type="text" class="form-control" name="subject" id=""
                                                    placeholder="Subject" value="{{ $vendorRequest->subject }}">

                                            </div>

                                            <div class="form-group col-md-12">
                                                <label for="exampleInputPassword1">Message *</label>
                                                <textarea type="text" class="form-control" rows="10" name="message" id=""
                                                    placeholder="Type your message...">{{ $vendorRequest->message }}</textarea>
                                            </div>
                                        </div>
                                        <div class="card-footer d-flex gap-20">
                                            <a href="{{ route('vendor.requests.index') }}"
                                                class="btn btn-secondary">Back</a>
                                            <button type="button" class="btn btn-primary" id="update-btn">Submit</button>
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

    @include('includes.vendor-store.scripts.update-script', [
        'redirectUrl' => route('vendor.requests.index'),
    ])

@endsection
