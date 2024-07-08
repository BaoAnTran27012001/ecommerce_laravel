@extends('admin.layouts.master')

@section('section')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Sản Phẩm</h1>
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

                            <div class="card-header-action">
                                <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Tạo mới</a>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>Hình ảnh</th>
                                        <th>Tên</th>
                                        <th>Giá Gốc</th>
                                        <th>Giá Giảm</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>

                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>
                                                <img width="120px" src="{{ url('/') . '/' . $product->thumb_image }}"
                                                    alt="preview-image">
                                            </td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->discount_price }}</td>
                                            <td>
                                                @if ($product->status)
                                                    <div class="badge badge-success">Hoạt động</div>
                                                @else
                                                    <div class="badge badge-danger">Không Hoạt động</div>
                                                @endif

                                            </td>
                                            <td>
                                                <a href="{{ route('admin.products.edit', $product->id) }}"
                                                    class="btn btn-warning">Sửa</a>
                                                <a id="delete-btn"
                                                    href="{{ route('admin.products.destroy', $product->id) }}"
                                                    class="btn btn-danger">Xoá</a>
                                                <div class="dropdown d-inline">
                                                    <button class="btn btn-primary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        Cài Đặt
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item has-icon"
                                                            href="{{ route('admin.products-image-gallery.index', ['product' => $product->id]) }}"><i
                                                                class="far fa-heart"></i> Hình Ảnh</a>

                                                    </div>
                                                </div>
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
