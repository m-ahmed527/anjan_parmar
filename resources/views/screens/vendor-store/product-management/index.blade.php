@extends('layouts.vendor-store.app')
@push('styles')
    @include('includes.admin.data-table-css')
    <style>
        .premium-single,
        .premium-all {
            transform: scale(1.5);
            /* display: flex; */
        }
    </style>
@endpush
@section('title', 'Products')

@section('content')
    <div class="content-wrapper" style="min-height: 1302.12px;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Products</h1>
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
                                    <a href="{{ route('vendor.products.create') }}" class="btn btn-primary">Create New
                                        Product</a>
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
                                                IMAGE
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                NAME
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                PRICE
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                DISCOUNTED PRICE
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                DISCOUNT
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                DISCOUNT TYPE
                                            </th>
                                            {{-- <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                STATUS
                                            </th> --}}
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                ACTIONS
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr class="odd">

                                                <td>
                                                    @if ($product->getFirstMediaUrl('featured_image'))
                                                        <img src="{{ $product->getFirstMediaUrl('featured_image') }}"
                                                            alt="{{ $product->name }}"
                                                            style="max-width: 100px; max-height: 100px;">
                                                    @else
                                                        No Image Found
                                                    @endif
                                                </td>
                                                <td>{{ $product->name }}</td>
                                                <td>${{ $product->price }}</td>
                                                <td>${{ $product->discount() }}</td>
                                                <td>{{ $product->discount_type == 'price' ? '$' : '' }}{{ $product->discount }}
                                                </td>
                                                <td>{{ $product->discount_type }}</td>
                                                {{-- <td>
                                                    <a href="#" data-id="{{ $product->slug }}" id="status"
                                                        data-status="{{ $product->is_active }}">{{ $product->is_active == 1 ? 'Active' : 'Inactive' }}</a>
                                                </td> --}}
                                                <td class="d-flex gap-20">
                                                    <a href="{{ route('vendor.products.edit', $product->slug) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <form action="{{ route('vendor.products.delete', $product->slug) }}"
                                                        id="delete-form" method="POST">
                                                        @csrf
                                                        <button data-id="{{ $product->slug }}"
                                                            class="delete btn btn-danger" id="delete-btn">Delete</button>
                                                    </form>
                                                    <a href="{{ route('vendor.products.details', $product->slug) }}"
                                                        class="btn btn-info">Details</a>
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


        });
    </script>
@endsection
