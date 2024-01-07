<form id="form-edit-property">
    <input type="hidden" name="idpro" value="{{$product['id']}}">
    <input type="hidden" name="id" value="{{$property['id']}}">
    <img src="../public/uploads/{{$product['pro_img']}}" class="card-img-top add-propertyes" alt="ảnh sản phẩm" />
    <div class="card-body">
        <h5 class="card-title product-title-name-all pt-1">{{$product['pro_name']}}</h5>
        <div class="d-flex">
            <label for="price" class="text-center col-sm-8 col-form-label">Giá tiền</label>
            <label for="inputcount" class="text-center col-sm-4 col-form-label">Số lượng</label>
        </div>
        <div class="row d-flex">
            <div class="col-sm-8">
                <input type="number" value="{{$property['pp_price']}}" min="0" name="price" class="form-control" id="price">
            </div>
            <div class="col-sm-4">
                <input type="number" value="{{$property['pp_count']}}" min="0" name="count" class="form-control" id="inputcount">
            </div>
        </div>
        <div class="d-flex">
            <label for="inputPassword" class="text-center col-sm-6 col-form-label">Màu</label>
            <label for="inputPassword" class="text-center col-sm-6 col-form-label">Size</label>
        </div>
        <div class="row d-flex">
            <div class="col-sm-6">
                <input type="text" name="color" value="{{$property['pp_color']}}" class="form-control" id="inputPassword">
            </div>
            <div class="col-sm-6">
                <input type="text" name="size" value="{{$property['pp_size']}}" class="form-control" id="inputPassword">
            </div>
        </div>
        <div class="card-thaotac d-flex justify-content-center align-items-center pt-3">
            <button type="button" data-id="{{$property['id']}}" class="btn border border-primary mx-2 btn-outline-primary save-edit-property">Sửa</button>
            <button type="button" class="btn border border-danger mx-2 btn-outline-danger close-edit-property">Hủy</button>
        </div>
    </div>
</form>