@extends('layouts.admin.app')
@push('styles')
@endpush
@section('content')
    <div class="content-wrapper" style="">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit </h1>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-10">
                            <div class="card card-primary">
                                <form action="{{ route('admin.shipping.charges.update',$shippingCharge->id) }}" method="POST" >
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Flat Rate </label>
                                                <input type="text" class="form-control" name="flat_rate" value="{{ $shippingCharge->flat_rate ?? ''}}" placeholder="Enter Flat Rate">
                                                @error('flat_rate')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Others</label>
                                                <input type="checkbox" class="form-control" name="others" {{ $shippingCharge->others == 1 ? 'checked' : '' }}>
                                                @error('others')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer d-flex gap-20">
                                        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back</a>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
            </section>
        </section>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });

        $(document).ready(function() {
            //Initialize Select2 Elements
            // $('.select213').select2();
            $('.select1').select2();

            $(document).on("change", "select[name='attribute[]']", function() {
                let varElement = $(this).closest('.attribute-variants').find("select[name='variant[]']")
                    .first();
                console.log(varElement);
                let attribute = $(this).val();
                $.ajax({
                    type: 'GET',
                    url: '/admin/get-variants/' + attribute,
                    dataType: "json",
                    success: function(response) {
                        let optElem = '';
                        // console.log(response.variants);
                        $.each(response.variants, function(key, val) {
                            optElem +=
                                `<option value="${val.id}" class="form-control" > ${val.name} </option>`
                        });
                        varElement.html(optElem);
                    }
                })
            });

            $(document).on("click", ".add-attribute", function(e) {
                e.preventDefault();
                // $(".select213").select2('destroy')
                // Clone the parent element
                let parentContainer = $(this).closest(".card-body");
                let parentElem = parentContainer.find(".attribute-variants").last()
                // Create a new element and append it to the parent
                let newElem = parentElem.clone();
                parentElem.after(newElem);

                // Reset input values
                newElem.find("input").val("");
                newElem.find('input[name="is_percent[]"]').prop('checked', false);
                newElem.find("select[name='attribute[]']").val("None");
                newElem.find("select[name='variant[]']").html(null);

                // console.log(newHtml);
                // $(".select213").select2();
                // console.log(newElem[0]);
            });

            $(document).on("click", ".remove-attribute", function(e) {

                e.preventDefault();
                let parentContainer = $(this).closest(".attribute-variants");
                let allElem = $(".attribute-variants");
                if (allElem.length > 1) {
                    let lastElem = parentContainer.last();
                    lastElem.remove();
                } else {
                    if (!parentContainer.find('.text-danger').length) {
                        parentContainer.append(
                            '<span class="text-danger"> At least one Attribute Variant is required </span>'
                        );
                    }
                }
            });
        });
    </script>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush
