@extends('admin.layouts.master')

@section('section')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Danh Mục</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            <div class="card-header-action">
                                <a href="{{ route('admin.slider.create') }}" class="btn btn-primary">Tạo mới</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>Hình ảnh</th>
                                        <th>Tiêu đề</th>
                                        <th>Thứ tự</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <img width="120px"
                                                src=""
                                                alt="preview-banner">
                                        </td>
                                        <td>Áo Nam</td>
                                        <td>1</td>
                                        <td>
                                           Hoạt động

                                        </td>
                                        <td>
                                            <a href=""
                                                class="btn btn-warning">Sửa</a>
                                            <a id="delete-btn" href=""
                                                class="btn btn-danger">Xoá</a>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
