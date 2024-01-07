<table class="table table-reponse">
    <tr>
        <th>ID</th>
        <th>Tên danh mục</th>
        <th>Danh mục con</th>
        <th>Thao tác</th>
    </tr>
    @if(empty($listCat))
        <tr>
            <td colspan="4" class="text-center">Không có danh mục nào</td>
        </tr>
    @else
        @foreach ($listCat as $cat)
        <tr>
            <td>{{$cat['id']}}</td>
            <td contenteditable class="catname" data-id={{$cat['id']}}>{{$cat['cat_name']}}</td>
            <td><button class="catchild btn" data-id={{$cat['id']}}><i>danh mục con </i></button></td>
            <td><button data-id={{$cat['id']}} class="btn btn-danger btn-del-cart">Xóa</button></td>
        </tr>
        @endforeach
    @endif
</table>