@extends('admin.layouts.master')
@section('section')
    <section class="section">
        <div class="section-header">
            <h1>Chi Tiết Đơn Đặt</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></div>
                <div class="breadcrumb-item">Chi Tiết Đơn Đặt</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Chi Tiết Đơn Đặt</h4>
                        </div>
                        <div class="card-body">
                            <div class="invoice">
                                <div class="invoice-print">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="invoice-title">
                                                <div class="invoice-number">Mã Đơn:{{ $order->invoice_no }}</div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <address>
                                                        <strong>Chuyển Đến:</strong><br>
                                                        <strong>Tên:</strong>{{ $order->name }}<br>
                                                        <strong>Email:</strong>{{ $order->email }}<br>
                                                        <strong>Điện Thoại:</strong>{{ $order->phone }}<br>
                                                        <strong>Địa Chỉ:</strong>{{ $order->address }}<br>
                                                    </address>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <address>
                                                        <strong>Phương Thức Thanh Toán:</strong><br>
                                                        Trả Tiền Mặt<br>
                                                    </address>
                                                </div>
                                                <div class="col-md-6 text-md-right">
                                                    <address>
                                                        <strong>Ngày Đặt:</strong><br>
                                                        {{ date('d/m/Y', strtotime($order->date)) }}<br><br>
                                                    </address>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <div class="section-title">Thông Tin Mặt Hàng</div>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover table-md">
                                                    <tr>
                                                        <th data-width="40">#</th>
                                                        <th>Mặt Hàng</th>
                                                        <th class="text-center">Đơn Giá</th>
                                                        <th class="text-center">Số Lượng</th>
                                                        <th class="text-right">Tổng Cộng</th>
                                                    </tr>
                                                    @foreach ($order_detail as $item)
                                                        <tr>
                                                            <td>{{ $item->order_detail_id }}</td>
                                                            <td>{{ $item->product->name }}</td>
                                                            <td class="text-center">
                                                                {{ number_format($item->unit_price, 0, ',', '.') . 'đ' }}
                                                            </td>
                                                            <td class="text-center">{{ $item->quantity }}</td>
                                                            <td class="text-right">
                                                                {{ number_format($item->quantity * $item->unit_price, 0, ',', '.') . 'đ' }}
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </table>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-lg-8">
                                                    <div class="section-title">Phương Thức Thanh Toán</div>
                                                    <p class="section-lead">Trả Tiền Mặt</p>
                                                </div>
                                                <div class="col-lg-4 text-right">
                                                    <div class="invoice-detail-item">
                                                        <div class="invoice-detail-name">Tạm Tính</div>
                                                        <div class="invoice-detail-value">
                                                            {{ number_format($total, 0, ',', '.') . 'đ' }}</div>
                                                    </div>
                                                    <div class="invoice-detail-item">
                                                        <div class="invoice-detail-name">Phí Vận Chuyển</div>
                                                        <div class="invoice-detail-value">
                                                            {{ number_format(10000, 0, ',', '.') . 'đ' }}</div>
                                                    </div>
                                                    <hr class="mt-2 mb-2">
                                                    <div class="invoice-detail-item">
                                                        <div class="invoice-detail-name">Tổng Cộng</div>
                                                        <div class="invoice-detail-value invoice-detail-value-lg">
                                                            {{ number_format($billTotal, 0, ',', '.') . 'đ' }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="text-md-right">

                                    <button class="btn btn-warning btn-icon icon-left btn__print_invoice"><i class="fas fa-print"></i>
                                        In</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $('.btn__print_invoice').on('click', function () {
            let printBody = $('.invoice-print');
            let originalContent = $('body').html();
            $('body').html(printBody.html());
            window.print();
            $('body').html(originalContent);
        });
    </script>
@endpush
