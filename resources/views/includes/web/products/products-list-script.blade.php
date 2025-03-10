{{-- <script>
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault(); // Default action ko rokna

            var page = $(this).attr('href').split('page=')[1]; // Page number nikalna
            var store = "{{ request('store') }}";
            fetchProducts(page);
        });

        function fetchProducts(page) {
            $.ajax({
                url: "{{ route('web.products.index') }}?page=" + page,
                if (store) {
                    url += "&store=" + store;
                }

                type: "GET",
                beforeSend: function() {
                    // $('#product-container').html('<p>Loading...</p>'); // Loader add karein
                    $('#product-container').LoadingOverlay("show");
                },
                success: function(response) {
                    $('#product-container').LoadingOverlay("hide"); // Loader remove karein
                    $('#product-container').html(response.html); // Products update karein
                    var showingResults = $('#showing-results').html();
                    console.log(showingResults);

                    $('#showing-results-container').html(showingResults);
                },
                error: function() {
                    $('#product-container').LoadingOverlay("hide"); // Loader remove karein
                    alert('Something went wrong!');
                }
            });
        }
    });
</script> --}}
<script>
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault(); // Stop default pagination

            var page = $(this).attr('href').split('page=')[1]; // Extract page number
            var store = "{{ request('store') }}"; // Get store parameter from request

            fetchProducts(page, store);
        });

        function fetchProducts(page, store) {
            var url = "{{ route('web.products.index') }}?page=" + page;

            // Ensure store filter is retained in pagination
            if (store) {
                url += "&store=" + store;
            }

            $.ajax({
                url: url, // FIX: Correct placement of URL
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
                    alert('Something went wrong!');
                }
            });
        }
    });
</script>
