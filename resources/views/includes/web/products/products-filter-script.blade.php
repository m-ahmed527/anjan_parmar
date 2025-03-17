<script>
    $(document).ready(function() {
        function applyFilters() {
            let category = $('input[name="category"]:checked').val() ?? null; // ✅ Selected category
            let minPrice = $('#minRange').val(); // ✅ Selected Min Price
            let maxPrice = $('#maxRange').val(); // ✅ Selected Max Price
            let store = "{{ request('store') }}" ?? null; // ✅ Get store from request

            console.log("Category:", category, "Min:", minPrice, "Max:", maxPrice);

            $.ajax({
                url: "{{ route('web.products.index') }}",
                type: 'GET',
                data: {
                    store: store, // ✅ Include store parameter in AJAX request
                    category: category,
                    min_price: minPrice,
                    max_price: maxPrice
                },
                success: function(response) {
                    console.log(response);
                    $('#product-container').html(response.html);
                    var showingResults = $('#showing-results').html();
                    $('#showing-results-container').html(showingResults);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        // ✅ Debounce function to reduce multiple AJAX calls

        function debounce(func, delay) {
            let timer;
            return function() {
                clearTimeout(timer);
                timer = setTimeout(func, delay);
            };
        }

        // ✅ Apply debounce on price range change
        let debouncedApplyFilters = debounce(applyFilters, 500);

        // ✅ Filter on Category Change (Immediate)
        $('input[name="category"]').on('change', function() {
            applyFilters();
        });

        // ✅ Filter on Price Slider Change (Delayed)
        $('#minRange, #maxRange').on('input change', function() {
            debouncedApplyFilters();
        });
    });
</script>
