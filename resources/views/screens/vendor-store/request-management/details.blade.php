@extends('layouts.vendor-store.app')
@push('styles')
    @include('includes.admin.data-table-css')
@endpush

@section('title', 'Request Details')

@section('content')
    <div class="content-wrapper" style="min-height: 1302.12px;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Request ID: #{{ $vendorRequest->request_id }} Details</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class=" d-flex justify-content-end">
                                    <a href="{{ route('vendor.requests.index') }}" class="btn btn-primary">Back</a>
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
                                                REQUEST ID
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                SUBJECT
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                STATUS
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                ACTIONS
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr class="odd">

                                            <td>#{{ $vendorRequest->request_id }}</td>
                                            <td>

                                                {{ $vendorRequest->subject }}
                                            </td>


                                            <td>{{ ucfirst($vendorRequest->status) }} </td>


                                            <td><a href="{{ route('vendor.requests.edit', $vendorRequest->request_id) }}"
                                                    class="btn btn-primary">Edit</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <form action="" id="delete-form" method="POST">
                                    @csrf
                                    @method('delete')
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class=" d-flex justify-content-start">
                                    <h3>Replies on Request ID: #{{ $vendorRequest->request_id }}</h3>
                                </div>
                                <div class=" d-flex justify-content-end">
                                    {{-- <a href="{{ route('vendor.requests.index') }}" class="btn btn-primary">Back</a> --}}
                                </div>
                            </div>

                            <div class="card-body">
                                <table id="reply-table" class="table table-bordered table-striped dataTable dtr-inline mt-2"
                                    aria-describedby="reply-table_info">
                                    <thead>
                                        <tr>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="reply-table"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                REPLY ID
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="reply-table"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                REPLY
                                            </th>
                                            {{-- <th class="sorting sorting_asc" tabindex="0" aria-controls="reply-table"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                ACTIONS
                                            </th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($vendorRequest->responses as $reply)
                                            <tr class="odd">

                                                <td>#{{ $reply->response_id }}</td>
                                                <td>

                                                    {{ $reply->reply }}
                                                </td>


                                                {{-- <td>{{ ucfirst($vendorRequest->status) }} </td>


                                            <td><a href="{{ route('vendor.requests.edit', $vendorRequest->request_id) }}"
                                                    class="btn btn-primary">Edit</a></td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <form action="" id="delete-form" method="POST">
                                    @csrf
                                    @method('delete')
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
    @include('includes.admin.data-table-scripts')
    <script>
        $(document).ready(function() {
            // Ensure DataTable is properly initialized
            var table = $("#reply-table").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false
            });
        });
    </script>
@endsection
