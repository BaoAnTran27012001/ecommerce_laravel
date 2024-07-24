@extends('frontend.dashboard.layouts.master')

@section('content')
    <section id="wsus__dashboard">
        <div class="container-fluid">
            @include('frontend.dashboard.layouts.sidebar')

            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i> {{ __('user.Profile') }}</h3>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                <h4>thông tin cơ bản</h4>

                                <form action="{{ route('user.profile.update') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <div class="wsus__dash_pro_img">
                                                <img src="{{ Auth::user()->image ? asset(Auth::user()->image) : asset('frontend/images/ts-2.jpg') }}"
                                                    alt="img" class="img-fluid w-100">
                                                <input type="file" name="image">
                                            </div>
                                        </div>

                                        <div class="col-md-12 mt-5">
                                            <div class="wsus__dash_pro_single">
                                                <i class="fas fa-user-tie"></i>
                                                <input type="text" placeholder="Name" name="name"
                                                    value="{{ Auth::user()->name }}">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="wsus__dash_pro_single">
                                                <i class="far fa-phone-alt"></i>
                                                <input type="text" placeholder="Phone" name="phone"
                                                    value="{{ Auth::user()->phone }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <button class="common_btn mb-4 mt-2" type="submit">upload</button>
                                    </div>
                                </form>






                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
