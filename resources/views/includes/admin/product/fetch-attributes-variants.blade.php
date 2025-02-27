@forelse ($attributes as $attribute)
    <div class="form-group col-md-4">
        <label>{{ $attribute['attribute']['name'] }}</label>
        <select name="attributes[{{ $attribute['attribute']['slug'] }}][]" class="form-control variant-dropdown">
            <option value="">Select {{ $attribute['attribute']['name'] }}</option>
            @forelse ($attribute['variants'] as $variant)
                <option value="{{ $variant['slug'] }}">{{ $variant['name'] }}</option>
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


    // document.querySelectorAll(".inputs-stop").forEach(element => {
    //     element.addEventListener("input", function() {
    //         let isPriceField = element.classList.contains("variant_price");
    //         let isQuantityField = element.classList.contains("quantity");

    //         // Save cursor position before modifying value
    //         let cursorPosition = element.selectionStart;
    //         let num = element.value;

    //         if (isPriceField) {
    //             // Keep only numbers and one decimal point
    //             let newValue = num.replace(/[^0-9.]/g, '');

    //             // Ensure only one decimal point
    //             let parts = newValue.split('.');
    //             if (parts.length > 2) {
    //                 newValue = parts[0] + '.' + parts.slice(1).join('');
    //             }

    //             // Prevent leading zeros like "01" (except "0." case)
    //             if (newValue.startsWith("0") && newValue.length > 1 && newValue[1] !== ".") {
    //                 newValue = newValue.replace(/^0+/, '');
    //             }

    //             element.value = newValue;
    //         } else if (isQuantityField) {
    //             // Only whole numbers allowed
    //             let newValue = num.replace(/[^0-9]/g, '');
    //             element.value = newValue;
    //         }

    //         // Adjust cursor position correctly
    //         let newCursorPosition = cursorPosition - (num.length - element.value.length);
    //         element.setSelectionRange(newCursorPosition, newCursorPosition);
    //     });

    //     element.addEventListener("keydown", function(e) {
    //         // Prevent "e", "+", "-" and extra "."
    //         if (["e", "E", "+", "-"].includes(e.key)) {
    //             e.preventDefault();
    //         }

    //         // Prevent multiple decimals in price field
    //         if (e.key === "." && element.classList.contains("variant_price") && element.value.includes(
    //                 ".")) {
    //             e.preventDefault();
    //         }
    //     });
    // });
</script>
