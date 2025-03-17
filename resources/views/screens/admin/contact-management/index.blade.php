@extends('layouts.admin.app')
@push('styles')
    @include('includes.admin.data-table-css')
@endpush
@section('title', 'Contacts')

@section('content')
    <div class="content-wrapper" style="min-height: 1302.12px;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Contacts</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-9">
                        <div class="card">
                            {{-- <div class="card-header">

                                <div class=" d-flex justify-content-end">
                                    <a href="{{ route('admin.create.user') }}" class="btn btn-primary">Create New User</a>
                                </div>
                            </div> --}}
                            
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                    aria-describedby="example1_info">
                                    <thead>
                                        <tr>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                NAME
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

                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                ACTIONS
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contacts as $contact)
                                            <tr class="odd">

                                                <td>{{ $contact->name }}</td>
                                                <td>{{ $contact->email }}</td>
                                                <td>{{ $contact->phone }}</td>

                                                <td class="d-flex gap-20">
                                                    <a href="{{ route('admin.contact.detail', $contact->id) }}"
                                                        class="btn btn-info">Details</a>
                                                </td>
                                            </tr>
                                        @endforeach

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
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    @include('includes.admin.data-table-scripts')
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
    <script>
        $(document).ready(function() {
            $(document).on("change", "#status", function(e) {
                e.preventDefault();

                var id = $(this).data("id");
                var element = $(this);
                var previousStatus = element.attr("data-status"); // Get old status from attribute
                var newStatus = element.val(); // Get new selected status

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, change it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.LoadingOverlay("show");

                        $.ajax({
                            method: "GET",
                            url: "{{ route('admin.vendor.change.status', '') }}/" + id,
                            data: {
                                status: previousStatus, // Old status
                                newStatus: newStatus // New status
                            },
                            success: function(response) {
                                $.LoadingOverlay("hide");

                                if (response.success) {
                                    // ✅ Update select dropdown value
                                    element.val(newStatus);

                                    // ✅ Force update `data-status` in real-time
                                    element.attr("data-status", newStatus);

                                    Swal.fire({
                                        position: "center",
                                        icon: "success",
                                        title: "Status updated successfully!",
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                }
                            },
                            error: function(xhr, status, error) {
                                $.LoadingOverlay("hide");
                                console.log(error);

                                Swal.fire({
                                    position: "center",
                                    icon: "error",
                                    title: "Failed to update status!",
                                    showConfirmButton: true,
                                    timer: 2000
                                });

                                // ✅ Revert to previous status if update fails
                                element.val(previousStatus);
                                element.attr("data-status", previousStatus);
                            }
                        });
                    } else {
                        // ✅ If user cancels, reset dropdown to previous status
                        element.val(previousStatus);
                    }
                });
            });

            let phones = $('.phone');
            phones.each(function(index, element) {
                let phone = $(element).text();


                let newPhone = phone.trim().slice(0, 2) + ' (' + phone.trim().slice(2, 5) + ') ' + phone
                    .trim().slice(5, 8) + '-' + phone.trim().slice(8, 12);
                $(element).text(newPhone);

            })
        });
    </script>
@endsection
