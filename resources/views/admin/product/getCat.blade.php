@if(isset($category))
<hr><hr>
<div class="input-group">
    <label class="form-control">{{$category['cat_name']}}</label>
</div> 
<p></p>
@endif

@foreach($listCat as $cat)
    @php
        $checked = "";
    @endphp
    @foreach($listCatPro as $cp)
        @if($cat['id'] == $cp['pc_idcat'])
            @php
                $checked = 'checked';
            @endphp
        @endif
    @endforeach
    <div class="input-group">
        <div class="input-group-text">
            <input class="form-check-input mt-0 {{$class}}" {{$checked}} name="cate{{$cat['id']}}" value="{{$cat['id']}}" type="checkbox">
        </div>
        <label class="form-control">{{$cat['cat_name']}}</label>
    </div> 
@endforeach