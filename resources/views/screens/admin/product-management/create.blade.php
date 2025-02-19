@extends('layouts.admin.app')
@push('styles')
@endpush
@section('content')
    <div class="content-wrapper" style="">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Product</h1>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-11">
                            <div class="card card-primary">
                                <form action="{{ route('admin.product.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <br>
                                        <div class="row">
                                            {{-- <div class="form-group col-md-4">
                                                <label for="">Select Brand (Optional) </label>
                                                <select name="brand[]" class="form-control" id="">
                                                    <option value="" class="form-control" selected disabled>Select
                                                        brand</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}" class="form-control">
                                                            {{ $brand->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('brand*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div> --}}
                                            <div class="form-group col-md-4">
                                                <label for="">Select Categories *</label>
                                                <select name="category" class="form-control category" id="">
                                                    <option value="" class="form-control" selected disabled>Select
                                                    </option>
                                                    @foreach ($categories as $key => $category)
                                                        <option value="{{ $category->slug }}" class="form-control">
                                                            {{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Product Name *</label>
                                                <input type="text" class="form-control" name="name" id=""
                                                    placeholder="Product name">
                                                @error('name*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Product Search Keyword (optional)
                                                </label>
                                                <input type="text" class="form-control" name="search_keyword"
                                                    id="" placeholder="....">
                                                @error('search_keyword*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Product Price*</label>
                                                <input type="text" class="form-control priceInput[]" name="price"
                                                    placeholder="Enter price">

                                                <span class="text-danger priceError[]" id="priceError"></span>

                                                @error('price*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Discount On Product *</label>
                                                <input type="text" class="form-control priceInput[]" name="discount"
                                                    placeholder="Enter discount price or percent" min="0">
                                                <span class="text-danger priceError[]" id="priceError"></span>
                                                <div class="form-check form-check-inline mt-2">
                                                    <input type="checkbox" class="form-check-input" name="is_percent"
                                                        id="is_percent">
                                                    <label for="is_percent" class="form-check-label">Check if discount is
                                                        in %</label>
                                                    @error('is_percent*')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                </div>
                                                @error('discount*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label for="exampleInputPassword1">Product Description *</label>
                                                <textarea type="text" class="form-control" name="description" id="" placeholder="Enter description"></textarea>
                                                @error('description*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="exampleInputPassword1">Product Long Description *</label>
                                                <textarea type="text" class="form-control" name="long_description" id=""
                                                    placeholder="Enter short description"></textarea>
                                                @error('short_description*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="exampleInputFile">Insert Featured Image *</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="featured_image"
                                                            class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                                            file</label>
                                                    </div>
                                                </div>
                                                @error('featured_image*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputFile">Insert Multiple Images (optional)</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="images[]" class="custom-file-input"
                                                            id="exampleInputFile" multiple>
                                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                                            files</label>
                                                    </div>
                                                </div>
                                                @error('images*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>


                                        </div>
                                        <hr>
                                        <h3>Select Category for Attribute</h3>
                                        <div class="parent-attribute">
                                            <div class="row attribute-variants" id="attributes-container">

                                                <!-- Attributes & Variants Will Load Here -->
                                            </div>

                                        </div>

                                        <div class="form-group col-md-12 d-flex align-items-center gap-20 justify-content-end mt-5 "
                                            id="add-attribute-section" style="display: none !important">
                                            <h5>Add Attribute-Variants</h5>
                                            <a href="javascript:void(0)" class="btn btn-success btn-md add-attribute"><i
                                                    class="fas fa-plus"></i></a>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex gap-20">
                                        {{-- <a href="javascript:void(0)" class="btn btn-success btn-md add-more-products"><i
                                                class="fas fa-plus"></i></a> --}}
                                        <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">Back</a>
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
        document.addEventListener("DOMContentLoaded", function() {
            const priceInputs = document.querySelectorAll('.priceInput\\[\\]');
            const priceErrorMessages = document.querySelectorAll('.priceError\\[\\]');

            priceInputs.forEach((input, index) => {
                input.addEventListener('input', function() {
                    const inputValue = input.value.trim();
                    const errorSpan = priceErrorMessages[index];

                    if (!/^\d*\.?\d*$/.test(inputValue)) {
                        errorSpan.textContent = 'Please enter a valid number';
                        input.value = inputValue.slice(0, -1);
                    } else {
                        errorSpan.textContent = '';
                    }
                });
            });
        });
        $(function() {
            bsCustomFileInput.init();
        });

        $(document).ready(function() {
            //Initialize Select2 Elements
            $('.category').select2();
            $('#select1').select2();


            $(".category").change(function() {
                var categorySlug = $(this).val();
                $(".attribute-variants").html(""); // Clear previous attributes
                if (categorySlug) {
                    $.ajax({
                        url: "{{ route('admin.get.attributes', '') }}/" + categorySlug,
                        type: "GET",

                        success: function(response) {

                            if (response.success) {
                                $("#attributes-container").append(response.html);
                                $("#add-attribute-section").css("display", "block");
                            } else {
                                $("#add-attribute-section").css("display", "none");
                            }
                        }
                    });
                }
            });




            var productIndex = 0;


            function bindAttributeChange(index) {
                $(document).on("change", `select[name='attribute[${index}][]']`, function() {
                    let varElement = $(this).closest('.attribute-variants').find(
                        `select[name='variant[${index}][]']`).first();
                    let attribute = $(this).val();
                    console.log(attribute);
                    $.ajax({
                        type: 'GET',
                        url: "{{ route('admin.get.variant', '') }}/" + attribute,
                        dataType: "json",
                        success: function(response) {
                            let optElem = '';
                            console.log(response)
                            $.each(response.variants, function(key, val) {
                                optElem +=
                                    `<option value="${val.id}" class="form-control">${val.name}</option>`;
                            });
                            varElement.html(optElem);
                        }
                    });
                });
            }

            // Initial binding for first set of elements
            bindAttributeChange(productIndex);







            $(document).on("click", ".add-attribute", function(e) {
                e.preventDefault();

                let parentContainer = $(this).closest(".card-body");
                let lastElem = parentContainer.find(".attribute-variants")
                    .last(); // Find the last attribute variant row

                // Clone the last element and append after it
                let newElem = lastElem.clone();

                // Reset input values inside the cloned element
                newElem.find("input, select").each(function() {
                    $(this).val(""); // Reset input/select values
                });

                // Append new element after the last one
                lastElem.after(newElem);
            });

            // $(document).on("click", ".remove-attribute", function(e) {

            //     e.preventDefault();
            //     let parentContainer = $(this).closest(".attribute-variants");
            //     let allElem = $(".attribute-variants");
            //     console.log(allElem);

            //     if (allElem.length > 1) {
            //         let lastElem = parentContainer.last();
            //         lastElem.remove();
            //     } else {
            //         if (!parentContainer.find('.text-danger').length) {
            //             parentContainer.append(
            //                 '<span class="text-danger"> At least one Attribute Variant is required </span>'
            //             );
            //         }
            //     }
            // });
            $(document).on("click", ".remove-attribute", function(e) {
                e.preventDefault();

                let allElem = $(".attribute-variants");
                let parentContainer = $(this).closest(".attribute-variants");

                if (allElem.length > 1) {
                    parentContainer.remove();
                } else {
                    // If it's the last element, show an error message
                    if (!parentContainer.find('.text-danger').length) {
                        parentContainer.append(
                            '<span class="text-danger">At least one Attribute Variant is required</span>'
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
{{-- <div class="attribute-variants row mt-5">
                                            <div class="form-group col-md-3">
                                                <label for="">Select Attribute *</label>
                                                <select name="attribute[]" class="form-control showattribute">
                                                    <option class="form-control" selected disabled>None</option>

                                                </select>
                                                @error('attribute*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="">Select Variants *</label>
                                                <select name="variant[]" class="form-control showVariants">
                                                    <option value="" class="form-control" selected disabled>Select
                                                        attribute first</option>
                                                </select>
                                                @error('variant*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="exampleInputPassword1">Addon Product Price *</label>
                                                <input type="number" class="form-control priceInput[]"
                                                    name="add_on_price[]" placeholder="Enter price">
                                                <span class="text-danger priceError[]"></span>
                                                @error('add_on_price*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="">Product Quantity *</label>
                                                <input type="number" class="form-control" name="quantity[]"
                                                    id="" placeholder="Enter quantity" min="0">
                                                @error('quantity*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12 d-flex justify-content-end">
                                                <a href="javascript:void(0)"
                                                    class="btn btn-danger btn-md remove-attribute"><i
                                                        class="fas fa-trash"></i></a>
                                            </div>
                                        </div> --}}
