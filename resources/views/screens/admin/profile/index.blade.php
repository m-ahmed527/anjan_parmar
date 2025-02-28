@extends('layouts.admin.app')
@section('title', 'Profile')

<style>
    .profile-area-main {
        display: flex;
        justify-content: space-between;
        align-items: start;
        gap: 50px;
    }

    .profile-area-main-right {
        max-width: 400px;
        width: 100%;
        background-color: white;
        padding: 30px 20px;
        box-shadow: 0 20px 50px 0px #00000038;
        border-radius: 5px;
    }

    .profile-area-main-left {
        flex-grow: 1;
    }

    .profile-area {
        background-color: white;
        padding: 30px 20px;
        box-shadow: 0 20px 50px 0px #00000038;
        border-radius: 5px;
    }

    .profile-info-title {
        font-size: 24px;
        font-family: var(--poppins-font);
        font-weight: 500;
        border-bottom: 1px solid #e3e3e3;
        padding-bottom: 25px;
    }

    .profile-fields {
        font-size: 15px;
        font-weight: 400;
        color: #5d646d;
        padding: 6px 20px;
        background-color: #f5f5f5;
        outline: none;
        border: none;
        width: 100%;
        border-radius: 5px;
    }

    .profile-label {
        font-size: 15px;
        font-weight: 500;
        color: #0d233e;
    }

    .profile-label span {
        color: #ff0000;
    }

    .profile-field-area {
        border-bottom: 1px solid #e3e3e3;
        padding: 13px 0;
    }

    .profile-btn {
        padding: 11px 30px;
        background-color: #007bff;
        color: white;
        font-size: 18px;
        font-weight: 500;
        text-transform: uppercase;
        border-radius: 5px;
    }

    .pro-field-btn-area .profile-btn {
        width: 200px;
        margin-top: 50px;
    }

    .chnge-pro-title {
        font-size: 16px;
        font-weight: 600;
        color: #191919;
        margin: 25px 0;
    }

    .upload-pro-label {
        font-size: 12px;
        font-weight: 500;
        color: black;
        border-radius: 4px;
        background-color: var(--bg-color);
        width: 100%;
        display: block;
        padding: 6px 5px;
        text-transform: capitalize;
        cursor: pointer;
    }

    .pro-pass-field {
        border-radius: 6px;
        background-color: #f5f5f5;
        padding: 10px 10px;
        font-size: 14px;
        font-weight: 400;
        color: black;
        border: none;
        outline: none;
        width: 100%;
    }

    .pro-pass-field::placeholder {
        font-size: 14px;
        font-weight: 400;
        color: #a4a4a4;
    }

    .profile-btn.pass-update-btn {
        margin-top: 40px;
        padding: 10px 40px;
    }

    .img-preview-area {
        width: 100%;
        border-radius: 5px;
        margin-bottom: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .img-preview-area img {
        width: 175px;
    }

    .upload-img-btn-wrap {
        text-align: center
    }

    .upload-img-btn-wrap .upload-btn {
        padding: 10px 40px;
        background-color: #007bff;
        color: white;
        font-size: 18px;
        font-weight: 500 !important;
        text-transform: uppercase;
        border-radius: 5px;
        cursor: pointer;
    }
</style>

@section('content')
    <div class="content-wrapper">
        <section class="dashboard-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="upcoming-course-area">
                            <h2 class="upcom-coure-title mb-5 fw-medium text-black"></h2>

                            <div class="profile-area-main">
                                <div class="profile-area-main-left">
                                    <form action="{{ route('admin.profile.update') }}" method="POST" id="profile-form">
                                        @csrf
                                        <div class="profile-area">
                                            <h3 class="profile-info-title m-0">Profile Information</h3>

                                            <div class="profile-field-area">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-12 col-lg-3">
                                                        <div
                                                            class="d-flex justify-content-start mb-lg-0 mb-md-3 mb-3 justify-content-md-start gap-4 justify-content-lg-between align-items-center">
                                                            <label class="profile-label d-block" for="">
                                                                Name<span>*</span>
                                                            </label>
                                                            <span class="profile-label">:</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-9 col-xl-8">
                                                        <input class="profile-fields"
                                                            value="{{ auth()?->user()?->first_name }}" placeholder="Name"
                                                            type="text" name="first_name">
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="profile-field-area">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-12 col-lg-3">
                                                        <div
                                                            class="d-flex justify-content-start mb-lg-0 mb-md-3 mb-3 justify-content-md-start gap-4 justify-content-lg-between align-items-center">
                                                            <label class="profile-label d-block" for="">
                                                                Last Name<span>*</span>
                                                            </label>
                                                            <span class="profile-label">:</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-9 col-xl-8">
                                                        <input class="profile-fields"
                                                            value="{{ auth()?->user()?->last_name }}" type="text"
                                                            name="last_name" id="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="profile-field-area">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-12 col-lg-3">
                                                        <div
                                                            class="d-flex justify-content-start mb-lg-0 mb-md-3 mb-3 justify-content-md-start gap-4 justify-content-lg-between align-items-center">
                                                            <label class="profile-label d-block" for="">
                                                                Email<span>*</span>
                                                            </label>
                                                            <span class="profile-label">:</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-9 col-xl-8">
                                                        <input class="profile-fields" value="{{ auth()?->user()?->email }}"
                                                            type="email" name="email" placeholder="Email" readonly>
                                                        @error('email')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="profile-field-area">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-12 col-lg-3">
                                                        <div
                                                            class="d-flex justify-content-start mb-lg-0 mb-md-3 mb-3 justify-content-md-start gap-4 justify-content-lg-between align-items-center">
                                                            <label class="profile-label d-block" for="">
                                                                Phone Number
                                                            </label>
                                                            <span class="profile-label">:</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-9 col-xl-8">
                                                        <input class="profile-fields" value="{{ auth()?->user()?->phone }}"
                                                            type="text" name="phone" id="phone"
                                                            placeholder="Phone">
                                                        @error('phone')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="profile-field-area">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-12 col-lg-3">
                                                        <div
                                                            class="d-flex justify-content-start mb-lg-0 mb-md-3 mb-3 justify-content-md-start gap-4 justify-content-lg-between align-items-center">
                                                            <label class="profile-label d-block" for="">
                                                                Date Of Birth
                                                            </label>
                                                            <span class="profile-label">:</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-9 col-xl-8">
                                                        <input class="profile-fields" value="{{ auth()?->user()?->dob }}"
                                                            type="date" name="dob" placeholder="Date Of Birth">
                                                        @error('dob')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="profile-field-area">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-12 col-lg-3">
                                                        <div
                                                            class="d-flex justify-content-start mb-lg-0 mb-md-3 mb-3 justify-content-md-start gap-4 justify-content-lg-between align-items-center">
                                                            <label class="profile-label d-block" for="">
                                                                Address
                                                            </label>
                                                            <span class="profile-label">:</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-9 col-xl-8">
                                                        <input class="profile-fields"
                                                            value="{{ auth()?->user()?->user_address }}" type="text"
                                                            name="user_address" id="autocomplete">
                                                        @error('user_address')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="profile-field-area">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-12 col-lg-3">
                                                        <div
                                                            class="d-flex justify-content-start mb-lg-0 mb-md-3 mb-3 justify-content-md-start gap-4 justify-content-lg-between align-items-center">
                                                            <label class="profile-label d-block" for="">
                                                                City
                                                            </label>
                                                            <span class="profile-label">:</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-9 col-xl-8">
                                                        <input class="profile-fields" value="{{ auth()?->user()?->city }}"
                                                            type="text" name="city" id="city" placeholder="City">
                                                        @error('city')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="profile-field-area">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-12 col-lg-3">
                                                        <div
                                                            class="d-flex justify-content-start mb-lg-0 mb-md-3 mb-3 justify-content-md-start gap-4 justify-content-lg-between align-items-center">
                                                            <label class="profile-label d-block" for="">
                                                                State
                                                            </label>
                                                            <span class="profile-label">:</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-9 col-xl-8">
                                                        <input class="profile-fields"
                                                            value="{{ auth()?->user()?->state }}" type="text"
                                                            name="state" id="state" placeholder="State">
                                                        @error('state')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="profile-field-area">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-12 col-lg-3">
                                                        <div
                                                            class="d-flex justify-content-start mb-lg-0 mb-md-3 mb-3 justify-content-md-start gap-4 justify-content-lg-between align-items-center">
                                                            <label class="profile-label d-block" for="">
                                                                Country
                                                            </label>
                                                            <span class="profile-label">:</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-9 col-xl-8">
                                                        <input class="profile-fields"
                                                            value="{{ auth()?->user()?->country }}" type="text"
                                                            name="country" id="country" placeholder="Country">
                                                        @error('country')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="profile-field-area">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-12 col-lg-3">
                                                        <div
                                                            class="d-flex justify-content-start mb-lg-0 mb-md-3 mb-3 justify-content-md-start gap-4 justify-content-lg-between align-items-center">
                                                            <label class="profile-label d-block" for="">
                                                                Zip Code
                                                            </label>
                                                            <span class="profile-label">:</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-9 col-xl-8">
                                                        <input class="profile-fields" value="{{ auth()?->user()?->zip }}"
                                                            type="text" name="zip" id="zipcode"
                                                            placeholder="Zip Code">
                                                        @error('zip')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="pro-field-btn-area">
                                                <button class="profile-btn  border-0" type="button"
                                                    id="profile-btn">save</button>
                                            </div>

                                        </div>
                                    </form>
                                </div>

                                <div class="profile-area-main-right">
                                    <form action="{{ route('admin.profile.update.image') }}" method="POST"
                                        id="profile-image-form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="img-preview-area">
                                            <img src="{{ auth()?->user()?->getFirstMediaUrl('avatar') ?: asset('assets/web/images/no-user.jpg') }}"
                                                id="image-preview" alt="preview-image">
                                        </div>
                                        <div class="upload-img-btn-wrap">
                                            <label class="upload-btn image-btn">
                                                <span>Upload Image</span>
                                                <input value="Upload Image" id="img-url" hidden=""
                                                    accept="image/*" type="file" name="avatar">
                                            </label>
                                        </div>
                                    </form>
                                    <div class="profile-img-area text-center">

                                        <h3 class="chnge-pro-title fw-normal">Password Reset</h3>

                                        <form action="{{ route('admin.profile.update.password') }}" method="POST"
                                            id="password-form">
                                            @csrf
                                            <div class="pro-pass-input">
                                                <input type="password" class="profile-fields mb-4"
                                                    placeholder="Current Password*" name="current_password">

                                                <input type="password" class="profile-fields mb-4"
                                                    placeholder="New Password*" name="password">

                                                <input type="password" class="profile-fields "
                                                    placeholder="Confirm Password*" name="password_confirmation">

                                                <button class="profile-btn pass-update-btn  border-0" type="button"
                                                    id="password-btn">Update</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>

    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD28UEoebX1hKscL3odt2TiTRVfe5SSpwE&libraries=places"></script>
    <script>
        var phoneInput = document.getElementById('phone');

        // coming value

        var x = phoneInput.value.replace(/\D/g, '').match(/(\d{0,1})(\d{0,3})(\d{0,3})(\d{0,4})/);
        phoneInput.value = !x[3] ? '+1 ' + x[2] : '+1 (' + x[2] + ') ' + x[3] + (x[4] ? '-' + x[4] : '');

        // on input change
        phoneInput.addEventListener('input', function(e) {
            var x = e.target.value.replace(/\D/g, '').match(/(\d{0,1})(\d{0,3})(\d{0,3})(\d{0,4})/);

            e.target.value = !x[3] ? '+1 ' + x[2] : '+1 (' + x[2] + ') ' + x[3] + (x[4] ? '-' + x[4] : '');
        });




        var placeSearch, autocomplete;
        var componentForm = {
            locality: 'long_name',
            administrative_area_level_1: 'short_name',
            postal_code: 'short_name'
        };

        if (typeof google === 'undefined') {
            jQuery.getScript(
                'https://maps.googleapis.com/maps/api/js?key=AIzaSyD28UEoebX1hKscL3odt2TiTRVfe5SSpwE&libraries=geometry,places',
                () => {
                    var input = document.getElementById('autocomplete');
                    autocomplete = new google.maps.places.Autocomplete(input, {
                        types: ['geocode']
                    });
                    autocomplete.setFields(['address_component']);
                    autocomplete.addListener('place_changed', fillIn);
                    initialaddress();
                });
        } else {
            var input = document.getElementById('autocomplete');
            autocomplete = new google.maps.places.Autocomplete(input, {
                types: ['geocode']
            });
            autocomplete.setFields(['address_component']);
            autocomplete.addListener('place_changed', fillIn);
        }

        function fillIn() {
            var adddesss = document.getElementById('autocomplete').value;
            var place = autocomplete.getPlace();
            let city = '';
            let state = '';
            let zipcode = '';
            let country = '';
            for (const component of place.address_components) {

                if (component.types.includes('locality')) {
                    city = component.long_name;
                }
                if (component.types.includes('administrative_area_level_1')) {
                    state = component.short_name;
                }
                if (component.types.includes('postal_code')) {
                    zipcode = component.long_name;
                }
                if (component.types.includes('country')) {
                    country = component.long_name;
                }
            }
            address = document.getElementById('autocomplete').value;
            document.getElementById('city').value = city;
            document.getElementById('state').value = state;
            document.getElementById('zipcode').value = zipcode;
            document.getElementById('country').value = country;
        }
    </script>
    @include('includes.profile-script', ['redirectUrl' => route('admin.index')])
    @include('includes.update-password-script', ['redirectUrl' => route('admin.index')])
    @include('includes.profile-image-script')
@endsection
