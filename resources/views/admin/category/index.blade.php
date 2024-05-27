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
                            <h4>Danh Mục</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Tạo mới</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>Biểu tượng</th>
                                        <th>Tên</th>
                                        <th>Hành động</th>
                                    </tr>

                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>
                                                <i style="font-size: 24px" class="{{ $category->icon }}"></i>
                                            </td>
                                            <td>{{ $category->name }}</td>
                                            <td>
                                                <a href="{{ route('admin.category.edit', $category->id) }}"
                                                    class="btn btn-warning">Sửa</a>
                                                <a id="delete-btn"
                                                    href="{{ route('admin.category.destroy', $category->id) }}"
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
