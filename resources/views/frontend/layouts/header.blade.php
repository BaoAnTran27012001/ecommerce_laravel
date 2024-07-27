<!--============================
        HEADER START
    ==============================-->
<header>
    <div class="container">
        <div class="row">
            <div class="col-2 col-md-1 d-lg-none">
                <div class="wsus__mobile_menu_area">
                    <span class="wsus__mobile_menu_icon"><i class="fal fa-bars"></i></span>
                </div>
            </div>
            <div class="col-xl-2 col-7 col-md-8 col-lg-2">
                <div class="wsus_logo_area">
                    <a class="wsus__header_logo" href="{{ route('home') }}">
                        <img src="{{ asset('frontend/images/logo-new.png') }}" alt="logo" class="img-fluid w-100">
                    </a>
                </div>
            </div>
            <div class="col-xl-5 col-md-6 col-lg-4 d-none d-lg-block">
                <div class="wsus__search">
                    <form>
                        <input type="text" placeholder="Tìm Kiếm">
                        <button type="submit"><i class="far fa-search"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-xl-5 col-3 col-md-3 col-lg-6">
                <div class="wsus__call_icon_area">
                    <div></div>
                    <ul class="wsus__icon_area">
                        <li><a href="{{ route('wishlist') }}"><i class="fal fa-heart"></i><span id="wishlist_count">{{ \App\Models\WishList::where('user_id',auth()->user()->id)->count() }}</span></a></li>
                        <li><a class="wsus__cart_icon" href="#"><i class="fal fa-shopping-bag"></i><span
                                    id="cart_count">{{ Cart::content()->count() }}</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="wsus__mini_cart">
        <h4>Giỏ Hàng <span class="wsus_close_mini_cart"><i class="far fa-times"></i></span></h4>
        <ul class="mini_cart_wrapper">
            @foreach (Cart::content() as $sidebarProduct)
                <li id="mini_cart_{{ $sidebarProduct->rowId }}">
                    <div class="wsus__cart_img">
                        <a href="{{ route('product-detail', $sidebarProduct->id) }}"><img
                                src="{{ asset($sidebarProduct->options->image) }}" alt="product"
                                class="img-fluid w-100"></a>
                        <a class="wsis__del_icon remove_sidebar_product" data-id="{{ $sidebarProduct->rowId }}"
                            href="#"><i class="fas fa-minus-circle"></i></a>
                    </div>
                    <div class="wsus__cart_text">
                        <a class="wsus__cart_title"
                            href="{{ route('product-detail', $sidebarProduct->id) }}">{{ $sidebarProduct->name }} <span
                                class="fw-bold" id="product_sidebar_qty"
                                data-id="{{ $sidebarProduct->qty }}">({{ $sidebarProduct->qty }})</span></a>
                        <p>{{ number_format($sidebarProduct->price, 0, ',', '.') . 'đ' }}
                            <del>{{ number_format($sidebarProduct->options->discount_price, 0, ',', '.') . 'đ' }}</del>
                        </p>
                    </div>
                </li>
            @endforeach
            @if (Cart::content()->count() === 0)
                <li class="text-center">Giỏ Hàng Trống</li>
            @endif
        </ul>
        <div class="mini_cart_actions {{ Cart::content()->count() === 0 ? 'd-none' : '' }}">
            <h5>Tổng Cộng<span id="mini_cart_subtotal">$3540</span></h5>
            <div class="wsus__minicart_btn_area">
                <a class="common_btn" href="{{ route('cart-details') }}">xem giỏ hàng</a>
            </div>
        </div>
    </div>

</header>
<!--============================
        HEADER END
    ==============================-->
@push('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: "GET",
                url: "{{ route('cart.sidebar-product-total') }}",
                success: function(data) {
                    $('#mini_cart_subtotal').text(data);
                }
            });
        });
    </script>
@endpush
