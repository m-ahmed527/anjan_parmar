@extends('layouts.admin.app')
@push('styles')
@endpush
@section('content')
    <div class="content-wrapper" style="">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create New User</h1>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-10">
                            <div class="card card-primary">
                                {{-- <div class="card-header">
                                    <h3 class="card-title">Quick Example</h3>
                                </div> --}}
                                <form action="{{ route('admin.create.user') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputFile">Insert User Image (optional)</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="avatar"
                                                            class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                                </div>
                                                @error('avatar')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">User Name *</label>
                                                <input type="text" class="form-control" name="name" id=""
                                                    placeholder="Enter First Name">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">User Last Name (optional)</label>
                                                <input type="text" class="form-control" name="last_name" id=""
                                                    placeholder="Enter Last Name">
                                                @error('last_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">User Company Name (optional)</label>
                                                <input type="text" class="form-control" name="company_name" id="" placeholder="Enter Company Name">
                                                @error('company_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">User Email </label>
                                                <input type="email" class="form-control" name="email" id=""
                                                    placeholder="Enter Email">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">User Phone (optional)</label>
                                                <input type="text" class="form-control" name="phone" placeholder="Enter phone number">
                                                @error('phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">User Address (optional)</label>
                                                <input type="text" class="form-control" name="address" placeholder="Enter Address">
                                                @error('address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Street/Appartment (optional)</label>
                                                <input type="text" class="form-control" name="street_appartment" placeholder="Enter street_appartment">
                                                @error('street_appartment')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Country (optional)</label>
                                                <input type="text" class="form-control" name="country" placeholder="Enter country">
                                                @error('country')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">City (optional)</label>
                                                <input type="text" class="form-control" name="city" placeholder="Enter city">
                                                @error('city')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">State (optional)</label>
                                                <input type="text" class="form-control" name="state" placeholder="Enter state">
                                                @error('state')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">zip (optional)</label>
                                                <input type="text" class="form-control" name="zip" placeholder="Enter zip">
                                                @error('zip')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <hr>
                                        <h3>Create Password</h3>

                                        <div class="attribute-variants row mt-5">
                                            <div class="form-group col-md-4">
                                                <label for="">Password *</label>
                                                <input type="password" class="form-control" name="password" placeholder="Enter Password">
                                                @error('password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="">Confirm Password *</label>
                                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                                                @error('password_confirmation')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex gap-20">
                                        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back</a>
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
