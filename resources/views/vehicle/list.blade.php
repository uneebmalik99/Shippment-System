@extends('layouts.partials.mainlayout')
@section('body')
    <div>
        <div class="bg-primary bg-gradient p-3">
            <h5 class="text-white">Vehicle Page</h5>
        </div>
        <div class="bg-danger">
            <div class="text-info col-10 d-flex justify-content-between p-3">
                <div>
                    <a class="vehicles" id="all_vehicles" style="cursor:pointer;" value="all_vehicles">All Vehicles</a>
                </div>
                <div>
                    <a class="vehicles" id="new_order" style="cursor:pointer;" value="new_order">New Order</a>
                </div>
                <div>
                    <a class="vehicles" id="posted"style="cursor:pointer;" value="posted">Posted</a>
                </div>
                <div>
                    <a class="vehicles" id="dispatch"style="cursor:pointer;" value="dispatch">Dispatch</a>
                </div>
                <div>
                    <a class="vehicles" id="on_hand"style="cursor:pointer;" value="on_hand">On hand</a>
                </div>
                <div>
                    <a class="vehicles" id="titles"style="cursor:pointer;" value="titles">No Titles</a>
                </div>
                <div>
                    <a class="vehicles" id="towing"style="cursor:pointer;" value="towing">Towing</a>
                </div>
            </div>
        </div>
        <div class="bg-success">
            <div class="col-10 d-flex justify-content-between p-3">
                <div>
                    <a class="locations" id="NJ" style="cursor:pointer;" value="NJ">New Jersey</a>
                </div>
                <div>
                    <a class="locations" id="SAV" style="cursor:pointer;" value="SAV">Savannah</a>
                </div>
                <div>
                    <a class="locations" id="TX" style="cursor:pointer;" value="TX">Texas</a>
                </div>
                <div>
                    <a class="locations" id="LA" style="cursor:pointer;" value="LA">Los Angeles</a>
                </div>
                <div>
                    <a class="locations" id="SEA" style="cursor:pointer;" value="SEA">Seattle</a>
                </div>
                <div>
                    <a class="locations" id="BAL" style="cursor:pointer;" value="BAL">Baltimore</a>
                </div>
                <div>
                    <a class="locations" id="NFK" style="cursor:pointer;" value="NFK">Norfolk</a>
                </div>
            </div>
        </div>
        <div class="bg-light px-3 pt-4 pb-2 d-flex justify-content-between">
            <div class="col-5 d-flex align-items-center text-info">
                <span><b>Show</b></span>
                <div class="col-3 d-flex justify-content-center px-1">
                    <select class="form-control border border-info rounded col-10" name="pagination"
                        id="pagination_vehicle">
                        <option value="100">100</option>
                        <option value="200">200</option>
                        <option value="300">300</option>
                    </select>
                </div>
                <span><b>Entries</b></span>
            </div>
            <div class="col-7 d-flex justify-content-end align-items-center ml-4">
                <div class="col-8 p-0">
                    <input type="text" class="btn border border-info rounded col-12 text-dark text-left"
                        id="search_vehicle" name="search" placeholder="Search by customer name, year, make, model...">
                </div>
                <div class="col-3">
                    <a href="{{ route('vehicle.create') }}" class="text-black btn btn-info rounded col-12">New<i
                            class="fas fa-car pl-2"></i></a>
                </div>
            </div>
        </div>
        <div class="bg-light" style="height: 100%;overflow-x: scroll;">
            <table class="table table-hover sortable scroll">
                <thead class="bg-light">
                    <th class="sorttable_nosort">Sr</th>
                    <th>CUSTOMER NAME</th>
                    <th>VIN</th>
                    <th>YEAR</th>
                    <th>MAKE</th>
                    <th>MODEL</th>
                    <th>VEHICLE_TYPE</th>
                    <th>VALUE</th>
                    <th>BUYER</th>
                    <th class="sorttable_nosort">Action</th>
                </thead>
                <tbody id="tbody">
                    @if (@$records->count() == 0)
                        <tr>
                            <td colspan="10" class="h6 text-muted text-center">NO CUSTOMERS TO DISPLAY</td>
                        </tr>
                    @endif
                    @foreach ($records as $val)
                        <tr>
                            <td>{{ @$val['id'] }}</td>
                            <td>{{ @$val['customer_name'] }}</td>
                            <td>{{ @$val['vin'] }}</td>
                            <td>{{ @$val['year'] }}</td>
                            <td>{{ @$val['make'] }}</td>
                            <td>{{ @$val['model'] }}</td>
                            <td>{{ @$val['vehicle_type'] }}</td>
                            <td>{{ @$val['value'] }}</td>
                            <td>{{ @$val['customer']['customer_name'] }}</td>
                            <td>
                                <button><a href={{ url($module['action'] . '/edit/' . $val[$module['db_key']]) }}><i
                                            class="ti-pencil"></i></a></button><button><a
                                        href={{ url($module['action'] . '/delete/' . $val[$module['db_key']]) }}><i
                                            class="ti-trash"></i></a></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end p-2" id="page">
            <p>
                Displaying {{ $records->count() }} of {{ $records->total() }} vehicle(s).
            </p>
        </div>
    </div>
@endsection
