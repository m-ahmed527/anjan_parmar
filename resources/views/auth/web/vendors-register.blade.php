@extends('layouts.web.app')

@section('content')
    <div class="password-reset-container vendor-container">
        <a href="{{ route('index') }}">
            <img src="{{ asset('assets/web/images/logo-headers.png') }}" alt="" class="logo img-fluid mb-3">
        </a>
        <div class="card password-reset-card vendor-card">
            <h2 class="text-center mb-4">Vendor Registration</h2>
            <form>
                <div class="row">
                    <div class="col-12 mb-3 text-center">
                        <label for="logo" class="form-label">Upload Business Logo</label>
                        <div class="logo-upload-container">
                            <div class="avatar-upload mb-3">
                                <img id="logo-preview" class="avatar-img-2 img-fluid" src="{{asset('assets/web/images/no-image.avif')}}" style="border: transparent"/>
                            </div>
                            <input type="file" name="" hidden id="img-upload">
                            <div class="d-flex align-items-center justify-content-center my-3 gap-3">
                                <button class="btn btn-danger remove-img" type="button">Remove</button>
                                <label for="img-upload" class="btn btn-secondary">Upload Logo</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="business-name" class="form-label">Business Name</label>
                        <input type="text" class="form-control" placeholder="Enter your business name" id="business-name"
                            name="business_name" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="owner-name" class="form-label">Owner's Name</label>
                        <input type="text" class="form-control" placeholder="Enter owner's full name" id="owner-name"
                            name="owner_name" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" placeholder="Enter your email address" id="email"
                            name="email" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="new-password" class="form-label">Password</label>
                        <input type="password" class="form-control" placeholder="Enter a password" id="new-password"
                            name="password" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" placeholder="Enter your phone number" id="phone"
                            name="phone" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="sd-multiSelect form-group">
                            <label for="category" class="form-label">Business Category</label>
                            <select multiple id="current-job-role" class="sd-CustomSelect">
                                <option value="Electronics">Electronics</option>
                                <option value="Clothing & Apparel">Clothing & Apparel</option>
                                <option value="Home & Household Appliances">Home & Household Appliances</option>
                                <option value="Glassware & Kitchenware">Glassware & Kitchenware</option>
                                <option value="Food & Groceries">Food & Groceries</option>
                                <option value="3">Health & Beauty</option>
                                <option value="4">Automotive & Accessories</option>
                                <option value="3">Sports & Outdoor</option>
                                <option value="4">Books & Media</option>
                                <option value="4"> Pet Supplies</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="address" class="form-label">Business Address</label>
                        <textarea class="form-control" id="address" name="address" rows="2" placeholder="Enter your business address"
                            required></textarea>
                    </div>



                </div>

                <div class="d-flex flex-column my-4">
                    <button type="submit" class="btn btn-primary w-100 mb-3">Register</button>
                    <a href="{{ route('login') }}" id="showLogin" class="text-center">Already have an account? Login</a>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('assets/web/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/web/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/web/js/slick.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://bsite.net/savrajdutta/cdn/multi-select.js"></script>
    <script>
        const inpFile = document.querySelector("#img-upload");
        const imgTag = document.querySelector("#logo-preview");
        const removeImg = document.querySelector(".remove-img");
        inpFile.addEventListener("change", (e) => {
            const file = inpFile.files[0];
            console.log(imgTag);

            let reader = new FileReader();
            reader.onload = (event => {
                imgTag.src = event.target.result;
            })
            reader.readAsDataURL(file)
        })
        removeImg.addEventListener("click", () => {
            imgTag.src = "assets/web/images/no-image.avif";
            inpFile.value = ""
        })

        $(document).ready(function() {
            $(".sd-CustomSelect").multipleSelect({


                selectAll: false,
                onOptgroupClick: function(view) {
                    $(view).parents("label").addClass("selected-optgroup");
                }
            });
            // $(".ms-choice").text("Select business category");
            $(".ms-choice").addClass("select-btn-vendor");

        });
    </script>
@endsection
</body>

</html>
