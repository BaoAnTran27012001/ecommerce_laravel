@extends('frontend.dashboard.layouts.master')
@section('content')
    <section id="wsus__dashboard">
        <div class="container-fluid">
            @include('frontend.dashboard.layouts.sidebar')
            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9  ms-auto">
                    <div class="dashboard_content">
                        <h3><i class="fas fa-list-ul"></i>Hoá Đơn Đặt</h3>
                        <div class="wsus__dashboard_order">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="" style="width: 162px">#</th>
                                            <th class="" style="width: 162px">Mã Hoá Đơn</th>
                                            <th class="" style="width: 162px">Ngày Đặt</th>
                                            <th class="" style="width: 162px">Khách Hàng</th>
                                            <th class="" style="width: 162px">Địa Chỉ</th>
                                            <th class="" style="width: 162px">Điện Thoại</th>
                                            <th class="" style="width: 162px">Hành Động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($fe_customer_orders as $item)
                                            <tr>
                                                <td class="" style="width: 162px">{{ $item->id }}</td>
                                                <td class="" style="width: 162px">{{ $item->invoice_no }}</td>
                                                <td class="" style="width: 162px">
                                                    {{ date('d/m/Y', strtotime($item->date)) }}</td>
                                                <td class="" style="width: 162px">{{ $item->name }}</td>
                                                <td class="" style="width: 162px">{{ $item->address }}
                                                </td>
                                                <td class="" style="width: 162px">{{ $item->phone }}
                                                </td>
                                                <td class="" style="width: 162px"><a
                                                        href="{{ route('user.show.order', $item->id) }}">Xem Chi Tiết</a>
                                                </td>
                                            </tr>
                                        @endforeach



                                    </tbody>
                                </table>
                            </div>
                            <div id="pagination">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
