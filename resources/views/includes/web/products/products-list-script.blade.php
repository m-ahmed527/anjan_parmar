<script>
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault(); // Default action ko rokna

            var page = $(this).attr('href').split('page=')[1]; // Page number nikalna
            fetchProducts(page);
        });

        function fetchProducts(page) {
            $.ajax({
                url: "{{ route('web.products.index') }}?page=" + page,
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
</script>
