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
                        <h4>sản phẩm</h4>
                        <ul>
                            <li><a href="#">trang chủ</a></li>
                            <li><a href="#">sản phẩm</a></li>
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
                                                                                                                                                                                                                                                PRODUCT PAGE START
                                                                                                                                                                                                                                            ==============================-->
    <section id="wsus__product_page">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="wsus__sidebar_filter ">
                        <p>lọc</p>
                        <span class="wsus__filter_icon">
                            <i class="far fa-minus" id="minus"></i>
                            <i class="far fa-plus" id="plus"></i>
                        </span>
                    </div>
                    <div class="wsus__product_sidebar" id="sticky_sidebar">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Danh Mục Sản Phẩm
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            @foreach ($categories as $category)
                                                <li><a
                                                        href="{{ route('product.index', ['category' => $category->id]) }}">{{ $category->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Giá
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="price_ranger">
                                            <form action="{{ url()->current() }}" method="GET">
                                                @csrf
                                                <input type="text" id="price_input" class="form-control"
                                                    name="price" />
                                                <button id="price_confirm" type="submit"
                                                    class="common_btn mt-4">lọc</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree3">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree3" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        thương hiệu
                                    </button>
                                </h2>
                                <div id="collapseThree3" class="accordion-collapse collapse show"
                                    aria-labelledby="headingThree3" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault11">
                                            <label class="form-check-label" for="flexCheckDefault11">
                                                gentle park
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckChecked22">
                                            <label class="form-check-label" for="flexCheckChecked22">
                                                colors
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckChecked222">
                                            <label class="form-check-label" for="flexCheckChecked222">
                                                yellow
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckChecked33">
                                            <label class="form-check-label" for="flexCheckChecked33">
                                                enice man
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckChecked333">
                                            <label class="form-check-label" for="flexCheckChecked333">
                                                plus point
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="row">
                        <div class="col-xl-12 d-none d-md-block mt-md-4 mt-lg-0">
                            <div class="wsus__product_topbar">
                                <div class="wsus__product_topbar_left">
                                    <div class="nav nav-pills" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">
                                        <button
                                            class="nav-link {{ session()->has('product_list_style') && session()->get('product_list_style') == 'grid' ? 'active' : '' }} list-view"
                                            data-id="grid" id="v-pills-home-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-home" type="button" role="tab"
                                            aria-controls="v-pills-home" aria-selected="true">
                                            <i class="fas fa-th"></i>
                                        </button>
                                        <button
                                            class="nav-link list-view {{ session()->has('product_list_style') && session()->get('product_list_style') == 'list' ? 'active' : '' }}"
                                            data-id="list" id="v-pills-profile-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-profile" type="button" role="tab"
                                            aria-controls="v-pills-profile" aria-selected="false">
                                            <i class="fas fa-list-ul"></i>
                                        </button>
                                    </div>
                                    <div class="wsus__topbar_select">
                                        <select class="select_2" name="state">
                                            <option>sắp xếp</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="wsus__topbar_select">
                                    <select class="select_2" name="state">
                                        <option>hiện 12</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade {{ session()->has('product_list_style') && session()->get('product_list_style') == 'grid' ? 'show active' : '' }}"
                                id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <div class="row" id="row_grid">
                                    @foreach ($products as $product)
                                        <div class="col-xl-4  col-sm-6">
                                            <div class="wsus__product_item">
                                                <a class="wsus__pro_link"
                                                    href="{{ route('product-detail', $product->id) }}">
                                                    <img src="{{ asset($product->thumb_image) }}" alt="product"
                                                        class="img-fluid w-100 img_1" />
                                                    <img src="{{ asset($product->thumb_image) }}" alt="product"
                                                        class="img-fluid w-100 img_2" />
                                                </a>
                                                <ul class="wsus__single_pro_icon">
                                                    <li><a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal-{{ $product->id }}"><i
                                                                class="far fa-eye"></i></a>
                                                    </li>
                                                    <li><a href="{{ route('wishlist.add') }}"
                                                            data-id="{{ $product->id }}"><i
                                                                class="far fa-heart"></i></a>
                                                    </li>

                                                </ul>
                                                <div class="wsus__product_details">
                                                    <a class="wsus__category"
                                                        href="#">{{ $product->category->name }}</a>
                                                    <a class="wsus__pro_name"
                                                        href="{{ route('product-detail', $product->id) }}">{{ $product->name }}</a>
                                                    <p class="wsus__price">
                                                        {{ number_format($product->discount_price, 0, ',', '.') . 'đ' }}
                                                        <del>{{ number_format($product->price, 0, ',', '.') . 'đ' }}</del>
                                                    </p>
                                                    <form class="shopping-cart-form">
                                                        <input type="hidden" name="product_id"
                                                            value="{{ $product->id }}">
                                                        <input type="hidden" min="1" max="100"
                                                            value="1" name="qty" />
                                                        <button class="add_cart" style="border: none" type="submit">Thêm
                                                            Vào Giỏ Hàng</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <div class="tab-pane fade {{ session()->has('product_list_style') && session()->get('product_list_style') == 'list' ? 'show active' : '' }}"
                                id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <div class="row">
                                    @foreach ($products as $product)
                                        <div class="col-xl-12">
                                            <div class="wsus__product_item wsus__list_view">
                                                <a class="wsus__pro_link"
                                                    href="{{ route('product-detail', $product->id) }}">
                                                    <img src="{{ asset($product->thumb_image) }}" alt="product"
                                                        class="img-fluid w-100 img_1" />
                                                    <img src="{{ asset($product->thumb_image) }}" alt="product"
                                                        class="img-fluid w-100 img_2" />
                                                </a>
                                                <div class="wsus__product_details">
                                                    <a class="wsus__category"
                                                        href="#">{{ $product->category->name }} </a>
                                                    <a class="wsus__pro_name" href="#">{{ $product->name }} </a>
                                                    <p class="wsus__price">
                                                        {{ number_format($product->discount_price, 0, ',', '.') . 'đ' }}
                                                        <del>{{ number_format($product->price, 0, ',', '.') . 'đ' }}</del>
                                                    </p>
                                                    <p class="list_description">{{ $product->description }}</p>
                                                    <ul class="wsus__single_pro_icon">
                                                        <form class="shopping-cart-form">
                                                            <input type="hidden" name="product_id"
                                                                value="{{ $product->id }}">
                                                            <input type="hidden" min="1" max="100"
                                                                value="1" name="qty" />
                                                            <button class="add_cart" style="border: none"
                                                                type="submit">Thêm
                                                                Vào Giỏ Hàng</button>
                                                        </form>
                                                        <li data-id="{{ $product->id }}"><a
                                                                href="route('wishlist.add')"><i
                                                                    class="far fa-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <section id="pagination">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <i class="fas fa-chevron-left"></i>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link page_active" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <i class="fas fa-chevron-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!--============================
                                                                                                                                                                                                                                                PRODUCT PAGE END
                                                                                                                                                                                                                                            ==============================-->
@endsection


@push('scripts')
    <script>
        $(document).ready(function() {
            $(document).ready(function() {
                $('#price_input').maskMoney({
                    thousands: '.',
                    precision: 0
                });
            });
            $('.list-view').on('click', function() {
                let style = $(this).data('id');
                $.ajax({
                    method: "GET",
                    url: "{{ route('product-list-view') }}",
                    data: {
                        style: style
                    },
                    success: function(data) {

                    }
                });
            });
        });
    </script>
@endpush
