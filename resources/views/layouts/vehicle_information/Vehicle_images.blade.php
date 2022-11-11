@if(@$images)
@foreach(@$images as $img)  
<img src="{{asset($img['name'])}}" alt=""class="item_1 my-2" style="width:90px!important;height:60px!important;">
@endforeach
@endif