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
                                        <h1 class="count-products">( 1 )</h1>
                                        <br>
                                        <div class="row">
                                            <div class="form-group col-md-4">
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
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Select Categories *</label>
                                                <select name="category[0][]" class="form-control" multiple="multiple"
                                                    id="">
                                                    @foreach ($categories as $key => $category)
                                                        <option value="{{ $key }}" class="form-control">
                                                            {{ $category }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Product Name *</label>
                                                <input type="text" class="form-control" name="name[]" id=""
                                                    placeholder="Product name">
                                                @error('name*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Product Style Number (optional)</label>
                                                <input type="text" class="form-control" name="style_number[]" id=""
                                                    placeholder="Product name">
                                                @error('style_number*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Product ID *</label>
                                                <input type="text" class="form-control" name="p_id[]" id=""
                                                    placeholder="Product ID">
                                                @error('p_id*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Product Parent ID *</label>
                                                <input type="text" class="form-control" name="parent_id[]" id=""
                                                    placeholder="Product Parent ID">
                                                @error('parent_id*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Product Metal/Quality *</label>
                                                <input type="text" class="form-control" name="matal[]" id=""
                                                    placeholder="Karats / Stailess Steel etc. ">
                                                @error('matal*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Product Stone Type (optional) </label>
                                                <input type="text" class="form-control" name="stone_type[]" id=""
                                                    placeholder="Diamond/Emerald etc.">
                                                @error('stone_type*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Product Stone Shape (optional) </label>
                                                <input type="text" class="form-control" name="stone_shape[]" id=""
                                                    placeholder="Round/Oval etc.">
                                                @error('stone_shape*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Product Stone Count (optional) </label>
                                                <input type="text" class="form-control priceInput[]" name="stone_count[]" id=""
                                                    placeholder="numbers of stones in product">
                                                    <span class="text-danger priceError[]" id="priceError"></span>
                                                @error('stone_count*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Product Stone Size (optional) </label>
                                                <input type="text" class="form-control priceInput[]" name="stone_size[]" id=""
                                                    placeholder="in mm">
                                                    <span class="text-danger priceError[]" id="priceError"></span>
                                                @error('stone_size*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Product Stone Weight (optional) </label>
                                                <input type="text" class="form-control priceInput[]" name="stone_weight[]" id=""
                                                    placeholder="in mg">
                                                    <span class="text-danger priceError[]" id="priceError"></span>
                                                @error('stone_weight*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Product Search Keyword (optional) </label>
                                                <input type="text" class="form-control" name="search_keyword[]" id=""
                                                    placeholder="....">
                                                @error('search_keyword*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Product Price *</label>
                                                <input type="text" class="form-control priceInput[]" name="price[]"
                                                    placeholder="Enter price">

                                                <span class="text-danger priceError[]" id="priceError"></span>

                                                @error('price*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Product Wholesale Price *</label>
                                                <input type="text" class="form-control priceInput[]" name="wholesale_price[]"
                                                    placeholder="Enter wholesale_price">

                                                <span class="text-danger priceError[]" id="priceError"></span>

                                                @error('wholesale_price*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Product Override Retail Price (optional)</label>
                                                <input type="text" class="form-control priceInput[]" name="override_retail_price[]"
                                                    placeholder="Enter override_retail_price">
                                                <span class="text-danger priceError[]" id="priceError"></span>
                                                @error('override_retail_price*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="exampleInputPassword1">Product Description *</label>
                                                <textarea type="text" class="form-control" name="description[]" id="" placeholder="Enter description"></textarea>
                                                @error('description*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="exampleInputPassword1">Product Short Description *</label>
                                                <textarea type="text" class="form-control" name="short_description[]" id=""
                                                    placeholder="Enter short description"></textarea>
                                                @error('short_description*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="exampleInputFile">Insert Featured Image *</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="featured_image[]"
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
                                                        <input type="file" name="images[0][]" class="custom-file-input"
                                                            id="exampleInputFile" multiple>
                                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                                            files</label>
                                                    </div>
                                                </div>
                                                @error('images*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="exampleInputPassword1">Discount On Product *</label>
                                                <input type="text" class="form-control priceInput[]" name="discount[]"
                                                    placeholder="Enter discount price or percent" min="0">
                                                <span class="text-danger priceError[]" id="priceError"></span>
                                                <div class="form-check form-check-inline mt-2">
                                                    <input type="checkbox" class="form-check-input" name="is_percent[]"
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
                                            <div class="form-group col-md-3">
                                                <label for="">Product Weight *</label>
                                                <input type="text" class="form-control priceInput[]" name="weight[]"
                                                    placeholder="Enter Wegiht in g">
                                                <span class="text-danger priceError[]"></span>
                                                @error('weight*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="">Product Length (optional)</label>
                                                <input type="text" class="form-control priceInput[]" name="length[]"
                                                    placeholder="Enter Length in cm">
                                                <span class="text-danger priceError[]"></span>
                                                @error('length*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="">Product Height (optional)</label>
                                                <input type="text" class="form-control priceInput[]" name="height[]"
                                                    placeholder="Enter Height in cm">
                                                <span class="text-danger priceError[]"></span>
                                                @error('height*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="">Product Width (optional)</label>
                                                <input type="text" class="form-control priceInput[]" name="width[]"
                                                    placeholder="Enter Width in cm">
                                                <span class="text-danger priceError[]"></span>
                                                @error('width*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="">Product Radius (optional)</label>
                                                <input type="text" class="form-control priceInput[]" name="radius[]"
                                                    placeholder="Enter radius in cm">
                                                <span class="text-danger priceError[]"></span>
                                                @error('radius*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <hr>
                                        <h3>Attribute Variants</h3>
                                        <div class="attribute-variants row mt-5">
                                            <div class="form-group col-md-3">
                                                <label for="">Select Attribute *</label>
                                                <select name="attribute[0][]" class="form-control showattribute">
                                                    <option class="form-control" selected disabled>None</option>
                                                    @foreach ($attributes as $key => $attr)
                                                        <option value="{{ $attr->id }}" class="form-control">
                                                            {{ $attr->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('attribute*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="">Select Variants *</label>
                                                <select name="variant[0][]" class="form-control showVariants" >
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
                                                    name="add_on_price[0][]" placeholder="Enter price">
                                                <span class="text-danger priceError[]"></span>
                                                @error('add_on_price*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="">Product Quantity *</label>
                                                <input type="number" class="form-control" name="quantity[0][]"
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
                                        </div>
                                        <div
                                            class="form-group col-md-12 d-flex align-items-center gap-20 justify-content-end mt-5">

                                            <h5>Add Attribute-Variants</h5>
                                            <a href="javascript:void(0)" class="btn btn-success btn-md add-attribute"><i
                                                    class="fas fa-plus"></i></a>

                                        </div>
                                    </div>
                                    <div class="card-footer d-flex gap-20">
                                        <a href="javascript:void(0)" class="btn btn-success btn-md add-more-products"><i
                                                class="fas fa-plus"></i></a>
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
            // $('.select213').select2();
            $('#select1').select2();

            var productIndex = 0;
            $(document).on("click", ".add-more-products", function(e) {
                e.preventDefault();
                productIndex++;
                let count = $(".count-products");

                count.html(`<h1 class="count-products" >( ${productIndex + 1} )</h1>`);
                let newDiv = $(".card-body").first().clone(true); // Clones with events and data
                newDiv.find('select[name^="category"]').attr('name',
                    `category[${productIndex}][]`);
                newDiv.find('select[name^="attribute"]').attr('name',
                    `attribute[${productIndex}][]`);
                newDiv.find('select[name^="variant"]').attr('name',
                    `variant[${productIndex}][]`);
                newDiv.find('input[name^="images"]').attr('name', `images[${productIndex}][]`);
                newDiv.find('input[name^="add_on_price"]').attr('name',
                    `add_on_price[${productIndex}][]`);
                newDiv.find('input[name^="quantity"]').attr('name',
                    `quantity[${productIndex}][]`);
                $(".card-body").last().after(newDiv);

                // Rebind change event for attribute selection
                bindAttributeChange(productIndex);
            });

            function bindAttributeChange(index) {
                $(document).on("change", `select[name='attribute[${index}][]']`, function() {
                    let varElement = $(this).closest('.attribute-variants').find(
                        `select[name='variant[${index}][]']`).first();
                    let attribute = $(this).val();
                    console.log(attribute);
                    $.ajax({
                        type: 'GET',
                        url: "{{ route('admin.get.variant','') }}/" + attribute,
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


            // var productIndex = 0;
            // $(document).on("click", ".add-more-products", function(e) {
            //     e.preventDefault();
            //     productIndex++;

            //     let newDiv = $(".card-body").first().clone(true); // Clones with events and data
            //     newDiv.find('select[name="category[0][]"]').attr('name', `category[${productIndex}][]`);
            //     newDiv.find('select[name="attribute[0][]"]').attr('name', `attribute[${productIndex}][]`);
            //     newDiv.find('select[name="variant[0][]"]').attr('name', `variant[${productIndex}][]`);
            //     $(".card-body").last().after(newDiv);
            // });

            // $(document).on("change", `select[name='attribute[${productIndex}][]']`, function() {
            //     console.log(productIndex);
            //     let varElement = $(this).closest('.attribute-variants').find(
            //         `select[name='variant[${productIndex}][]']`).first();
            //     console.log(varElement);
            //     let attribute = $(this).val();
            //     $.ajax({
            //         type: 'GET',
            //         url: '/admin/get-variants/' + attribute,
            //         dataType: "json",
            //         success: function(response) {
            //             let optElem = '';
            //             // console.log(response.variants);
            //             $.each(response.variants, function(key, val) {
            //                 optElem +=
            //                     `<option value="${val.id}" class="form-control" > ${val.name} </option>`
            //             });
            //             varElement.html(optElem);
            //         }
            //     })
            // });


            $(document).on("click", ".add-attribute", function(e) {
                e.preventDefault();
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
