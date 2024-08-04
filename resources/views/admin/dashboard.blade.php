@extends('admin.layouts.master');
@section('section')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Dashboard') }}</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Khách Hàng</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_customer }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Sản Phẩm</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_product }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Đơn Đặt</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_order }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-star" style="font-size: 22px;color: #fff;"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Đơn Đặt Hôm Nay</h4>
                        </div>
                        <div class="card-body">
                            {{ $today_order }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-newspaper" style="font-size: 22px;color: #fff;"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Thương Hiệu</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_brand }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-newspaper" style="font-size: 22px;color: #fff;"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Danh Mục Sản Phẩm</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_category }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
