@foreach($listProduct as $pro)
<div class="card" style="width: 16rem">
    <img src="../public/uploads/{{$pro['img']}}" class="card-img-top" alt="ảnh sản phẩm" />
    <div class="card-body">
        <h5 class="card-title product-title-name-all">{{$pro['name']}}</h5>
        <div class="card-views">
            <div class="d-flex align-items-center">
                <!-- <del class="me-1">{{$pro['del_price']}}</del> -->
                <p class="card-text">Giá: {{$pro['min_price'] ." -> ".$pro['max_price']." VNĐ"}}</p>
            </div>
            <span>Lượt mua : {{$pro['buys']}}</span>
        </div>
        <div class="card-views d-flex justify-content-between">
            <span>Trạng thái: <span class="{{$pro['status']=='Ngừng bán'?'ngungban':''}}">{{$pro['status']}}</span></span>
            <span>Tồn kho: {{$pro['count']}}</span>
        </div>
        <div class="card-thaotac mt-2 d-flex justify-content-center align-items-center">
            <button data-id="{{$pro['id']}}" class="btn btn-outline-success propertyPro">Chi tiết</button>
            <button data-id="{{$pro['id']}}" class="btn btn-outline-primary editPro mx-2">Sửa</button>
            <button data-id="{{$pro['id']}}" class="btn btn-outline-danger">Xóa</button>
        </div>
    </div>
</div>
@endforeach