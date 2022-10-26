@if(count($state) > 0)
<option selected disabled>Select State</option>
 @foreach ($state as $states)
     <option value="{{ @$states['id'] }}">{{ @$states['name'] }}</option>
 @endforeach
 @else
 <option selected disabled>No State Found</option>
 @endif
