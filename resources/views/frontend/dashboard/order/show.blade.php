@extends('frontend.dashboard.layouts.master')
@section('content')
    <section id="wsus__dashboard">
        <div class="container-fluid">
            @include('frontend.dashboard.layouts.sidebar')
            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content">
                        <div class="wsus__invoice_area">
                            <div class="wsus__invoice_header">
                                <div class="wsus__invoice_content">
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 mb-5 mb-md-0">
                                            <div class="wsus__invoice_single">
                                                <h5>Thông Tin Người Đặt</h5>
                                                <h6>Email: {{ Auth::user()->email }}</h6>
                                                <h6>Ngày Đặt: {{ date('d/m/Y', strtotime($order->date)) }}</h6>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 mb-5 mb-md-0">
                                            <div class="wsus__invoice_single text-md-center">
                                                <h5>thông tin người nhận</h5>
                                                <h6>Tên: {{ $order->name }}</h6>
                                                <p>Email: {{ $order->email }}</p>
                                                <p>Thanh Toán:Trả Tiền Mặt</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wsus__invoice_description">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th class="images">
                                                    Hình Ảnh
                                                </th>

                                                <th class="name">
                                                    tên
                                                </th>

                                                <th class="amount">
                                                    đơn giá
                                                </th>

                                                <th class="quentity">
                                                    số lượng
                                                </th>
                                                <th class="total">
                                                    tổng cộng
                                                </th>
                                            </tr>
                                            @foreach ($order_detail as $item)
                                                <tr>
                                                    <td class="images">
                                                        <img src="{{ asset($item->product->thumb_image) }}" alt="bag"
                                                            class="img-fluid w-100">
                                                    </td>

                                                    <td class="name">
                                                        <p>{{ $item->product->name }}</p>
                                                    </td>
                                                    <td class="amount">
                                                        {{ number_format($item->unit_price, 0, ',', '.') . 'đ' }}
                                                    </td>

                                                    <td class="quentity">
                                                        {{ $item->quantity }}
                                                    </td>
                                                    <td class="total">
                                                        {{ number_format($item->unit_price * $item->quantity, 0, ',', '.') . 'đ' }}
                                                    </td>
                                                </tr>
                                            @endforeach


                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="wsus__invoice_footer">
                                <p><span>Tạm Tính:</span>{{ number_format($total, 0, ',', '.') . 'đ' }}</p>
                                <p><span>Phí Vận Chuyển:</span>{{ number_format(10000, 0, ',', '.') . 'đ' }}</p>
                                <p><span>Tổng Cộng:</span>{{ number_format($billTotal, 0, ',', '.') . 'đ' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
