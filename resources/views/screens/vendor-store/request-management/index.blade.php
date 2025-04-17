@extends('layouts.vendor-store.app')
@push('styles')
    {{-- @include('includes.admin.data-table-css') --}}
    <style>
        .premium-single,
        .premium-all {
            transform: scale(1.5);
            /* display: flex; */
        }
    </style>
@endpush
@section('title', 'Requests')

@section('content')
    <div class="content-wrapper" style="min-height: 1302.12px;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Request</h1>
                    </div>

                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-11">
                        <div class="card">
                            <div class="card-header">
                                {{-- <h3 class="card-title">DataTable with default features</h3> --}}
                                <div class=" d-flex justify-content-end">
                                    <a href="{{ route('vendor.requests.create') }}" class="btn btn-primary">Create New
                                        Request</a>
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
                                                MESSAGE
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
                                    {{-- <tbody>
                                        @foreach ($requests as $request)
                                            <tr class="odd">


                                                <td>#{{ $request->request_id }}</td>
                                                <td>{{ $request->subject }}</td>
                                                <td>{{ Str::limit($request->message, 50, '...') }}</td>
                                                <td>
                                                    <span
                                                        class="badge {{ $request->status == 'requested' ? 'badge-warning' : 'badge-success' }} p-2">
                                                        {{ ucfirst($request->status) }}
                                                    </span>
                                                </td>

                                                <td class="d-flex gap-20">
                                                    <a href="{{ route('vendor.requests.edit', $request->request_id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <form
                                                        action="{{ route('vendor.requests.delete', $request->request_id) }}"
                                                        id="delete-form" method="POST">
                                                        @csrf
                                                        <button class="delete btn btn-danger"
                                                            id="delete-btn">Delete</button>
                                                    </form>
                                                    <a href="{{ route('vendor.requests.show', $request->request_id) }}"
                                                        class="btn btn-info">Details and Replies</a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody> --}}
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
    {{-- @include('includes.admin.data-table-scripts') --}}

    @include('includes.vendor-store.scripts.delete-script')
    <script>
        let columns = [];
        // Define columns based on type

        columns = [

            {
                data: 'search_key',
                render: function(data, type, row) {

                    return '#' + row.request_id;
                }
            },
            {
                data: 'search_key',
                render: function(data, type, row) {

                    return row.subject;
                }
            },
            {
                data: 'search_key',
                render: function(data, type, row) {

                    return row.message.length > 50 ? row.message.substring(0, 50) + '...' : row.message;
                }
            },
            {
                data: 'search_key',
                render: function(data, type, row) {

                    return `
                        <span class="badge ${ row.status == 'requested' ? 'badge-warning' : 'badge-success' } p-2">
                                                        ${row.status.replace(/(^\w{1})|(\s+\w{1})/g, letter => letter.toUpperCase())}
                        </span>
                    `;
                }
            },

            {
                data: 'search_key',
                render: function(data, type, row) {

                    return `
                        <div class="d-flex align-items-center gap-20">
                            <a href="{{ route('vendor.requests.edit', '') }}/${row.request_id}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('vendor.requests.delete', '') }}/${row.request_id}" id="delete-form" method="POST">
                                @csrf
                                <button class="delete btn btn-danger" id="delete-btn">Delete</button>
                            </form>
                            <a href="{{ route('vendor.requests.show', '') }}/${row.request_id}" class="btn btn-info">Details and Replies</a>

                        </div>
                    `;
                },
            },


        ];
    </script>
    @include('includes.admin.new-data-table-script', ['url' => route('vendor.requests.index.get.data')])
@endsection
