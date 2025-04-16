@extends('layouts.admin.app')
@push('styles')
    {{-- @include('includes.admin.data-table-css') --}}
@endpush
@section('title', 'Newsletters')
@section('content')
    <div class="content-wrapper" style="min-height: 1302.12px;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Emails</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-9">
                        <div class="card">
                            <div class="card-header">
                                {{-- <h3 class="card-title">DataTable with default features</h3> --}}

                            </div>

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                    aria-describedby="example1_info">
                                    <thead>
                                        <tr>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                ID
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                EMAIL
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                TERMS & CONDITIONS
                                            </th>
                                            <th class="" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                ACTIONS
                                            </th>
                                        </tr>
                                    </thead>
                                    {{-- <tbody>
                                        @foreach ($newsletters as $newsletter)
                                            <tr class="odd">

                                                <td>{{ $newsletter->id }}</td>
                                                <td>{{ $newsletter->email }}</td>
                                                <td>{{ $newsletter->agreement ? 'Agreed' : 'Not Agreed' }}</td>

                                                <td class="d-flex gap-20">
                                                    <form action="{{ route('admin.newsletter.delete', $newsletter->id) }}"
                                                        id="delete-form" method="POST">
                                                        @csrf
                                                        <button data-id="{{ $newsletter->id }}"
                                                            class="delete btn btn-danger" id="delete-btn">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody> --}}
                                </table>
                                <form action="" id="delete" onclick="return confirm('Are you sure?');"
                                    method="POST">
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
    {{-- @include('includes.admin.data-table-scripts') --}}
    @include('includes.admin.scripts.delete-script')

    <script>
        let columns = [];
        // Define columns based on type

        columns = [{
                data: 'search_key',
                render: function(data, type, row) {

                    return row.id;
                }
            },
            {
                data: 'search_key',
                render: function(data, type, row) {

                    return row.email;
                }
            },
            {
                data: 'search_key',
                render: function(data, type, row) {
                    if (row.agreement) {
                        return 'Agreed';
                    } else {
                        return 'Not Agreed';
                    }
                }
            },


            {
                data: null,
                render: function(data) {
                    console.log(data);

                    return `
                   <div class="d-flex gap-20">

                                <form action="{{ route('admin.newsletter.delete', '') }}/${data.id}"
                                                        id="delete-form" method="POST">
                                                        @csrf
                                                        <button data-id=""
                                                            class="delete btn btn-danger" id="delete-btn">Delete</button>
                                                    </form>
                         </div>
                    `;
                },
            }
        ];
    </script>
    @include('includes.admin.new-data-table-script', ['url' => route('admin.newsletter.get.data')])
@endsection
