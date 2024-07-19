@extends('frontend.layouts.master')


@section('content')
    <!--============================
                                                                                BREADCRUMB START
                                                                            ==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>Giỏ Hàng</h4>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><a href="#">peoduct</a></li>
                            <li><a href="#">cart view</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
                                                                                BREADCRUMB END
                                                                            ==============================-->


    <!--============================
                                                                                CART VIEW PAGE START
                                                                            ==============================-->
    <section id="wsus__cart_view">
        <div class="container">
            <div class="row">
                <div class="col-xl-9">
                    <div class="wsus__cart_list">
                        <div class="table-responsive">
                            <table>
                                <tbody>
                                    <tr class="d-flex">
                                        <th class="wsus__pro_img">
                                            Hình Ảnh
                                        </th>

                                        <th class="wsus__pro_name">
                                            Tên
                                        </th>

                                        <th class="wsus__pro_tk">
                                            Đơn Giá
                                        </th>

                                        <th class="wsus__pro_tk">
                                            Tổng Giá
                                        </th>
                                        <th class="wsus__pro_select">
                                            Số Lượng
                                        </th>



                                        <th class="wsus__pro_icon">
                                            <a href="#" class="common_btn">Xoá Giỏ Hàng</a>
                                        </th>
                                    </tr>
                                    @foreach ($cartItems as $cartItem)
                                        <tr class="d-flex">
                                            <td class="wsus__pro_img"><img src="{{ asset($cartItem->options->image) }}"
                                                    alt="product" class="img-fluid w-100">
                                            </td>

                                            <td class="wsus__pro_name">
                                                <p>{{ $cartItem->name }}</p>
                                            </td>

                                            <td class="wsus__pro_tk">
                                                <h6>{{ number_format($cartItem->price, 0, ',', '.') . 'đ' }}</h6>
                                            </td>
                                            <td class="wsus__pro_tk">
                                                <h6 id="{{ $cartItem->rowId }}">
                                                    {{ number_format($cartItem->price * $cartItem->qty, 0, ',', '.') . 'đ' }}
                                                </h6>
                                            </td>

                                            <td class="wsus__pro_select">
                                                <div class="product_qty_wrapper">
                                                    <button class="btn btn-danger product_decrement">-</button>
                                                    <input readonly class="product_qty" data-rowid="{{ $cartItem->rowId }}"
                                                        type="text" min="1" max="100"
                                                        value="{{ $cartItem->qty }}" />
                                                    <button class="btn btn-success product_increment">+</button>
                                                </div>
                                            </td>



                                            <td class="wsus__pro_icon">
                                                <a href="#"><i class="far fa-times"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="wsus__cart_list_footer_button" id="sticky_sidebar">
                        <h6>total cart</h6>
                        <p>subtotal: <span>$124.00</span></p>
                        <p>delivery: <span>$00.00</span></p>
                        <p>discount: <span>$10.00</span></p>
                        <p class="total"><span>total:</span> <span>$134.00</span></p>

                        <form>
                            <input type="text" placeholder="Coupon Code">
                            <button type="submit" class="common_btn">apply</button>
                        </form>
                        <a class="common_btn mt-4 w-100 text-center" href="check_out.html">checkout</a>
                        <a class="common_btn mt-1 w-100 text-center" href="product_grid_view.html"><i
                                class="fab fa-shopify"></i> go shop</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- END CART VIEW --}}
@endsection

@push('scripts')
    <script>
        // increment
        $(document).ready(function() {
            $('.product_increment').on('click', function() {
                let input = $(this).siblings('.product_qty');
                let quantity = parseInt(input.val()) + 1;
                let rowId = input.data('rowid');
                input.val(quantity);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "POST",
                    url: "{{ route('cart.update-quantity') }}",
                    data: {
                        rowId: rowId,
                        quantity: quantity
                    },
                    success: function(data) {
                        if (data.status === 'success') {
                            let productId = '#' + rowId;
                            $(productId).text(data.product_total);
                            toastr.success(data.message)
                        }
                    },
                    error: function(data) {

                    }
                });
            });
            // decrement

            $('.product_decrement').on('click', function() {

                let input = $(this).siblings('.product_qty');
                let quantity = parseInt(input.val()) - 1;
                let rowId = input.data('rowid');
                if(quantity < 1){
                    quantity = 1;
                }
                input.val(quantity);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "POST",
                    url: "{{ route('cart.update-quantity') }}",
                    data: {
                        rowId: rowId,
                        quantity: quantity
                    },
                    success: function(data) {
                        if (data.status === 'success') {
                            let productId = '#' + rowId;
                            $(productId).text(data.product_total);
                            toastr.success(data.message)
                        }
                    },
                    error: function(data) {

                    }
                });
            });
        });
    </script>
@endpush