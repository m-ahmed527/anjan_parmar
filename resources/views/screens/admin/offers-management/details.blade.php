@extends('layouts.admin.app')
@section('title', 'Offer Details')

@section('content')
    <div class="content-wrapper" style="min-height: 1302.12px;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Offer of : {{ $offer->user->first_name }} for, Product : {{ $offer->product->name }}, Details
                        </h1>
                    </div>


                </div>
            </div>
        </section>
        {{-- @dd(str_contains(url()->previous(), 'offers?product=')) --}}
        <section class="content">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-10">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-sm-12 d-flex justify-content-end">
                                    <a href="{{ str_contains(url()->previous(), 'offers?product=') ? url()->previous() : route('admin.offers.index') }}"
                                        class="btn btn-primary">Back</a>
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

                                            {{-- <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                ACTIONS
                                            </th> --}}

                                        </tr>
                                    </thead>
                                    <tbody>
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
                                            {{-- <td class="d-flex gap-20">
                                                <a href="#" class="btn btn-info">Details</a>
                                            </td> --}}
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
                                <div class=" d-flex justify-content-start">
                                    <h4>Description of Offer</h4>
                                </div>

                            </div>
                            <div class="card-body">
                                <div class="imgs-multiple">
                                    {{ $offer->offer_description }}
                                </div>
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
    @include('includes.admin.scripts.create-script', ['redirectUrl' => request()->url()])
@endsection
