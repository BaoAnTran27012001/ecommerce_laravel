@extends('admin.layouts.master')

@section('section')
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">

            <div class="row mt-sm-4">

                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form method="post" class="needs-validation" novalidate=""
                            action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h4>Cập Nhật Thông Tin</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3">
                                        <img width="100px" src="{{ asset(Auth::user()->image) }}" alt="">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Ảnh đại diện</label>
                                        <input type="file" name="image" class="form-control" name="name">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Tên</label>
                                        <input type="text" class="form-control" value="{{ Auth::user()->name }}"
                                            required="" name="name">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Email</label>
                                        <input type="text" class="form-control" value="{{ Auth::user()->email }}"
                                            required="" name="email">
                                    </div>
                                </div>

                            </div>


                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Save Changes</button>
                    </div>
                    </form>
                </div>

                <div class="col-12 col-md-12 col-lg-7">

                    <div class="card">
                       
                        <form method="post" class="needs-validation" novalidate=""
                            action="{{ route('admin.password.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h4>Cập Nhật Mật Khẩu</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="form-group col-12">
                                        <label>Mật khẩu cũ</label>
                                        <input name="current_password" type="password" class="form-control">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Mật khẩu mới</label>
                                        <input name="password" type="password" class="form-control">
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Xác nhận mật khẩu</label>
                                        <input name="password_confirmation" type="password" class="form-control">
                                    </div>
                                </div>

                            </div>


                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Save Changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
