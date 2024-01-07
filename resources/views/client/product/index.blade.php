@extends('layout.index')
@section('title')
<title>Sản phẩm</title>
@endsection
@section('content')
<div class="container">
    <div class="box-product">
        <div class="box-product-left">
            <input type="hidden" value="0" id="idparentCat">
            <input type="hidden" value="0" id="idPrice">
            <div class="product-cate">
                <h3>Danh mục</h3>
                <ul id="listCat" class="list-group list-group-flush">

                </ul>
            </div>
            <div class="list-group product-price">
                <h3>Khoảng giá</h3>
                <ul class="list-group list-group-flush">
                    <button class="list-group-item list-group-item-action btn-price" value="1" type="button">
                        < 50.000đ
                    </button>
                    <button class="list-group-item list-group-item-action btn-price" value="2" type="button">
                        50.000 - 100.000đ
                    </button>
                    <button class="list-group-item list-group-item-action btn-price" value="3" type="button">
                        100.000 - 150.0000đ
                    </button>
                    <button class="list-group-item list-group-item-action btn-price" value="4" type="button">
                        150.000 - 200.000đ
                    </button>
                </ul>
            </div>
        </div>
        <div class="box-product-right">
            <div class="box-product-right-header">
                <p id="searchCat"></p>
                <p id="searchPrice"></p>
            </div>
            <div class="page mt-2 mb-1 d-flex justify-content-end align-items-center pe-4">
                <div id="listProduct" class="box-product-right-content">

                </div>
            </div>
            <div class="textLoadPro">
                <i class="fa-solid fa-spinner"></i>
            </div>
        </div>
    </div>
</div>
<script>
    var page = 1;
    var isLoading = false;
    $(document).ready(function() {
        loadProData(page,$("#idparentCat").val());

        $(window).scroll(function() {
            let heightContent = $(document).height() - 250;
            if ($(window).scrollTop() + $(window).height() >= heightContent) {
                if (isLoading) {
                    page++;
                    isLoading = false;
                    loadProData(page,$("#idparentCat").val());
                }
            }
        });

        loadCateData();
        $(document).on('click', ".btn-cate", function() {
            loadCateData($(this).val());
            if($(this).val() == 0){
                $("#searchCat").html("");
            }else{
                $("#searchCat").html("Danh mục: <b>"+$(this).text()+"<button class='btnXsearch'><i class='fa-solid fa-x'></i></button></b>");
            }
            $("#idparentCat").val($(this).val());
            page = 1;
            $("#listProduct").html("");
            loadProData(page, $("#idparentCat").val());
        });
        $(document).on('click', ".btn-price", function() {
            $("#idPrice").val($(this).val());
            page = 1;
            $("#listProduct").html("");
            $("#searchPrice").html("Giá tiền: <b>"+$(this).text()+"<button class='btnXPrice'><i class='fa-solid fa-x'></i></button></b>");
            loadProData(page, $("#idparentCat").val(),$("#idPrice").val());
        });


        $(document).on('click', ".btnXsearch", function() {
            $("#searchCat").html("");
            page = 1;
            $("#idparentCat").val(0);
            $("#listProduct").html("");
            loadProData(page, $("#idparentCat").val(), $("#idPrice").val());
        });
        $(document).on('click', ".btnXPrice", function() {
            $("#searchPrice").html("");
            page = 1;
            $("#listProduct").html("");
            $("#idPrice").val(0);
            loadProData(page, $("#idparentCat").val(),0);
        });
    });



    function loadProData(page, categories,price = 0) {
    $.ajax({
        url: "/getpro?page=" + page + "&categories=" + categories+ "&price=" + price,
        method: 'GET',
            beforeSend: function() {
                $(".textLoadPro").show();
            },
            success: function(data) {
                if (data != '') {
                    var content = $("#listProduct").html();
                    $("#listProduct").html(content += data);
                    isLoading = true;
                }
                $(".textLoadPro").hide();
            }
        });
    }

    function loadCateData(id = 0) {
        $.ajax({
            url: "/getcat?id=" + id,
            method: 'GET',
            success: function(data) {
                $("#listCat").html(data);
            }
        });
    }
</script>
@endsection