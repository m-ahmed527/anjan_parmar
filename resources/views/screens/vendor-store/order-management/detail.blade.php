@extends('layouts.admin.app')
@section('content')
    <div class="content-wrapper" style="min-height: 1302.12px;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $order->name }} Order Details</h1>
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
                                                NAME</th>
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

                                            {{-- <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                Actions
                                            </th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd">

                                            <td class="dtr-control sorting_1" tabindex="0">
                                                {{ $order->name }}
                                            </td>
                                            <td class="dtr-control sorting_1" tabindex="1">
                                                {{ $order->last_name ?? '' }}
                                            </td>
                                            <td class="dtr-control sorting_1" tabindex="1">
                                                {{ $order->email }}

                                            </td>
                                            <td class="dtr-control sorting_1" tabindex="1">
                                                {{ $order->phone }}

                                            </td>

                                            {{-- <td class="d-flex gap-20">
                                                <a href="{{ route('admin.product.edit', $order->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <form action="{{ route('admin.product.delete', $order->id) }}"
                                                    onclick="return confirm('Are you sure?');" method="POST">
                                                    @csrf
                                                    <button class="btn btn-danger">Delete</button>
                                                </form>
                                                <a href="{{ route('admin.order.variant.detail', $order->id) }}"
                                                    class="btn btn-secondary">Details</a>
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
                                                STREET
                                            </th>
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

                                            {{-- <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                Actions
                                            </th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd">

                                            <td>
                                                {{ $order->address }}
                                            </td>
                                            <td>
                                                {{ $order->street_appartment }}
                                            </td>
                                            <td>
                                                {{ $order->country }}
                                            </td>
                                            <td>
                                                {{ $order->city }}
                                            </td>
                                            <td>
                                                {{ $order->state }}
                                            </td>
                                            <td>
                                                {{ $order->zip }}
                                            </td>

                                            {{-- <td class="d-flex gap-20">
                                                <a href="{{ route('admin.product.edit', $order->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <form action="{{ route('admin.product.delete', $order->id) }}"
                                                    onclick="return confirm('Are you sure?');" method="POST">
                                                    @csrf
                                                    <button class="btn btn-danger">Delete</button>
                                                </form>
                                                <a href="{{ route('admin.order.variant.detail', $order->id) }}"
                                                    class="btn btn-secondary">Details</a>
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
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-10">
                        <div class="card">
                            <div class="card-header">
                                <div class="row d-flex justify-content-space-between">
                                    <div class="col-sm-8 ">
                                        <h2> Products </h2>
                                    </div>
                                    <div class="col-sm-4 ">
                                        <div class="row d-flex justify-content-space-between align-items-center">
                                            <div class="col-md-8">
                                                <label for="">Ordered Products Variant Details</label>

                                            </div>
                                            <div class="col-md-3 d-flex justify-content-end">
                                                <a href="{{ route('admin.order.variant.detail', $order->id) }}"
                                                    class="btn btn-secondary">Details</a>
                                            </div>
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
                                                PRODUCT</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                PRODUCT NAME</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                PRODUCT WEIGHT</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                PRODUCT HEIGHT</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                PRODUCT WIDTH</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                PRODUCT LENGTH
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                PRODUCT RADIUS
                                            </th>
                                            {{-- <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                Actions
                                            </th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($order->products as $product)
                                            <tr class="odd">
                                                <td class="dtr-control sorting_1" tabindex="0">
                                                    <img src="{{ $product?->getFirstMediaUrl('product-featured-image') }}"
                                                        alt="">
                                                </td>
                                                <td class="dtr-control sorting_1" tabindex="1">
                                                    {{ $product->name ?? '' }}
                                                </td>
                                                <td class="dtr-control sorting_1" tabindex="1">
                                                    {{ $product->weight }}

                                                </td>
                                                <td class="dtr-control sorting_1" tabindex="1">
                                                    {{ $product->height }}

                                                </td>
                                                <td>
                                                    {{ $product->width }}
                                                </td>
                                                <td>
                                                    {{ $product->length }}
                                                </td>
                                                <td>
                                                    {{ $product->radius }}
                                                </td>
                                                {{--<td class="d-flex gap-20">
                                                     <a href="{{ route('admin.product.edit', $order->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                     <form action="{{ route('admin.product.delete', $order->id) }}"
                                                    onclick="return confirm('Are you sure?');" method="POST">
                                                    @csrf
                                                    <button class="btn btn-danger">Delete</button>
                                                </form>

                                                </td>--}}
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
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

        $(document).ready(function() {
            $(document).on("click", "#status", function(e) {
                e.preventDefault()
                var slug = $(this).data("slug");
                var element = $(this);
                var status = $(this).data("status");

                console.log(element);
                if (confirm('Are you sure?')) {
                    $.ajax({
                        method: "GET",
                        url: "/admin/category-status/change/" + slug,
                        data: {
                            status: status
                        },
                        success: function(response) {
                            if (response.status) {
                                // Update the status attribute in the DOM element
                                element.data("status", response.status);

                                // Update the displayed text or perform any other DOM updates as needed
                                var newText = response.status === 'Active' ? 'Active' :
                                    'Inactive';
                                element.html(newText);
                            }

                        },
                    });
                }
            })
        })
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
