@extends('layouts.admin.app')
@push('styles')
@endpush
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
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="">Select Brand (Optional) </label>
                                                <select name="brand" class="form-control" id="">
                                                    <option value="" class="form-control" selected disabled>Select
                                                        brand</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}" class="form-control">
                                                            {{ $brand->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Select Categories *</label>
                                                <select name="category[]" class="form-control select1" multiple="multiple"
                                                    id="">
                                                    @foreach ($categories as $key => $category)
                                                        <option value="{{ $key }}" class="form-control"
                                                            {{ $product->categories->contains($key) ? 'selected' : '' }}>
                                                            {{ $category }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category*')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Product Name *</label>
                                                <input type="text" class="form-control" name="name"
                                                    placeholder="Product name" value="{{ $product->name }}">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Product Style Number (optional)</label>
                                                <input type="text" class="form-control" name="style_number"
                                                    value="{{ $product->style_number ?? '--' }}"
                                                    placeholder="Product name">
                                                @error('style_number')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Product ID *</label>
                                                <input type="text" class="form-control" name="p_id"
                                                    value="{{ $product->p_id ?? '--' }}" placeholder="Product ID">
                                                @error('p_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Product Parent ID *</label>
                                                <input type="text" class="form-control" name="parent_id"
                                                    value="{{ $product->parent_id ?? '--' }}"
                                                    placeholder="Product Parent ID">
                                                @error('parent_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Product Metal/Quality *</label>
                                                <input type="text" class="form-control" name="matal"
                                                    value="{{ $product->matal ?? '--' }}"
                                                    placeholder="Karats / Stailess Steel etc. ">
                                                @error('matal')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Product Stone Type (optional) </label>
                                                <input type="text" class="form-control" name="stone_type"
                                                    value="{{ $product->stone_type ?? '--' }}"
                                                    placeholder="Diamond/Emerald etc.">
                                                @error('stone_type')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Product Stone Shape (optional) </label>
                                                <input type="text" class="form-control" name="stone_shape"
                                                    value="{{ $product->stone_shape ?? '--' }}"
                                                    placeholder="Round/Oval etc.">
                                                @error('stone_shape')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Product Stone Count (optional) </label>
                                                <input type="text" class="form-control priceInput[]" name="stone_count"
                                                    value="{{ $product->stone_count ?? '--' }}"
                                                    placeholder="numbers of stones in product">
                                                <span class="text-danger priceError[]" id="priceError"></span>
                                                @error('stone_count')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Product Stone Size (optional) </label>
                                                <input type="text" class="form-control priceInput[]"
                                                    name="stone_size" value="{{ $product->stone_size ?? '--' }}"
                                                    placeholder="in mm">
                                                <span class="text-danger priceError[]" id="priceError"></span>
                                                @error('stone_size')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Product Stone Weight (optional) </label>
                                                <input type="text" class="form-control priceInput[]"
                                                    name="stone_weight" value="{{ $product->stone_weight ?? '--' }}"
                                                    placeholder="in mg">
                                                <span class="text-danger priceError[]" id="priceError"></span>
                                                @error('stone_weight')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Product Search Keyword (optional)
                                                </label>
                                                <input type="text" class="form-control" name="search_keyword"
                                                    value="{{ $product->search_keywords ?? '--' }}" placeholder="....">
                                                @error('search_keyword')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Product Price *</label>
                                                <input type="text" class="form-control" name="price"
                                                    id="priceInput" value="{{ $product->price }}"
                                                    placeholder="Enter price">
                                                <span class="text-danger" id="priceError"></span>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Product Wholesale Price *</label>
                                                <input type="text" class="form-control priceInput[]"
                                                    name="wholesale_price"
                                                    value="{{ $product->wholesale_price ?? '--' }}"
                                                    placeholder="Enter wholesale_price">

                                                <span class="text-danger priceError[]" id="priceError"></span>

                                                @error('wholesale_price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputPassword1">Product Override Retail Price
                                                    (optional)</label>
                                                <input type="text" class="form-control priceInput[]"
                                                    name="override_retail_price"
                                                    value="{{ $product->override_retail_price ?? '--' }}"
                                                    placeholder="Enter override_retail_price">
                                                <span class="text-danger priceError[]" id="priceError"></span>
                                                @error('override_retail_price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="exampleInputPassword1">Product Description *</label>
                                                <textarea type="text" class="form-control" name="description" id="" placeholder="Enter description">{{ $product->description }}</textarea>
                                                @error('description')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="exampleInputPassword1">Product Short Description *</label>
                                                <textarea type="text" class="form-control" name="short_description" id=""
                                                    placeholder="Enter short description">{{ $product->short_description }}</textarea>
                                                @error('short_description')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3">
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

                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="exampleInputPassword1">Discount On Product *</label>
                                                <input type="number" class="form-control" name="discount"
                                                    id="" value="{{ $product->discount }}"
                                                    placeholder="Enter discount price or percent" min="0">
                                                <div class="form-check form-check-inline mt-2">
                                                    <input type="checkbox" class="form-check-input" name="is_percent"
                                                        id="is_percent"
                                                        {{ $product->discount_type == 'percent' ? 'checked' : '' }}>
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
                                                <input type="number" class="form-control" name="weight"
                                                    value="{{ $product->weight }}" placeholder="Enter Wegiht in g">
                                                @error('weight')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="">Product Length (optional)</label>
                                                <input type="number" class="form-control" name="length"
                                                    value="{{ $product->length }}" placeholder="Enter Length in cm">
                                                @error('length')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="">Product Height (optional)</label>
                                                <input type="number" class="form-control" name="height"
                                                    value="{{ $product->height }}" placeholder="Enter Height in cm">
                                                @error('height')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="">Product Width (optional)</label>
                                                <input type="number" class="form-control" name="width"
                                                    value="{{ $product->width }}" placeholder="Enter Width in cm">
                                                @error('width')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="">Product Radius (optional)</label>
                                                <input type="number" class="form-control" name="radius"
                                                    value="{{ $product->radius }}" placeholder="Enter radius in cm">
                                                @error('radius')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <hr>
                                        <h3>Attribute Variants</h3>
                                        @foreach ($product->variants as $k => $variant)
                                            <div class="attribute-variants row mt-5">
                                                <div class="form-group col-md-3">
                                                    <label for="">Select Attribute *</label>
                                                    <select name="attribute[]" class="form-control showattribute"
                                                        id="">
                                                        <option class="form-control" selected disabled>None</option>
                                                        @foreach ($attributes as $key => $attr)
                                                            <option value="{{ $attr->id }}"
                                                                {{ $variant->attribute_id == $attr->id ? 'selected' : '' }}
                                                                class="form-control">
                                                                {{ $attr->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('attribute*')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="">Select Variants *</label>
                                                    <select name="variant[]" class="form-control showVariants"
                                                        id="">
                                                        @foreach ($variants as $var)
                                                            @if ($var->attribute_id == $variant->attribute_id)
                                                                <option value="{{ $var->id }}"
                                                                    {{ $var->id == $variant->id ? 'selected' : '' }}>
                                                                    {{ $var->name }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    @error('variant*')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="exampleInputPassword1">Addon Product Price *</label>
                                                    <input type="number" class="form-control" name="add_on_price[]"
                                                        id="" placeholder="Enter price"
                                                        value="{{ $variant->pivot->add_on_price }}">
                                                    @error('add_on_price*')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                {{-- <div class="form-group col-md-3">
                                                    <label for="exampleInputPassword1">Discounted Product Price *</label>
                                                    <input type="number" class="form-control" name="discount[]"
                                                        id="" placeholder="Enter discount price or percent"
                                                        value="{{ $variant->pivot->discount }}" min="0">

                                                    <div class="form-check form-check-inline mt-2">
                                                        <input type="checkbox" class="form-check-input" name="is_percent[]"
                                                            id="is_percent" >
                                                        <label for="is_percent" class="form-check-label">Check if discount is
                                                            in %</label>
                                                        @error('is_percent*')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                    @error('discount*')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div> --}}
                                                <div class="form-group col-md-3">
                                                    <label for="">Product Quantity *</label>
                                                    <input type="number" class="form-control" name="quantity[]"
                                                        id="" placeholder="Enter quantity" min="0"
                                                        value="{{ $variant->pivot->quantity }}">
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
                                        @endforeach
                                        <div
                                            class="form-group col-md-12 d-flex align-items-center gap-20 justify-content-end mt-5">

                                            <h5>Add Attribute-Variants</h5>
                                            <a href="javascript:void(0)" class="btn btn-success btn-md add-attribute"><i
                                                    class="fas fa-plus"></i></a>

                                        </div>

                                    </div>
                                    <div class="card-footer d-flex gap-20">
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
        $(function() {
            bsCustomFileInput.init();
        });
        document.addEventListener("DOMContentLoaded", function() {
            const priceInput = document.getElementById('priceInput');
            const priceError = document.getElementById('priceError');

            priceInput.addEventListener('input', function() {
                const inputValue = priceInput.value.trim();

                if (!/^\d*\.?\d*$/.test(inputValue)) {
                    priceError.textContent = 'Please enter a valid number';
                    priceInput.value = inputValue.slice(0, -1);
                } else {
                    priceError.textContent = '';
                }
            });
        });
        $(document).ready(function() {
            //Initialize Select2 Elements
            // $('.select213').select2();
            $('.select1').select2();




            // $("select[name='attribute[]']").each(function(index, val) {
            //     let varElement = $(this).closest('.attribute-variants').find("select[name='variant[]']")
            //         .first();
            //     let attribute = val.value;
            //     // console.log(productData.variants[index].pivot.variant_id);
            //     $.ajax({
            //         type: 'GET',
            //         url: "/admin/get-selected-variants/" + attribute,
            //         data: {
            //             productId: productData.id
            //         },
            //         success: function(response) {
            //             let optElem = '';
            //             // console.log(response);
            //             $.each(response.variants, function(key, val) {
            //                 console.log(productData.variants[index].pivot.variant_id);

            //                 optElem +=
            //                     `<option value="${val.id}" class="form-control"  > ${val.name} </option>`
            //             })
            //             varElement.html(optElem);
            //         }
            //     })

            // });
            // // ${ val.id == productVar ? 'selected' : '' }

            var productData = @json($product);
            $(document).on("change", "select[name='attribute[]']", function() {
                let varElement = $(this).closest('.attribute-variants').find("select[name='variant[]']")
                    .first();
                // console.log(varElement);
                let attribute = $(this).val();
                $.ajax({
                    type: 'GET',
                    url: '/admin/get-variants/' + attribute,
                    dataType: "json",
                    success: function(response) {
                        let optElem = '';
                        // console.log(response.variants);
                        $.each(response.variants, function(key, val) {
                            // console.log(productData.variants[key].pivot.variant_id,val.id);
                            //     optElem +=
                            //         `<option value="${val.id}" class="form-control" ${ val.id == productData.variants[key].pivot.variant_id ? 'selected' : '' } > ${val.name} </option>`
                            // let matchingVariant = productData.variants.find(productVariant => productVariant.pivot.variant_id === val.id);
                            optElem +=
                                `<option value="${val.id}" class="form-control" > ${val.name} </option>`;
                        });
                        varElement.html(optElem);
                    }
                })
            });

            $(document).on("click", ".add-attribute", function(e) {
                e.preventDefault();

                // Clone the parent element
                let parentContainer = $(this).closest(".card-body");
                let parentElems = parentContainer.find(".attribute-variants"); // All existing elements

                // Get the last element among the existing ones
                let lastElem = parentElems.last();

                // Create a new element and append it after the last one
                let newElem = lastElem.clone();
                lastElem.after(newElem);

                // Reset input values for the newly cloned element
                newElem.find("input").val("");
                newElem.find('input[name="is_percent[]"]').prop('checked', false);
                newElem.find("select[name='attribute[]']").val("None");
                newElem.find("select[name='variant[]']").html(null);
            });

            $(document).on("click", ".remove-attribute", function(e) {

                e.preventDefault();
                console.log(132);
                let parentContainer = $(this).closest(".attribute-variants");
                let allElem = $(".attribute-variants");
                console.log(allElem.length);
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
