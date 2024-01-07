@extends('layout.index')
@section('title')
<title>Thanh toán</title>
@endsection
@section('content')
<main class="container-xxl mt-5">
    <form action="/savethanhtoan" id="formThanhToan" method="post">
        <div class="location border p-3">
            <div class="title_ship mb-1">
                <p><i class="fa-sharp fa-solid fa-location-dot"></i> Địa chỉ nhận hàng</p>
            </div>
            <div class="location_ship d-flex">
                <b> <small class="textFullname">{{$_SESSION['user']['fullname']}}</small> (+<small class="textTel">{{$_SESSION['user']['tel']}}</small>)</b>
                <p class="ms-5 textAddress">{{$_SESSION['user']['address']}}</p>
                <span class="mx-4">Mặc định</span>
                <input type="button" class="ms-5" id="click_location" value="Thay đổi">
            </div>
        </div>
        <div id="location_ship" class="vorcher d-none position-fixed">
            <div class="voucher_bong d-flex justify-content-center align-items-center">
                <div class="voucher_content border p-4">
                    <div class="header_voucher d-flex justify-content-between mb-3 align-items-center">
                        <span class="fs-5">Địa chỉ của tôi</span>
                    </div>
                    <hr>
                    <!-- list voucher -->
                    <div class="voucher_content-main py-4 px-4 border my-4">
                        <input class="border my-2 py-2" type="text" value="{{$_SESSION['user']['fullname']}}" name="fullname" placeholder="Họ và tên người nhận" id="fullname"><br>
                        <input class="border my-2 py-2" type="text" value="{{$_SESSION['user']['tel']}}" name="tel" placeholder="Số điện thoại" id="tel"><br>
                        <td class="api-tinh">
                            <select class="form-select" id="tinh">
                                @if(isset($fromAddress[3]) && !empty($fromAddress[3]))
                                <option value="">{{$fromAddress[3]}}</option>
                                @else
                                <option value="">Chọn tỉnh thành</option>
                                @endif
                            </select>
                            <select class="form-select my-1" id="huyen">
                                @if(isset($fromAddress[2]) && !empty($fromAddress[2]))
                                <option value="">{{$fromAddress[2]}}</option>
                                @else
                                <option value="">Chọn quận huyện</option>
                                @endif
                            </select>
                            <select class="form-select" id="xa">
                                @if(isset($fromAddress[1]) && !empty($fromAddress[1]))
                                <option value="">{{$fromAddress[1]}}</option>
                                @else
                                <option value="">Chọn xã</option>
                                @endif
                            </select>
                        </td>
                        <input type="hidden" name="tinh" id="textTinh" value="">
                        <input type="hidden" name="huyen" id="textHuyen" value="">
                        <input type="hidden" name="xa" id="textXa" value="">
                        <input class="border my-2 py-2" type="text" value="{{$address}}" placeholder="Địa chỉ" name="address" id="address"><br>
                    </div>
                    <div class="footer_voucher d-flex justify-content-end align-items-center">
                        <input type="button" id="location_back" value="Xác nhận" class="px-5 btn btn-outline-danger">
                    </div>
                </div>
            </div>
        </div>
        <!-- Danh sách sản phẩm -->
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
            @foreach ($listData as $bill)
            <input type="hidden" name="" value="">
            <div class="cart d-flex align-items-center justify-content-between px-3">
                <div class="cart_image">
                    <img src="../public/uploads/{{$bill['img']}}" width="100px" alt="">
                </div>
                <div class="cart_title">
                    <h6>{{ $bill['name'] }}</h6>
                </div>
                <div class="cart_proinfor">
                    <p>Phân loại: {{ $bill['color'] }}</p>
                    <p>Cấu hình: {{ $bill['size'] }}</p>
                </div>
                <div class="cart_price">
                    <p>{{ $bill['price'] }} vnđ</p>
                </div>
                <div class="cart_count">
                    <p>{{ $bill['count'] }}</p>
                </div>
                <div class="cart_total">
                    <p>{{ $bill['total'] }} vnđ</p>
                </div>
            </div>
            <hr>
            @endforeach
        </div>
        <!-- PTTT -->
        <div id="pttt" class="vorcher d-none position-fixed">
            <div class="voucher_bong d-flex justify-content-center align-items-center">
                <div class="voucher_content border p-4">
                    <div class="header_voucher d-flex justify-content-between mb-3 align-items-center">
                        <span class="fs-5">Phương thức thanh toán</span>
                    </div>
                    <!-- list voucher -->
                    <div class="voucher_content-main d-flex py-1 px-4 justify-content-between align-items-center border my-3">
                        <div class="voucher_content-time">
                            <label for="pttt1" class="fs-5">Thanh toán khi nhận hàng</label>
                        </div>
                        <div class="voucher_content-btn ptttt">
                            <input type="radio" value="1" name="pttt" checked id="pttt1">
                        </div>
                    </div>
                    <div class="voucher_content-main d-flex py-1 px-4 justify-content-between align-items-center border my-3">
                        <div class="voucher_content-time">
                            <label for="pttt2" class="fs-5">Thanh toán online</label>
                        </div>
                        <div class="voucher_content-btn ptttt">
                            <input type="radio" value="2" name="pttt" id="pttt2">
                        </div>
                    </div>
                    <div class="footer_voucher d-flex justify-content-end align-items-center">
                        <input type="button" id="pttt_back" value="Chọn" class="px-5 btn btn-outline-danger">
                    </div>
                </div>
            </div>
        </div>
        <div class="cart_footer mt-5 px-4 pb-4">
            <div class="cart_voucher d-flex align-items-center justify-content-between mb-3">
                <div class="pttt_cart d-flex align-items-center">
                    <div class="pttt_cart-title">
                        <span>Phương thức thanh toán</span>
                        <div class="d-flex">
                            <p>-> </p>
                            <p id="echoPttt"> Thanh toán khi nhận hàng</p>
                        </div>
                    </div>
                    <div class="pttt_cart_btn ms-4 pt-3">
                        <input type="button" id="pttt_click" value="Thay đổi">
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-end">
                    <span class="me-5">Shop Voucher</span>
                    <input type="button" id="click_voucher" value="Chọn hoặc nhập mã">
                </div>
            </div>
            <hr>
            <div class="cart_total d-flex justify-content-end">
                <table>
                    <tr>
                        <td>Tổng tiền hàng:</td>
                        <td class="p-2 ps-5 d-flex justify-content-end"> <span class="total_pro">{{number_format($total)}}</span> vnđ </td>
                    </tr>
                    <tr>
                        <td>Phí vận chuyển: </td>
                        <td class="p-2 ps-5 d-flex justify-content-end"> <span class="total_ship">30,000</span> vnđ</td>
                    </tr>
                    <tr>
                        <td>Voucher: </td>
                        <td class="p-2 ps-5 d-flex justify-content-end">- <span class="voucher_down">0</span> vnđ</td>
                    </tr>
                    <tr>
                        <td>Tổng thanh toán:</td>
                        <td class="p-2 ps-5 d-flex justify-content-end"> <input name="total_bill" class="text-end" id="total_cart" value="">vnđ</td>
                    </tr>
                </table>
            </div>
            <hr>
            <div class="cart_btn d-flex justify-content-end">
                <button type="submit" name="btn_muahang" class="btn btn-outline-danger">Đặt hàng</button>
            </div>
        </div>
        <input type="hidden" name="count" value="{{$count}}">
        <div id="vorcher" class="vorcher d-none position-fixed">
            <div class="voucher_bong d-flex justify-content-center align-items-center">
                <div class="voucher_content border p-4">
                    <div class="header_voucher d-flex justify-content-between mb-3 align-items-center">
                        <span>Chọn Voucher</span>
                        <a href="#">Hỗ trợ <i class="fa-solid fa-headphones-simple"></i></a>
                    </div>
                    <div style="flex-wrap: nowrap;" class="input-group mb-3">
                        <input type="text" class="form-control" id="text-voucher" placeholder="Nhập mã voucher" aria-label="Nhập mã voucher" aria-describedby="button-addon2">
                        <button style="width:200px" class="btn btn-outline-secondary" type="button" id="btn-queryvoucher">Tìm Voucher</button>
                    </div>
                    <!-- list voucher -->
                    <div id="listVou" class="div-list-voucher"></div>
                    <div class="footer_voucher d-flex justify-content-end align-items-center">
                        <input type="button" id="voucher_back" value="Xác Nhận" class="px-5 btn btn-outline-danger">
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>
<script>
    $(document).ready(function () {
        $('#formThanhToan').submit(function () {
            var tinh = $('#tinh option:selected').text();
            $('#textTinh').val(tinh);
            var huyen = $('#huyen option:selected').text();
            $('#textHuyen').val(huyen);
            var xa = $('#xa option:selected').text();
            $('#textXa').val(xa);
        });
    });
    $(document).on("click",".voucher_content-btn.ptttt input", function(){
        text = $(this).closest('.voucher_content-main').find('.voucher_content-time').text();
        $("#echoPttt").text(text);
    });


    function updateTotal(){
        price = $(".total_pro").text();
        price = parseInt(price.replace(/\,/g, ''));
        ship = $(".total_ship").text();
        ship = parseInt(ship.replace(/\,/g, ''));
        voucher =  $(".voucher_down").text();
        voucher = parseInt(voucher.replace(/\,/g, ''));
        carPrice = (price+ship - voucher);
        $("#total_cart").val(carPrice.toLocaleString());
    }
    $(document).ready(function() {
        $("#btn-queryvoucher").on('click', function() {
            text = $("#text-voucher").val();
            $.ajax({
                url: '/getvoucher',
                method: 'POST',
                data: {
                    text: text,
                },
                success: function(data) {
                    $("#listVou").html(data);
                }
            });
        });
        updateTotal();
        $(document).on('click',".voucherRadio", function() {
            price = $(this).data("price");
            $(".voucher_down").html(price.toLocaleString());
            updateTotal();
        });

    });

    $(document).ready(function() {
        $("#tinh").on('focus', function() {
            $.ajax({
                url: "https://provinces.open-api.vn/api/",
                type: "GET",
                success: function(reponse) {
                    var tinh = '';
                    for (i = 0; i < reponse.length; i++) {
                        tinh += '<option value="' + reponse[i].code + '">' + reponse[i].name + '</option>';
                    }
                    content = $("#tinh").html();
                    $("#tinh").html(content + tinh);
                }
            });
        });
        $('#tinh').change(function() {
            var idTinh = $('#tinh').val();
            $.ajax({
                url: "https://provinces.open-api.vn/api/p/" + idTinh + "?depth=2",
                type: "GET",
                success: function(data) {
                    var huyen = '';
                    var listHuyen = data.districts;
                    for (var i = 0; i < listHuyen.length; i++) {
                        huyen += '<option value="' + listHuyen[i].code + '">' + listHuyen[i].name + '</option>';
                    }
                    $("#huyen").html(huyen);
                }
            });
        });
        $('#xa').on("focus", function() {
            var idHuyen = $('#huyen').val();
            $.ajax({
                url: "https://provinces.open-api.vn/api/d/" + idHuyen + "?depth=2",
                type: "GET",
                success: function(data) {
                    var xa = '';
                    var listXa = data.wards;
                    for (var i = 0; i < listXa.length; i++) {
                        xa += '<option value="' + listXa[i].code + '">' + listXa[i].name + '</option>';
                    }
                    $("#xa").html(xa);
                }
            });
        });
    });

    function blockIn(idForm, block, none) {
        let locationShip = document.querySelector(idForm);
        document.getElementById(block).onclick = function() {
            locationShip.classList.remove("d-none");
            locationShip.classList.add("d-block");
        }

        document.getElementById(none).onclick = function() {
            locationShip.classList.remove("d-block");
            locationShip.classList.add("d-none");
        }
    }

    // load textinput
    function loadText(input, text) {
        input.addEventListener('input', function() {
            text.innerText = input.value;
        })
    }
    blockIn("#location_ship", "click_location", "location_back");
    blockIn("#vorcher", "click_voucher", "voucher_back");
    blockIn("#pttt", "pttt_click", "pttt_back");



    // Thông tin
    let fullname = document.getElementById('fullname');
    let tel = document.getElementById('tel');
    let address = document.getElementById('address');
    let textFullname = document.querySelector('.textFullname');
    let textAddress = document.querySelector('.textAddress');
    let textTel = document.querySelector('.textTel');
    loadText(fullname, textFullname);
    loadText(address, textAddress);
    loadText(tel, textTel);
</script>
@endsection