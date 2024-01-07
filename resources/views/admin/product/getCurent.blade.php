<button value="{{($pageToday-1)<1?$count:$pageToday-1}}" class="btn border mx-2 toggle_page"><<</button>
@for($i = 1; $i <= $count; $i++)
    <button value="{{$i}}" class="{{$pageToday==$i?'today':''}} btn border mx-2 toggle_page">{{$i}}</button>
@endfor
<button value="{{($pageToday+1)>$count?1:$pageToday+1}}" class="btn border mx-2 toggle_page">>></button>