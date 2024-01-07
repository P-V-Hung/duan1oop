<button class="list-group-item list-group-item-action btn-cate" value="0" type="button">
    -> Danh mục gốc
</button>
@if(count($listCat) === 0)
    <p class="text-center pt-3">Không có danh mục nào</p>
@else
    @foreach($listCat as $cat)
        <button class="list-group-item list-group-item-action btn-cate" value="{{$cat['id']}}" type="button">
            {{$cat['cat_name']}}
        </button>
    @endforeach
@endif