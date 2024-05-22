@extends('admin.layouts.master')

@section('section')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Thanh Trượt</h1>

        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tạo Thanh Trượt</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{ route('admin.slider.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Ảnh Cho Thanh Trượt</label>
                                        <input type="file" class="form-control" name="banner">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Loại</label>
                                        <input type="text" class="form-control" name="type"
                                            value="{{ old('type') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tiêu đề</label>
                                        <input type="text" class="form-control" name="title"
                                            value="{{ old('title') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Ưu đãi</label>
                                        <input type="text" class="form-control" name="preferential"
                                            value="{{ old('preferential') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Đường dẫn</label>
                                        <input type="text" class="form-control" name="btn_url"
                                            value="{{ old('btn_url') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Thứ tự</label>
                                        <input type="text" class="form-control" name="order"
                                            value="{{ old('order') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputState">Trạng Thái</label>
                                        <select value={{ old('status') }} id="inputState" class="form-control"
                                            name="status">
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

        </div>
    </section>
@endsection
