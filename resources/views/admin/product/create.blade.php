@extends('admin.layouts.master')

@section('section')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Sản Phẩm</h1>

        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tạo Sản Phẩm</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{ route('admin.products.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Hình Ảnh</label>
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tên</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputState">Danh Mục</label>
                                        <select id="inputState" class="form-control" name="category">
                                            <option value="1">Chọn</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputState">Trạng Thái</label>
                                        <select value={{ old('status') }} id="inputState" class="form-control"
                                            name="status">
                                            <option value="1" selected>Hoạt động</option>
                                            <option value="0">Không Hoạt Động</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputState">Thương Hiệu</label>
                                        <select id="inputState" class="form-control" name="brand">
                                            <option value="">Chọn</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Giá Gốc</label>
                                        <input type="text" class="form-control price" name="price"
                                            value="{{ old('price') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Giá Bán</label>
                                        <input type="text" class="form-control discount_price"
                                            value="{{ old('discount_price') }}" name="discount_price">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Số lượng trong kho</label>
                                                <input type="number" class="form-control" name="inventory_quantity"
                                                    min="0" value="{{ old('inventory_quantity') }}" readonly
                                                    id="inventory">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Số lượng nhập</label>
                                                <input type="number" class="form-control" name="input_quantity"
                                                    min="0" value="{{ old('input_quantity') }}" id="input_quantity">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Số lượng xuất</label>
                                                <input type="number" class="form-control" name="output_quantity"
                                                    min="0" value="{{ old('output_quantity') }}"
                                                    id="output_quantity">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Mô tả</label>
                                        <textarea name="description" class="form-control"></textarea>
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
