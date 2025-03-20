<script>
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault(); // Stop default pagination

            var page = $(this).attr('href').split('page=')[1]; // Extract page number
            fetchProducts(page);
        });

        function fetchProducts(page) {
            var url = "{{ route('web.blogs.index') }}?page=" + page;

            // Ensure filters are retained in pagination


            $.ajax({
                url: url,
                type: "GET",
                beforeSend: function() {
                    $('.blog-container').LoadingOverlay("show"); // Show loader
                },
                success: function(response) {
                    $('.blog-container').LoadingOverlay("hide"); // Hide loader
                    $('.blog-container').html(response.html); // Update products

                    var showingResults = $('#showing-results').html();
                    $('#showing-results-container').html(showingResults);
                },
                error: function() {
                    $('.blog-container').LoadingOverlay("hide"); // Hide loader
                    console.log('Something went wrong!');
                }
            });
        }
    });
</script>
