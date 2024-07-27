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
                        <h4>sản phẩm yêu thích</h4>
                        <ul>
                            <li><a href="{{ route('home') }}">trang chủ</a></li>
                            <li><a href="javascript;">sản phẩm yêu thích</a></li>
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
                                                    CART VIEW PAGE START
                                                ==============================-->
    <section id="wsus__cart_view">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wsus__cart_list wishlist">
                        <div class="table-responsive">
                            <table>
                                <tbody>
                                    <tr class="d-flex">
                                        <th class="wsus__pro_img">
                                            hình ảnh
                                        </th>

                                        <th class="wsus__pro_name">
                                            tên sản phẩm
                                        </th>

                                        <th class="wsus__pro_name">
                                            mô tả sản phẩm
                                        </th>


                                        <th class="wsus__pro_status">
                                            tình trạng
                                        </th>

                                        <th class="wsus__pro_tk">
                                            giá
                                        </th>

                                        <th class="wsus__pro_icon">
                                            hành động
                                        </th>
                                    </tr>
                                    @foreach ($wishlistProducts as $wishlistProduct)
                                        <tr class="d-flex">
                                            <td class="wsus__pro_img"><img
                                                    src="{{ asset($wishlistProduct->product->thumb_image) }}" alt="product"
                                                    class="img-fluid w-100">
                                                <a href="{{ route('wishlist.remove', $wishlistProduct->id) }}"><i
                                                        class="far fa-times"></i></a>
                                            </td>

                                            <td class="wsus__pro_name">
                                                <p>{{ $wishlistProduct->product->name }}</p>
                                            </td>

                                            <td class="wsus__pro_name">
                                                <p>{{ $wishlistProduct->product->description }}</p>
                                            </td>

                                            <td class="wsus__pro_status">
                                                <p>{{ $wishlistProduct->product->inventory_quantity == 0 ? 'Hết Hàng' : 'Còn Hàng' }}
                                                </p>
                                            </td>

                                            <td class="wsus__pro_tk">
                                                <h6>{{ number_format($wishlistProduct->product->discount_price, 0, ',', '.') . 'đ' }}
                                                </h6>
                                            </td>

                                            <td class="wsus__pro_icon">
                                                <a class="common_btn"
                                                    href="{{ route('product-detail', $wishlistProduct->product->id) }}">xem
                                                    sản phẩm</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
                                                    CART VIEW PAGE END
                                                ==============================-->
@endsection
