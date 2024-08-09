@extends('admin.layouts.master')

@section('section')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Đơn Mua</h1>
        </div>
        <a class="btn btn-primary text-white" href="{{ route('admin.purchase.index') }}">Quay Lại</a>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tạo Đơn Mua</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{ route('admin.purchase.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="">Nhà Cung Cấp</label>
                                            <br>
                                            <select name="supplier_choose" id="" class="form-control">
                                                <option value="">Chọn</option>
                                                @foreach ($suppliers as $supplier)
                                                    <option value="{{ $supplier->id }}">{{ $supplier->username }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Mã Đơn</label>
                                            <input type="text" class="form-control" name="purchase_no" value="{{ old('invoice_no') }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="">Tên Nhân viên</label>
                                            <input type="text" class="form-control" name="employee" value="{{ old('supplier_name') }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Thành Phố</label>
                                            <input type="text" class="form-control" name="city" value="{{ old('city') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Điện Thoại</label>
                                        <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Địa Chỉ</label>
                                        <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tình Trạng</label>
                                        <br>
                                        <select name="active_choose" id="" class="form-control" value="{{ old('status') }}">
                                            <option value=""></option>
                                            <option value="1">Hoạt Động</option>
                                            <option value="0">Không Hoạt Động</option>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Tạo</button>
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
