@extends('layouts.admin.app')
@push('styles')
    {{-- @include('includes.admin.data-table-css') --}}
@endpush
@section('title', 'Users')
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
                            <div class="card-header">
                                {{-- <h3 class="card-title">DataTable with default features</h3> --}}
                                {{-- <div class=" d-flex justify-content-end">
                                    <a href="{{ route('admin.create.user') }}" class="btn btn-primary">Create New User</a>
                                </div> --}}
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
                                                IMAGE
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                FIRST NAME
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                LAST NAME
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
                                            {{-- <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                ACTIONS
                                            </th> --}}
                                        </tr>
                                    </thead>
                                    {{-- <tbody>
                                        @foreach ($users as $user)
                                            @if ($user->hasRole('User'))
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
                                                    <td>{{ $user->last_name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td class="phone">
                                                        {{ $user->phone }}
                                                    </td>
                                                    <td class="d-flex gap-20">
                                                        <a href="#" data-id="{{ $user->slug }}"
                                                        class="delete btn btn-danger btn-sm">Delete</a>
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
    {{-- @include('includes.admin.data-table-scripts') --}}

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

                    return row.last_name;
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

        ];
    </script>
    @include('includes.admin.new-data-table-script', ['url' => route('admin.users.get.data')])


















    <script>
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


            // let phones = $('.phone');
            // phones.each(function(index, element) {
            //     let phone = $(element).text();
            //     console.log(phone);

            //     console.log(phone.trim().slice(2, 5));
            //     let newPhone = phone.trim().slice(0, 2) + ' (' + phone.trim().slice(2, 5) + ') ' + phone
            //         .trim().slice(5, 8) + '-' + phone.trim().slice(8, 12);
            //     console.log(newPhone);
            //     $(element).text(newPhone);

            // })

        });
    </script>
@endsection
