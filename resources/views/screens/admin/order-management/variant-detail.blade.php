@extends('layouts.admin.app')
@section('content')
    <div class="content-wrapper" style="min-height: 1302.12px;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        {{-- @dd($order->orderProducts) --}}
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
                                <div class="col-sm-12 d-flex justify-content-end">
                                    <a href="{{ route('admin.order.details',$order->id) }}" class="btn btn-primary">Back</a>
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
                                                PRODUCT VARIANT NAME</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                PRODUCT VARIANT PRICES</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                QUANTITY</th>
                                            {{-- <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                Actions
                                            </th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($order->orderProducts as $orderProduct)
                                            <tr class="odd">
                                                <td class="dtr-control sorting_1" tabindex="0">
                                                    <img src="{{ $orderProduct?->product->getFirstMediaUrl('product-featured-image') }}"
                                                        alt="">
                                                </td>
                                                <td class="dtr-control sorting_1" tabindex="1">
                                                    {{ $orderProduct->product->name }}

                                                </td>
                                                <td class="dtr-control sorting_1" tabindex="1">
                                                    @foreach ($orderProduct->variants as $variant)
                                                        {{ $variant->name ?? '' }} ,
                                                    @endforeach
                                                </td>
                                                <td class="dtr-control sorting_1" tabindex="1">
                                                    @foreach ($orderProduct->product->variants as $var)
                                                        @foreach ($orderProduct->variants as $variant)
                                                            @if ($variant->id == $var->id)
                                                                {{ $var->pivot->add_on_price ?? '' }} ,
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </td>
                                                <td class="dtr-control sorting_1" tabindex="1">
                                                    {{ $orderProduct->quantity }}

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
