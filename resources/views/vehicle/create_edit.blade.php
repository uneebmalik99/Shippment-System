@extends('layouts.partials.mainlayout')
@section('body')
    {{-- @dd(@$vehicle) --}}
    {{-- <div class="d-flex justify-content-center mt-3"> --}}
    {{-- <div class="col-12 card border-light rounded mt-3"> --}}
    <form action={{ $action }} method="POST" class="h-100 my-3">
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
                        <div class="col-4">
                            <div>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="col-5">Client Name</td>
                                            <td class="col-7"><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td class="col-5">Client Name</td>
                                            <td class="col-7"><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td class="col-5">Client Name</td>
                                            <td class="col-7"><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td class="col-5">Client Name</td>
                                            <td class="col-7"><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td class="col-5">Client Name</td>
                                            <td class="col-7"><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td class="col-5">Client Name</td>
                                            <td class="col-7"><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td class="col-5">Client Name</td>
                                            <td class="col-7"><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td class="col-5">Client Name</td>
                                            <td class="col-7"><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td class="col-5">Client Name</td>
                                            <td class="col-7"><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td class="col-5">Client Name</td>
                                            <td class="col-7"><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td class="col-5">Client Name</td>
                                            <td class="col-7"><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td class="col-5">Client Name</td>
                                            <td class="col-7"><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td class="col-5">Client Name</td>
                                            <td class="col-7"><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td class="col-5">Client Name</td>
                                            <td class="col-7"><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td class="col-5">Client Name</td>
                                            <td class="col-7"><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td class="col-5">Client Name</td>
                                            <td class="col-7"><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td class="col-5">Client Name</td>
                                            <td class="col-7"><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td class="col-5">Client Name</td>
                                            <td class="col-7"><input type="text" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td class="col-5">Client Name</td>
                                            <td class="col-7"><input type="text" class="form-control"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="d-flex justify-content-around">     
                    <div class="col-6 d-block py-3">
                        <div class="col-12 card user-card border border-secondary rounded p-2 mt-3">
                            <div class="col-12 d-flex py-1">
                                <label class="col-6 py-1" for="customer_name"><b>Customer Name</b></label>
                                <input type="text" class="form-control rounded"
                                    @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['customer_name'] == null) value="{{ old('customer_name') }}" @else value= "{{ @$vehicle['customer_name'] }}" @endif
                                    name="customer_name" id="customer_name">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('customer_name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 d-flex py-1">
                                <label class="col-6 py-1" for="vin">VIN</label>
                                <input type="text" class="form-control rounded"
                                    @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['vin'] == null) value="{{ old('vin') }}" @else value= "{{ @$vehicle['vin'] }}" @endif
                                    name="vin" id="vin">

                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('vin')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 d-flex py-1">
                                <label class="col-6 py-1" for="year">YEAR</label>
                                <input type="text" class="form-control rounded"
                                    @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['year'] == null) value="{{ old('year') }}" @else value= "{{ @$vehicle['year'] }}" @endif
                                    name="year" id="year">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('year')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 d-flex py-1">
                                <label class="col-6 py-1" for="make">MAKE</label>
                                <input type="text" class="form-control rounded"
                                    @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['make'] == null) value="{{ old('make') }}" @else value= "{{ @$vehicle['make'] }}" @endif
                                    name="make" id="make">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('make')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 d-flex py-1">
                                <label class="col-6 py-1" for="model">MODEL</label>
                                <input type="text" class="form-control rounded"
                                    @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['model'] == null) value="{{ old('model') }}" @else value= "{{ @$vehicle['model'] }}" @endif
                                    name="model" id="model">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('model')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 d-flex py-1">
                                <label class="col-6 py-1" for="vehicle_type">VEHICLE TYPE</label>
                                <input type="text" class="form-control rounded"
                                    @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['vehicle_type'] == null) value="{{ old('vehicle_type') }}" @else value= "{{ @$vehicle['vehicle_type'] }}" @endif
                                    name="vehicle_type" id="vehicle_type">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('vehicle_type')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 d-flex py-1">
                                <label class="col-6 py-1" for="color">COLOR</label>
                                <input type="text" class="form-control rounded"
                                    @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['color'] == null) value="{{ old('color') }}" @else value= "{{ @$vehicle['color'] }}" @endif
                                    name="color" id="color">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('color')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 d-flex py-1">
                                <label class="col-6 py-1" for="weight">WEIGHT(Kgs)</label>
                                <input type="text" class="form-control rounded"
                                    @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['weight'] == null) value="{{ old('weight') }}" @else value= "{{ @$vehicle['weight'] }}" @endif
                                    name="weight" id="weight">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('weight')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 d-flex py-1">
                                <label class="col-6 py-1" for="value">VALUE($)</label>
                                <input type="text" class="form-control rounded"
                                    @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['value'] == null) value="{{ old('value') }}" @else value= "{{ @$vehicle['value'] }}" @endif
                                    name="value" id="value">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('value')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 d-flex py-1">
                                <label class="col-6 py-1" for="auction">AUCTION</label>
                                <input type="text" class="form-control rounded"
                                    @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['auction'] == null) value="{{ old('auction') }}" @else value= "{{ @$vehicle['auction'] }}" @endif
                                    name="auction" id="auction">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('auction')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-12 card user-card border border-secondary rounded p-2 mt-3">
                            <div class="col-12 d-flex py-1">
                                <label class="col-6" for="buyer_id">BUYER ID</label>
                                <select name="buyer_id" id="buyer_id" class="form-control">
                                    @if (\Request::route()->getName() == 'vehicle.edit')
                                        <option disabled selected value="{{ @$vehicle['customer']['id'] }}">
                                            {{ @$vehicle['customer']['id'] }}</option>
                                    @endif

                                    @foreach (@$buyers as $buyer)
                                        <option value="{{ @$buyer['id'] }}">{{ @$buyer['id'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('buyer_id')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 d-flex py-1">
                                <label class="col-6" for="key">KEY</label>
                                <input type="text" class="form-control rounded"
                                    @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['key'] == null) value="{{ old('key') }}" @else value= "{{ @$vehicle['key'] }}" @endif
                                    name="key" id="key">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('key')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 d-flex py-1">
                                <label class="col-6" for="note">NOTE</label>
                                <textarea type="text" class="form-control rounded"
                                    @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['note'] == null) value="{{ old('note') }}" @else value= "{{ @$vehicle['note'] }}" @endif
                                    name="note" id="note"></textarea>
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('note')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 d-flex py-1">
                                <label class="col-6" for="hat_number">HAT NO</label>
                                <input type="text" class="form-control rounded"
                                    @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['hat_number'] == null) value="{{ old('hat_number') }}" @else value= "{{ @$vehicle['hat_number'] }}" @endif
                                    name="hat_number" id="hat_number">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('hat_number')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-12 card user-card border border-secondary rounded p-2 mt-3">
                            <div class="col-12 d-flex py-1">
                                <label class="col-6" for="title_type">TITLE TYPE</label>
                                <input type="text" class="form-control rounded"
                                    @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['title_type'] == null) value="{{ old('title_type') }}" @else value= "{{ @$vehicle['title_type'] }}" @endif
                                    name="title_type" id="title_type">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('title_type')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 d-flex py-1">
                                <label class="col-6" for="title">TITLE</label>
                                <input type="text" class="form-control rounded"
                                    @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['title'] == null) value="{{ old('title') }}" @else value= "{{ @$vehicle['title'] }}" @endif
                                    name="title" id="title">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 d-flex py-1">
                                <label class="col-6" for="title_rec_date">TITLE REC DATE</label>
                                <input type="date" class="form-control rounded"
                                    @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['title_rec_date'] == null) value="{{ old('title_rec_date') }}" @else value= "{{ @$vehicle['title_rec_date'] }}" @endif
                                    name="title_rec_date" id="title_rec_date">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('title_rec_date')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 d-flex py-1">
                                <label class="col-6" for="title_state">TITLE STATE</label>
                                <input type="text" class="form-control rounded"
                                    @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['title_state'] == null) value="{{ old('title_state') }}" @else value= "{{ @$vehicle['title_state'] }}" @endif
                                    name="title_state" id="title_state">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('title_state')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 d-flex py-1">
                                <label class="col-6" for="title_number">TITLE NO</label>
                                <input type="text" class="form-control rounded"
                                    @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['title_number'] == null) value="{{ old('title_number') }}" @else value= "{{ @$vehicle['title_number'] }}" @endif
                                    name="title_number" id="title_number">
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
                    <div class="col-6 d-block py-3">
                        <div class="col-12 card user-card border border-secondary rounded p-2 mt-3">
                            <div class="col-12 d-flex py-1">
                                <label class="col-6" for="shipper_name">Shipper Name</label>
                                <input type="text" class="form-control rounded"
                                    @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['shipper_name'] == null) value="{{ old('shipper_name') }}" @else value= "{{ @$vehicle['shipper_name'] }}" @endif
                                    name="shipper_name" id="shipper_name">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('shipper_name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 d-flex py-1">
                                <label class="col-6" for="status">Status</label>
                                <input type="text" class="form-control rounded"
                                    @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['status'] == null) value="{{ old('status') }}" @else value= "{{ @$vehicle['status'] }}" @endif
                                    name="status" id="status">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('status')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 d-flex py-1">
                                <label class="col-6" for="sale_date">SALE DATE</label>
                                <input type="date" class="form-control rounded"
                                    @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['sale_date'] == null) value="{{ old('sale_date') }}" @else value= "{{ @$vehicle['sale_date'] }}" @endif
                                    name="sale_date" id="sale_date">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('sale_date')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 d-flex py-1">
                                <label class="col-6" for="paid_date">PAID DATE</label>
                                <input type="date" class="form-control rounded"
                                    @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['paid_date'] == null) value="{{ old('paid_date') }}" @else value= "{{ @$vehicle['paid_date'] }}" @endif
                                    name="paid_date" id="paid_date">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('paid_date')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 d-flex py-1">
                                <label class="col-6" for="days">DAYS</label>
                                <input type="text" class="form-control rounded"
                                    @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['days'] == null) value="{{ old('days') }}" @else value= "{{ @$vehicle['days'] }}" @endif
                                    name="days" id="days">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('days')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 d-flex py-1">
                                <label class="col-6" for="posted_date">POSTED DATE</label>
                                <input type="date" class="form-control rounded"
                                    @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['posted_date'] == null) value="{{ old('posted_date') }}" @else value= "{{ @$vehicle['posted_date'] }}" @endif
                                    name="posted_date" id="posted_date">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('posted_date')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 d-flex py-1">
                                <label class="col-6" for="pickup_date">PICKUP DATE</label>
                                <input type="date" class="form-control rounded"
                                    @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['pickup_date'] == null) value="{{ old('pickup_date') }}" @else value= "{{ @$vehicle['pickup_date'] }}" @endif
                                    name="pickup_date" id="pickup_date">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('pickup_date')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 d-flex py-1">
                                <label class="col-6" for="delivered">DELIVERED</label>
                                <input type="date" class="form-control rounded"
                                    @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['delivered'] == null) value="{{ old('delivered') }}" @else value= "{{ @$vehicle['delivered'] }}" @endif
                                    name="delivered" id="delivered">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('delivered')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 d-flex py-1">
                                <label class="col-6" for="pickup_location">PICKUP LOCATION</label>
                                <input type="text" class="form-control rounded"
                                    @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['pickup_location'] == null) value="{{ old('pickup_location') }}" @else value= "{{ @$vehicle['pickup_location'] }}" @endif
                                    name="pickup_location" id="pickup_location">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('pickup_location')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 d-flex py-1">
                                <label class="col-6" for="site">SITE</label>
                                <input type="text" class="form-control rounded"
                                    @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['site'] == null) value="{{ old('site') }}" @else value= "{{ @$vehicle['site'] }}" @endif
                                    name="site" id="site">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('site')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-12 card user-card border border-secondary rounded p-2 mt-3">
                            <div class="col-12 d-flex py-1">
                                <label class="col-6" for="dealer_fee">DEALER FEE</label>
                                <input type="text" class="form-control rounded"
                                    @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['dealer_fee'] == null) value="{{ old('dealer_fee') }}" @else value= "{{ @$vehicle['dealer_fee'] }}" @endif
                                    name="dealer_fee" id="dealer_fee">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('dealer_fee')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 d-flex py-1">
                                <label class="col-6" for="late_fee">LATE FEE</label>
                                <input type="text" class="form-control rounded"
                                    @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['late_fee'] == null) value="{{ old('late_fee') }}" @else value= "{{ @$vehicle['late_fee'] }}" @endif
                                    name="late_fee" id="late_fee">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('late_fee')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 d-flex py-1">
                                <label class="col-6" for="auction_storage">AUCTION STORAGE</label>
                                <input type="text" class="form-control rounded"
                                    @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['auction_storage'] == null) value="{{ old('auction_storage') }}" @else value= "{{ @$vehicle['auction_storage'] }}" @endif
                                    name="auction_storage" id="auction_storage">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('auction_storage')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 d-flex py-1">
                                <label class="col-6" for="towing_charges">TOWING CHARGES</label>
                                <input type="text" class="form-control rounded"
                                    @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['towing_charges'] == null) value="{{ old('towing_charges') }}" @else value= "{{ @$vehicle['towing_charges'] }}" @endif
                                    name="towing_charges" id="towing_charges">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('towing_charges')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 d-flex py-1">
                                <label class="col-6" for="warehouse_storage">WAREHOUSE STORAGE</label>
                                <input type="text" class="form-control rounded"
                                    @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['warehouse_storage'] == null) value="{{ old('warehouse_storage') }}" @else value= "{{ @$vehicle['warehouse_storage'] }}" @endif
                                    name="warehouse_storage" id="warehouse_storage">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('warehouse_storage')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 d-flex py-1">
                                <label class="col-6" for="title_fee">TITLE FEE</label>
                                <input type="text" class="form-control rounded"
                                    @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['title_fee'] == null) value="{{ old('title_fee') }}" @else value= "{{ @$vehicle['title_fee'] }}" @endif
                                    name="title_fee" id="title_fee">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('title_fee')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 d-flex py-1">
                                <label class="col-6" for="port_detention_fee">PORT DETENTION FEE</label>
                                <input type="text" class="form-control rounded"
                                    @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['port_detention_fee'] == null) value="{{ old('port_detention_fee') }}" @else value= "{{ @$vehicle['port_detention_fee'] }}" @endif
                                    name="port_detention_fee" id="port_detention_fee">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('port_detention_fee')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 d-flex py-1">
                                <label class="col-6" for="custom_inspection">CUSTOM INSPECTION</label>
                                <input type="text" class="form-control rounded"
                                    @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['custom_inspection'] == null) value="{{ old('custom_inspection') }}" @else value= "{{ @$vehicle['custom_inspection'] }}" @endif
                                    name="custom_inspection" id="custom_inspection">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('custom_inspection')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 d-flex py-1">
                                <label class="col-6" for="additional_fee">ADDITIONAL FEE</label>
                                <input type="text" class="form-control rounded"
                                    @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['additional_fee'] == null) value="{{ old('additional_fee') }}" @else value= "{{ @$vehicle['additional_fee'] }}" @endif
                                    name="additional_fee" id="additional_fee">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('additional_fee')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 d-flex py-1">
                                <label class="col-6" for="insurance">INSURANCE</label>
                                <input type="text" class="form-control rounded"
                                    @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['insurance'] == null) value="{{ old('insurance') }}" @else value= "{{ @$vehicle['insurance'] }}" @endif
                                    name="insurance" id="insurance">
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
                </div> --}}
        {{-- <div class="d-flex justify-content-center">
            <input type="hidden" name="added_by_email" value="{{ Auth::user()->id }}">
            <input type="hidden" name="added_by_role" value="{{ Auth::user()->id }}">
            <input type="submit" class="btn btn-primary rounded" value="{{ $button_text }}">
        </div> --}}
    </form>
    {{-- </div> --}}
    {{-- </div> --}}
@endsection
