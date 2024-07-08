@extends('admin.layouts.master')

@section('section')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Profile') }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">{{ __('admin.Dashboard') }}</a></div>
                <div class="breadcrumb-item">{{ __('admin.Profile') }}</div>
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
                                <h4>{{ __('admin.Update Profile') }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="form-group col-md-6 col-12">
                                        <label>{{ __('admin.Name') }}</label>
                                        <input type="text" class="form-control" value="{{ Auth::user()->username }}"
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
                        <button class="btn btn-primary">{{ __('admin.Save Changes') }}</button>
                    </div>
                    </form>
                </div>

                <div class="col-12 col-md-12 col-lg-7">

                    <div class="card">

                        <form method="post" class="needs-validation" novalidate=""
                            action="{{ route('admin.password.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h4>{{ __('admin.Update Password') }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="form-group col-12">
                                        <label>{{ __('admin.Current Password') }}</label>
                                        <input name="current_password" type="password" class="form-control">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>{{ __('admin.New Password') }}</label>
                                        <input name="password" type="password" class="form-control">
                                    </div>

                                    <div class="form-group col-12">
                                        <label>{{ __('admin.Password Confirmation') }}</label>
                                        <input name="password_confirmation" type="password" class="form-control">
                                    </div>
                                </div>

                            </div>


                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">{{ __('admin.Save Changes') }}</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
