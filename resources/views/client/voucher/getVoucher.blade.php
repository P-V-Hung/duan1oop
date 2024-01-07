<div class="voucher_content-main d-flex py-2 px-4 justify-content-between align-items-center border my-4">
    <div class="img d-flex justify-content-center align-items-center">Voucher</div>
    <div class="title">
        Giảm: <span class="priceVoucher">{{$voucher['price']}}</span>
        <br>
        <span class="free">
            #{{$voucher['name']}}
        </span>
        <br>
        <span style="color:blue">
            {{$voucher['status']}}
        </span>
    </div>
    <div class="voucher_content-time">
        <p>Từ: {{$voucher['create']}}</p>
        <p>Đến: {{$voucher['arrtive']}}</p>
    </div>
    <div class="voucher_content-btn">
        @if($voucher['arrtive'] < date('Y-m-d'))
            Hết hạn
        @elseif($voucher['count'] <= 0)
            Hết hàng
        @else
            <input type="radio" name="voucher" class="voucherRadio" data-price="{{$voucher['price']}}" value="{{$voucher['id']}}" id="">
        @endif
    </div>
</div>