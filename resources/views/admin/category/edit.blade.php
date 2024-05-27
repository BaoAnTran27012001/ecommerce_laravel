@extends('admin.layouts.master')

@section('section')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Danh Mục</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item"></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Sửa Danh Mục</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.category.update',$category->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label class="d-block" for="">Biểu tượng</label>
                                    <button class="btn btn-primary" data-selected-class="btn-danger"
                                        data-icon="{{ $category->icon }}" data-unselected-class="btn-info" role="iconpicker"
                                        name="icon"></button>
                                </div>
                                <div class="form-group">
                                    <label for="">Tên</label>
                                    <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="inputState">Trạng Thái</label>
                                    <select value="" id="inputState" class="form-control" name="status">
                                        <option {{ $category->status == 1 ? 'selected' : '' }} value="1">Hoạt động
                                        </option>
                                        <option {{ $category->status == 0 ? 'selected' : '' }} value="0">Không Hoạt Động
                                        </option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Sửa</button>
                            </form>

                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
