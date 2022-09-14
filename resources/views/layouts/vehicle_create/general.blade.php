@include('layouts.customer_create.navbar')
{{-- @dd($buyers) --}}
<form method="POST" id="vehicle_form" enctype="multipart/form-data">
    <div class="d-flex">
        <div class="col-8 d-flex">
            <div class="col-6 p-0">
                <div class="col-4 py-3">
                    <div class="text-color" style="cursor: pointer;" id="client" onclick="slide(this.id)">
                        <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="p-2">Client</span>
                    </div>
                </div>
                <div class="col-12 f-flex" id="client_body">
                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="customer_name" class="col-6 px-0 font-size font-bold">Client Name</label>
                            <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                name="customer_name" id="customer_name" value="{{ @$user['customer_name'] }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <span class="text-danger">
                                @error('customer_name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="vin" class="col-6 px-0 font-size font-bold">VIN</label>
                            <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                name="vin" id="vin" value="{{ @$user['vin'] }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <span class="text-danger">
                                @error('vin')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="year" class="col-6 px-0 font-size font-bold">Year</label>
                            <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                name="year" id="year" value="{{ @$user['year'] }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <span class="text-danger">
                                @error('year')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="make" class="col-6 px-0 font-size font-bold">Make</label>
                            <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                name="make" id="make" value="{{ @$user['make'] }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <span class="text-danger">
                                @error('make')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="model" class="col-6 px-0 font-size font-bold">Model</label>
                            <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                name="model" id="model" value="{{ @$user['model'] }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <span class="text-danger">
                                @error('model')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="vehicle_type" class="col-6 px-0 font-size font-bold">Vehicle Type</label>
                            <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                name="vehicle_type" id="vehicle_type" value="{{ @$user['vehicle_type'] }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <span class="text-danger">
                                @error('vehicle_type')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="color" class="col-6 px-0 font-size font-bold">Color</label>
                            <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                name="color" id="color" value="{{ @$user['color'] }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <span class="text-danger">
                                @error('color')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="weight" class="col-6 px-0 font-size font-bold">Weight (Kgs)</label>
                            <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                name="weight" id="weight" value="{{ @$user['weight'] }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <span class="text-danger">
                                @error('weight')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="values" class="col-6 px-0 font-size font-bold">Values</label>
                            <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                name="values" id="values" value="{{ @$user['values'] }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <span class="text-danger">
                                @error('values')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="auction" class="col-6 px-0 font-size font-bold">Auction</label>
                            <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                name="auction" id="auction" value="{{ @$user['auction'] }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <span class="text-danger">
                                @error('auction')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="buyer_id" class="col-6 px-0 font-size font-bold">Buyer ID</label>
                            <select class="form-control-sm border border-0 rounded-pill bg col-6" name="buyer_id"
                                id="buyer_id">
                                @foreach ($buyers as $buyer)
                                    <option value="{{ $buyer['id'] }}">{{ $buyer['customer_name'] }}</option>
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
                    </div>

                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="keys" class="col-6 px-0 font-size font-bold">Keys</label>
                            <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                name="keys" id="keys" value="{{ @$user['keys'] }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <span class="text-danger">
                                @error('keys')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="notes" class="col-6 px-0 font-size font-bold">Notes</label>
                            <textarea type="text" class="form-control-sm border border-0 rounded-pill bg col-6" name="notes" id="notes"
                                value="{{ @$user['notes'] }}"></textarea>
                        </div>
                    </div>

                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="title_type" class="col-6 px-0 font-size font-bold">Title Type</label>
                            <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                name="title_type" id="title_type" value="{{ @$user['title_type'] }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <span class="text-danger">
                                @error('title_type')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="title" class="col-6 px-0 font-size font-bold">Title</label>
                            <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                name="title" id="title" value="{{ @$user['title'] }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <span class="text-danger">
                                @error('title')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="title_rec_date" class="col-6 px-0 font-size font-bold">Title Rec
                                Date</label>
                            <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                name="title_rec_date" id="title_rec_date" value="{{ @$user['title_rec_date'] }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <span class="text-danger">
                                @error('title_rec_date')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="title_state" class="col-6 px-0 font-size font-bold">Title State</label>
                            <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                name="title_state" id="title_state" value="{{ @$user['title_state'] }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <span class="text-danger">
                                @error('title_state')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="title_number" class="col-6 px-0 font-size font-bold">Title No</label>
                            <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                name="title_number" id="title_number" value="{{ @$user['title_number'] }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <span class="text-danger">
                                @error('title_number')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="shipment_id" class="col-6 px-0 font-size font-bold">Shipment ID</label>
                            <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                name="shipment_id" id="shipment_id" value="{{ @$user['shipment_id'] }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <span class="text-danger">
                                @error('shipment_id')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 p-0">
                <div class="col-4 py-3">
                    <div class="text-color" style="cursor: pointer;" id="shipper" onclick="slide(this.id)">
                        <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="p-2 ">Shipper</span>
                    </div>
                </div>
                <div class="col-12 f-flex" id="shipper_body">
                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="shipper_name" class="col-6 px-0 font-size font-bold">Shipper Name</label>
                            <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                name="shipper_name" id="shipper_name" value="{{ @$user['shipper_name'] }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <span class="text-danger">
                                @error('shipper_name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="status" class="col-6 px-0 font-size font-bold">Status</label>
                            <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                name="status" id="status" value="{{ @$user['status'] }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <span class="text-danger">
                                @error('status')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="sale_date" class="col-6 px-0 font-size font-bold">Sale Date</label>
                            <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                name="sale_date" id="sale_date" value="{{ @$user['sale_date'] }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <span class="text-danger">
                                @error('sale_date')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="paid_date" class="col-6 px-0 font-size font-bold">Paid Date</label>
                            <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                name="paid_date" id="paid_date" value="{{ @$user['paid_date'] }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <span class="text-danger">
                                @error('paid_date')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="days" class="col-6 px-0 font-size font-bold">Days</label>
                            <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                name="days" id="days" value="{{ @$user['days'] }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <span class="text-danger">
                                @error('days')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="post_date" class="col-6 px-0 font-size font-bold">Post Date</label>
                            <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                name="post_date" id="post_date" value="{{ @$user['post_date'] }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <span class="text-danger">
                                @error('post_date')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="pickup_date" class="col-6 px-0 font-size font-bold">Pickup Date</label>
                            <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                name="pickup_date" id="pickup_date" value="{{ @$user['pickup_date'] }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <span class="text-danger">
                                @error('pickup_date')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="delivered" class="col-6 px-0 font-size font-bold">Delivered</label>
                            <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                name="delivered" id="delivered" value="{{ @$user['delivered'] }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <span class="text-danger">
                                @error('delivered')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="pickup_location" class="col-6 px-0 font-size font-bold">Pickup
                                Location</label>
                            <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                name="pickup_location" id="pickup_location" value="{{ @$user['pickup_location'] }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <span class="text-danger">
                                @error('pickup_location')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="site" class="col-6 px-0 font-size font-bold">Site</label>
                            <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                name="site" id="site" value="{{ @$user['site'] }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <span class="text-danger">
                                @error('site')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="hat_number" class="col-6 px-0 font-size font-bold">Hat No</label>
                            <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                name="hat_number" id="hat_number" value="{{ @$user['hat_number'] }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <span class="text-danger">
                                @error('hat_number')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="dealer_fee" class="col-6 px-0 font-size font-bold">Dealer Fee</label>
                            <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                name="dealer_fee" id="dealer_fee" value="{{ @$user['dealer_fee'] }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <span class="text-danger">
                                @error('dealer_fee')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="late_fee" class="col-6 px-0 font-size font-bold">Late Fee</label>
                            <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                name="late_fee" id="late_fee" value="{{ @$user['late_fee'] }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <span class="text-danger">
                                @error('late_fee')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="auction_storage" class="col-6 px-0 font-size font-bold">Auction
                                Storage</label>
                            <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                name="auction_storage" id="auction_storage" value="{{ @$user['auction_storage'] }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <span class="text-danger">
                                @error('auction_storage')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="towing_charges" class="col-6 px-0 font-size font-bold">Towing
                                Charges</label>
                            <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                name="towing_charges" id="towing_charges" value="{{ @$user['towing_charges'] }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <span class="text-danger">
                                @error('towing_charges')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="title_fee" class="col-6 px-0 font-size font-bold">Title Fee</label>
                            <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                name="title_fee" id="title_fee" value="{{ @$user['title_fee'] }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <span class="text-danger">
                                @error('title_fee')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="post_detention" class="col-6 px-0 font-size font-bold">Post
                                Detention</label>
                            <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                name="post_detention" id="post_detention" value="{{ @$user['post_detention'] }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <span class="text-danger">
                                @error('post_detention')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="custom_inspection" class="col-6 px-0 font-size font-bold">Custom
                                Inspection</label>
                            <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                name="custom_inspection" id="custom_inspection"
                                value="{{ @$user['custom_inspection'] }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <span class="text-danger">
                                @error('custom_inspection')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="additional_fee" class="col-6 px-0 font-size font-bold">Additional
                                Fee</label>
                            <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                name="additional_fee" id="additional_fee" value="{{ @$user['additional_fee'] }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <span class="text-danger">
                                @error('additional_fee')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>


                    <div class="col-12 py-2">
                        <div class="d-flex align-items-center">
                            <label for="insurance" class="col-6 px-0 font-size font-bold">Insurance</label>
                            <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                name="insurance" id="insurance" value="{{ @$user['insurance'] }}">
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

            </div>
        </div>
        <div class="col-4 py-3">
            <div class="col-12">
                {{-- <input type="file" name="vehicle_image[]" onchange="vehicle_image()"
                    class="form-control border border-info rounded col-12 w-100" id="vehicle_fileupload"
                    multiple="multiple"> --}}
                <div class="input-images-1 rounded" name="vehicle_image[]" style="padding-top: .5rem;">
                </div>
            </div>
        </div>

    </div>
    <div class="col-12 py-2 px-5 d-flex justify-content-end">
        <input type="hidden" class="form-control-sm border border-0 rounded-pill bg col-6" name="added_by_email"
            id="added_by_email" readonly value="{{ Auth::user()->email }}">
        <input type="hidden" class="form-control-sm border border-0 rounded-pill bg col-6" name="added_by_role"
            id="added_by_role" readonly value="{{ Auth::user()->id }}">
        <input type="hidden" readonly name="tab" value="general">
        <input type="submit" value="Next" class="btn col-1 next-style text-white" onclick="create_vehicle_form()"
            id="general_vehicle" name="{{ $module['button'] }}" style="cursor: pointer;">
    </div>
</form>