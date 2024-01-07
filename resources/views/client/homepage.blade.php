@extends('layout.index')
@section('title')
<title>Trang chủ</title>
@endsection
@section('content')
<div class="container-xxl">
    <div class="banner">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://tse1.mm.bing.net/th?id=OIP.ugctw4soj6o8xOQ_Emlv8gHaDf&pid=Api&P=0&h=220" class="d-block w-100" alt="..." />
                </div>
                <div class="carousel-item">
                    <img src="https://cdn-www.vinid.net/2020/08/789dc446-bannerweb_vsmart_1920x1080-1536x864.jpg" class="d-block w-100" alt="..." />
                </div>
                <div class="carousel-item">
                    <img src="https://png.pngtree.com/png-clipart/20220823/original/pngtree-stereo-mobile-phone-camera-airplane-plant-summer-travel-planning-web-banners-png-image_8473386.png" class="d-block w-100" alt="..." />
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- content -->

    <div class="new-product">
        <h3>Sản phẩm mới</h3>
        <div class="box-product-right-content">
            @foreach($listProNew as $pro)
            <div class="card">
                <a href="/chitietsp?id={{$pro['id']}}">
                    <img src="../public/uploads/{{$pro['img']}}" class="card-img-top" alt="ảnh sản phẩm" />
                    <div class="card-body">
                        <h5 class="card-title product-title-name-all">{{$pro['name']}}</h5>
                        <div class="card-views">
                            <div class="d-flex align-items-center">
                                <del class="me-1">{{$pro['del_price']}}</del>
                                <p class="card-text">Giá: {{$pro['min_price']."VNĐ"}}</p>
                            </div>
                            <span>Lượt mua : {{$pro['buys']}}</span>
                        </div>
                        <div class="card-views d-flex justify-content-between">
                            <!-- <span>Trạng thái: <span class="{{$pro['status']=='Ngừng bán'?'ngungban':''}}">{{$pro['status']}}</span></span> -->
                            <span>Số lượng: {{$pro['count']}}</span>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>


    </div>

    <!-- Các sản phẩm hot -->

    <div class="hot-product">
        <h1>Sản phẩm hot</h1>
        <div class="box-product-right-content">
            @foreach($listProHot as $pro)
            <div class="card">
                <a href="/chitietsp?id={{$pro['id']}}">
                    <img src="../public/uploads/{{$pro['img']}}" class="card-img-top" alt="ảnh sản phẩm" />
                    <div class="card-body">
                        <h5 class="card-title product-title-name-all">{{$pro['name']}}</h5>
                        <div class="card-views">
                            <div class="d-flex align-items-center">
                                <del class="me-1">{{$pro['del_price']}}</del>
                                <p class="card-text">Giá: {{$pro['min_price']."VNĐ"}}</p>
                            </div>
                            <span>Lượt mua : {{$pro['buys']}}</span>
                        </div>
                        <div class="card-views d-flex justify-content-between">
                            <!-- <span>Trạng thái: <span class="{{$pro['status']=='Ngừng bán'?'ngungban':''}}">{{$pro['status']}}</span></span> -->
                            <span>Số lượng: {{$pro['count']}}</span>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
<script>
</script>
@endsection