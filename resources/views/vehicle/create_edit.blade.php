@extends('layouts.partials.mainlayout')
@section('body')
    {{-- @dd(@$vehicle) --}}
    {{-- <div class="d-flex justify-content-center mt-3"> --}}
    {{-- <div class="col-12 card border-light rounded mt-3"> --}}
    <form action={{ $action }} method="POST" enctype="multipart/form-data" class="h-100 my-3">
        @csrf
        <div>
            <div class="bg-primary bg-gradient p-3">
                <h5 class="text-white">Vehicle Page</h5>
            </div>
            <div>
                <div class="bg-white">
                    <div class="col-8 d-flex p-0">
                        <div class="col-3 px-1 general">
                            <button class="btn btn-secondary col-12">General</button>
                        </div>
                        <div class="col-3 px-1">
                            <button class="btn btn-secondary col-12">Attachments</button>
                        </div>
                        <div class="col-3 px-1">
                            <button class="btn btn-secondary col-12">Not Available</button>
                        </div>
                        <div class="col-3">
                            <button class="btn btn-secondary col-12">Not Available</button>
                        </div>
                    </div>
                    <div>
                        <div class="d-flex justify-content-around">
                            <div class="col-4 py-3">
                                <div>
                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="customer_name" class="form-control border border-0 px-0"><b>Client
                                                    Name</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <input type="text" class="form-control-sm border border-0 rounded-pill bg"
                                                name="customer_name" id="customer_name"
                                                @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['customer_name'] == null) value="{{ old('customer_name') }}" @else value= "{{ @$vehicle['customer_name'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('customer_name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="vin"
                                                class="form-control border border-0 px-0"><b>VIN</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <input type="text" class="form-control-sm border border-0 rounded-pill col-12"
                                                name="vin" id="vin"
                                                @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['vin'] == null) value="{{ old('vin') }}" @else value= "{{ @$vehicle['vin'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('vin')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="year"
                                                class="form-control border border-0 px-0"><b>Year</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <input type="text" class="form-control-sm border border-0 rounded-pill col-12"
                                                name="year" id="year"
                                                @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['year'] == null) value="{{ old('year') }}" @else value= "{{ @$vehicle['year'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('year')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="make"
                                                class="form-control border border-0 px-0"><b>Make</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <input type="text" class="form-control-sm border border-0 rounded-pill col-12"
                                                name="make" id="make"
                                                @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['make'] == null) value="{{ old('make') }}" @else value= "{{ @$vehicle['make'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('make')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="model"
                                                class="form-control border border-0 px-0"><b>Model</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <input type="text" class="form-control-sm border border-0 rounded-pill col-12"
                                                name="model" id="model"
                                                @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['model'] == null) value="{{ old('model') }}" @else value= "{{ @$vehicle['model'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('model')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="vehicle_type" class="form-control border border-0 px-0"><b>Vehicle
                                                    Type</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <input type="text" class="form-control-sm border border-0 rounded-pill col-12"
                                                name="vehicle_type" id="vehicle_type"
                                                @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['vehicle_type'] == null) value="{{ old('vehicle_type') }}" @else value= "{{ @$vehicle['vehicle_type'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('vehicle_type')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="color"
                                                class="form-control border border-0 px-0"><b>Color</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <input type="text" class="form-control-sm border border-0 rounded-pill col-12"
                                                name="color" id="color"
                                                @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['color'] == null) value="{{ old('color') }}" @else value= "{{ @$vehicle['color'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('color')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="weight"
                                                class="form-control border border-0 px-0"><b>Weight(Kgs)</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <input type="text" class="form-control-sm border border-0 rounded-pill col-12"
                                                name="weight" id="weight"
                                                @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['weight'] == null) value="{{ old('weight') }}" @else value= "{{ @$vehicle['weight'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('weight')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="value"
                                                class="form-control border border-0 px-0"><b>Value($)</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <input type="text" class="form-control-sm border border-0 rounded-pill col-12"
                                                name="value" id="value"
                                                @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['value'] == null) value="{{ old('value') }}" @else value= "{{ @$vehicle['value'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('value')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="auction"
                                                class="form-control border border-0 px-0"><b>Auction</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <input type="text" class="form-control-sm border border-0 rounded-pill col-12"
                                                name="auction" id="auction"
                                                @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['auction'] == null) value="{{ old('auction') }}" @else value= "{{ @$vehicle['auction'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('auction')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="buyer_id" class="form-control border border-0 px-0"><b>Buyer
                                                    ID</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <select name="buyer_id" id="buyer_id"
                                                class="form-control-sm border border-0 rounded-pill col-12">
                                                @if (\Request::route()->getName() == 'vehicle.edit')
                                                    <option disabled value="{{ @$vehicle['customer']['id'] }}">
                                                        {{ @$vehicle['customer']['id'] }}</option>
                                                @endif

                                                @foreach (@$buyers as $buyer)
                                                    <option @if (@$buyer['id'] == '2') selected @endif
                                                        value="{{ @$buyer['id'] }}">{{ @$buyer['id'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('buyer_id')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="key"
                                                class="form-control border border-0 px-0"><b>Keys</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <input type="text" class="form-control-sm border border-0 rounded-pill col-12"
                                                name="key" id="key"
                                                @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['key'] == null) value="{{ old('key') }}" @else value= "{{ @$vehicle['key'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('key')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="note"
                                                class="form-control border border-0 px-0"><b>Notes</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <textarea type="text" class="form-control-sm border border-info rounded" name="note" id="note"
                                                @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['note'] == null) value="{{ old('note') }}" @else value= "{{ @$vehicle['note'] }}" @endif></textarea>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('note')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="title_type" class="form-control border border-0 px-0"><b>Title
                                                    Type</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <input type="text" class="form-control-sm border border-0 rounded-pill col-12"
                                                name="title_type" id="title_type"
                                                @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['title_type'] == null) value="{{ old('title_type') }}" @else value= "{{ @$vehicle['title_type'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('title_type')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="title"
                                                class="form-control border border-0 px-0"><b>Title</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <input type="text" class="form-control-sm border border-0 rounded-pill col-12"
                                                name="title" id="title"
                                                @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['title'] == null) value="{{ old('title') }}" @else value= "{{ @$vehicle['title'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('title')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="title_rec_date" class="form-control border border-0 px-0"><b>Title
                                                    Rec
                                                    Date</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <input type="date"
                                                class="form-control-sm border border-0 rounded-pill col-12"
                                                name="title_rec_date" id="title_rec_date"
                                                @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['title_rec_date'] == null) value="{{ old('title_rec_date') }}" @else value= "{{ @$vehicle['title_rec_date'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('title_rec_date')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="title_state" class="form-control border border-0 px-0"><b>Title
                                                    State</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <input type="text" class="form-control-sm border border-0 rounded-pill col-12"
                                                name="title_state" id="title_state"
                                                @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['title_state'] == null) value="{{ old('title_state') }}" @else value= "{{ @$vehicle['title_state'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('title_state')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="title_number" class="form-control border border-0 px-0"><b>Title
                                                    Number</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <input type="text" class="form-control-sm border border-0 rounded-pill col-12"
                                                name="title_number" id="title_number"
                                                @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['title_number'] == null) value="{{ old('title_number') }}" @else value= "{{ @$vehicle['title_number'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('title_number')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 py-3">
                                <div>
                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="shipper_name" class="form-control border border-0 px-0"><b>Shipper
                                                    Name</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <input type="text" class="form-control-sm border border-0 rounded-pill bg"
                                                name="shipper_name" id="shipper_name"
                                                @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['shipper_name'] == null) value="{{ old('shipper_name') }}" @else value= "{{ @$vehicle['shipper_name'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('shipper_name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="status"
                                                class="form-control border border-0 px-0"><b>status</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <input type="text" class="form-control-sm border border-0 rounded-pill col-12"
                                                name="status" id="status"
                                                @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['status'] == null) value="{{ old('status') }}" @else value= "{{ @$vehicle['status'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('status')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="sale_date" class="form-control border border-0 px-0"><b>Sale
                                                    Date</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <input type="date"
                                                class="form-control-sm border border-0 rounded-pill col-12"
                                                name="sale_date" id="sale_date"
                                                @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['sale_date'] == null) value="{{ old('sale_date') }}" @else value= "{{ @$vehicle['sale_date'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('sale_date')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="paid_date" class="form-control border border-0 px-0"><b>Paid
                                                    Date</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <input type="date" class="form-control-sm border border-0 rounded-pill col-12"
                                                name="paid_date" id="paid_date"
                                                @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['paid_date'] == null) value="{{ old('paid_date') }}" @else value= "{{ @$vehicle['paid_date'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('make')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="days"
                                                class="form-control border border-0 px-0"><b>Days</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <input type="text" class="form-control-sm border border-0 rounded-pill col-12"
                                                name="days" id="days"
                                                @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['days'] == null) value="{{ old('days') }}" @else value= "{{ @$vehicle['days'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('days')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="post_date" class="form-control border border-0 px-0"><b>Posted
                                                    Date</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <input type="date" class="form-control-sm border border-0 rounded-pill col-12"
                                                name="post_date" id="post_date"
                                                @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['post_date'] == null) value="{{ old('post_date') }}" @else value= "{{ @$vehicle['post_date'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('post_date')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="pickup_date" class="form-control border border-0 px-0"><b>Pickup
                                                    Date</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <input type="date" class="form-control-sm border border-0 rounded-pill col-12"
                                                name="pickup_date" id="pickup_date"
                                                @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['pickup_date'] == null) value="{{ old('pickup_date') }}" @else value= "{{ @$vehicle['pickup_date'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('pickup_date')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="delivered"
                                                class="form-control border border-0 px-0"><b>Delivered</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <input type="date" class="form-control-sm border border-0 rounded-pill col-12"
                                                name="delivered" id="delivered"
                                                @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['delivered'] == null) value="{{ old('delivered') }}" @else value= "{{ @$vehicle['delivered'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('delivered')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="pickup_location"
                                                class="form-control border border-0 px-0"><b>Pickup
                                                    Location</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <input type="text" class="form-control-sm border border-0 rounded-pill col-12"
                                                name="pickup_location" id="pickup_location"
                                                @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['pickup_location'] == null) value="{{ old('pickup_location') }}" @else value= "{{ @$vehicle['pickup_location'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('pickup_location')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="site"
                                                class="form-control border border-0 px-0"><b>Site</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <input type="text" class="form-control-sm border border-0 rounded-pill col-12"
                                                name="site" id="site"
                                                @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['site'] == null) value="{{ old('site') }}" @else value= "{{ @$vehicle['site'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('site')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="hat_no" class="form-control border border-0 px-0"><b>Hat
                                                    Number</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <input type="text" class="form-control-sm border border-0 rounded-pill col-12"
                                                name="hat_no" id="hat_no"
                                                @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['hat_no'] == null) value="{{ old('hat_no') }}" @else value= "{{ @$vehicle['hat_no'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('hat_no')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="dealer_fee" class="form-control border border-0 px-0"><b>Dealer
                                                    Fee</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <input type="text" class="form-control-sm border border-0 rounded-pill col-12"
                                                name="dealer_fee" id="dealer_fee"
                                                @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['dealer_fee'] == null) value="{{ old('dealer_fee') }}" @else value= "{{ @$vehicle['dealer_fee'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('dealer_fee')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="late_fee" class="form-control border border-0 px-0"><b>Late
                                                    Fee</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <input type="text" class="form-control-sm border border-0 rounded-pill col-12"
                                                name="late_fee" id="late_fee"
                                                @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['late_fee'] == null) value="{{ old('late_fee') }}" @else value= "{{ @$vehicle['late_fee'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('late_fee')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="auction_storage"
                                                class="form-control border border-0 px-0"><b>Auction
                                                    Storage</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <input type="text" class="form-control-sm border border-0 rounded-pill col-12"
                                                name="auction_storage" id="auction_storage"
                                                @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['auction_storage'] == null) value="{{ old('auction_storage') }}" @else value= "{{ @$vehicle['auction_storage'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('auction_storage')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="towing_charges"
                                                class="form-control border border-0 px-0"><b>Towing
                                                    Charges</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <input type="text" class="form-control-sm border border-0 rounded-pill col-12"
                                                name="towing_charges" id="towing_charges"
                                                @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['towing_charges'] == null) value="{{ old('towing_charges') }}" @else value= "{{ @$vehicle['towing_charges'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('towing_charges')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="warehouse_storage"
                                                class="form-control border border-0 px-0"><b>Warehouse
                                                    Storage</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <input type="text" class="form-control-sm border border-0 rounded-pill col-12"
                                                name="warehouse_storage" id="warehouse_storage"
                                                @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['warehouse_storage'] == null) value="{{ old('warehouse_storage') }}" @else value= "{{ @$vehicle['warehouse_storage'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('warehouse_storage')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="title_fee" class="form-control border border-0 px-0"><b>Title
                                                    Fee</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <input type="text"
                                                class="form-control-sm border border-0 rounded-pill col-12"
                                                name="title_fee" id="title_fee"
                                                @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['title_fee'] == null) value="{{ old('title_fee') }}" @else value= "{{ @$vehicle['title_fee'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('title_fee')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="port_detention_fee"
                                                class="form-control border border-0 px-0"><b>Port
                                                    Detention</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <input type="text" class="form-control-sm border border-0 rounded-pill col-12"
                                                name="port_detention_fee" id="port_detention_fee"
                                                @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['port_detention_fee'] == null) value="{{ old('port_detention_fee') }}" @else value= "{{ @$vehicle['port_detention_fee'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('port_detention_fee')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="custom_inspection"
                                                class="form-control border border-0 px-0"><b>Custom
                                                    Inspection</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <input type="text" class="form-control-sm border border-0 rounded-pill col-12"
                                                name="custom_inspection" id="custom_inspection"
                                                @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['custom_inspection'] == null) value="{{ old('custom_inspection') }}" @else value= "{{ @$vehicle['custom_inspection'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('custom_inspection')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="additional_fee"
                                                class="form-control border border-0 px-0"><b>Additional
                                                    Fee</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <input type="text" class="form-control-sm border border-0 rounded-pill col-12"
                                                name="additional_fee" id="additional_fee"
                                                @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['additional_fee'] == null) value="{{ old('additional_fee') }}" @else value= "{{ @$vehicle['additional_fee'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('additional_fee')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="d-flex py-2">
                                        <div class="col-5 p-0">
                                            <label for="insurance"
                                                class="form-control border border-0 px-0"><b>Insurance</b></label>
                                        </div>
                                        <div class="col-7 p-0">
                                            <input type="text" class="form-control-sm border border-0 rounded-pill col-12"
                                                name="insurance" id="insurance"
                                                @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['insurance'] == null) value="{{ old('insurance') }}" @else value= "{{ @$vehicle['insurance'] }}" @endif>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <span class="text-danger">
                                            @error('insurance')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 py-3">
                                <div class="col-12">
                                    <input type="file" name="image[]" class="form-control col-12 w-100"
                                        id="filer_input" multiple="multiple">
                                </div>
                                {{-- <div class="col-12 d-flex justify-content-between">
                                    <div class="col-6 mr-1 d-flex justify-content-center pt-3"
                                        style="border: 1px dashed black">
                                        <svg width="95" height="114" viewBox="0 0 95 114" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M81.9225 59.6932C80.9001 59.6932 79.9076 59.845 78.9575 60.1262C79.1747 58.9952 79.2847 57.8382 79.2853 56.6775C79.2853 48.1892 73.551 41.308 66.4774 41.308C63.8953 41.3037 61.3729 42.2405 59.2442 43.9943C56.8416 32.8858 48.4298 24.6836 38.4212 24.6836C26.5405 24.6836 16.9091 36.2412 16.9091 50.4981C7.97669 50.4981 0.735352 59.1875 0.735352 69.9066C0.735352 80.6255 7.9765 89.3151 16.9091 89.3151H81.9225C88.7391 89.3151 94.2651 82.684 94.2651 74.504C94.2651 66.3243 88.7391 59.6932 81.9225 59.6932V59.6932Z"
                                                fill="#B0E9FF" />
                                            <g clip-path="url(#clip0_235_10)">
                                                <path
                                                    d="M46.2344 8.26562L61.1515 23.962H31.3174L46.2344 8.26562ZM40.8101 43.1332H51.6588V47.926H40.8101V43.1332ZM40.8101 35.944H51.6588V40.7368H40.8101V35.944Z"
                                                    fill="#009688" />
                                                <path
                                                    d="M40.8105 20.3694H51.6593V33.5496H40.8105V20.3694ZM21.8252 0H70.6446V4.79279H21.8252V0Z"
                                                    fill="#009688" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_235_10">
                                                    <rect width="65.0926" height="57.5135" fill="white"
                                                        transform="translate(21.9912)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="col-6 ml-1 d-flex justify-content-center pt-3"
                                        style="border: 1px dashed black">
                                        <svg width="95" height="114" viewBox="0 0 95 114" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M81.9225 59.6932C80.9001 59.6932 79.9076 59.845 78.9575 60.1262C79.1747 58.9952 79.2847 57.8382 79.2853 56.6775C79.2853 48.1892 73.551 41.308 66.4774 41.308C63.8953 41.3037 61.3729 42.2405 59.2442 43.9943C56.8416 32.8858 48.4298 24.6836 38.4212 24.6836C26.5405 24.6836 16.9091 36.2412 16.9091 50.4981C7.97669 50.4981 0.735352 59.1875 0.735352 69.9066C0.735352 80.6255 7.9765 89.3151 16.9091 89.3151H81.9225C88.7391 89.3151 94.2651 82.684 94.2651 74.504C94.2651 66.3243 88.7391 59.6932 81.9225 59.6932V59.6932Z"
                                                fill="#B0E9FF" />
                                            <g clip-path="url(#clip0_235_10)">
                                                <path
                                                    d="M46.2344 8.26562L61.1515 23.962H31.3174L46.2344 8.26562ZM40.8101 43.1332H51.6588V47.926H40.8101V43.1332ZM40.8101 35.944H51.6588V40.7368H40.8101V35.944Z"
                                                    fill="#009688" />
                                                <path
                                                    d="M40.8105 20.3694H51.6593V33.5496H40.8105V20.3694ZM21.8252 0H70.6446V4.79279H21.8252V0Z"
                                                    fill="#009688" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_235_10">
                                                    <rect width="65.0926" height="57.5135" fill="white"
                                                        transform="translate(21.9912)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="d-flex justify-content-center p-3">
                            <input type="submit" class="btn btn-primary rounded" value="{{ $button_text }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="added_by_email" value="{{ Auth::user()->id }}">
        <input type="hidden" name="added_by_role" value="{{ Auth::user()->id }}">

    </form>
@endsection
