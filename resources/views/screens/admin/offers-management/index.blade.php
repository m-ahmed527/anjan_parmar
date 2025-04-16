@extends('layouts.admin.app')
@push('styles')
    {{-- @include('includes.admin.data-table-css') --}}
@endpush
@section('title', 'Offers on Products')

@section('content')
    <div class="content-wrapper" style="min-height: 1302.12px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Offers {{ request()->has('product') ? " of Product : {$product->name}" : '' }}</h1>
                    </div>
                </div>
            </div>
        </section>
        {{-- @dd(request()->has('product')) --}}
        <section class="content">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-10">
                        <div class="card">
                            <div class="card-header">
                                {{-- <h3 class="card-title">DataTable with default features</h3> --}}
                                {{-- <div class="col-sm-12 d-flex justify-content-end">
                                    <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Create
                                        Category</a>
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
                                                OFFER ID</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                USER NAME</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                PRODUCT NAME</th>

                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                QUANTITY</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                OFFER PRICE</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                TOTAL PRICE</th>

                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                ACTIONS
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($offers as $offer)
                                            <tr class="odd">
                                                <td class="dtr-control sorting_1" tabindex="0">
                                                    {{ $offer->id }}</td>

                                                <td class="dtr-control sorting_1" tabindex="1">
                                                    {{ $offer->user->first_name }}</td>


                                                <td class="dtr-control sorting_1" tabindex="1">

                                                    {{ $offer->product->name }}<br>

                                                </td>
                                                <td class="dtr-control sorting_1" tabindex="1">

                                                    {{ $offer->offer_quantity }}<br>

                                                </td>
                                                <td class="dtr-control sorting_1" tabindex="1">

                                                    ${{ $offer->offer_price }}<br>

                                                </td>
                                                <td class="dtr-control sorting_1" tabindex="1">

                                                    ${{ $offer->total_price }}<br>

                                                </td>
                                                <td class="d-flex gap-20">
                                                    <a href="{{ route('admin.offer.details', $offer->id) }}"
                                                        class="btn btn-info">Details</a>
                                                    {{-- <a href="{{ route('admin.vendor.requests.all.replies', $request->request_id) }}"
                                                        class="btn btn-primary">Replies</a>
                                                    <form action="#" method="POST" id="delete-form">
                                                        @csrf
                                                        <button type="button" class="btn btn-danger"
                                                            id="delete-btn">Delete</button>
                                                    </form> --}}

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

                    return row.user.first_name;
                }
            },
            {
                data: 'search_key',
                render: function(data, type, row) {

                    return row.product.name;
                }
            },
            {
                data: 'search_key',
                render: function(data, type, row) {

                    return row.offer_quantity;
                }
            },
            {
                data: 'search_key',
                render: function(data, type, row) {

                    return "$" + row.offer_price;
                }
            },
            {
                data: 'search_key',
                render: function(data, type, row) {

                    return "$" + row.total_price;
                }
            },

            {
                data: null,
                render: function(data) {
                    console.log(data);

                    return `
                       <div class="d-flex gap-20">

                                    <a href="{{ route('admin.offer.details', '') }}/${data.id}"
                                        class="btn btn-primary">Details</a>
                             </div>
                        `;
                },
            }
        ];
    </script>
    @include('includes.admin.new-data-table-script', ['url' => route('admin.offers.get.data')])
@endsection
