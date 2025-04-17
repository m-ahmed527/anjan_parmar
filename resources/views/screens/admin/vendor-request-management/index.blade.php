@extends('layouts.admin.app')
@push('styles')
    {{-- @include('includes.admin.data-table-css') --}}
@endpush
@section('title', 'Vendor\'s Requests')

@section('content')
    <div class="content-wrapper" style="min-height: 1302.12px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Requests</h1>
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
                                {{-- <h3 class="card-title">DataTable with default features</h3> --}}
                                {{-- <div class="col-sm-12 d-flex justify-content-end">
                                    <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Create
                                        Category</a>
                                </div> --}}
                            </div>

                            <div class="card-body">
                                <table id="example1" class="table table-bordered"
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

                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    {{-- <tbody>
                                        @foreach ($requests as $request)
                                            <tr class="odd">
                                                <td class="dtr-control sorting_1" tabindex="0">
                                                    {{ $request->request_id }}</td>

                                                <td class="dtr-control sorting_1" tabindex="1">
                                                    {{ $request->vendor->first_name }}</td>


                                                <td class="dtr-control sorting_1" tabindex="1">

                                                    {{ $request->vendor->business_name }}<br>

                                                </td>
                                                <td class="dtr-control sorting_1" tabindex="1">

                                                    {{ $request->subject }}<br>

                                                </td>
                                                <td class="d-flex gap-20">
                                                    <a href="{{ route('admin.vendor.requests.detail', $request->request_id) }}"
                                                        class="btn btn-info">Details & Reply</a>
                                                    <a href="{{ route('admin.vendor.requests.all.replies', $request->request_id) }}"
                                                        class="btn btn-primary">Replies</a>
                                                    <form action="#" method="POST" id="delete-form">
                                                        @csrf
                                                        <button type="button" class="btn btn-danger"
                                                            id="delete-btn">Delete</button>
                                                    </form>

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
    @include('includes.admin.scripts.delete-script')



    <script>
        let columns = [];
        // Define columns based on type

        columns = [

            {
                data: 'search_key',
                render: function(data, type, row) {

                    return '#' +row.request_id;
                }
            },
            {
                data: 'search_key',
                render: function(data, type, row) {

                    return row.vendor.first_name;
                }
            },
            {
                data: 'search_key',
                render: function(data, type, row) {

                    return row.vendor.business_name;
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

                    return `
                        <div class="d-flex align-items-center gap-20">
                            <a href="{{ route('admin.vendor.requests.detail', '') }}/${row.request_id}" class="btn btn-info">Details & Reply</a>
                            <a href="{{ route('admin.vendor.requests.all.replies', '') }}/${row.request_id}" class="btn btn-primary">Replies</a>

                        </div>
                    `;
                },
            },


        ];
    </script>
    @include('includes.admin.new-data-table-script', ['url' => route('admin.vendor.requests.get.data')])
@endsection
