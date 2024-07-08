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
                            <h4>Cập Nhật Sản Phẩm</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{ route('admin.products.update', $product->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="">Hình Ảnh Trước Đó</label>
                                        <br>
                                        <img src="{{ asset($product->thumb_image) }}" style="width: 200px"
                                            alt="preview_image">
                                    </div>


                                    <div class="form-group">
                                        <label for="">Hình Ảnh Hiện Tại</label>
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tên</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $product->name }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputState">Danh Mục</label>
                                        <select id="inputState" class="form-control" name="category">
                                            <option value="1">Chọn</option>
                                            @foreach ($categories as $category)
                                                <option {{ $category->id == $product->category_id ? 'selected' : '' }}
                                                    value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputState">Trạng Thái</label>
                                        <select value={{ $product->status }} id="inputState" class="form-control"
                                            name="status">
                                            <option {{ $product->status == 1 ? 'selected' : '' }} value="1" selected>
                                                Hoạt động</option>
                                            <option {{ $product->status == 0 ? 'selected' : '' }} value="0">Không Hoạt
                                                Động</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputState">Thương Hiệu</label>
                                        <select id="inputState" class="form-control" name="brand">
                                            <option value="">Chọn</option>
                                            @foreach ($brands as $brand)
                                                <option {{ $brand->id == $product->brand_id ? 'selected' : '' }}
                                                    value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Giá gốc</label>
                                        <input type="text" class="form-control" name="price"
                                            value="{{ $product->price }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Giá Giảm</label>
                                        <input type="text" class="form-control" value="{{ $product->discount_price }}"
                                            name="discount_price">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Số lượng trong kho</label>
                                                <input type="number" class="form-control" name="inventory_quantity"
                                                    min="0" value="{{ $product->inventory_quantity }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Số lượng nhập</label>
                                                <input type="number" class="form-control" name="input_quantity"
                                                    min="0" value="{{ $product->input_quantity }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Số lượng xuất</label>
                                                <input type="number" class="form-control" name="output_quantity"
                                                    min="0" value="{{ $product->output_quantity }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Mô tả</label>
                                        <textarea name="description" class="form-control">{{ $product->description }}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Cập Nhật</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
