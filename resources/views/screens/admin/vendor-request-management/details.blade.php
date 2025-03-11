@extends('layouts.admin.app')
@section('title', 'Category Details')

@section('content')
    <div class="content-wrapper" style="min-height: 1302.12px;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Request ID : #{{ $vendorRequest->request_id }} Details</h1>
                    </div>


                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-10">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-sm-12 d-flex justify-content-end">
                                    <a href="{{ route('admin.vendor.requests') }}" class="btn btn-primary">Back</a>
                                </div>
                            </div>

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline mt-2"
                                    aria-describedby="example1_info">
                                    <thead>
                                        <tr>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                REQUEST ID</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                VENDOR NAME</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                STORE NAME</th>

                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                SUBJECT</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd">
                                            <td class="dtr-control sorting_1" tabindex="0">
                                                {{ $vendorRequest->request_id }}</td>

                                            <td class="dtr-control sorting_1" tabindex="1">
                                                {{ $vendorRequest->vendor->first_name }}</td>


                                            <td class="dtr-control sorting_1" tabindex="1">

                                                {{ $vendorRequest->vendor->business_name }}<br>

                                            </td>
                                            <td class="dtr-control sorting_1" tabindex="1">

                                                {{ $vendorRequest->subject }}<br>

                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-10">
                        <div class="card">
                            <div class="card-header">
                                <div class=" d-flex justify-content-start">
                                    <h4>Message</h4>
                                </div>

                            </div>
                            <div class="card-body">
                                <div class="imgs-multiple">
                                    {{ $vendorRequest->message }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <form action="{{ route('admin.vendor.requests.reply', $vendorRequest->request_id) }}"
                                method="POST" id="create-form">
                                @csrf
                                <div class="card-body">
                                    <br>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="exampleInputPassword1">Reply to : #{{ $vendorRequest->request_id }}
                                                *</label>
                                            <textarea type="text" class="form-control" rows="10" name="reply" id=""
                                                placeholder="Type your reply..."></textarea>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex gap-20">
                                        <button type="button" class="btn btn-primary" id="create-btn">Submit Reply</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection
@section('scripts')
    @include('includes.admin.data-table-scripts')
    @include('includes.admin.scripts.create-script', ['redirectUrl' => request()->url()])
@endsection
