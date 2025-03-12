@extends('layouts.admin.app')
@push('styles')
    @include('includes.admin.data-table-css')
@endpush
@section('title', 'Replies on a Request')

@section('content')
    <div class="content-wrapper" style="min-height: 1302.12px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Replies of Request ID : #{{ $vendorRequest->request_id }} </h1>
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
                                {{-- <h3 class="card-title">DataTable with default features</h3> --}}
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('admin.vendor.requests.detail', $vendorRequest->request_id) }}"
                                        class="btn btn-primary mx-2">Submit a Reply</a>
                                    <a href="{{ route('admin.vendor.requests') }}" class="btn btn-primary mx-2">Back</a>
                                </div>
                            </div>

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                    aria-describedby="example1_info">
                                    <thead>
                                        <tr>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                REPLY ID</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                REPLY</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                STATUS</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($replies as $reply)
                                            <tr class="odd">
                                                <td class="dtr-control sorting_1" tabindex="0">
                                                    #{{ $reply->response_id }}</td>

                                                <td class="dtr-control sorting_1" tabindex="1">
                                                    {{-- {{ Str::limit($reply->reply, 25, '...') }} --}}
                                                    {{ $reply->reply }}
                                                </td>
                                                <td class="dtr-control sorting_1" tabindex="1">
                                                    <span
                                                        class="badge {{ $reply->status == 'sent' ? 'badge-warning' : 'badge-success' }} p-2">
                                                        {{ ucfirst($reply->status) }}
                                                    </span>
                                                </td>
                                                <td class="d-flex gap-20">
                                                    {{-- <a href="{{ route('admin.vendor.requests.detail', $request->request_id) }}"
                                                        class="btn btn-info">Details & Reply</a>
                                                    <a href="{{ route('admin.vendor.requests.detail', $request->request_id) }}"
                                                        class="btn btn-primary">Replies</a> --}}
                                                    <form
                                                        action="{{ route('admin.vendor.requests.reply.delete', $reply->response_id) }}"
                                                        method="POST" id="delete-form">
                                                        @csrf
                                                        <button type="button" class="btn btn-danger"
                                                            id="delete-btn">Delete</button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
    @include('includes.admin.scripts.delete-script')
@endsection
