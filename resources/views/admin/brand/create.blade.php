@extends('admin.layouts.master')

@section('section')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Thương Hiệu</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Bảng Điều Khiển</a></div>
                <div class="breadcrumb-item"><a href="#">Thương Hiệu</a></div>
                <div class="breadcrumb-item"></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tạo Thương Hiệu</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.brand.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Ảnh Cho Thương Hiệu</label>
                                    <input type="file" class="form-control" name="logo">
                                </div>
                                <div class="form-group">
                                    <label for="">Tên</label>
                                    <input type="text" class="form-control" name="name" value="">
                                </div>
                                <div class="form-group">
                                    <label for="inputState">Thương Hiệu Nổi Bật ?</label>
                                    <select value="" id="inputState" class="form-control" name="is_featured">
                                        <option value="1" selected>Có</option>
                                        <option value="0">Không</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputState">Trạng Thái</label>
                                    <select value="" id="inputState" class="form-control" name="status">
                                        <option value="1" selected>Hoạt động</option>
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
    </section>
@endsection
