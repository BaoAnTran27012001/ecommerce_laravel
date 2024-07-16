   @extends('frontend.layouts.master')
   @section('content')
       <!--============================
                                                             BREADCRUMB START
                                                        ==============================-->
       <section id="wsus__breadcrumb">
           <div class="wsus_breadcrumb_overlay">
               <div class="container">
                   <div class="row">
                       <div class="col-12">
                           <h4>Đăng Nhập</h4>
                           <ul>
                               <li><a href="#">Quay Lại Trang Chủ</a></li>
                           </ul>
                       </div>
                   </div>
               </div>
           </div>
       </section>
       <!--============================
                                                            BREADCRUMB END
                                                        ==============================-->


       <!--============================
                                                           LOGIN/REGISTER PAGE START
                                                        ==============================-->
       <section id="wsus__login_register">
           <div class="container">
               <div class="row">
                   <div class="col-xl-5 m-auto">
                       <div class="wsus__login_reg_area">
                           <ul class="nav nav-pills mb-3" id="pills-tab2" role="tablist">
                               <li class="nav-item" role="presentation">
                                   <button class="nav-link active" id="pills-home-tab2" data-bs-toggle="pill"
                                       data-bs-target="#pills-homes" type="button" role="tab"
                                       aria-controls="pills-homes" aria-selected="true">đăng nhập</button>
                               </li>
                               <li class="nav-item" role="presentation">
                                   <button class="nav-link" id="pills-profile-tab2" data-bs-toggle="pill"
                                       data-bs-target="#pills-profiles" type="button" role="tab"
                                       aria-controls="pills-profiles" aria-selected="true">đăng ký</button>
                               </li>
                           </ul>
                           <div class="tab-content" id="pills-tabContent2">
                               <div class="tab-pane fade show active" id="pills-homes" role="tabpanel"
                                   aria-labelledby="pills-home-tab2">
                                   <div class="wsus__login">
                                       <form method="POST" action="{{ route('user.login') }}">
                                           @csrf
                                           <div class="wsus__login_input">
                                               <i class="fas fa-user-tie"></i>
                                               <input id="email" type="email" value="{{ old('email') }}"
                                                   name="email" placeholder="Email">
                                           </div>
                                           <div class="wsus__login_input">
                                               <i class="fas fa-key"></i>
                                               <input id="password" type="password" placeholder="Mật Khẩu" name="password">
                                           </div>
                                           <div class="wsus__login_save">
                                               <div class="form-check form-switch">
                                                   <input id="remember_me" class="form-check-input" type="checkbox"
                                                       name="remember">
                                                   <label class="form-check-label" for="flexSwitchCheckDefault">Nhớ đăng
                                                       nhập</label>
                                               </div>
                                               <a class="forget_p" href="{{ route('password.request') }}">quên mật khẩu
                                                   ?</a>
                                           </div>
                                           <button class="common_btn" type="submit">đăng nhập</button>
                                           <p class="social_text">Đăng nhập bằng tài khoản Google</p>
                                           <ul class="wsus__login_link">
                                               <li><a href="{{ route('google.login') }}"><i class="fab fa-google"></i></a>
                                               </li>

                                           </ul>
                                       </form>
                                   </div>
                               </div>
                               <div class="tab-pane fade" id="pills-profiles" role="tabpanel"
                                   aria-labelledby="pills-profile-tab2">
                                   <div class="wsus__login">
                                       <form>

                                           <div class="wsus__login_input">
                                               <i class="far fa-envelope"></i>
                                               <input type="text" placeholder="Email">
                                           </div>
                                           <div class="wsus__login_input">
                                               <i class="fas fa-key"></i>
                                               <input type="text" placeholder="Mật Khẩu">
                                           </div>
                                           <div class="wsus__login_input">
                                               <i class="fas fa-key"></i>
                                               <input type="text" placeholder="Xác Nhận Mật Khẩu">
                                           </div>
                                           <div class="wsus__login_save">

                                           </div>
                                           <button class="common_btn" type="submit">Đăng ký</button>
                                       </form>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </section>
       <!--============================
                                                           LOGIN/REGISTER PAGE END
                                                        ==============================-->
   @endsection
