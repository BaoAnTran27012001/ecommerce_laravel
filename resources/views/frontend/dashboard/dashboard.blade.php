@extends('frontend.dashboard.layouts.master')
@section('content')
    <section id="wsus__dashboard">
        <div class="container-fluid">
            @include('frontend.dashboard.layouts.sidebar')
            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content">
                        <div class="wsus__dashboard">
                            <div class="row">
                                <div class="col-xl-3 col-6 col-md-3">
                                    <a class="wsus__dashboard_item red" href="dsahboard_order.html">
                                        <i class="far fa-address-book"></i>
                                        <p>đơn đặt</p>
                                        <h4 class="text-white">{{ $total_order }}</h4>
                                    </a>
                                </div>
                                <div class="col-xl-3 col-6 col-md-3">
                                    <a class="wsus__dashboard_item sky" href="dsahboard_review.html">
                                        <i class="fas fa-star"></i>
                                        <p>đánh giá</p>
                                    </a>
                                </div>
                                <div class="col-xl-3 col-6 col-md-3">
                                    <a class="wsus__dashboard_item blue" href="dsahboard_wishlist.html">
                                        <i class="far fa-heart"></i>
                                        <p>sản phẩm yêu thích</p>
                                        <h4 class="text-white">{{ $total_wishlist }}</h4>
                                    </a>
                                </div>
                                <div class="col-xl-3 col-6 col-md-3">
                                    <a class="wsus__dashboard_item orange" href="{{ route('user.profile.update') }}">
                                        <i class="fas fa-user-shield"></i>
                                        <p>hồ sơ</p>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
