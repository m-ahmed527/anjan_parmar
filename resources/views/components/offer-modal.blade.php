@props(['product'])
{{-- @dd($product) --}}
<div class="offer-modal-area">
    <div class="custom-offer-modal">
        <div class="modal-offer-header">
            <h3>Make an Offer</h3>
            <button class="close-offer-modal"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="offer-modal-body">
            <div class="row align-items-center">
                <div class="col-lg-4 text-center">
                    <img src="{{ $product->getFirstMediaUrl('featured_image') }}" class="img-fluid product-image"
                        alt="Product Image">
                    <p class="price-actual mt-3">
                        <strong>Actual price:</strong> $<span class="">{{ $product->price }}</span>
                    </p>
                </div>
                <div class="col-lg-8">
                    <div class="error-div">

                    </div>
                    <h2 class="product-title-2" id="product-name">{{ $product->name }}</h2>
                    <form action="{{ route('web.products.make.offer', $product->slug) }}" method="POST"
                        id="offer-form">
                        @csrf

                        <div class="modal-entry-area">
                            <div class="pr-title counter counter-area-2">
                                <button class="decrement btn dec-btn btn-dec-2" type="button">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                                <input class="inp-single-inp" id="offer-quantity" name="offer_quantity" value="1"
                                    readonly />
                                <button class="increment btn btn-inc btn-inc-2" type="button">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>

                            <div class="d-flex offer-input">
                                <span class="box-dollar">$</span>
                                <input type="number" value="" class="modal-entry-area-input" name="offer_price"
                                    id="offer-value" placeholder="Enter your offer value" required
                                    oninput="validateStrictNumber(this)">
                            </div>
                        </div>
                        <textarea class="text-area-offer" placeholder="Write description here..." name="offer_description" id=""
                            cols="30" rows="10" required></textarea>
                        <div class="total-show-area">
                            <strong>Total:</strong>
                            <p class="total-price">$<span id="total-offer">00.00</span></p>
                        </div>
                        <button type="button" class="submit-offer" id="offer-btn">Place Offer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    let incBtns = document.querySelector('.btn-inc-2');
    let decBtns = document.querySelector('.btn-dec-2');
    let counterInput = document.querySelector('.inp-single-inp');
    let offerInput = document.querySelector('#offer-value');
    let offerQuantity = document.querySelector('#offer-quantity');


    if (counterInput) {
        counterInput.readOnly = true;

        incBtns.addEventListener('click', () => {
            let inputs = incBtns.closest('.counter-area-2').querySelector('input');
            inputs.value++;
            let value = offerInput.value;
            let quantity = offerQuantity.value;

            calculateTotal(value, quantity)
        })

        decBtns.addEventListener('click', () => {
            let inputs = incBtns.closest('.counter-area-2').querySelector('input');
            if (inputs.value > 1) {
                inputs.value--;
                let value = offerInput.value;
                let quantity = offerQuantity.value;

                calculateTotal(value, quantity)
            }
        })
        offerInput.addEventListener('input', function() {
            // Validate input to ensure it's a number with no decimals
            let value = this.value;
            let quantity = offerQuantity.value;
            console.log(value, quantity);

            calculateTotal(value, quantity)

        })
    }



    // Calculate total price based on offer value and quantity
    function calculateTotal(value, quantity) {
        let totalPrice = value * quantity;
        document.querySelector('#total-offer').textContent = totalPrice.toFixed(2);
    }
</script>
<script>
    $(document).ready(function() {
        $('#offer-form').on('keypress', function(e) {
            if (e.which === 13) { // 13 is the Enter key
                e.preventDefault();
            }
        });
        $(document).on('click', '#offer-btn', function(e) {
            e.preventDefault();
            let form = $('#offer-form');
            let formData = new FormData(form[0]);
            $.LoadingOverlay("show");
            console.log(123);
            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $.LoadingOverlay("hide");
                    if (response.success) {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                        form[0].reset();
                        $(".close-offer-modal").trigger("click");
                    } else {
                        Swal.fire({
                            position: "center",
                            icon: "warning",
                            title: response.message,
                            showConfirmButton: false,
                            timer: 2000
                        })
                        form[0].reset();
                        $(".close-offer-modal").trigger("click");
                    }
                },
                error: function(error) {
                    $.LoadingOverlay("hide");
                    console.log(123, error);
                    let errors = error.responseJSON.errors;
                    if (errors) {
                        $('.error-div').empty();
                        $.each(errors, function(key, value) {

                            let inputField = $('.error-div');
                            let errorMessage = $(
                                `<span class='error-message text-danger'>${value}</span><br>`
                            );
                            inputField.append(errorMessage);
                            console.log(value);

                        })
                    } else {
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: error.responseJSON.message,
                            showConfirmButton: false,
                            timer: 2000
                        })
                    }

                }
            })
        })

    })
    $(document).on('input change keydown', 'input, select, textarea', function() {
        $('.error-div').html('');
    });
</script>
{{-- <script>
    function validateNumberInput(input) {
        // Allowed characters: digits (0-9), single minus (-) at start, and single decimal point (.)
        let value = input.value;

        // Remove `e` or `E` (exponent notation)
        value = value.replace(/[eE]/g, '');

        // Remove multiple `+` or `-` signs (only one `-` at start is allowed)
        value = value.replace(/(?!^)-/g, ''); // Remove all `-` except first character
        value = value.replace(/\+/g, ''); // Remove all `+` signs

        // Allow only one decimal point
        let parts = value.split('.');
        if (parts.length > 2) {
            value = parts[0] + '.' + parts.slice(1).join('');
        }

        // Update the input field with sanitized value
        input.value = value;
    }
</script> --}}
<script>
    function validateStrictNumber(input) {
        let value = input.value;
        if (value.includes('e')) {
            value = value.replace('e', '');
            input.value = value;
        } else if (value.includes('E')) {
            value = value.replace('E', '');
            input.value = value;
        }
        // else if (value.includes('')) {

        //     value = value.replace('', '');
        //     input.value = value;
        // }

    }
</script>
