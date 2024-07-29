@extends('admin.layouts.master')

@section('section')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Đơn Đặt</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></div>
                <div class="breadcrumb-item">Đơn Đặt</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            <div class="card-header-action">
                                <a href="{{ route('admin.order.create') }}" class="btn btn-primary">Tạo mới</a>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>Mã Đơn Hàng</th>
                                        <th>Ngày Đặt</th>
                                        <th>Tên</th>
                                        <th>Số Điện Thoại</th>
                                        <th>Địa Chỉ</th>
                                        <th>Hành động</th>
                                    </tr>

                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->invoice_no }}</td>
                                            <td>
                                                {{ date('d/m/Y', strtotime($order->date)) }}
                                            </td>
                                            <td>{{ $order->name }}</td>
                                            <td>{{ $order->phone }}</td>
                                            <td>{{ $order->address }}</td>
                                            <td>
                                                <a href="{{ route('admin.order.show', $order->id) }}"
                                                    class="btn btn-warning">Chi Tiết Đơn Đặt</a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
