<script>
    $(document).ready(function() {
        $(document).on('input', '[name="term"]', function(e) {
            e.preventDefault();
            let term = $(this).val();
            $.ajax({
                url: "{{ route('web.blogs.index') }}",
                type: 'GET',
                data: {
                    term: term
                },
                success: function(response) {
                    $('.recent-blog-list').html(response.recent_blogs);
                }
            });

        });
    });
</script>
