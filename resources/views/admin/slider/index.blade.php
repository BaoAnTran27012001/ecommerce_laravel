@extends('admin.layouts.master')

@section('section')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Thanh Trượt</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></div>
                <div class="breadcrumb-item">Thanh Trượt</div>
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
                                    @foreach ($sliders as $slider)
                                        <tr>
                                            <td>{{ $slider->id }}</td>
                                            <td>
                                                <img width="120px"
                                                    src="{{ $slider->banner != null ? asset($slider->banner) : '' }}"
                                                    alt="preview-banner">
                                            </td>
                                            <td>{{ $slider->title }}</td>
                                            <td>{{ $slider->order }}</td>
                                            <td>
                                                @if ($slider->status)
                                                    <div class="badge badge-success">Hoạt động</div>
                                                @else
                                                    <div class="badge badge-danger">Không Hoạt động</div>
                                                @endif

                                            </td>
                                            <td>
                                                <a href="{{ route('admin.slider.edit', $slider->id) }}"
                                                    class="btn btn-warning">Sửa</a>
                                                <a id="delete-btn" href="{{ route('admin.slider.destroy', $slider->id) }}"
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
