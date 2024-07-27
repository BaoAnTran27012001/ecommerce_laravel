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
                        <h4>thông tin giao hàng</h4>
                        <ul>
                            <li><a href="{{ route('home') }}">Trang chủ</a></li>
                            <li><a href="javascript:;">thông tin giao hàng</a></li>
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
                                    CHECK OUT PAGE START
                                ==============================-->
    <section id="wsus__cart_view">
        <div class="container">
            <form class="wsus__checkout_form">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="wsus__check_form">
                            <h5>Thông Tin Khách Hàng</h5>
                            <div class="row">
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="Tên *">
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="Điện Thoại *"
                                            value="{{ Auth::user()->phone ? Auth::user()->phone : '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="wsus__check_single_form">
                                        <input type="email" placeholder="Email *"
                                            value="{{ Auth::user()->email ? Auth::user()->email : '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 col-xl-6">
                                    <div class="wsus__check_single_form">
                                        <input type="text" placeholder="Địa Chỉ *">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="wsus__order_details" id="sticky_sidebar">
                            <div class="wsus__order_details_summery">
                                <p>tạm tính: <span>{{ cartTotal() }}</span></p>
                                <p>phí vận chuyển: <span>{{ getShippingCost() }}</span></p>
                                <p><b>tổng cộng:</b> <span><b>{{ billTotal() }}</b></span></p>
                            </div>
                            <a href="payment.html" class="common_btn">Đặt Hàng</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
