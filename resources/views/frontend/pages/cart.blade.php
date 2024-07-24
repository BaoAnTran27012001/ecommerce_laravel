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
                            <li><a href="{{ route('home') }}">trang chủ</a></li>
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
                                            <a href="#" class="common_btn clear_cart">Xoá Giỏ Hàng</a>
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
                                                <a href="{{ route('cart.remove-product', $cartItem->rowId) }}"><i
                                                        class="far fa-times"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach


                                    @if (count($cartItems) == 0)
                                        <tr class="d-flex">
                                            <td class="wsus__pro_icon" style="width: 100%">
                                                Giỏ Hàng Trống
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="wsus__cart_list_footer_button" id="sticky_sidebar">
                        <h6>phiếu tính tiền</h6>
                        <p>phải trả: <span id="sub_total">{{ cartTotal() }}</span></p>
                        <p>phí vận chuyển: <span>{{ getShippingCost() }}</span></p>
                        <p class="total"><span>tổng cộng:</span><span id="bill_total">{{ billTotal() }}</span></p>
                        <a class="common_btn mt-4 w-100 text-center" href="check_out.html">đặt hàng</a>
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
                            renderCartSubTotal();
                            getBillTotal();
                            toastr.success(data.message)
                        } else if (data.status === 'error') {
                            toastr.error(data.message)
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
                if (quantity < 1) {
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
                            renderCartSubTotal();
                            getBillTotal();
                            toastr.success(data.message)
                        } else if (data.status === 'error') {
                            toastr.error(data.message)
                        }
                    },
                    error: function(data) {

                    }
                });
            });
            $('.clear_cart').on('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "Bạn Chắc Không ?",
                    text: "Hành Động Này Sẽ Xoá Giỏ Hàng Của Bạn",
                    icon: "warning",
                    showCancelButton: true,
                    cancelButtonText: "Huỷ",
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Có!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "get",
                            url: "{{ route('clear.cart') }}",
                            success: function(data) {
                                if (data.status === 'success') {
                                    window.location.reload();
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log(error);
                            }
                        });

                    }
                });
            });
            // render total cart subtotal
            function renderCartSubTotal() {
                $.ajax({
                    method: "GET",
                    url: "{{ route('cart.sidebar-product-total') }}",
                    success: function(data) {
                        $('#sub_total').text(data);
                    }
                });
            }
            //cart.get-bill-total

            // get billTotal

            function getBillTotal() {
                $.ajax({
                    method: "GET",
                    url: "{{ route('cart.get-bill-total') }}",
                    success: function(data) {
                        $('#bill_total').text(data);
                    }
                });
            }
        });
    </script>
@endpush
