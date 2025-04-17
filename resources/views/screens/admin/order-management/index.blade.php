@extends('layouts.admin.app')
@push('styles')
    {{-- @include('includes.admin.data-table-css') --}}
@endpush
@section('title', 'Orders')
@section('content')
    <div class="content-wrapper" style="min-height: 1302.12px;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Orders</h1>
                    </div>

                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <div class="card">
                            {{-- <div class="card-header">
                                <div class=" d-flex justify-content-end">
                                    <a href="{{ route('admin.product.create') }}" class="btn btn-primary">Create New
                                        Product</a>
                                </div>
                            </div> --}}

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                    aria-describedby="example1_info">
                                    <thead>
                                        <tr>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="ID: activate to sort column descending">
                                                CUSTOMER NAME
                                            </th>

                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                PAYMENT ID
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                PAYMENT METHOD
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                PAYMENT STATUS
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                AMOUNT</th>

                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                ORDER STATUS
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                ORDER PLACED AT
                                            </th>
                                            <th class="sorting_disabled sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                ACTIONS
                                            </th>
                                            {{-- <th class="sorting sorting_asc " tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                SEARCH
                                            </th> --}}
                                        </tr>
                                    </thead>
                                    {{-- <tbody>
                                        @foreach ($orders as $order)
                                            <tr class="odd">
                                                <td class="dtr-control sorting_1" tabindex="0">
                                                    {{ $order->user->first_name }}
                                                </td>
                                                <td>{{ $order->order_id }}</td>
                                                <td>{{ $order->payment_method }}</td>
                                                <td>{{ $order->payment_status }}</td>


                                                <td>${{ $order->total }}</td>
                                                <td>
                                                    {{ $order->order_status }}
                                                    <select class="form-control order-status-select d-none"
                                                        data-order-id="{{ $order->order_id }}">
                                                        <option {{ $order->order_status == 'Created' ? 'selected' : '' }}>
                                                            Created</option>
                                                        <option
                                                            {{ $order->order_status == 'In Transit' ? 'selected' : '' }}>In
                                                            Transit</option>
                                                        <option {{ $order->order_status == 'Delivered' ? 'selected' : '' }}>
                                                            Delivered</option>
                                                        <option
                                                            {{ $order->order_status == 'Cancelled' ? 'selected' : '' }}>
                                                            Cancelled</option>
                                                    </select>
                                                </td>

                                                <td>{{ $order->created_at }}</td>
                                                <td class="d-flex gap-20">


                                                    <a href="{{ route('admin.order.details', $order->order_id) }}"
                                                        class="btn btn-info">Details</a>
                                                </td>
                                                <td class="">{{ $order->search_key }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody> --}}
                                </table>
                                {{-- <form action="" id="delete" onclick="return confirm('Are you sure?');"
                                    method="POST">
                                    @csrf
                                    @method('delete')
                                </form> --}}
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
    {{-- @include('includes.admin.scripts.delete-script') --}}
    <script>
        let columns = [];
        let order = [];
        // Define columns based on type

        columns = [{
                data: 'search_key',
                render: function(data, type, row) {

                    return row.user.first_name;
                }
            },
            {
                data: 'search_key',
                render: function(data, type, row) {

                    return row.order_id;
                }
            },
            {
                data: 'search_key',
                render: function(data, type, row) {

                    return row.payment_method;
                }
            },
            {
                data: 'search_key',
                render: function(data, type, row) {

                    return row.payment_status;
                }
            },
            {
                data: 'search_key',
                render: function(data, type, row) {

                    return row.total;
                }

            },

            {
                data: 'search_key',
                render: function(data, type, row) {

                    return `
                            <select class="form-control order-status-select" data-order-id="">
                                    <option ${ row.order_status == 'Created' ? 'selected' : '' }>
                                        Created</option>
                                    <option
                                        ${ row.order_status == 'In Transit' ? 'selected' : '' }>In
                                        Transit</option>
                                    <option ${ row.order_status == 'Delivered' ? 'selected' : '' }>
                                        Delivered</option>
                                    <option
                                        ${ data.order_status == 'Cancelled' ? 'selected' : '' }>
                                        Cancelled</option>
                                </select>
                                `;
                },

            },
            {
                data: 'search_key',
                render: function(data, type, row) {

                    return row.created_at;
                }
            },
            {
                data: null,
                render: function(data) {
                    console.log(data);

                    return `
                       <a href="{{ route('admin.order.details', '') }}/${data.order_id}" class="btn btn-info">Details</a>
                        `;
                },
            }
        ];
        order = [
            [6, 'desc']
        ];
    </script>
    @include('includes.admin.new-data-table-script', ['url' => route('admin.orders.get.data')])


@endsection
