@extends('layouts.admin.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
@section('content')
    <div class="content-wrapper" style="min-height: 1302.12px;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $user->name }} Details</h1>
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
                                <div class="row d-flex justify-content-space-between align-items-center">
                                    <div class="col-sm-11 ">
                                        <h2>Users's Personal Details</h2>
                                    </div>
                                    <div class="col-sm-1">

                                        <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Back</a>
                                    </div>
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
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                NAME
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                LAST NAME
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                COMPANY NAME
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                EMAIL
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                PHONE
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd">

                                            <td class="dtr-control sorting_1" tabindex="0">
                                              <img src="{{ $user->getFirstMediaUrl('avatar') ?? '' }}" alt="" style="max-width: 100px; max-height: 100px;">
                                            </td>
                                            <td class="dtr-control sorting_1" tabindex="0">
                                                {{ $user->name }}
                                            </td>
                                            <td class="dtr-control sorting_1" tabindex="1">
                                                {{ $user->last_name ?? '' }}
                                            </td>
                                            <td class="dtr-control sorting_1" tabindex="1">
                                                {{ $user->company_name ?? '' }}
                                            </td>
                                            <td class="dtr-control sorting_1" tabindex="1">
                                                {{ $user->email }}

                                            </td>
                                            <td class="dtr-control sorting_1" tabindex="1">
                                                {{ $user->phone }}
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row d-flex justify-content-space-between align-items-center">
                                    <div class="col-sm-11 ">
                                        <h2>Users's Residential Details</h2>
                                    </div>
                                    {{-- <div class="col-sm-1">

                                        <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Back</a>
                                    </div> --}}
                                </div>
                            </div>

                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-striped dataTable dtr-inline mt-2"
                                    aria-describedby="example2_info">
                                    <thead>
                                        <tr>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example2"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                ADDRESS</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example2"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                STREET
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example2"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                COUNTRY
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example2"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                CITY
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example2"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                STATE
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example2"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                ZIP
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd">

                                            <td>
                                                {{ $user->address ?? '' }}
                                            </td>
                                            <td>
                                                {{ $user->street_appartment ?? '' }}
                                            </td>
                                            <td>
                                                {{ $user->country ?? '' }}
                                            </td>
                                            <td>
                                                {{ $user->city ?? '' }}
                                            </td>
                                            <td>
                                                {{ $user->state ?? '' }}
                                            </td>
                                            <td>
                                                {{ $user->zip ?? '' }}
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
    </div>
@endsection
@section('scripts')
    <script>
        $(function() {
            $("#example1").DataTable({
                "searching": false,
                "info": false,
                "paging": false,
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            // $("#example2").DataTable({
            //     "searching": false,
            //     "info": false,
            //     "paging": false,
            //     "responsive": true,
            //     "lengthChange": true,
            //     "autoWidth": true,
            //     "buttons": ["copy", "csv", "excel", "pdf", "print"]
            // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
        $(document).ready(function() {
            $(document).on("click", "#status", function(e) {
                e.preventDefault()
                var id = $(this).data("id");
                var element = $(this);
                var status = $(this).data("status");

                console.log(element, id, status);

                $.ajax({
                    method: "GET",
                    url: "/admin/product-status/change/" + id,
                    data: {
                        is_active: status
                    },
                    success: function(response) {
                        console.log(response.status);
                        element.data("status", response.status);
                        // var newText = ;
                        element.html(response.status == 0 ? 'Inactive' : 'Active');
                    },
                });
            });
            $(document).on("click", ".delete", function(e) {
                e.preventDefault();
                let id = $(this).data("id");
                if (confirm('Are you sure?')) {
                    $("#delete").attr('action', "{{ route('admin.product.delete', '') }}/" + id)
                    $("#delete").submit();
                }
            })


        });
    </script>
    <script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
@endsection
