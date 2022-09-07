@extends('layouts.partials.mainlayout')
@section('body')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-fullscreen scrollable mw-100 m-2 px-3 py-2" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between title_style">
                    <div>
                        <h5 class="modal-title" id="exampleModalLabel">New {{ $module['singular'] }}</h5>
                    </div>
                    <div>
                        <button type="button" class="close text-white h6" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    ...
                </div>
            </div>
        </div>
    </div>
    {{-- Modal End --}}

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
                <button type="button" class="text-white form-control-sm border py-1 btn-info rounded col-4 modal_button"
                    id="vehicle" style="background: #696CFF;" data-target="#exampleModal">
                    <div class="d-flex justify-content-center align-items-center">
                        <svg width="18" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19 7.99911H17V10.9991H14V12.9991H17V15.9991H19V12.9991H22V10.9991H19V7.99911ZM4 7.99911C3.98768 8.52776 4.08273 9.05342 4.27939 9.54429C4.47605 10.0352 4.77024 10.481 5.14415 10.855C5.51807 11.2289 5.96395 11.5231 6.45482 11.7197C6.94569 11.9164 7.47134 12.0114 8 11.9991C8.52866 12.0114 9.05431 11.9164 9.54518 11.7197C10.0361 11.5231 10.4819 11.2289 10.8558 10.855C11.2298 10.481 11.524 10.0352 11.7206 9.54429C11.9173 9.05342 12.0123 8.52776 12 7.99911C12.0123 7.47045 11.9173 6.94479 11.7206 6.45392C11.524 5.96305 11.2298 5.51718 10.8558 5.14326C10.4819 4.76934 10.0361 4.47516 9.54518 4.2785C9.05431 4.08184 8.52866 3.98679 8 3.99911C7.47134 3.98679 6.94569 4.08184 6.45482 4.2785C5.96395 4.47516 5.51807 4.76934 5.14415 5.14326C4.77024 5.51718 4.47605 5.96305 4.27939 6.45392C4.08273 6.94479 3.98768 7.47045 4 7.99911ZM10 7.99911C10.0129 8.26516 9.96993 8.53096 9.87398 8.77943C9.77802 9.02791 9.63115 9.25356 9.4428 9.44191C9.25446 9.63026 9.0288 9.77712 8.78032 9.87308C8.53185 9.96904 8.26605 10.012 8 9.99911C7.73395 10.012 7.46815 9.96904 7.21968 9.87308C6.9712 9.77712 6.74554 9.63026 6.5572 9.44191C6.36885 9.25356 6.22198 9.02791 6.12602 8.77943C6.03007 8.53096 5.98714 8.26516 6 7.99911C5.98714 7.73306 6.03007 7.46726 6.12602 7.21878C6.22198 6.97031 6.36885 6.74465 6.5572 6.55631C6.74554 6.36796 6.9712 6.22109 7.21968 6.12513C7.46815 6.02917 7.73395 5.98625 8 5.99911C8.26605 5.98625 8.53185 6.02917 8.78032 6.12513C9.0288 6.22109 9.25446 6.36796 9.4428 6.55631C9.63115 6.74465 9.77802 6.97031 9.87398 7.21878C9.96993 7.46726 10.0129 7.73306 10 7.99911ZM4 17.9991C4 17.2035 4.31607 16.4404 4.87868 15.8778C5.44129 15.3152 6.20435 14.9991 7 14.9991H9C9.79565 14.9991 10.5587 15.3152 11.1213 15.8778C11.6839 16.4404 12 17.2035 12 17.9991V18.9991H14V17.9991C14 17.3425 13.8707 16.6923 13.6194 16.0857C13.3681 15.4791 12.9998 14.9279 12.5355 14.4636C12.0712 13.9993 11.52 13.631 10.9134 13.3797C10.3068 13.1284 9.65661 12.9991 9 12.9991H7C5.67392 12.9991 4.40215 13.5259 3.46447 14.4636C2.52678 15.4013 2 16.673 2 17.9991V18.9991H4V17.9991Z"
                                fill="#FBFBFB" />
                        </svg>
                        <span class="pl-1 font-size">Add New User</span>
                    </div>
                </button>
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
                    <th>STATUS</th>
                    <th>BUYER</th>
                    <th class="sorttable_nosort">Action</th>
                </thead>
                <tbody id="tbody">
                    @if (@$records->count() == 0)
                        <tr>
                            <td colspan="10" class="h6 text-muted text-center">NO CUSTOMERS TO DISPLAY</td>
                        </tr>
                    @endif
                    <?php $i = 1; ?>
                    @foreach ($records as $val)
                        <tr>
                            <td>{{ @$i }}</td>
                            <td>{{ @$val['customer_name'] }}</td>
                            <td>{{ @$val['vin'] }}</td>
                            <td>{{ @$val['year'] }}</td>
                            <td>{{ @$val['make'] }}</td>
                            <td>{{ @$val['model'] }}</td>
                            <td>{{ @$val['vehicle_type'] }}</td>
                            <td>{{ @$val['value'] }}</td>
                            <td>{{ @$val['status'] }}</td>
                            <td>{{ @$val['customer']['customer_name'] }}</td>
                            <td>
                                <button><a href={{ url($module['action'] . '/edit/' . $val[$module['db_key']]) }}><i
                                            class="ti-pencil"></i></a></button><button><a
                                        href={{ url($module['action'] . '/delete/' . $val[$module['db_key']]) }}><i
                                            class="ti-trash"></i></a></button>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end p-2" id="page">
            <div>
                <div>
                    <p>
                        Displaying {{ $records->count() }} of {{ $records->total() }} vehicle(s).
                    </p>
                </div>
                <div>
                    {{ $records->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
