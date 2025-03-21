<script>
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault(); // Stop default pagination

            var page = $(this).attr('href').split('page=')[1]; // Extract page number
            var store = "{{ request('store') }}"; // Get store parameter from request
            var category = $('input[name="category"]:checked').val(); // Get selected category
            var minPrice = $('#minRange').val(); // ✅ Selected Min Price
            var maxPrice = $('#maxRange').val(); // ✅ Selected Max Price

            fetchProducts(page, store, category, minPrice, maxPrice);
        });

        function fetchProducts(page, store, category, minPrice, maxPrice) {
            var url = "{{ route('web.products.index') }}?page=" + page;

            // Ensure filters are retained in pagination
            if (store) {
                url += "&store=" + store;
            }
            if (category) {
                url += "&category=" + category;
            }
            if (minPrice) {
                url += "&min_price=" + minPrice;
            }
            if (maxPrice) {
                url += "&max_price=" + maxPrice;
            }

            $.ajax({
                url: url,
                type: "GET",
                beforeSend: function() {
                    $('#product-container').LoadingOverlay("show"); // Show loader
                },
                success: function(response) {
                    $('#product-container').LoadingOverlay("hide"); // Hide loader
                    $('#product-container').html(response.html); // Update products

                    var showingResults = $('#showing-results').html();
                    $('#showing-results-container').html(showingResults);
                },
                error: function() {
                    $('#product-container').LoadingOverlay("hide"); // Hide loader
                    console.log('Something went wrong!');
                }
            });
        }
    });
</script>
