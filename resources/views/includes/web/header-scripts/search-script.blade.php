<script>
    $(document).ready(function() {
        const input = $(".search-input");
        const select = $(".search-select");
        const results = $(".search-suggestions--list");

        function detectSearch() {
            let query = input.val().trim() ?? null;
            let category = select.val() ?? null;
            $.ajax({
                url: "{{ route('web.products.header.search') }}",
                type: "GET",
                data: {
                    product_name: query,
                    category: category
                },
                success: function(response) {
                    console.log(response);
                    let products = response.products;
                    results.empty();
                    if (response.success) {
                        if (products.length > 0) {
                            results.removeClass("hidden");
                            products.forEach(function(product) {
                                let html = `

                                    <li>
                                     <a href="{{ route('web.products.show', '') }}/${product.slug}" >
                                       <div class="searched-content">
                                         <img src="${product.image}" alt="">
                                        <div>
                                            ${product.name}
                                            <p>${product.category.name}</p>
                                        </div>
                                        </div>
                                     </a>
                                    </li>

                            `;
                                results.append(html);
                                results.addClass("style");
                            });
                        } else {
                            let html = `
                                <li>No products found.</li>
                            `;
                            results.append(html);
                            results.removeClass("style");
                        }
                    }

                },
                error: function(error) {
                    console.error(error);
                }
            });
            if (query || category != '') {
                results.removeClass("hidden");
            } else {
                results.addClass("hidden");
            }
            console.log(query, category == '');
        }
        input.on("keyup change", detectSearch);
        select.on("change", detectSearch);

        let body = document.body;

        $("body").on("click", () => {
            results.addClass("hidden");
            input.val("");
        })
    });
</script>
