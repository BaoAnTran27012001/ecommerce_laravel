@extends('admin.layouts.master')

@section('section')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Hình Ảnh Sản Phẩm</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></div>
                <div class="breadcrumb-item">Sản Phẩm</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Sản Phẩm:{{ $product->name }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.products-image-gallery.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Hình Ảnh </label>
                                    <input type="file" name="image[]" class="form-control" multiple id="multi_images">
                                    <input type="hidden" value="{{ $product->id }}" name="product" id="product_id">
                                </div>
                                <button type="submit" class="btn btn-primary">Tải Hình Ảnh</button>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>Hình ảnh</th>
                                        <th>Hành động</th>
                                    </tr>

                                    @foreach ($product_images as $product_image)
                                        <tr>
                                            <td>{{ $product_image->id }}</td>
                                            <td>
                                                <img width="120px" src="{{ asset($product_image->image_path) }}"
                                                    alt="preview-image">
                                            </td>

                                            <td>
                                                <a id="delete-btn"
                                                    href="{{ route('admin.products-image-gallery.destroy', $product_image->id) }}"
                                                    class="btn btn-danger">Xoá</a>
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

