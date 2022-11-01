@if( count($image_path) > 0)
<img src="{{asset(@$image_path[0]->name)}}" alt="" style="width:25px;height:25px;border-radius:50%;">
@else
<img src="" alt="" style="width:25px;height:25px;border-radius: 50%">
@endif