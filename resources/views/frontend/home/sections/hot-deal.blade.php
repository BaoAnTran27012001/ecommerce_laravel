  <!--============================
                HOT DEALS START
            ==============================-->
  <section id="wsus__hot_deals" class="wsus__hot_deals_2">
      <div class="container">
          <div class="row">
              <div class="col-xl-12">
                  <div class="wsus__section_header">
                      <h3>Deal hot trong ngày</h3>
                  </div>
              </div>
          </div>
          <div class="wsus__hot_large_item">
              <div class="row">
                  <div class="col-xl-12">
                      <div class="wsus__section_header justify-content-start">
                          <div class="monthly_top_filter2 mb-1">
                              <button class="ms-0 active" data-filter="*">test category 1</button>
                              <button data-filter=".clotha">test category 2</button>
                              <button data-filter=".eleca">test category 3</button>
                              <button data-filter=".spka">test category 4</button>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="row grid2">
                  @foreach ($products as $product)
                      <div class="col-xl-3 col-sm-6 col-md-4 col-lg-4 clotha spka wata">
                          <div class="wsus__product_item">
                              <a class="wsus__pro_link" href="{{ route('product-detail', $product->id) }}">
                                  <img src="{{ $product->thumb_image }}" alt="product" class="img-fluid w-100 img_1" />
                                  <img src="{{ $product->thumb_image }}" alt="product" class="img-fluid w-100 img_2" />
                              </a>
                              <ul class="wsus__single_pro_icon">
                                  <li><a href="#" data-bs-toggle="modal"
                                          data-bs-target="#exampleModal-{{ $product->id }}"><i
                                              class="far fa-eye"></i></a></li>
                                  <li><a href="{{ route('wishlist.add') }}" class="add_to_wishlist"
                                          data-id="{{ $product->id }}"><i class="far fa-heart"></i></a></li>
                              </ul>
                              <div class="wsus__product_details">
                                  <a class="wsus__category" href="#">{{ $product->category->name }} </a>
                                  <a class="wsus__pro_name"
                                      href="href="{{ route('product-detail', $product->id) }}">{{ $product->name }}</a>
                                  <div class="price-container d-flex gap-5">
                                      <p class="wsus__price">
                                          {{ number_format($product->discount_price, 0, ',', '.') . 'đ' }}
                                      </p>
                                      <p class="wsus__price text-danger text-decoration-line-through text-center">
                                          {{ number_format($product->price, 0, ',', '.') . 'đ' }}</p>
                                  </div>
                                  <form class="shopping-cart-form">
                                      <input type="hidden" name="product_id" value="{{ $product->id }}">
                                      <input type="hidden" min="1" max="100" value="1"
                                          name="qty" />
                                      <button class="add_cart" style="border: none" type="submit">Thêm Vào Giỏ Hàng</button>
                                  </form>
                              </div>
                          </div>
                      </div>
                  @endforeach


              </div>
          </div>

          <section id="wsus__single_banner" class="home_2_single_banner">
              <div class="container">
                  <div class="row">
                      <div class="col-xl-12 col-lg-12">
                          <div class="wsus__single_banner_content banner_1">
                              <div class="wsus__single_banner_img">
                                  <img src="{{ asset('frontend/images/single_banner_55.jpg') }}" alt="banner"
                                      class="img-fluid w-100">
                              </div>
                              <div class="wsus__single_banner_text">
                                  <h6>giảm giá<span>20%</span></h6>
                                  <h3>đồ em bé</h3>
                                  <a class="shop_btn" href="#">mua ngay</a>
                              </div>
                          </div>
                      </div>

                  </div>
              </div>
          </section>

        
      </div>
  </section>
  <!--============================ HOT DEALS END  ==============================-->


  <!--========================== PRODUCT MODAL VIEW START ===========================-->
  @foreach ($products as $product)
      <section class="product_popup_modal">
          <div class="modal fade" id="exampleModal-{{ $product->id }}" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-body">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                                  class="far fa-times"></i></button>
                          <div class="row">
                              <div class="col-xl-6 col-12 col-sm-10 col-md-8 col-lg-6 m-auto display">
                                  <div class="wsus__quick_view_img">
                                      <div class="row modal_slider">
                                          <div class="col-xl-12">
                                              <div class="modal_slider_img">
                                                  <img src="{{ asset($product->thumb_image) }}"
                                                      alt="{{ $product->name }}" class="img-fluid w-100">
                                              </div>
                                          </div>
                                          @foreach ($product->imageGallery as $image)
                                              <div class="col-xl-12">
                                                  <div class="modal_slider_img">
                                                      <img src="{{ asset($image->image_path) }}"
                                                          alt="{{ $product->name }}" class="img-fluid w-100">
                                                  </div>
                                              </div>
                                          @endforeach


                                      </div>
                                  </div>
                              </div>
                              <div class="col-xl-6 col-12 col-sm-12 col-md-12 col-lg-6">
                                  <div class="wsus__pro_details_text">
                                      <a class="title" href="#">{{ $product->name }}</a>
                                      <p class="wsus__stock_area"><span class="in_stock">trong kho</span>
                                          ({{ $product->inventory_quantity }})
                                      </p>
                                      <h4>{{ $product->discount_price }} <del>{{ $product->price }}</del></h4>
                                      <p class="description">{{ $product->description }}
                                      </p>


                                      <form class="shopping-cart-form">
                                          <div class="wsus__quentity">
                                              <input type="hidden" name="product_id" value="{{ $product->id }}">
                                              <h5>số lượng :</h5>
                                              <div class="select_number">
                                                  <input class="number_area" type="text" min="1"
                                                      max="100" value="1" name="qty" />
                                              </div>
                                              {{-- <h3>$50.00</h3> --}}
                                          </div>
                                          <ul class="wsus__button_area">
                                              <li><button type="submit" class="add_cart">thêm giỏ hàng</button></li>
                                              <li><a class="buy_now" href="#">mua ngay</a></li>
                                              <li><a href="#"><i class="fal fa-heart"></i></a></li>

                                          </ul>
                                      </form>

                                      <p class="brand_model"><span>thương hiệu :</span> {{ $product->brand->name }}
                                      </p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
  @endforeach

  <!--========================== PRODUCT MODAL VIEW END ===========================-->
