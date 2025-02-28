@extends('layouts.admin.app')
@section('title', 'Category Details')

@section('content')
    <div class="content-wrapper" style="min-height: 1302.12px;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $category->name }} Category Details</h1>
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
                                    <a href="{{ route('admin.category.index') }}" class="btn btn-primary">Back</a>
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
                                                Parent Category</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                Child Category</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                Name</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                Status</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                Image
                                            </th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd">
                                            <td class="dtr-control sorting_1" tabindex="0">
                                                @if ($category->parentCategory)
                                                    {{ $category->parentCategory->name }}
                                                @else
                                                    No Parent Category Found
                                                @endif
                                            </td>
                                            <td class="dtr-control sorting_1" tabindex="1">
                                                @if ($category->childCategory)
                                                    {{ $category->childCategory->name }}
                                                @else
                                                    No Child Category Found
                                                @endif
                                            </td>
                                            <td class="dtr-control sorting_1" tabindex="1">
                                                {{ $category->name }}

                                            </td>
                                            <td class="dtr-control sorting_1" tabindex="1">

                                                <a href="#" id="status" data-slug="{{ $category->slug }}"
                                                    data-status="{{ $category->status }}">{{ $category->status }}</a>

                                            </td>
                                            <td>
                                                @if ($category->getFirstMediaUrl('category-images'))
                                                    <img src="{{ $category->getFirstMediaUrl('category-images') }} "
                                                        alt="Category Image" style="max-width: 100px; max-height: 100px;">
                                                @else
                                                    No Image Found
                                                @endif
                                            </td>
                                            <td class="d-flex gap-20">
                                                <a href="{{ route('admin.category.edit', $category->slug) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <form action="{{ route('admin.category.delete', $category->slug) }}"
                                                    onclick="return confirm('Are you sure?');" method="POST">
                                                    @csrf
                                                    <button class="btn btn-danger">Delete</button>
                                                </form>
                                                {{-- <a href="{{ route('admin.category.show', $category->slug) }}"
                                                    class="btn btn-secondary">Details</a> --}}
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
