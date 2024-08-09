@extends('admin.layouts.master')

@section('section')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Đơn Mua</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></div>
                <div class="breadcrumb-item">Đơn Mua</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            <div class="card-header-action">
                                <a href="{{ route('admin.purchase.create') }}" class="btn btn-primary">Tạo mới</a>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>Mã Đơn Mua</th>
                                        <th>Ngày Đặt</th>
                                        <th>Tên Nhân Viên</th>
                                        <th>Tên Nhà Cung Cấp</th>
                                        <th>Địa Chỉ</th>
                                        <th>Hành động</th>
                                    </tr>
                                    @foreach ($purchase_orders as $purchase)
                                        <tr>
                                            <td>{{ $purchase->invoice_no }}</td>
                                            <td>
                                                {{ date('d/m/Y', strtotime($purchase->date)) }}
                                            </td>
                                            <td>
                                                <div>
                                                    {{ $purchase->supplier_name }}
                                                </div>
                                                <div>
                                                    {{ $purchase->phone }}
                                                </div>
                                            </td>
                                            <td>{{ $purchase->supplier->username }}</td>
                                            <td>{{ $purchase->address }}</td>
                                            <td>
                                                <a href="{{ route('admin.purchase.show', $purchase->purchase_id) }}"
                                                    class="btn btn-warning">Chi Tiết Đơn Mua</a>
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
