@if(count($terminals) > 0)
<option selected disabled>Select Terminals</option>
 @foreach ($terminals as $states)
 <option value="{{ $states['id'] }}">
    {{ $states['name'] }}</option>
 @endforeach
 @else
 <option selected disabled>No Port Found</option>
 @endif
