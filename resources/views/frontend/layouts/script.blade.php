<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //add to cart
        $('.shopping-cart-form').on('submit', function(e) {
            e.preventDefault();
            let formData = $(this).serialize();
            $.ajax({
                method: "POST",
                data: formData,
                url: "{{ route('add-to-cart') }}",
                success: function(data) {
                    getCartCount();
                    fetchSidebarCartProducts();
                    $('.mini_cart_actions').removeClass('d-none');
                    let quantity = data.qty;
                    let sidebarQuantity = $('#product_sidebar_qty').data('id');
                    console.log(sidebarQuantity);
                    toastr.success(data.message);
                },
                error: function(params) {

                }
            });
        });

        function getCartCount() {
            $.ajax({
                method: "GET",
                url: "{{ route('cart-count') }}",
                success: function(data) {
                    $('#cart_count').text(data);
                },
                error: function(params) {

                }
            });
        }

        function fetchSidebarCartProducts(e) {
            $.ajax({
                method: "GET",
                url: "{{ route('cart-products') }}",
                success: function(data) {
                    $('.mini_cart_wrapper').html("");
                    let html = '';
                    for (let item in data.cartproducts) {
                        let product = data.cartproducts[item];
                        let productId = data.cartproducts[item].id;
                        let priceArr = data.priceArr;
                        let originalPriceArr = data.originalPriceArr;
                        html += `
                             <li id=mini_cart_${product.rowId}>
                <div class="wsus__cart_img">
                    <a href="{{ url('product-detail') }}/${productId}"><img
                            src="{{ asset('/') }}${product.options.image}" alt="product"
                            class="img-fluid w-100"></a>
                    <a class="wsis__del_icon remove_sidebar_product" data-id="${product.rowId}"
                        href="#"><i class="fas fa-minus-circle"></i></a>
                </div>
                <div class="wsus__cart_text">
                    <a class="wsus__cart_title"
                        href="{{ url('product-detail') }}/${productId}">${product.name}<span class="fw-bold"
                            id="product_sidebar_qty" data-id="${product.qty}">(${product.qty})</span></a>
                    <p>${priceArr[productId]}
                        <del>${originalPriceArr[productId]}</del>
                    </p>
                </div>
            </li>
                        `
                    }
                    $('.mini_cart_wrapper').html(html);
                    getSidebarCartSubTotal();
                },
                error: function(params) {

                }
            });
        }
        //remove product from sidebar
        $('body').on('click', '.remove_sidebar_product', function(e) {
            e.preventDefault();
            let rowId = $(this).data('id');
            $.ajax({
                method: "POST",
                url: "{{ route('cart.remvoe-sidebar-product') }}",
                data: {
                    rowId: rowId
                },
                success: function(data) {
                    let productId = '#mini_cart_' + rowId;
                    $(productId).remove();
                    getSidebarCartSubTotal();
                    if ($('.mini_cart_wrapper').find('li').length === 0) {
                        $('.mini_cart_actions').addClass('d-none');
                        $('.mini_cart_wrapper').html(
                            "<li class='text-center'>Giỏ Hàng Trống</li>");
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
        //get mini cart sidebar subtotal
        function getSidebarCartSubTotal() {
            $.ajax({
                method: "GET",
                url: "{{ route('cart.sidebar-product-total') }}",
                success: function(data) {
                    $('#mini_cart_subtotal').text(data);
                }
            });
        }
    });
</script>
