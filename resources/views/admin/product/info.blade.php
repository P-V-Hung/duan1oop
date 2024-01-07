<h2 class="py-4 title-admin">Biến thể sản phẩm</h2>
<input type="hidden" id="idpro" value="{{$product['id']}}">
<div class="strong-button">
    <input type="button" class="btn" id="backListPro" value="< Quay lại">
</div>
<div class="box-product-right-content new-product">
    @foreach($listProperty as $property)
    <div class="card card-edit" style="width: 17rem">
        <img src="../public/uploads/{{$product['pro_img']}}" class="card-img-top" alt="ảnh sản phẩm" />
        <div class="card-body">
            <h5 class="card-title product-title-name-all">{{$product['pro_name']}}</h5>
            <p class="card-text">Giá: {{number_format($property['pp_price'])}}</p>
            <div class="card-views d-flex justify-content-between">
                <span>Lượt mua : {{$property['pp_buys']}}</span>
                <span>Tồn kho : {{$property['pp_count']}}</span>
            </div>
            <div class="card-views d-flex justify-content-between">
                <span>Màu: {{$property['pp_color']}}</span>
                <span>Size: {{$property['pp_size']}}</span>
            </div>
            <div class="card-thaotac mt-2 d-flex justify-content-center align-items-center">
                <button data-id="{{$property['id']}}" class="btn btn-outline-primary me-3 edit-property">Cập nhật</button>
                <button data-id="{{$property['id']}}" class="btn btn-outline-danger del-property">Xóa</button>
            </div>
        </div>
    </div>
    @endforeach
    <div class="card_add p-2" style="width: 17rem;">
        <button id="add-property">
            <div class="card-botron">
                <p>Thêm biến thể</p>
                <span>
                    +
                </span>
            </div>
        </button>
    </div>
</div>
<script>
    btn = $("#add-property")[0].outerHTML;

    function insert_property() {
        $.ajax({
            url: '/admin/product/saveAddProperty',
            method: 'POST',
            data: new FormData($("#form-add-property").get(0)),
            contentType: false,
            processData: false,
            success: function(log) {
                $('#log').html(log);
                $(".card_add").html(btn);
                select_property($("#idpro").val());
            }
        })
    }
    function edit_property() {
        $.ajax({
            url: '/admin/product/saveeditproperty',
            method: 'POST',
            data: new FormData($("#form-edit-property").get(0)),
            contentType: false,
            processData: false,
            success: function(log) {
                $('#log').html(log);
                select_property($("#idpro").val());
            }
        })
    }

    function delete_property(id, idpro) {
        $.ajax({
            url: '/admin/product/delProperty',
            method: 'POST',
            data: {
                id: id,
                idpro: idpro
            },
            success: function(log) {
                $("#log").html(log);
                select_property($("#idpro").val());
            }
        });
    }
    $(document).ready(function() {
        $(document).on("click", "#add-property", function() {
            id = $("#idpro").val();
            $.ajax({
                url: '/admin/product/addProperty',
                method: 'POST',
                data: {
                    id: id
                },
                success: function(data) {
                    $(".card_add").html(data);
                }
            })
        });
        $(document).on("click", ".edit-property", function() {
            clickedButton = $(this); 
            id = $(this).data("id");
            idpro = $("#idpro").val();
            $.ajax({
                url: '/admin/product/editProperty',
                method: 'POST',
                data: {
                    id: id,
                    idpro: idpro
                },
                success: function(data) {
                    clickedButton.closest(".card").html(data);
                }
            });
        });

        $(document).on("click", ".close-add-property", function() {
            $(".card_add").html(btn);
        });

        $(document).on("click", ".close-edit-property", function() {
            select_property($("#idpro").val());
        });


        $(document).off('click', '.save-add-property').on('click', '.save-add-property', function() {
            insert_property();
        });
        
        // $(document).off('click', '.save-add-property').on('click', '.save-add-property', function() {
        //     insert_property();
        // });
        
        $(document).on('click','.save-edit-property', function() {
            edit_property();
        });
        
        $(document).off('click', '.del-property').on('click', '.del-property', function() {
            id = $(this).data("id");
            delete_property(id, $("#idpro").val());
        });

    });
</script>