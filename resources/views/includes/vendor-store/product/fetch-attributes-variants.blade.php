@forelse ($attributes as $attribute)
    <div class="form-group col-md-4">
        <label>{{ $attribute['attribute']['name'] }}</label>
        <select name="attributes[{{ $attribute['attribute']['slug'] }}][]" class="form-control variant-dropdown"
            data-attribute="{{ $attribute['attribute']['slug'] }}">
            <option value="">Select {{ $attribute['attribute']['name'] }}</option>
            @forelse ($attribute['values'] as $value)
                <option value="{{ $value['id'] }}" data-name="{{ $value['value'] }}">{{ $value['value'] }}</option>
            @empty
            @endforelse
        </select>
    </div>

@empty

@endforelse

<div class="form-group col-md-4">

    <div>
        <label for="">price</label>
        <input type="text" class="form-control variant_price inputs-stop" name="variant_price[]" id=""
            min="0">
        <span class="text-danger price-error d-none">Invalid price. Only positive numbers allowed.</span>

    </div>
</div>
<div class="form-group col-md-4">

    <div>
        <label for="">quantity</label>
        <input type="text" class="form-control quantity inputs-stop" name="quantity[]" id="" min="0">
        <span class="text-danger quantity-error d-none">Invalid quantity. Only positive integers allowed.</span>
    </div>
</div>
<div class="form-group col-md-12 d-flex justify-content-end">
    <a href="javascript:void(0)" class="btn btn-danger btn-md remove-attribute d-none"><i class="fas fa-trash"></i></a>
</div>


<script>
    const numberInp = document.querySelectorAll(".inputs-stop")
    numberInp.forEach(element => {
        element.addEventListener("input", function() {
            let num = element.value.toString();
            let regex = /[a-zA-Z]/;
            let pointDetect = num.split(".")
            if (pointDetect.length - 1 > 1) {
                element.value = num.slice(0, -1)
            }
            console.log(regex.test(num));
            if (num.includes("-") || regex.test(num)) {
                element.value = num.slice(0, -1)
            }

        })
    });


    // $(document).ready(function() {
    //     function generateSKU() {
    //         let productName = $('#product_name').val().trim().toUpperCase().replace(/\s+/g,
    //         '-'); // Convert spaces to dashes
    //         let selectedAttributes = [];

    //         // Loop through all selected attribute values
    //         $('.variant-dropdown').each(function() {
    //             let selectedOption = $(this).find(':selected');
    //             let attributeName = selectedOption.data('name'); // Get data-name attribute value
    //             if (attributeName) {
    //                 selectedAttributes.push(attributeName.toUpperCase().replace(/\s+/g,
    //                 '-')); // Convert spaces to dashes
    //             }
    //         });

    //         // Combine product name with attributes to form SKU
    //         let sku = productName + (selectedAttributes.length ? '-' + selectedAttributes.join('-') : '');

    //         // Update the SKU input field
    //         $('input[name="sku[]"]').val(sku);
    //     }

    //     // Trigger SKU generation on product name & attribute selection change
    //     $('#product_name').on('keyup change', generateSKU);
    //     $('.variant-dropdown').on('change', generateSKU);
    // });
</script>
