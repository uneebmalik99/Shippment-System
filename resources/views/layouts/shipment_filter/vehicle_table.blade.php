{{$row->id}}
{{-- <div class="modal fade" id="exampleModalCenter{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index:999999999999999">
    <div class="modal-dialog" role="document" style="max-width: 1170px;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div id="status_body" class="mt-2 bg-light" style="height: 100%;overflow-x: scroll;">
                <table id="vehicle_table" class="table row-border vehicle_table">
                    <thead class="bg-custom" style="color:white!important;">
                        <tr>
                            <th class="font-bold-tr">Sr</th>
                            <th class="font-bold-tr">Customer Name</th>
                            <th class="font-bold-tr w-50"> VIN </th>
                            <th class="font-bold-tr">YEAR</th>
                            <th class="font-bold-tr">MAKE</th>
                            <th class="font-bold-tr">MODEL</th>
                            <th class="font-bold-tr">VEHICLE TYPE</th>
                            <th class="font-bold-tr">VALUE</th>
                            <th class="font-bold-tr">ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white font-size" id="vehicle_tbody">
                        @if(count($vehicles) > 0)
                        @foreach ($vehicles as $vehicle)
                        <tr>
                            <td>{{@$vehicle->id}}</td>
                            <td>{{@$vehicle->customer_name}}</td>
                            <td>{{@$vehicle->vin}}</td>
                            <td>{{@$vehicle->year}}</td>
                            <td>{{@$vehicle->make}}</td>
                            <td>{{@$vehicle->model}}</td>
                            <td>{{@$vehicle->vehicle_type}}</td>
                            <td>{{@$vehicle->value}}</td>
                            <td>
                                <button class='profile-button'><a href="{{route('vehicle.profile', @$vehicle->id)}}">
                                    <svg width='14' height='13' viewBox='0 0 16 14' fill='none'
                                        xmlns='http://www.w3.org/2000/svg'>
                                        <path
                                            d='M16 7C16 7 13 2.1875 8 2.1875C3 2.1875 0 7 0 7C0 7 3 11.8125 8 11.8125C13 11.8125 16 7 16 7ZM1.173 7C1.65651 6.35698 2.21264 5.7581 2.833 5.21237C4.12 4.0845 5.88 3.0625 8 3.0625C10.12 3.0625 11.879 4.0845 13.168 5.21237C13.7884 5.7581 14.3445 6.35698 14.828 7C14.77 7.07613 14.706 7.16013 14.633 7.252C14.298 7.672 13.803 8.232 13.168 8.78763C11.879 9.9155 10.119 10.9375 8 10.9375C5.88 10.9375 4.121 9.9155 2.832 8.78763C2.21165 8.2419 1.65552 7.64301 1.172 7H1.173Z'
                                            fill='#048B52' />
                                        <path
                                            d='M8 4.8125C7.33696 4.8125 6.70107 5.04297 6.23223 5.4532C5.76339 5.86344 5.5 6.41984 5.5 7C5.5 7.58016 5.76339 8.13656 6.23223 8.5468C6.70107 8.95703 7.33696 9.1875 8 9.1875C8.66304 9.1875 9.29893 8.95703 9.76777 8.5468C10.2366 8.13656 10.5 7.58016 10.5 7C10.5 6.41984 10.2366 5.86344 9.76777 5.4532C9.29893 5.04297 8.66304 4.8125 8 4.8125ZM4.5 7C4.5 6.18777 4.86875 5.40882 5.52513 4.83449C6.1815 4.26016 7.07174 3.9375 8 3.9375C8.92826 3.9375 9.8185 4.26016 10.4749 4.83449C11.1313 5.40882 11.5 6.18777 11.5 7C11.5 7.81223 11.1313 8.59118 10.4749 9.16551C9.8185 9.73984 8.92826 10.0625 8 10.0625C7.07174 10.0625 6.1815 9.73984 5.52513 9.16551C4.86875 8.59118 4.5 7.81223 4.5 7Z'
                                            fill='#048B52' />
                                    </svg>
                                    </a>
                            </button>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="text-align: center!important">Not Any Vehicle Assigned</td>
                            <td></td>
                            <td></td>

                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
       
      </div>
    </div>
  </div> --}}