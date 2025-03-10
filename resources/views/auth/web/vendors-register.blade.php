@extends('layouts.web.app')

@section('content')
    <div class="password-reset-container vendor-container">
        <a href="{{ route('index') }}">
            <img src="{{ asset('assets/web/images/logo-headers.png') }}" alt="" class="logo img-fluid mb-3">
        </a>
        <div class="card password-reset-card vendor-card">
            <h2 class="text-center mb-4">Vendor Registration</h2>
            <form action="{{ route('web.register') }}" method="POST" enctype="multipart/form-data" id="vendor-register-form">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-12 mb-3 text-center">
                        <label for="logo" class="form-label">Upload Business Logo</label>
                        <div class="logo-upload-container">
                            <div class="avatar-upload mb-3">
                                <img id="logo-preview" class="avatar-img-2 img-fluid"
                                    src="{{ asset('assets/web/images/no-user.jpg') }}" style="border: transparent" />
                            </div>
                            <input type="file" name="avatar" hidden id="img-upload">
                            <div class="d-flex align-items-center justify-content-center my-3 gap-3">
                                <button class="btn btn-danger remove-img" type="button">Remove</button>
                                <label for="img-upload" class="btn btn-secondary">Upload Logo</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="business-name" class="form-label">Business Name</label>
                        <input type="text" name="business_name" class="form-control"
                            placeholder="Enter your business name" id="business-name">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="owner-name" class="form-label">Owner's Name</label>
                        <input type="text" name="first_name" class="form-control" placeholder="Enter owner's full name"
                            id="owner-name">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email address"
                            id="email">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" name="phone" class="form-control" placeholder="Enter your phone number"
                            id="phone">
                    </div>
                    <input type="hidden" name="role" value="Vendor" id="">
                    <div class="col-md-12 mb-3">
                        <div class="sd-multiSelect form-group">
                            <label for="category" class="form-label">Business Category</label>
                            <select id="current-job-role" name="category[]" class="sd-CustomSelect form-control">
                                <option selected disabled>Select</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="address" class="form-label">Business Address</label>
                        <textarea class="form-control" id="autocompleteSearch" name="business_address" rows="2"
                            placeholder="Enter your business address"></textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="new-password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter a password"
                            id="new-password" name="password">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="confirm-password" class="form-label">Password</label>
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Enter a password" id="confirm-password">
                    </div>

                </div>

                <div class="d-flex flex-column my-4">
                    <button type="submit" class="btn btn-primary w-100 mb-3" id="vendor-register-btn">Register</button>
                    <a href="{{ route('web.login') }}" id="showLogin" class="text-center">Already have an account?
                        Login</a>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('assets/web/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/web/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/web/js/slick.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://bsite.net/savrajdutta/cdn/multi-select.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var phoneInput = document.getElementById('phone');
        phoneInput.addEventListener('input', function(e) {
            var x = e.target.value.replace(/\D/g, '').match(/(\d{0,1})(\d{0,3})(\d{0,3})(\d{0,4})/);

            e.target.value = !x[3] ? '+1 ' + x[2] : '+1 (' + x[2] + ') ' + x[3] + (x[4] ? '-' + x[4] : '');
        });



        var placeSearch, autocomplete;
        var componentForm = {
            // street_number: 'short_name',
            // route: 'long_name',
            locality: 'long_name',
            administrative_area_level_1: 'short_name',
            // country: 'long_name',
            postal_code: 'short_name'
        };

        if (typeof google === 'undefined') {
            jQuery.getScript(
                'https://maps.googleapis.com/maps/api/js?key=AIzaSyD28UEoebX1hKscL3odt2TiTRVfe5SSpwE&libraries=geometry,places',
                () => {
                    var input = document.getElementById('autocompleteSearch');
                    autocomplete = new google.maps.places.Autocomplete(input, {
                        types: ['geocode']
                    });
                    autocomplete.setFields(['address_component']);
                    // autocomplete.addListener('place_changed', fillIn);
                    // initialaddress();
                });
        } else {
            var input = document.getElementById('autocompleteSearch');
            autocomplete = new google.maps.places.Autocomplete(input, {
                types: ['geocode']
            });
            autocomplete.setFields(['address_component']);
            // autocomplete.addListener('place_changed', fillIn);
        }






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
            imgTag.src = "{{ asset('assets/web/images/no-user.jpg') }}";
            inpFile.value = ""
        })

        // $(document).ready(function() {
        //     $(".sd-CustomSelect").multipleSelect({
        //         selectAll: false,
        //         onOptgroupClick: function(view) {
        //             $(view).parents("label").addClass("selected-optgroup");
        //         }
        //     });
        //     // $(".ms-choice").text("Select business category");
        //     $(".ms-choice").addClass("select-btn-vendor");

        // });

        $(document).ready(function() {
            $(document).on('click', '#vendor-register-btn', function(e) {
                e.preventDefault();
                let form = $('#vendor-register-form');
                let formData = new FormData(form[0]);
                $.LoadingOverlay("show");
                $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $.LoadingOverlay("hide");
                        console.log(response);
                        if (response.success) {
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                            setTimeout(function() {
                                window.location.href = "{{ route('index') }}";
                            }, 1500)
                        } else {
                            Swal.fire({
                                position: "center",
                                icon: "error",
                                title: "Something went wrong",
                                showConfirmButton: true,
                                timer: 2000
                            })
                        }
                    },
                    error: function(error) {
                        $.LoadingOverlay("hide");
                        console.log(error);
                        let errors = error.responseJSON.errors;
                        $('.error-message')
                            .remove();
                        $.each(errors, function(key, value) {
                            let inputField = $(
                                `input[name="${key}"], textarea[name="${key}"]`);
                            let errorMessage = $(
                                `<span class='error-message text-danger'>
                               ${ value }
                                </span>`);
                            inputField.after(errorMessage);
                            if (key == 'category') {
                                let inputField = $(`.sd-multiSelect`);
                                let errorMessage = $(
                                    `<span class='error-message text-danger'>${ value } </span>`
                                );
                                inputField.after(errorMessage);
                            }
                        })
                    }
                })
            })

        })
        $(document).on('input change keydown', 'input, select, textarea', function() {
            $(this).next('span.error-message').text('');
            $('.sd-multiSelect').next('span.error-message').text(''); //
        });
    </script>
@endsection
</body>

</html>
