@extends('layout.index')
@section('title')
<title>Sản phẩm</title>
@endsection
@section('content')
<div id="root">
    <input type="hidden" id="pageToday" value="1">
    <h2 class="py-4 title-admin">Danh sách sản phẩm</h2>
    <div class="box-product-right-content new-product" id="listPro"></div>
    <div class="listLocsp d-flex justify-content-center align-items-center"></div>
</div>
<div id="log"></div>
<script>
    let root = $("#root").html();

    function select_data(page = 1, size = 4) {
        $.ajax({
            url: "/admin/product/getData",
            method: 'POST',
            data: {
                page: page,
                size: size
            },
            success: function(data) {
                $("#listPro").html(data);
            }
        })
    }

    function getCurent(pageToday = 1, size = 4) {
        $.ajax({
            url: "/admin/product/getCurent",
            method: 'POST',
            data: {
                pageToday: pageToday,
                size: size
            },
            success: function(data) {
                $(".listLocsp").html(data);
            }
        });
    }

    function select_property(id) {
        $.ajax({
            url: '/admin/product/info',
            method: 'POST',
            data: {
                id: id
            },
            success: function(data) {
                $("#root").html(data);
            }
        });
    }

    function view_editPro(id) {
        $.ajax({
            url: '/admin/product/editPro',
            method: 'GET',
            data: {
                id: id
            },
            success: function(data) {
                $("#root").html(data);
            }
        });
    }

    $(document).ready(function() {
        getCurent();
        select_data();
        $(document).on('click', ".toggle_page", function() {
            select_data($(this).val());
            $("#pageToday").val($(this).val());
            getCurent($("#pageToday").val());
            root = $("#root").html();
        });

        $(document).on('click', ".propertyPro", function() {
            id = $(this).data("id");
            select_property(id);
        });

        $(document).on('click', "#backListPro", function() {
            $("#root").html(root);
            select_data($("#pageToday").val());
            getCurent($("#pageToday").val());
        });

        $(document).on('click', ".editPro", function() {
            id = $(this).data("id");
            view_editPro(id)
        });
    });
</script>
@endsection