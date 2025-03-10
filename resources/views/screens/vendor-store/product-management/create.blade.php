@extends('layouts.vendor-store.app')
@push('styles')
@endpush

@section('title', 'Create Product')

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
                                <form action="{{ route('vendor.products.store') }}" method="POST"
                                    enctype="multipart/form-data" id="create-form">
                                    @csrf
                                    <div class="card-body">
                                        <br>
                                        <div class="row">

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

                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Product Name *</label>
                                                <input type="text" class="form-control" name="name" id="product_name"
                                                    placeholder="Product name">

                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Product Search Keyword (optional)
                                                </label>
                                                <input type="text" class="form-control" name="search_keyword"
                                                    id="" placeholder="....">

                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Product Price*</label>
                                                <input type="text" class="form-control priceInput[]" name="price"
                                                    placeholder="Enter price">

                                                <span class="text-danger priceError[]" id="priceError"></span>


                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Discount On Product (optional)</label>
                                                <input type="text" class="form-control priceInput[]" name="discount"
                                                    placeholder="Enter discount price or percent" min="0">
                                                <span class="text-danger priceError[]" id="priceError"></span>
                                                <div class="form-check form-check-inline mt-2">
                                                    <input type="checkbox" class="form-check-input" name="is_percent"
                                                        id="is_percent">
                                                    <label for="is_percent" class="form-check-label">Check if discount is
                                                        in %</label>


                                                </div>

                                            </div>

                                            <div class="form-group col-md-12">
                                                <label for="exampleInputPassword1">Product Description *</label>
                                                <textarea type="text" class="form-control" name="description" id="" placeholder="Enter description"></textarea>

                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="exampleInputPassword1">Product Long Description *</label>
                                                <textarea type="text" class="form-control" name="long_description" id=""
                                                    placeholder="Enter short description"></textarea>

                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="exampleInputFile">Insert Featured Image *</label>
                                                <div class="input-group featured-image-ka-div">
                                                    <div class="custom-file">
                                                        <input type="file" name="featured_image"
                                                            class="custom-file-input" id="exampleInputFile"
                                                            accept="image/*">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                                            file</label>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputFile">Insert Multiple Images (optional)</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="images[]" class="custom-file-input"
                                                            id="exampleInputFile" multiple accept="image/*">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                                            files</label>
                                                    </div>
                                                </div>

                                            </div>


                                        </div>
                                        <hr>
                                        <h3>Select Category for Attribute</h3>
                                        <div class="attribute-variants-ka-parent">
                                            <div class="row attribute-variants">

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
                                        <a href="{{ route('vendor.products.index') }}" class="btn btn-secondary">Back</a>
                                        <button type="button" class="btn btn-primary" id="create-btn">Submit</button>
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
    @include('includes.vendor-store.scripts.create-script', [
        'redirectUrl' => route('vendor.dashboard.index'),
    ])
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

                if (categorySlug) {
                    $(".attribute-variants").remove();
                    $(".attribute-variants-ka-parent").append(
                        '<div class="row attribute-variants"></div>'); // Add it back

                    $.ajax({
                        url: "{{ route('vendor.products.get.attributes', '') }}/" + categorySlug,
                        type: "GET",

                        success: function(response) {

                            if (response.success) {
                                $(".attribute-variants").html(response.html);
                                $("#add-attribute-section")
                                    .css('display',
                                        'block'); // Show Add button when new attributes load

                            } else {
                                $("#add-attribute-section")
                                    .css('display',
                                        'none'); // Hide Add button if no attributes available
                            }
                        }
                    });
                }
            });







            $(document).on("click", ".remove-attribute", function(e) {
                e.preventDefault();
                console.log($(".attribute-variants").length);

                if ($(".attribute-variants").length > 1) {

                    $(this).closest(".attribute-variants").remove(); // Remove the variant row
                    if ($(".attribute-variants").length == 1) {
                        $(".remove-attribute").addClass('d-none')
                    }
                } else {
                    alert("Cannot remove the last attribute variant");
                }
                console.log($(".attribute-variants").length);

            });

            $(document).on("click", ".add-attribute", function(e) {
                e.preventDefault();

                let parentContainer = $(this).closest(".card-body");
                let lastElem = parentContainer.find(".attribute-variants").last();
                console.log(parentContainer, lastElem);

                // Clone the last element
                let newElem = lastElem.clone();

                // Reset input values inside the cloned element
                newElem.find("input, select").each(function() {
                    $(this).val(""); // Reset input/select values
                });
                // Ensure newElem is properly added after the last one
                lastElem.after(newElem);
                console.log($(".attribute-variants").length);
                if ($(".attribute-variants").length > 1) {
                    $(".remove-attribute").removeClass('d-none')
                }

            });

        });
    </script>
    <script>
        // Real-time validation for variant_price and quantity fields with error messages
    </script>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
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
