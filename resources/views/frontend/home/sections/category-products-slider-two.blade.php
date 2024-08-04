 <!--============================
                ELECTRONIC PART START
            ==============================-->
 <section id="wsus__electronic2">
     <div class="container">
         <div class="row">
             <div class="col-xl-12">
                 <div class="wsus__section_header">
                     <h3>Trang Phục & Quần Áo</h3>
                     <a class="see_btn" href="#">xem thêm <i class="fas fa-caret-right"></i></a>
                 </div>
             </div>
         </div>
         <div class="row flash_sell_slider">
             @foreach ($clothings as $item)
                 <div class="col-xl-3 col-sm-6 col-lg-4">
                     <div class="wsus__product_item">
                         <a class="wsus__pro_link" href="{{ route('product-detail', $item->id) }}">
                             <img src="{{ $item->thumb_image }}" alt="product" class="img-fluid w-100 img_1" />
                             <img src="{{ $item->thumb_image }}" alt="product" class="img-fluid w-100 img_2" />
                         </a>
                         <ul class="wsus__single_pro_icon">
                             <li><a href="#" data-bs-toggle="modal"
                                     data-bs-target="#exampleModal-{{ $item->id }}"><i class="far fa-eye"></i></a>
                             </li>
                             <li><a href="{{ route('wishlist.add') }}"><i class="far fa-heart"></i></a></li>
                         </ul>
                         <div class="wsus__product_details">
                             <a class="wsus__category" href="#">{{ $item->category->name }}</a>
                             <a class="wsus__pro_name"
                                 href="{{ route('product-detail', $item->id) }}">{{ $item->name }}</a>
                             <div class="price-container d-flex gap-5">
                                 <p class="wsus__price"> {{ number_format($item->discount_price, 0, ',', '.') . 'đ' }}
                                 </p>
                                 <p class="wsus__price text-danger text-decoration-line-through text-center">
                                     {{ number_format($item->price, 0, ',', '.') . 'đ' }}</p>
                             </div>

                             <form class="shopping-cart-form">
                                 <input type="hidden" name="product_id" value="{{ $item->id }}">
                                 <input type="hidden" min="1" max="100" value="1" name="qty" />
                                 <button class="add_cart" style="border: none" type="submit">Thêm Vào Giỏ Hàng</button>
                             </form>
                         </div>
                     </div>
                 </div>
             @endforeach

         </div>
     </div>
 </section>
 <!--============================
                        ELECTRONIC PART END
                    ==============================-->
