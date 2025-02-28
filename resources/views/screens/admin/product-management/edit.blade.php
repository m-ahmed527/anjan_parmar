@extends('layouts.admin.app')
@push('styles')
@endpush
@section('title', 'Edit Product')

@section('content')
    <div class="content-wrapper" style="">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Product</h1>
                    </div>
                </div>
            </div>
            {{-- @dd($product->variants) --}}
            <section class="content">
                <div class="container-fluid">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-10">
                            <div class="card card-primary">
                                {{-- <div class="card-header">
                                    <h3 class="card-title">Quick Example</h3>
                                </div> --}}
                                <form action="{{ route('admin.product.update', $product->slug) }}" method="POST"
                                    enctype="multipart/form-data" id="update-form">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            {{-- @dd($product->category) --}}
                                            <div class="form-group col-md-4">
                                                <label for="">Select Categories *</label>
                                                <select name="category" class="form-control category" id="">
                                                    <option value="" class="form-control" selected disabled>Select
                                                    </option>
                                                    @foreach ($categories as $key => $category)
                                                        <option value="{{ $category->slug }}"
                                                            {{ $category->slug == $product->category->slug ? 'selected' : '' }}
                                                            class="form-control">
                                                            {{ $category->name }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Product Name *</label>
                                                <input type="text" class="form-control" name="name" id=""
                                                    placeholder="Product name" value="{{ $product->name }}">

                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Product Search Keyword (optional)
                                                </label>
                                                <input type="text" class="form-control" name="search_keyword"
                                                    id="" placeholder="...."
                                                    value="{{ $product->search_keywords }}">

                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Product Price*</label>
                                                <input type="text" class="form-control priceInput[]" name="price"
                                                    placeholder="Enter price" value="{{ $product->price }}">

                                                <span class="text-danger priceError[]" id="priceError"></span>


                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Discount On Product (optional)</label>
                                                <input type="text" class="form-control priceInput[]" name="discount"
                                                    placeholder="Enter discount price or percent" min="0"
                                                    value="{{ $product->discount }}">
                                                <span class="text-danger priceError[]" id="priceError"></span>
                                                <div class="form-check form-check-inline mt-2">
                                                    <input type="checkbox" class="form-check-input" name="is_percent"
                                                        id="is_percent"
                                                        {{ $product->discount_type == 'percent' ? 'checked' : '' }}>
                                                    <label for="is_percent" class="form-check-label">Check if discount is
                                                        in %</label>


                                                </div>

                                            </div>

                                            <div class="form-group col-md-12">
                                                <label for="exampleInputPassword1">Product Description *</label>
                                                <textarea type="text" class="form-control" name="description" id="" placeholder="Enter description">{{ $product->description }}</textarea>

                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="exampleInputPassword1">Product Long Description *</label>
                                                <textarea type="text" class="form-control" name="long_description" id=""
                                                    placeholder="Enter short description">{{ $product->long_description }} </textarea>

                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="exampleInputFile">Insert Featured Image *</label>
                                                <div class="input-group featured-image-ka-div">
                                                    <div class="custom-file">
                                                        <input type="file" name="featured_image"
                                                            class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                                            file</label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12 mt-2">
                                                    <img src="{{ $product->getFirstMediaUrl('featured_image') }}"
                                                        alt="">
                                                </div>
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
                                                <div class="form-group col-md-9 mt-2">
                                                    @forelse ($product->getMediaCollectionUrl('multiple_images') as $image)
                                                        <img src="{{ $image }}" alt=""
                                                            style="max-width: 150px; max-height: 150px;">
                                                    @empty
                                                        No Image Found
                                                    @endforelse
                                                </div>
                                            </div>


                                        </div>
                                        <hr>
                                        <h3>Attribute Variants</h3>
                                        <div class="attribute-variants-ka-parent">
                                            @foreach ($variants as $variant)
                                                @php
                                                    $selectedAttributes = json_decode($variant->attributes, true);
                                                @endphp
                                                <div class="row attribute-variants">
                                                    @foreach ($attributes as $attribute)
                                                        {{-- Attribute Dropdown --}}
                                                        <div class="form-group col-md-4">
                                                            <label>{{ $attribute['attribute']['name'] }}</label>
                                                            <select name="attributes[{{ $attribute['attribute']['slug'] }}][]" class="form-control variant-dropdown">
                                                                <option value="">Select {{ $attribute['attribute']['name'] }}</option>

                                                                @foreach ($attribute['variants'] as $variantOption)
                                                                    <option value="{{ $variantOption['slug'] }}"
                                                                        {{ isset($selectedAttributes[$attribute['attribute']['slug']]) && $selectedAttributes[$attribute['attribute']['slug']] == $variantOption['slug'] ? 'selected' : '' }}>
                                                                        {{ $variantOption['name'] }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    @endforeach

                                                    {{-- Price Field --}}
                                                    <div class="form-group col-md-4">
                                                        <label>Price</label>
                                                        <input type="number" class="form-control" name="variant_price[]" value="{{ $variant->variant_price }}">
                                                    </div>

                                                    {{-- Quantity Field --}}
                                                    <div class="form-group col-md-4">
                                                        <label>Quantity</label>
                                                        <input type="number" class="form-control" name="quantity[]" value="{{ $variant->quantity }}">
                                                    </div>

                                                    {{-- Remove Button --}}
                                                    <div class="form-group col-md-12 d-flex justify-content-end">
                                                        <a href="javascript:void(0)" class="btn btn-danger btn-md remove-attribute">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>




                                        <div
                                            class="form-group col-md-12 d-flex align-items-center gap-20 justify-content-end mt-5">

                                            <h5>Add Attribute-Variants</h5>
                                            <a href="javascript:void(0)" class="btn btn-success btn-md add-attribute"><i
                                                    class="fas fa-plus"></i></a>

                                        </div>

                                    </div>
                                    <div class="card-footer d-flex gap-20">
                                        <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">Back</a>
                                        <button type="button" class="btn btn-primary" id="update-btn">Submit</button>
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
    @include('includes.admin.scripts.update-script', ['redirectUrl' => route('admin.product.index')])
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
            // $('.category').select2();
            $('#select1').select2();


            $(".category").change(function() {
                var categorySlug = $(this).val();

                if (categorySlug) {
                    $(".attribute-variants").remove();
                    $(".attribute-variants-ka-parent").append(
                        '<div class="row attribute-variants"></div>'); // Add it back

                    $.ajax({
                        url: "{{ route('admin.get.attributes', '') }}/" + categorySlug,
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
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush
{{-- <div class="form-group col-md-3">
                                                <label for="exampleInputFile">Insert Featured Image *</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="featured_image"
                                                            class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                                            file</label>
                                                    </div>
                                                </div>
                                                @error('featured_image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <div class="form-group col-md-12 mt-2">
                                                    <img src="{{ $product->getFirstMediaUrl('product-featured-image') }}"
                                                        alt="">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-9">
                                                <label for="exampleInputFile">Insert Multiple Images</label>
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
                                                <div class="form-group col-md-9 mt-2">
                                                    @forelse ($product->getMedia('product-images') as $image)
                                                        <img src="{{ $image->getUrl() }}" alt=""
                                                            style="max-width: 200px; max-height: 200px;">
                                                    @empty
                                                        No Image Found
                                                    @endforelse
                                                </div>

                                            </div> --}}
