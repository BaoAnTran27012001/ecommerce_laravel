@extends('admin.layouts.master')
@section('section')
    <section class="section">
        <div class="section-header">
            <h1>Đơn Mua</h1>
        </div>
        <a class="btn btn-primary text-white" href="{{ route('admin.purchase.index') }}">Quay Lại</a>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{ route('admin.item.cofirm') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="purchase_order_id" value="{{ $purchase_id }}">
                                    <table class="table table-bordered table-md">
                                        <tr>
                                            <th>Mặt Hàng</th>
                                            <th>Số Lượng</th>
                                            <th>Đơn Giá</th>
                                        </tr>
                                        <tr>
                                            <td>

                                                <select name="product_select" id="" class="form-control">
                                                    <option value="">Chọn</option>
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->id }}">{{ $product->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" min="1"
                                                    name="purchase_quantity">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" min="1"
                                                    id="purchase_price" name="unit_price">
                                            </td>

                                        </tr>
                                    </table>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success">Xác Nhận</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            {{-- Card -2 --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{ route('admin.item.cofirm') }}" method="POST">
                                    @csrf
                                    <table class="table table-bordered table-md">
                                        <tr>
                                            <th>Mặt Hàng</th>
                                            <th>Số Lượng</th>
                                            <th>Đơn Giá</th>
                                            <th>Thành Tiền</th>
                                        </tr>
                                        @foreach ($puchase_order_detail as $item)
                                            <tr>
                                                {{ $item->purchased_quantity }}
                                            </tr>
                                        @endforeach
                                    </table>

                                </form>
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
        $(document).ready(function() {
            $('#purchase_price').maskMoney({
                thousands: '.',
                precision: 0
            });

        });
    </script>
@endpush
