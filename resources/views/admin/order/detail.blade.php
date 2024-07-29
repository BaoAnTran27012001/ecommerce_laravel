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
                                                <div class="invoice-number">Order #{{ $order->invoice_no }}</div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <address>
                                                        <strong>Shipped To:</strong><br>
                                                        <strong>Name:</strong>{{ $order->name }}<br>
                                                        <strong>Email:</strong>{{ $order->email }}<br>
                                                        <strong>Phone:</strong>{{ $order->phone }}<br>
                                                        <strong>Address:</strong>{{ $order->address }}<br>
                                                    </address>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <address>
                                                        <strong>Payment Method:</strong><br>
                                                        Cash On Delivery<br>
                                                    </address>
                                                </div>
                                                <div class="col-md-6 text-md-right">
                                                    <address>
                                                        <strong>Order Date:</strong><br>
                                                        {{ date('d/m/Y', strtotime($order->date)) }}<br><br>
                                                    </address>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <div class="section-title">Order Summary</div>
                                            <p class="section-lead">All items here cannot be deleted.</p>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover table-md">
                                                    <tr>
                                                        <th data-width="40">#</th>
                                                        <th>Item</th>
                                                        <th class="text-center">Price</th>
                                                        <th class="text-center">Quantity</th>
                                                        <th class="text-right">Totals</th>
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Mouse Wireless</td>
                                                        <td class="text-center">$10.99</td>
                                                        <td class="text-center">1</td>
                                                        <td class="text-right">$10.99</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Keyboard Wireless</td>
                                                        <td class="text-center">$20.00</td>
                                                        <td class="text-center">3</td>
                                                        <td class="text-right">$60.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Headphone Blitz TDR-3000</td>
                                                        <td class="text-center">$600.00</td>
                                                        <td class="text-center">1</td>
                                                        <td class="text-right">$600.00</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-lg-8">
                                                    <div class="section-title">Payment Method</div>
                                                    <p class="section-lead">The payment method that we provide is to make it
                                                        easier for you to pay invoices.</p>
                                                    <div class="images">
                                                        <img src="assets/img/visa.png" alt="visa">
                                                        <img src="assets/img/jcb.png" alt="jcb">
                                                        <img src="assets/img/mastercard.png" alt="mastercard">
                                                        <img src="assets/img/paypal.png" alt="paypal">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 text-right">
                                                    <div class="invoice-detail-item">
                                                        <div class="invoice-detail-name">Subtotal</div>
                                                        <div class="invoice-detail-value">$670.99</div>
                                                    </div>
                                                    <div class="invoice-detail-item">
                                                        <div class="invoice-detail-name">Shipping</div>
                                                        <div class="invoice-detail-value">$15</div>
                                                    </div>
                                                    <hr class="mt-2 mb-2">
                                                    <div class="invoice-detail-item">
                                                        <div class="invoice-detail-name">Total</div>
                                                        <div class="invoice-detail-value invoice-detail-value-lg">$685.99
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="text-md-right">
                                    <div class="float-lg-left mb-lg-0 mb-3">
                                        <button class="btn btn-primary btn-icon icon-left"><i
                                                class="fas fa-credit-card"></i> Process Payment</button>
                                        <button class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i>
                                            Cancel</button>
                                    </div>
                                    <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i>
                                        Print</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
