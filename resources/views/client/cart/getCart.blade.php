@if(empty($listCart))
<h3 class='pt-5 pb-5' style='text-align: center;'>Không có sản phẩm nào</h3>
@else
    @foreach($listCart as $key => $cart)
    <div class="cart d-flex align-items-center justify-content-between">
        <div class="cart_input">
            <input type="checkbox" class="cart_sp_id" {{$cart['checked']}} name="cart{{$key}}" value="{{$key}}" id="">
        </div>
        <div class="cart_image">
            <img src="../public/uploads/{{$cart['img']}}" width="100px" alt="">
        </div>
        <div class="cart_title">
            <a href="">
                <h6 style="max-width: 230px;">{{$cart['name']}}</h6>
            </a>
        </div>
        <div class="cart_proinfor">
            <p>Màu sắc: {{$cart['color']}}</p>
            <p>Kích cỡ: {{$cart['size']}}</p>
        </div>
        <div class="cart_price">
            <p>{{$cart['price']}} VNĐ</p>
        </div>
        <div class="cart_count">
            <div class="rangerInput d-flex justify-content-center align-items-center">
                @if($cart['count'] != 'Hết hàng')
                <button type="button" data-idpp="{{$cart['idpp']}}" class="btnRangeDown border">-</button>
                <input type="text" class="inputRange witdh" value="{{$cart['count']}}" readonly>
                <button type="button" data-idpp="{{$cart['idpp']}}" class="btnRangeUp border">+</button>
                @else
                <input type="text" class="inputRange" value="{{$cart['count']}}" readonly>
                @endif
            </div>
        </div>
        <div class="cart_total">
            <p><span class="cart_price-total">{{$cart['total']}}</span> VNĐ</p>
        </div>
        <div class="cart_thaotac">
            <button type="button" class="btn btnDeleteCart" data-key="{{$key}}">Xóa</button>
        </div>
    </div>
    <hr>
    @endforeach
@endif