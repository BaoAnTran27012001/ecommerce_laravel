 <!--============================
       MONTHLY TOP PRODUCT START
    ==============================-->
 <section id="wsus__monthly_top" class="wsus__monthly_top_2">
     <div class="container">
         <div class="row">
             <div class="col-xl-12">
                 <div class="wsus__section_header for_md">
                     <h3>Danh Mục Bán Chạy Của Tháng</h3>
                     <div class="monthly_top_filter">
                         @foreach ($categories as $category)
                             <button class=" active" data-filter="*">{{ $category->name }}</button>
                         @endforeach
                     </div>
                 </div>
             </div>
         </div>
         <div class="row">
             <div class="col-xl-12 col-lg-12">
                 <div class="row grid">
                     @foreach ($products as $product)
                         <div class="col-xl-2 col-6 col-sm-6 col-md-4 col-lg-3  elec cam wat">
                             <a class="wsus__hot_deals__single" href="#">
                                 <div class="wsus__hot_deals__single_img">
                                     <img src="{{ asset($product->thumb_image) }}" alt="{{ $product->name }}"
                                         class="img-fluid w-100">
                                 </div>
                                 <div class="wsus__hot_deals__single_text">
                                     <h5>{{ $product->name }}</h5>
                                     <p class="wsus__tk">
                                         {{ number_format($product->discount_price, 0, ',', '.') . 'đ' }} <del
                                             style="color: red">{{ number_format($product->price, 0, ',', '.') . 'đ' }}</del>
                                     </p>
                                 </div>
                             </a>
                         </div>
                     @endforeach

                 </div>
             </div>
         </div>
     </div>
 </section>
 <!--============================
       MONTHLY TOP PRODUCT END
    ==============================-->
