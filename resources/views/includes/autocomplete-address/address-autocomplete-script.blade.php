<script>
    let autocomplete;

    function initAutocomplete() {
        autocomplete = new google.maps.places.Autocomplete(
            document.getElementById('autocomplete'), {
                types: ['geocode']
            }
        );

        autocomplete.setFields(['address_component', 'geometry']);
        autocomplete.addListener('place_changed', fillInAddress);
    }

    function fillInAddress() {
        const place = autocomplete.getPlace();

        let addressComponents = {
            street_number: '',
            route: '',
            locality: '',
            administrative_area_level_1: '',
            country: '',
            postal_code: ''
        };
        console.log(place);

        place.address_components.forEach(component => {
            const types = component.types;
            for (let i = 0; i < types.length; i++) {
                if (addressComponents[types[i]] !== undefined) {
                    addressComponents[types[i]] = component.short_name;
                }
            }
        });

        // document.getElementById('autocomplete').value = addressComponents.street_number + ' ' + addressComponents.route;
        document.getElementById('city').value = addressComponents.locality;
        document.getElementById('state').value = addressComponents.administrative_area_level_1;
        document.getElementById('country').value = addressComponents.country;
        document.getElementById('zip').value = addressComponents.postal_code;
    }
</script>
<!-- Replace YOUR_API_KEY with your real API key -->
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD28UEoebX1hKscL3odt2TiTRVfe5SSpwE&libraries=places&callback=initAutocomplete"
    async defer></script>
