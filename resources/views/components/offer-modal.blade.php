<div class="offer-modal-area">
    <div class="custom-offer-modal">
        <div class="modal-offer-header">
            <h3>Make an Offer</h3>
            <button class="close-offer-modal"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="offer-modal-body">
            <div class="row align-items-center">
                <div class="col-lg-4 text-center">
                    <img src="{{ asset('assets/web/images/airbuds-img.png') }}" class="img-fluid product-image"
                        alt="Product Image">
                    <p class="price-actual mt-3">
                        <strong>Actual price:</strong> $<span class="">200</span>
                    </p>
                </div>
                <div class="col-lg-8">
                    <h2 class="product-title-2" id="product-name">XYZ Product</h2>
                    <form>
                        <div class="modal-entry-area">
                            <div class="pr-title counter counter-area-2">
                                <button class="decrement btn dec-btn" type="button">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                                <input class="inp-single-inp" value="1" readonly />
                                <button class="increment btn btn-inc" type="button">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>
                            <div class="d-flex offer-input">
                                <span class="box-dollar">$</span>
                                <input type="number" value="200" class="modal-entry-area-input"
                                    placeholder="Enter your offer" required>
                            </div>
                        </div>
                        <textarea class="text-area-offer" placeholder="Write description here..." name="" id="" cols="30"
                            rows="10" required></textarea>
                        <div class="total-show-area">
                            <strong>Total:</strong>
                            <p class="total-price">$<span id="total-offer">200.00</span></p>
                        </div>
                        <button type="submit" class="submit-offer">Place Offer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let incBtns = document.querySelector('.increment');
    let decBtns = document.querySelector('.decrement');

    incBtns.addEventListener('click', () => {
        let inputs = incBtns.closest('.counter-area-2').querySelector('input');
        inputs.value++;
    })

    decBtns.addEventListener('click', () => {
        let inputs = incBtns.closest('.counter-area-2').querySelector('input');
        if (inputs.value > 1) {
            inputs.value--;
        }
    })
</script>
