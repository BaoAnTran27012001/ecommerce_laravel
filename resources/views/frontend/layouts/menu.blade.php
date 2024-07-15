  <!--============================
        MAIN MENU START
    ==============================-->
  @php
      $categories = \App\Models\Category::all();

  @endphp
  <nav class="wsus__main_menu d-none d-lg-block">
      <div class="container">
          <div class="row">
              <div class="col-xl-12">
                  <div class="relative_contect d-flex">
                      <div class="wsus_menu_category_bar">
                          <i class="far fa-bars"></i>
                      </div>
                      <ul class="wsus_menu_cat_item show_home toggle_menu">
                          @foreach ($categories as $category)
                              <li><a href="#"><i class="{{ $category->icon }}"></i>{{ $category->name }}</a></li>
                          @endforeach
                          <li><a href="#"><i class="fal fa-gem"></i> View All Categories</a></li>
                      </ul>

                      <ul class="wsus__menu_item">
                          <li><a class="active" href="index.html">trang chủ</a></li>
                          <li><a href="product_grid_view.html">cửa hàng <i class="fas fa-caret-down"></i></a>
                              <div class="wsus__mega_menu">
                                  <div class="row">
                                      {{-- category --}}
                                      {{-- <div class="col-xl-3 col-lg-3">
                                          <div class="wsus__mega_menu_colum">
                                              <h4>women</h4>
                                              <ul class="wsis__mega_menu_item">
                                                  <li><a href="#">New Arrivals</a></li>
                                                  <li><a href="#">Best Sellers</a></li>
                                                  <li><a href="#">Trending</a></li>
                                                  <li><a href="#">Clothing</a></li>
                                                  <li><a href="#">Shoes</a></li>
                                                  <li><a href="#">Bags</a></li>
                                                  <li><a href="#">Accessories</a></li>
                                                  <li><a href="#">Jewlery & Watches</a></li>
                                              </ul>
                                          </div>
                                      </div> --}}


                                  </div>
                              </div>
                          </li>
                          <li><a href="blog.html">blog</a></li>
                          <li><a href="track_order.html">theo dõi đơn hàng</a></li>
                      </ul>
                      <ul class="wsus__menu_item wsus__menu_item_right">
                          <li><a href="contact.html">liên hệ</a></li>
                          @if (Auth::check())
                              <li><a href="{{ route('user.dashboard') }}">tài khoản</a></li>
                          @endif
                          @if (Auth::check())
                              <li>
                                  <form method="POST" action="{{ route('logout') }}">
                                      @csrf
                                      <a href="{{ route('logout') }}"
                                          onclick="event.preventDefault();
                                this.closest('form').submit();">Đăng
                                          Xuất</a>
                                  </form>
                              </li>
                          @else
                              <li><a href="{{ route('login') }}">Đăng Nhập</a></li>
                          @endif
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </nav>
  <!--============================
        MAIN MENU END
    ==============================-->

  <!--============================
        MOBILE MENU START
    ==============================-->
  <section id="wsus__mobile_menu">
      <span class="wsus__mobile_menu_close"><i class="fal fa-times"></i></span>
      <ul class="wsus__mobile_menu_header_icon d-inline-flex">

          <li><a href="wishlist.html"><i class="far fa-heart"></i> <span>2</span></a></li>

          <li><a href="compare.html"><i class="far fa-random"></i> </i><span>3</span></a></li>
      </ul>
      <form>
          <input type="text" placeholder="Tìm Kiếm">
          <button type="submit"><i class="far fa-search"></i></button>
      </form>

      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
              <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                  role="tab" aria-controls="pills-home" aria-selected="true">Danh Mục</button>
          </li>
          <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                  role="tab" aria-controls="pills-profile" aria-selected="false">menu chính</button>
          </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <div class="wsus__mobile_menu_main_menu">
                  <div class="accordion accordion-flush" id="accordionFlushExample">
                      <ul class="wsus_mobile_menu_category">
                          @foreach ($categories as $category)
                              <li><a href="#"><i class="{{ $category->icon }}"></i>{{ $category->name }}</a></li>
                          @endforeach
                      </ul>
                  </div>
              </div>
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              <div class="wsus__mobile_menu_main_menu">
                  <div class="accordion accordion-flush" id="accordionFlushExample2">
                      <ul>
                          <li><a href="index.html">home</a></li>
                          <li><a href="#" class="accordion-button collapsed" data-bs-toggle="collapse"
                                  data-bs-target="#flush-collapseThree" aria-expanded="false"
                                  aria-controls="flush-collapseThree">shop</a>
                              <div id="flush-collapseThree" class="accordion-collapse collapse"
                                  data-bs-parent="#accordionFlushExample2">
                                  <div class="accordion-body">
                                      <ul>
                                          <li><a href="#">men's</a></li>
                                          <li><a href="#">wemen's</a></li>
                                          <li><a href="#">kid's</a></li>
                                          <li><a href="#">others</a></li>
                                      </ul>
                                  </div>
                              </div>
                          </li>
                          <li><a href="vendor.html">vendor</a></li>
                          <li><a href="blog.html">blog</a></li>
                          <li><a href="daily_deals.html">campain</a></li>
                          <li><a href="#" class="accordion-button collapsed" data-bs-toggle="collapse"
                                  data-bs-target="#flush-collapseThree101" aria-expanded="false"
                                  aria-controls="flush-collapseThree101">pages</a>
                              <div id="flush-collapseThree101" class="accordion-collapse collapse"
                                  data-bs-parent="#accordionFlushExample2">
                                  <div class="accordion-body">
                                      <ul>
                                          <li><a href="404.html">404</a></li>
                                          <li><a href="faqs.html">faq</a></li>
                                          <li><a href="invoice.html">invoice</a></li>
                                          <li><a href="about_us.html">about</a></li>
                                          <li><a href="team.html">team</a></li>
                                          <li><a href="product_grid_view.html">product grid view</a></li>
                                          <li><a href="product_grid_view.html">product list view</a></li>
                                          <li><a href="team_details.html">team details</a></li>
                                      </ul>
                                  </div>
                              </div>
                          </li>
                          <li><a href="track_order.html">track order</a></li>
                          <li><a href="daily_deals.html">daily deals</a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!--============================
        MOBILE MENU END
    ==============================-->
