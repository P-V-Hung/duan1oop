@extends('layout.index')
@section('title')
<title>Chi tiết đơn hàng</title>
@endsection
@section('content')
<main class="container">
    <h5 class="pt-5">Chi tiết tin đơn hàng</h5>
    <div class="listcart border mt-4 pt-3 ">
        <div class="cart d-flex align-items-center justify-content-between ps-2">
            <div class="cart_sp">
                <p>Sản phẩm</p>
            </div>
            <div class="ps-5">Tên sản phẩm</div>
            <div class="ps-3">Cấu hình</div>
            <div class="cart_price pe-4">
                <p>Đơn giá</p>
            </div>
            <div class="cart_count">
                <p>Số lượng</p>
            </div>
            <div class="cart_total pe-4">
                <p>Số tiền</p>
            </div>
        </div>
        <hr>
        <!-- Danh sách -->
        @foreach ($echoBill as $bill)
            <div class="cart d-flex align-items-center justify-content-between px-3">
                <div class="cart_image">
                    <img src="../public/uploads/{{$bill['img']}}" width="100px" alt="">
                </div>
                <div class="cart_title">
                    <h6><a href="chitietsp?id={{$bill['idpro']}}">{{$bill['name']}}</a></h6>
                </div>
                <div class="cart_proinfor">
                    <p>Phân loại: {{$bill['color']}}</p>
                    <p>Cấu hình: {{$bill['size']}}</p>
                </div>
                <div class="cart_price">
                    <p>{{$bill['price']}} vnđ</p>
                </div>
                <div class="cart_count">
                    <p>{{$bill['count']}}</p>
            </div>
            <div class="cart_total">
                <p>{{$bill['total']}} vnđ</p>
            </div>
        </div>
        <hr>
        @endforeach
        <div class="cart_footer mt-5 p-4 position-sticky">
            <div class="cart_btn d-flex justify-content-between align-items-center">
                <div class="cart_btn_thaotac">
                    <p>Ưu đãi từ voucher: <span style="font-size: 1.2rem;"> {{$voucher}} VNĐ</span></p>
                    <p>Phí vận chuyển: <span style="font-size: 1.2rem;"> + 30,000 VNĐ</span></p>
                </div>
                <p>Tổng bill: <span style="font-size: 1.5rem;color: red;">{{$total}}</span> <span style="color: red;">VNĐ</span></p>
            </div>
        </div>
    </div>
</main>
@endsection