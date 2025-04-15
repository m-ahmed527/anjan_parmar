@extends('layouts.admin.app')
@push('styles')
    @include('includes.admin.data-table-css')
@endpush
@section('title', 'Order Details')
@section('content')
    <div class="content-wrapper" style="min-height: 1302.12px;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $order->user->first_name }} Order Details</h1>
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
                                <div class="row d-flex justify-content-space-between align-items-center">
                                    <div class="col-sm-11 ">
                                        <h2>Customer's Details</h2>
                                    </div>
                                    <div class="col-sm-1">

                                        <a href="{{ route('admin.orders.index') }}" class="btn btn-primary">Back</a>
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
                                                FIRST NAME</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                LAST NAME</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                EMAIL</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                PHONE</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd">

                                            <td class="dtr-control sorting_1" tabindex="0">
                                                {{ $order->user->first_name }}
                                            </td>
                                            <td class="dtr-control sorting_1" tabindex="1">
                                                {{ $order->user->last_name ?? '' }}
                                            </td>
                                            <td class="dtr-control sorting_1" tabindex="1">
                                                {{ $order->user->email }}

                                            </td>
                                            <td class="dtr-control sorting_1" tabindex="1">
                                                {{ $order->user->phone }}

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
                    <div class="col-10">
                        <div class="card">
                            <div class="card-header">
                                <div class="row d-flex justify-content-space-between">
                                    <div class="col-sm-11 ">
                                        <h2>Customer's Billing Details</h2>
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
                                                ADDRESS</th>

                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                COUNTRY
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                CITY
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                STATE
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                ZIP
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd">

                                            <td>
                                                {{ $order->billingAddress->address }}
                                            </td>

                                            <td>
                                                {{ $order->billingAddress->country }}
                                            </td>
                                            <td>
                                                {{ $order->billingAddress->city }}
                                            </td>
                                            <td>
                                                {{ $order->billingAddress->state }}
                                            </td>
                                            <td>
                                                {{ $order->billingAddress->zip }}
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
        @if (!$order->billingAddress->same_as_billing)
            <section class="content">
                <div class="container-fluid">
                    <div class="row d-flex justify-content-center">
                        <div class="col-10">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row d-flex justify-content-space-between">
                                        <div class="col-sm-11 ">
                                            <h2>Customer's Shipping Details</h2>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <table id="example1"
                                        class="table table-bordered table-striped dataTable dtr-inline mt-2"
                                        aria-describedby="example1_info">
                                        <thead>
                                            <tr>

                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="Rendering engine: activate to sort column descending">
                                                    ADDRESS</th>

                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="Rendering engine: activate to sort column descending">
                                                    COUNTRY
                                                </th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="Rendering engine: activate to sort column descending">
                                                    CITY
                                                </th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="Rendering engine: activate to sort column descending">
                                                    STATE
                                                </th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="Rendering engine: activate to sort column descending">
                                                    ZIP
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd">

                                                <td>
                                                    {{ $order->shippingAddress->address }}
                                                </td>

                                                <td>
                                                    {{ $order->shippingAddress->country }}
                                                </td>
                                                <td>
                                                    {{ $order->shippingAddress->city }}
                                                </td>
                                                <td>
                                                    {{ $order->shippingAddress->state }}
                                                </td>
                                                <td>
                                                    {{ $order->shippingAddress->zip }}
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
        @endif
        <section class="content">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-10">
                        <div class="card">
                            <div class="card-header">
                                <div class="row d-flex justify-content-space-between">
                                    <div class="col-sm-8 ">
                                        <h2>Order Products </h2>
                                    </div>
                                    <div class="col-sm-4 ">
                                        <div class="row d-flex justify-content-space-between align-items-center">

                                        </div>
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
                                                IMAGE </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                PRODUCT NAME</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                VARIANT NAME</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                PRODUCT PRICE</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                VARIANT PRICE</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                PRODUCT QUANTITY
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                TOTAL
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($order->products as $product)
                                            {{-- @dd($product->pivot) --}}
                                            <tr class="odd">
                                                <td class="dtr-control sorting_1" tabindex="0">
                                                    @if ($product?->getFirstMediaUrl('featured_image'))
                                                        <img src="{{ $product?->getFirstMediaUrl('featured_image') }}"
                                                            alt="" width="100px">
                                                    @else
                                                        No Image
                                                    @endif

                                                </td>
                                                <td class="dtr-control sorting_1" tabindex="1">
                                                    {{ $product?->pivot?->product_name ?? '' }}
                                                </td>
                                                <td class="dtr-control sorting_1" tabindex="1">
                                                    {{ $product?->pivot?->variant_name ?? 'No variant' }}

                                                </td>
                                                <td class="dtr-control sorting_1" tabindex="1">
                                                    ${{ $product?->pivot?->product_price }}

                                                </td>
                                                <td>
                                                    ${{ $product?->pivot?->variant_price }}
                                                </td>
                                                <td>
                                                    {{ $product?->pivot?->quantity }}
                                                </td>
                                                <td>
                                                    ${{ $product?->pivot?->total }}
                                                </td>

                                            </tr>
                                        @empty
                                        @endforelse
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
@endsection
