<script>
    let billingAutocomplete, shippingAutocomplete;

    function initAutocomplete() {
        billingAutocomplete = new google.maps.places.Autocomplete(
            document.getElementById('billing_autocomplete'), {
                types: ['geocode']
            }
        );
        billingAutocomplete.setFields(['address_component', 'geometry']);
        billingAutocomplete.addListener('place_changed', () => {
            fillAddress(billingAutocomplete, 'billing');
        });

        shippingAutocomplete = new google.maps.places.Autocomplete(
            document.getElementById('shipping_autocomplete'), {
                types: ['geocode']
            }
        );
        shippingAutocomplete.setFields(['address_component', 'geometry']);
        shippingAutocomplete.addListener('place_changed', () => {
            fillAddress(shippingAutocomplete, 'shipping');
        });
    }

    function fillAddress(autocompleteInstance, type) {
        const place = autocompleteInstance.getPlace();

        let components = {
            street_number: '',
            route: '',
            locality: '',
            administrative_area_level_1: '',
            country: '',
            postal_code: ''
        };

        place.address_components.forEach(component => {
            const types = component.types;
            for (let i = 0; i < types.length; i++) {
                if (components[types[i]] !== undefined) {
                    components[types[i]] = component.short_name;
                }
            }
        });

        const prefix = type + '_';
        // document.getElementById(prefix + 'autocomplete').value = components.street_number + ' ' + components.route;
        document.getElementById(prefix + 'city').value = components.locality;
        document.getElementById(prefix + 'state').value = components.administrative_area_level_1;
        document.getElementById(prefix + 'country').value = components.country;
        document.getElementById(prefix + 'zip_code').value = components.postal_code;
    }
</script>

<!-- Replace YOUR_API_KEY with your real API key -->
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD28UEoebX1hKscL3odt2TiTRVfe5SSpwE&libraries=places&callback=initAutocomplete"
    async defer></script>
