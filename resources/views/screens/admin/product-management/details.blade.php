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
                        <h1>{{ $product->name }} Details</h1>
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
                                <div class=" d-flex justify-content-end">
                                    <a href="{{ route('admin.product.index') }}" class="btn btn-primary">Back</a>
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
                                                Featured Image
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                Base Price
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                Category
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                Attribute
                                            </th>

                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                Addon Price
                                            </th>

                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                Quantity
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                ACTIONS
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr class="odd">
                                            <td>
                                                <div class="featured-image">
                                                    @if ($product->getFirstMediaUrl('featured_image'))
                                                        <img src="{{ $product->getFirstMediaUrl('featured_image') }}"
                                                            alt="{{ $product->name }}"
                                                            style="max-width: 100px; max-height: 100px;">
                                                    @else
                                                        No Image Found
                                                    @endif
                                                </div>
                                            </td>
                                            <td>{{ $product->price }}</td>
                                            <td>
                                                {{ $product->category->name }}
                                            </td>
                                            <td>
                                                @forelse ($product->variants as  $attribute)
                                                    {{ $loop->iteration }} -
                                                    @foreach (json_decode($attribute['attributes'], true) as $key => $attr)
                                                        {{ $key }} ->{{ $attr }} ,
                                                    @endforeach
                                                    <br>
                                                @empty
                                                    No Attribute Found
                                                @endforelse
                                            </td>

                                            <td>
                                                @forelse ($product->variants as $attribute)
                                                    ${{ $attribute->variant_price }} <br>
                                                @empty
                                                    No Addon Price Found
                                                @endforelse
                                            </td>
                                            <td>
                                                @forelse ($product->variants as  $attribute)
                                                    {{ $attribute->quantity }}<br>
                                                @empty
                                                    No Quantity Found
                                                @endforelse
                                            </td>

                                            <td>
                                                <a href="{{ route('admin.product.edit', $product->slug) }}"
                                                    class="btn btn-primary">Edit</a>
                                                {{-- <a href="#" data-id="{{ $product->slug }}"
                                                    class="delete btn btn-danger ">Delete</a> --}}
                                            </td>
                                        </tr>
                                    </tbody>
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

        <section class="content">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <div class=" d-flex justify-content-start">
                                    <h4>Description</h4>
                                </div>

                            </div>
                            <div class="card-body">
                                <div class="imgs-multiple">
                                    {{ $product->description }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <div class=" d-flex justify-content-start">
                                    <h4>Long Description</h4>
                                </div>

                            </div>
                            <div class="card-body">
                                <div class="imgs-multiple">
                                    {{ $product->long_description }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <div class=" d-flex justify-content-start">
                                    <h4>All Images</h4>
                                </div>

                            </div>
                            <div class="card-body">
                                <div class="imgs-multiple">
                                    @forelse ($product->getMediaCollectionUrl('multiple_images') as $image)
                                        {{-- @dd($product->getMediaCollectionUrl('multiple_images')) --}}
                                        <img src="{{ $image }}" alt=""
                                            style="max-width: 150px; max-height: 150px;">
                                    @empty
                                        No Image Found
                                    @endforelse
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


        });
    @endsection
