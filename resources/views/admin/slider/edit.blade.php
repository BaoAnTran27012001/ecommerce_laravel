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
                            <h4>Chỉnh Sửa Thanh Trượt</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{ route('admin.slider.update', $slider->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label class="d-block" for="">Ảnh Hiện Tại</label>
                                        <img width="240px" src="{{ asset($slider->banner) }}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Ảnh Cho Thanh Trượt</label>
                                        <input type="file" class="form-control" name="banner">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Loại</label>
                                        <input type="text" class="form-control" name="type"
                                            value="{{ $slider->type }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tiêu đề</label>
                                        <input type="text" class="form-control" name="title"
                                            value="{{ $slider->title }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Ưu đãi</label>
                                        <input type="text" class="form-control" name="preferential"
                                            value="{{ $slider->preferential }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Đường dẫn</label>
                                        <input type="text" class="form-control" name="btn_url"
                                            value="{{ $slider->btn_url }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Thứ tự</label>
                                        <input type="text" class="form-control" name="order"
                                            value="{{ $slider->order }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputState">Trạng Thái</label>
                                        <select value={{ $slider->status }} id="inputState" class="form-control"
                                            name="status">
                                            <option value="1" selected>Hoạt động</option>
                                            <option value="0">Không Hoạt Động</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Sửa</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
