@extends('layouts.admin.app')
@push('styles')
    {{-- @include('includes.admin.data-table-css') --}}
@endpush
@section('title', 'Vendors')

@section('content')
    <div class="content-wrapper" style="min-height: 1302.12px;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Users</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-9">
                        <div class="card">
                            {{-- <div class="card-header">

                                <div class=" d-flex justify-content-end">
                                    <a href="{{ route('admin.create.user') }}" class="btn btn-primary">Create New User</a>
                                </div>
                            </div> --}}
                            {{-- <div class="card-header">
                                <label for="status-filter" style="margin-right: 10px;">Filter by status: </label>
                                <select id="status-filter" class="form-control" style="width: 200px;">
                                    <option value="" {{ $status == '' ? 'selected' : '' }}>All</option>
                                    <option value="approved" {{ $status == 'approved' ? 'selected' : '' }}>Approved</option>
                                    <option value="rejected" {{ $status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                    <option value="pending" {{ $status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="">All</option>
                                    <option value="approved">Approved</option>
                                    <option value="rejected">Rejected</option>
                                    <option value="pending">Pending</option>
                                </select>
                            </div> --}}
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
                                                IMAGE
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                OWNER'S NAME
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                STORE NAME
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
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                STATUS
                                            </th>
                                            {{-- <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                ACTIONS
                                            </th> --}}
                                        </tr>
                                    </thead>
                                    {{-- <tbody>
                                        @foreach ($users as $user)
                                            @if ($user->hasRole('Vendor'))
                                                <tr class="odd">
                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                        {{ $user->id }}
                                                    </td>
                                                    <td>
                                                        @if ($user->getFirstMediaUrl('avatar'))
                                                            <img src="{{ $user->getFirstMediaUrl('avatar') }}"
                                                                alt="{{ $user->name }}"
                                                                style="max-width: 50px; max-height: 50px;">
                                                        @else
                                                            No Image Found
                                                        @endif
                                                    </td>
                                                    <td>{{ $user->first_name }}</td>
                                                    <td>{{ $user->business_name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td class="phone">{{ $user->phone }}</td>
                                                    <td>
                                                        <Select class="form-control" id="status"
                                                            data-id="{{ $user->id }}" data-status="{{ $user->status }}">

                                                            <option value="pending"
                                                                {{ $user->status == 'pending' ? 'selected' : '' }}
                                                                class="form-control">Pending</option>
                                                            <option value="approved"
                                                                {{ $user->status == 'approved' ? 'selected' : '' }}
                                                                class="form-control">Approved</option>
                                                            <option value="rejected"
                                                                {{ $user->status == 'rejected' ? 'selected' : '' }}
                                                                class="form-control">Rejected</option>

                                                        </Select>
                                                    </td>
                                                    <td class="d-flex gap-20">
                                                        <a href="{{ route('admin.user.edit', $user->slug) }}"
                                                            class="btn btn-primary">Edit</a>

                                                        <a href="{{ route('admin.user.detial', $user->slug) }}"
                                                            class="btn btn-info">Details</a>
                                                    </td>
                                                </tr>
                                            @endif
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
    <script src="{{ asset('assets/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    {{-- @include('includes.admin.data-table-scripts') --}}
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
    <script>
        let columns = [];
        // Define columns based on type

        columns = [

            {
                data: 'search_key',
                render: function(data, type, row) {

                    return row.id;
                }
            },
            {
                data: 'search_key',
                render: function(data, type, row) {
                    if (row.image) {

                        return `
                            <img src="${row.image}" alt="" style="max-width: 50px; max-height: 50px;">
                        `;
                    } else {
                        return "No Image"
                    }
                }
            },
            {
                data: 'search_key',
                render: function(data, type, row) {

                    return row.first_name;
                }
            },
            {
                data: 'search_key',
                render: function(data, type, row) {

                    return row.business_name;
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

                    return row.phone;
                }
            },
            {
                data: 'search_key',
                render: function(data, type, row) {
                    return `
                        <select class="form-control status-dropdown" id="status"
                                data-id="${row.id}" data-status="${row.status}">
                            <option value="pending" ${row.status === 'pending' ? 'selected' : ''}>Pending</option>
                            <option value="approved" ${row.status === 'approved' ? 'selected' : ''}>Approved</option>
                            <option value="rejected" ${row.status === 'rejected' ? 'selected' : ''}>Rejected</option>
                        </select>
                    `;
                }
            },

        ];
    </script>
    @include('includes.admin.new-data-table-script', ['url' => route('admin.vendors.get.data')])











    <script>
        $(document).ready(function() {
            $(document).on("change", "#status", function(e) {
                e.preventDefault();

                var id = $(this).data("id");
                var element = $(this);
                var previousStatus = element.attr("data-status"); // Get old status from attribute
                var newStatus = element.val(); // Get new selected status

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, change it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.LoadingOverlay("show");

                        $.ajax({
                            method: "GET",
                            url: "{{ route('admin.vendor.change.status', '') }}/" + id,
                            data: {
                                status: previousStatus, // Old status
                                newStatus: newStatus // New status
                            },
                            success: function(response) {
                                $.LoadingOverlay("hide");

                                if (response.success) {
                                    // ✅ Update select dropdown value
                                    element.val(newStatus);

                                    // ✅ Force update `data-status` in real-time
                                    element.attr("data-status", newStatus);

                                    Swal.fire({
                                        position: "center",
                                        icon: "success",
                                        title: "Status updated successfully!",
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                }
                            },
                            error: function(xhr, status, error) {
                                $.LoadingOverlay("hide");
                                console.log(error);

                                Swal.fire({
                                    position: "center",
                                    icon: "error",
                                    title: "Failed to update status!",
                                    showConfirmButton: true,
                                    timer: 2000
                                });

                                // ✅ Revert to previous status if update fails
                                element.val(previousStatus);
                                element.attr("data-status", previousStatus);
                            }
                        });
                    } else {
                        // ✅ If user cancels, reset dropdown to previous status
                        element.val(previousStatus);
                    }
                });
            });

            // let phones = $('.phone');
            // phones.each(function(index, element) {
            //     let phone = $(element).text();


            //     let newPhone = phone.trim().slice(0, 2) + ' (' + phone.trim().slice(2, 5) + ') ' + phone
            //         .trim().slice(5, 8) + '-' + phone.trim().slice(8, 12);
            //     $(element).text(newPhone);

            // })
        });
    </script>
@endsection
