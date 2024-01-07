@extends('layout.index')
@section('title')
<title>Thêm voucher</title>
@endsection

@section('content')
<h2 class="py-4 title-admin">Thêm mã giảm giá</h2>
<div class="listdanhmuc d-flex justify-content-center align-items-center p2-5">
    <form action="" method="post" class="formAddVou">
        <table>
            <tr>
                <td>Mã giảm giá</td>
                <td>
                    <input class="form-control" id="voucherCode" type="text" name="v_name" placeholder="Nhập/Tạo ngẫu nhiên" maxlength="16" autocomplete="off">
                    <span onclick="create()"><i class="fa-solid fa-shuffle"></i></span>
                </td>
            </tr>
            <tr>
                <td>Mức ưu đãi</td>
                <td>
                    <input class="form-control" list="price" type="text" name="v_price" placeholder="Số tiền giảm">
                    <datalist id="price">
                        <option value="10000">
                        <option value="20000">
                        <option value="30000">
                    </datalist>
                    <span>VNĐ</span>
                </td>
            </tr>
            <tr>
                <td>Số lượng</td>
                <td>
                    <input class="form-control" list="count" type="number" name="v_count" placeholder="Số lượng phát hành" min="1">
                    <datalist id="count">
                        <option value="10">
                        <option value="20">
                        <option value="30">
                        <option value="40">
                        <option value="50">
                    </datalist>
                </td>
            </tr>
            <tr>
                <td>Ngày hết hạn</td>
                <td><input class="form-control" type="date" name="v_arrtive"></td>
            </tr>
        </table>
        <input type="date" name="v_create" value="<?php echo date("Y-m-d") ?>" hidden>
        <input type="submit" class="addVou" name="btn_add-vou" value="Thêm">
    </form>

</div>
<script>
    function generateVoucherCode(length) {
        const charset = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        let voucherCode = "";

        for (let i = 0; i < length; i++) {
            const randomIndex = Math.floor(Math.random() * charset.length);
            voucherCode += charset[randomIndex];
        }

        return voucherCode;
    }

    const vou = document.querySelector("#voucherCode");

    function create() {
        const voucher = generateVoucherCode(16);
        vou.value = voucher;
    }
</script>

@endsection