@extends('layouts.partials.mainlayout')
@section('body')
    {{-- <style>
        .dataTables_scrollHead {
            width: 100% !important;
        }

        .dataTables_scrollHeadInner {
            width: 100% !important;
        }

        .modal-content {

            width: 80% !important;
            margin: 0 auto !important;
            z-index: 99999999;
        }
    </style> --}}
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
        style="z-index: 9999999999;">
        <div class="modal-dialog modal-fullscreen scrollable mw-100 m-2 px-3 py-2" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between title_style">
                    <div>
                        <h5 class="modal-title text-white" id="exampleModalLabel">New {{ $module['singular'] }}</h5>
                    </div>
                    <div>
                        <button type="button" class="close text-white h6" data-dismiss="modal" aria-label="Close"
                            style="margin-top: -11px;
                        font-size: 26px;">
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

    {{-- Document Import Modal Start --}}
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between title_style">
                    <div>
                        <h5 class="modal-title text-white" id="exampleModalLabel">New {{ $module['singular'] }}</h5>
                    </div>
                    <div>
                        <button type="button" class="close text-white h6" data-dismiss="modal" aria-label="Close"
                            style="margin-top: -11px;
                font-size: 26px;">
                            <span aria-hidden="true">x</span>
                        </button>
                    </div>
                </div>
                <div class="import-body p-3">
                    ...
                </div>
            </div>
        </div>
    </div>
    {{-- Document Import Modal End --}}


    {{-- @foreach ($status as $stat)
        @dd($stat['id'])
    @endforeach --}}
    {{-- @dd(count($records)) --}}
    {{-- customer design implementation --}}
    <div class="bg-white rounded p-2">
        {{-- badges start --}}
        <div class="d-flex m-2">
            <div class="col-4 p-1" id="1" tab="New Order" onclick="fetchVehicles(this.id)" style="cursor: pointer">
                <div class="col-12 py-0 px-1">
                    <div class="col-12 border-style card-rounded py-2 px-3">
                        <div class="d-flex">
                            <div class="col-10 text-muted p-0 d-flex align-items-center">
                                <div class="font-size"><span>New Orders</span></div>
                            </div>
                            <div class="col-2 p-2 d-flex justify-content-center align-items-center rounded"
                                style="background: rgba(96, 43, 33, 0.2); !important">
                                <img src="{{ asset('images/new_order.png') }}" alt="new order.png" height="22">

                            </div>
                        </div>
                        <div>
                            <div class="font-bold"><span>{{ @$new_orders->count() }}</span> </div>
                            <div class="py-1 col-12 text-muted p-0 font-size"><span>Total Vehicles
                                    <b>{{ count($records) }}</b>
                                </span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-4 p-1" id="2" tab="dispatched" onclick="fetchVehicles(this.id)" style="cursor:pointer">
                <div class="col-12 py-0 px-1">
                    <div class="col-12 border-style card-rounded py-2 px-3">
                        <div class="d-flex">
                            <div class="col-10 text-muted p-0 d-flex align-items-center">
                                <div class="font-size"><span>Dispatched</span></div>
                            </div>
                            <div class="col-2 p-2 d-flex justify-content-center align-items-center rounded"
                                style="background: rgba(86, 138, 75, 0.2); !important">
                                <img src="{{ asset('images/dispatched.png') }}" alt="dispatched.png" height="22">

                            </div>
                        </div>
                        <div>
                            <div class="font-bold"><span class="px-1">{{ @$dispatched->count() }}</span><span
                                    class="percent_size">(-14%)</span>
                            </div>
                            <div class="py-1 col-12 text-muted p-0 font-size"><span>Last week Analytics</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 p-1" id="3" tab="On Hand" onclick="fetchVehicles(this.id)" style="cursor: pointer;">
                <div class="col-12 py-0 px-1">
                    <div class="col-12 border-style card-rounded py-2 px-3">
                        <div class="d-flex">
                            <div class="col-10 text-muted p-0 d-flex align-items-center">
                                <div class="font-size"><span>On Hand</span></div>
                            </div>
                            <div class="col-2 p-2 d-flex justify-content-center align-items-center rounded"
                                style="background: rgba(0, 150, 136, 0.2); !important">
                                <img src="{{ asset('images/on_hand.png') }}" alt="on hand.png" height="22">


                            </div>
                        </div>
                        <div>
                            <div class="font-bold"><span>{{ @$on_hand->count() }}</span> </div>
                            <div class="py-1 col-12 text-muted p-0 font-size"><span>Total Vehicle</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex m-2">
            <div class="col-4 p-1" id="4" tab="No Title" onclick="fetchVehicles(this.id)" style="cursor:pointer;">
                <div class="col-12 py-0 px-1">
                    <div class="col-12 border-style card-rounded py-2 px-3">
                        <div class="d-flex">
                            <div class="col-10 text-muted p-0 d-flex align-items-center">
                                <div class="font-size"><span>No Titles</span></div>
                            </div>
                            <div class="col-2 p-2 d-flex justify-content-center align-items-center rounded"
                                style="background: rgba(36, 40, 219, 0.2);!important">
                                <img src="{{ asset('images/no_titles.png') }}" alt="no titles.png" height="18">

                            </div>
                        </div>
                        <div>
                            <div class="font-bold"><span>{{ @$no_titles->count() }}</span> </div>
                            <div class="py-1 col-12 text-muted p-0 font-size"><span>Last week Analytics</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 p-1" id="5" tab="towing" onclick="fetchVehicles(this.id)"
                style="cursor:pointer;">
                <div class="col-12 py-0 px-1">
                    <div class="col-12 border-style card-rounded py-2 px-3">
                        <div class="d-flex">
                            <div class="col-10 text-muted p-0 d-flex align-items-center">
                                <div class="font-size"><span>Towing</span></div>
                            </div>
                            <div class="col-2 p-2 d-flex justify-content-center align-items-center rounded"
                                style="background: rgba(236, 184, 0, 0.2); !important">
                                <img src="{{ asset('images/towing.png') }}" alt="towing.png">

                            </div>
                        </div>
                        <div>
                            <div class="font-bold"><span class="px-1">{{ @$towing->count() }}</span><span
                                    class="percent_size">(-14%)</span>
                            </div>
                            <div class="py-1 col-12 text-muted p-0 font-size"><span>Last week Analytics</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 p-1" id="6" tab="Inventory Value" onclick="fetchVehicles(this.id)"
                style="cursor:pointer;">
                <div class="col-12 py-0 px-1">
                    <div class="col-12 border-style card-rounded py-2 px-3">
                        <div class="d-flex">
                            <div class="col-10 text-muted p-0 d-flex align-items-center">
                                <div class="font-size"><span>Inventory Value</span></div>
                            </div>
                            <div class="col-2 p-2 d-flex justify-content-center align-items-center rounded"
                                style="background: rgba(236, 184, 0, 0.2); !important">
                                <img src="{{ asset('images/towing.png') }}" alt="towing.png">

                            </div>
                        </div>
                        <div>
                            <div class="font-bold"><span class="px-1">$40,0000</span>
                            </div>
                            <div class="py-1 col-12 text-muted p-0 font-size"><span>Last week Analytics</span></div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        {{-- badges end --}}

        {{-- listing start --}}
        <div class="px-3 mt-3">
            <div class="border-style card-rounded">

                {{-- new customer alert start --}}
                <div class="row d-flex justify-content-between">
                </div>
                {{-- alert end --}}
                {{-- search filter start --}}
                <div class="px-4 pt-2 mt-4">
                    <div class="d-flex justify-content-between">
                        <div class="col-6 p-0">
                            <span class="h5 text-muted">
                                <b>Search Filter</b>
                            </span>
                        </div>
                        <div class="col-6 d-flex justify-content-end p-0">
                            <div class="col-4 d-flex justify-content-end px-2">
                                <a onclick="import_docs()"
                                    class="px-1 text-muted font-size form-contorl-sm border p-1 rounded col-12"
                                    style="background: #DBDBDB; cursor: pointer;">
                                    <div class="d-flex justify-content-center align-items-center px-1">
                                        <svg width="18" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13 8H11L11 17H8L12 22L16 17H13L13 8Z" fill="#2c3e50" />
                                            <path
                                                d="M19 2L5 2C3.897 2 3 2.897 3 4V13C3 14.103 3.897 15 5 15H9V13H5L5 4L19 4V13H15V15H19C20.103 15 21 14.103 21 13V4C21 2.897 20.103 2 19 2Z"
                                                fill="#2c3e50" />
                                        </svg>

                                        <span class="pl-1 font-size" style="color:#2c3e50">Import</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-4 d-flex justify-content-end px-2">
                                <a href="{{ route('vehicle.export') }}"
                                    class="px-1 text-muted font-size form-contorl-sm border p-1 rounded col-12"
                                    style="background: #DBDBDB; cursor: pointer;">
                                    <div class="d-flex justify-content-center align-items-center px-1">
                                        <svg width="18" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11 16H13V7H16L12 2L8 7H11V16Z" fill="#2c3e50" />
                                            <path
                                                d="M5 22H19C20.103 22 21 21.103 21 20V11C21 9.897 20.103 9 19 9H15V11H19V20H5V11H9V9H5C3.897 9 3 9.897 3 11V20C3 21.103 3.897 22 5 22Z"
                                                fill="#2c3e50" />
                                        </svg>
                                        <span class="pl-1 font-size" style="color:#2c3e50">Export</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-5 px-0 d-flex justify-content-center">
                                <button type="button"
                                    class="text-white form-control-sm border py-1 btn-info rounded modal_button px-2 col-12"
                                    style="background: rgb(62 88 113) !important;" data-target="#exampleModal"
                                    id="vehicle">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <a class="text-white d-flex align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="24"
                                                fill="white" viewBox="0 0 512 512">
                                                <path
                                                    d="M135.2 117.4L109.1 192H402.9l-26.1-74.6C372.3 104.6 360.2 96 346.6 96H165.4c-13.6 0-25.7 8.6-30.2 21.4zM39.6 196.8L74.8 96.3C88.3 57.8 124.6 32 165.4 32H346.6c40.8 0 77.1 25.8 90.6 64.3l35.2 100.5c23.2 9.6 39.6 32.5 39.6 59.2V400v48c0 17.7-14.3 32-32 32H448c-17.7 0-32-14.3-32-32V400H96v48c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V400 256c0-26.7 16.4-49.6 39.6-59.2zM128 288c0-17.7-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32s32-14.3 32-32zm288 32c17.7 0 32-14.3 32-32s-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32z" />
                                            </svg>
                                            <span class="pl-2 font-size">Add New Vehicle</span></a>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                    {{-- @dd($location) --}}
                    <div class="d-flex py-3 px-0">
                        <div class="col-3 p-0">
                            <select
                                class="form-control-sm border-style input-border-style rounded vehicle_filtering col-11 text-muted px-2"
                                name="warehouse" id="vehicle_warehouse">
                                <option value="all">All</option>
                                <option value="" disabled selected>WAREHOUSE</option>
                                @foreach ($location as $locations)
                                    <option value="{{ $locations['id'] }}">{{ $locations['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-2 p-0">
                            <select
                                class="form-control-sm border-style input-border-style rounded vehicle_filtering col-11 text-muted px-2"
                                name="year" id="vehicle_year">
                                <option value="" disabled selected>YEAR</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                            </select>
                        </div>
                        <div class="col-2 p-0">
                            <select
                                class="form-control-sm border-style input-border-style rounded vehicle_filtering col-11 text-muted px-2"
                                name="make" id="vehicle_make">
                                <option value="" disabled selected>MAKE</option>
                                <option value="honda">Honda</option>
                                <option value="toyota">Toyota</option>
                            </select>
                        </div>
                        <div class="col-2 p-0">
                            <select
                                class="form-control-sm border-style input-border-style rounded vehicle_filtering col-11 text-muted px-2"
                                name="model" id="vehicle_model">
                                <option value="" disabled selected>MODEL</option>
                                <option value="civic">Civic</option>
                                <option value="corolla">Corolla</option>
                            </select>
                        </div>
                        <div class="col-3 p-0">
                            <select
                                class="form-control-sm border-style input-border-style rounded vehicle_filtering col-12 text-muted"
                                name="status" id="vehicle_status">
                                <option value="all">All</option>
                                <option value="" disabled selected>STATUS</option>
                                @foreach ($status as $stat)
                                    {{-- @dd($stat) --}}
                                    <option value="{{ $stat['id'] }}">
                                        {{ ucfirst($stat['status_name']) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                {{-- search filter end --}}
                <div id="status_body" class="mt-2 bg-light">
                    <table id="vehicle_table" class="table row-border vehicle_table">
                        <thead class="bg-custom" style="color:white!important;">
                            <tr>
                                <th class="font-bold-tr">Sr</th>
                                <th class="font-bold-tr">Customer Name</th>
                                <th class="font-bold-tr w-100"> VIN </th>
                                <th class="font-bold-tr">YEAR</th>
                                <th class="font-bold-tr">MAKE</th>
                                <th class="font-bold-tr">MODEL</th>
                                <th class="font-bold-tr">VEHICLE TYPE</th>
                                <th class="font-bold-tr">VALUE</th>
                                <th class="font-bold-tr">STATUS</th>
                                <th class="font-bold-tr">BUYER</th>
                                <th class="font-bold-tr">ACTION</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white font-size" id="vehicle_tbody">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- listing end --}}
    </div>
    {{-- New Design --}}

    <script>
        $(".vehicl_navbar_img").click(function() {
            $(".vehicl_navbar_img.active").removeClass('active')
            $(this).addClass('active')
        });

        $(".vehicles_3navbar").click(function() {
            $(".vehicles_3navbar.activee").removeClass('activee')
            $(this).addClass('activee')
        });
    </script>

    <script type="text/javascript">
        $(function() {
            var table = $('.vehicle_table').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                autoWidth:false,
                "lengthMenu": [
                    [50, 100, 500],
                    [50, 100, 500]
                ],
                language: {
                    search: "",
                    sLengthMenu: "_MENU_",
                    searchPlaceholder: "Search",
                    
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> ',
                },
                ajax: "{{ route('vehicle.records') }}",
                columns: [
                    {
                    data: 'id',
                    name: 'id',
                    autoWidth:false,
                    width:"100%",
                },
                {
                        data: 'customer_name',
                        name: 'customer_name'
                    },
                    {
                        data: 'vin',
                        name: 'vin'
                    },
                    {
                        data: 'year',
                        name: 'year'
                    },
                    {
                        data: 'make',
                        name: 'make'
                    },
                    {
                        data: 'model',
                        name: 'model'
                    },
                    {
                        data: 'vehicle_type',
                        name: 'vehicle_type'
                    },
                    {
                        data: 'value',
                        name: 'value'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'buyer_id',
                        name: 'buyer_id'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                    
                ],
              
            })
        });

        
    </script>

    @if (Session::has('success'))
        <script>
            iziToast.success({
                position: 'topRight',
                message: '{{ Session::get('success') }}',
            });
        </script>
    @endif
@endsection
