@extends('admin.layouts.master')

@section('section')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Danh Mục</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></div>
                <div class="breadcrumb-item">Danh Mục</div>
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
                                        <th>Trạng Thái</th>
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
                                                @if ($category->status == 1)
                                                    <label style="cursor: pointer" class="custom-switch mt-2">
                                                        <input type="checkbox" checked name="custom-switch-checkbox"
                                                            class="custom-switch-input change-status"
                                                            data-id="{{ $category->id }}">
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>
                                                @else
                                                    <label style="cursor: pointer" class="custom-switch mt-2">
                                                        <input type="checkbox" name="custom-switch-checkbox"
                                                            class="custom-switch-input change-status"
                                                            data-id="{{ $category->id }}">
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>
                                                @endif

                                            </td>
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
@push('scripts')
    <script>
        $(document).ready(function() {
            $('body').on('click', '.change-status', function() {
                let isChecked = $(this).is(':checked');
                let id = $(this).data('id');
                $.ajax({
                    url: "{{ route('admin.category-change-status') }}",
                    method: "PUT",
                    data: {
                        _token: "{{ csrf_token() }}",
                        isChecked: isChecked,
                        id: id
                    },
                    success: function(response) {

                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endpush
