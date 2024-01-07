@foreach($listPro as $pro)
<div class="card">
    <a href="/chitietsp?id={{$pro['id']}}">
        <img src="../public/uploads/{{$pro['img']}}" class="card-img-top" alt="ảnh sản phẩm" />
        <div class="card-body">
            <h5 class="card-title product-title-name-all">{{$pro['name']}}</h5>
            <div class="card-views">
                <div class="d-flex align-items-center">
                    <del class="me-1">{{($pro['del_price']!=0)?$pro['del_price']:''}}</del>
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