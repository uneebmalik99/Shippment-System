@include('layouts.customer_create.navbar')
<form method="POST" id="customer_billing_form" enctype="multipart/form-data">
    @csrf
    <div class="d-flex px-2 ml-5 mt-4" style="width: 90%!important;">
        <div class="d-block w-100">
            <div>
                <label for="first_name" class="text-info font-style">First Name</label>
            </div>
            <div>
                <input type="text" class="form-control rounded btn col-8 input-style text-left" style="font-size:12px!important;" name="first_name"
                    id="first_name">
            </div>
        </div>
        <div class="d-block w-100">
            <div>
                <label for="company_name" class="text-info font-style">Company Name</label>
            </div>
            <div>
                <input type="text" class="form-control rounded btn col-8 input-style text-left" style="font-size:12px!important;" name="company_name"
                    id="company_name">
            </div>
        </div>
        <div class="d-block w-100">
            <div>
                <label for="country" class="text-info font-style">Country</label>
            </div>
            <div>
                <input type="text" class="form-control rounded btn col-8 input-style text-left" style="font-size:12px!important;" name="country"
                    id="country">
            </div>
        </div>
    </div>

    <div class="d-flex px-2 ml-5 my-3" style="width: 90%!important;">
        <div class="d-block w-100">
            <div>
                <label for="last_name" class="text-info font-style">Last Name</label>
            </div>
            <div>
                <input type="text" class="form-control rounded btn col-8 input-style text-left" style="font-size:12px!important;" name="last_name"
                    id="last_name">
            </div>
        </div>
        <div class="d-block w-100">
            <div>
                <label for="company_email" class="text-info font-style">Company Email</label>
            </div>
            <div>
                <input type="text" class="form-control rounded btn col-8 input-style text-left" style="font-size:12px!important;" name="company_email"
                    id="company_email">
            </div>
        </div>
        <div class="d-block w-100">
            <div>
                <label for="city" class="text-info font-style">City</label>
            </div>
            <div>
                <input type="text" class="form-control rounded btn col-8 input-style text-left" style="font-size:12px!important;" name="city"
                    id="city">
            </div>
        </div>
    </div>

    <div class="d-flex px-2 ml-5" style="width: 90%!important;">
        <div class="d-block w-100">
            <div>
                <label class="text-info font-style" for="phone">Phone</label>
            </div>
            <div>
                <input class="form-control rounded btn col-8 input-style text-left" style="font-size:12px!important;" type="text" name="phone"
                    id="phone">
            </div>
        </div>
        <div class="d-block w-100 p-2">
            <div>
                <label class="text-info font-style" for="address">Address</label>
            </div>
            <div>
                <input class="form-control rounded btn col-8 input-style text-left" style="font-size:12px!important;" type="text" name="address"
                    id="address">
            </div>
        </div>
        <div class="d-block w-100">
            <div>
                <label class="text-info font-style" for="zip_code">Zip Code</label>
            </div>
            <div>
                <input class="form-control rounded btn col-8 input-style text-left" style="font-size:12px!important;" type="text" name="zip_code"
                    id="zip_code">
            </div>
        </div>
    </div>

    <div class="d-flex w-75 mt-4 p-2 ml-5">
        <div class="text-muted text-left col-4 text-head">
            <div style="font-weight:bold;font-size:14px!important">Identification Type</div>
        </div>
        <div class="text-muted text-left col-4 text-head" >
            <div style="font-weight:bold;font-size:14px!important">Identification Number</div>
        </div>
        <div class="text-muted text-left col-4 text-head">
            <div style="font-weight:bold;font-size:14px!important">Expiry Date</div>
        </div>
    </div>

    <div class="d-flex ml-5 p-2" style="width: 90%!important;">
        <div class="d-block w-100">
            <div>
                <label class="text-info font-style" for="foreign_passport_number">Foreign Passport No</label>
            </div>
            <div>
                <input class="form-control rounded btn col-8 input-style text-left" style="font-size:12px!important;" type="text"
                    name="foreign_passport_number" id="foreign_passport_number">
            </div>
        </div>
        <div class="d-block w-100">
            <div style="font-weight:bold;font-size:14px!important;">
                <label class="text-info font-style" for="identification_number">Identification Number</label>
            </div>
            <div>
                <input class="form-control rounded btn col-8 input-style text-left" style="font-size:12px!important;" type="text"
                    name="identification_number" id="identification_number">
            </div>
        </div>
        <div class="d-block w-100">
            <div>
                <label class="text-info font-style" for="expiry_date">Expiry Date</label>
            </div>
            <div>
                <input class="form-control rounded btn col-8 input-style text-left" style="font-size:12px!important;" type="text" name="expiry_date"
                    id="expiry_date">
            </div>
        </div>
    </div>

    <div>
        <div class="d-flex justify-content-between p-2 ml-5">
            <div class="col-4 text-left text-info">
                <span><div style="font-size:14px!important">Shipping</div></span>
            </div>
        </div>

        <div class="d-flex justify-content-start p-2 ml-5">
            <div class="text-muted d-flex col-3">
                <input class="text-muted d-flex px-2 shipping" type="radio" name="shipping" value="single">
                <span class="px-2">Single Unit</span>
            </div>

            <div class="text-muted d-flex col-3">
                <input class="text-muted d-flex px-2 shipping" type="radio" name="shipping" value="multiple">
                <span class="px-2">Multiple Unit</span>
            </div>
        </div>
    </div>

    <div>
        <div class="d-flex justify-content-between p-2 ml-5">
            <div class="col-4 text-left text-info">
                <span><div style="font-size:14px!important">Shipment Type</div></span>
            </div>
        </div>

        <div class="d-flex justify-content-start p-2 ml-5">
            <div class="text-muted d-flex col-3">
                <input class="text-muted d-flex px-2 shipment_type" type="radio" name="shipment_type"
                    value="vehicle">
                <span class="px-2">Vehicle</span>
            </div>

            <div class="text-muted d-flex col-3">
                <input class="text-muted d-flex px-2 shipment_type" type="radio" name="shipment_type"
                    value="motorcycle">
                <span class="px-2">Motorcycle</span>
            </div>

            <div class="text-muted d-flex col-3">
                <input class="text-muted d-flex px-2 shipment_type" type="radio" name="shipment_type"
                    value="package">
                <span class="px-2">Package</span>
            </div>

            <div class="text-muted d-flex col-3">
                <input class="text-muted d-flex px-2 shipment_type" type="radio" name="shipment_type"
                    value="boat">
                <span class="px-2">Boat</span>
            </div>
        </div>
    </div>

    <div>
        <div class="d-flex justify-content-between p-2 ml-5">
            <div class="col-4 text-left text-info">
                <span><div style="font-size:14px!important">Purchased From</div></span>
            </div>
        </div>

        <div class="d-flex justify-content-start p-2 ml-5">
            <div class="text-muted d-flex col-3">
                <input class="text-muted d-flex px-2 purchased_from" type="radio"
                    name="purchased_from"value="auction">
                <span class="px-2">Auction</span>
            </div>

            <div class="text-muted d-flex col-3">
                <input class="text-muted d-flex px-2 purchased_from" type="radio"
                    name="purchased_from"value="dealer">
                <span class="px-2">Dealer</span>
            </div>

            <div class="text-muted d-flex col-3">
                <input class="text-muted d-flex px-2 purchased_from" type="radio"
                    name="purchased_from"value="private">
                <span class="px-2">Private</span>
            </div>

            <div class="text-muted d-flex col-3">
                <input class="text-muted d-flex px-2 purchased_from" type="radio"
                    name="purchased_from"value="pwn">
                <span class="px-2">Own</span>
            </div>
        </div>
    </div>

    <div>
        <div class="d-flex justify-content-between p-2 ml-5">
            <div class="col-4 text-left text-info">
                <span><div style="font-size:14px!important">Request Pickup</div></span>
            </div>
        </div>

        <div class="d-flex justify-content-start p-2 ml-5">
            <div class="text-muted d-flex col-3">
                <input class="text-muted d-flex px-2 request_pickup" type="radio" name="request_pickup"
                    value="yes">
                <span class="px-2">Yes</span>
            </div>

            <div class="text-muted d-flex col-3">
                <input class="text-muted d-flex px-2 request_pickup" type="radio" name="request_pickup"
                    value="no">
                <span class="px-2">No</span>
            </div>
        </div>
    </div>

    <div>
        <div class="d-flex justify-content-between p-2 ml-5">
            <div class="col-4 text-left text-info">
                <span><div style="font-size:14px!important">End Use</div></span>
            </div>
        </div>

        <div class="d-flex justify-content-start p-2 ml-5">
            <div class="text-muted d-flex col-3">
                <input class="text-muted d-flex px-2 end_use" type="radio" name="end_use" id="personal"
                    value="personal">
                <span class="px-2">Personal Use</span>
            </div>

            <div class="text-muted d-flex col-5">
                <input class="text-muted d-flex px-2 end_use" type="radio" name="end_use" id="business"
                    value="business">
                <span class="px-2">Resale and wholesale business</span>
            </div>
        </div>
    </div>

    <div>
        <div class="d-flex justify-content-between p-2 ml-5">
            <div class="col-4 text-left text-info">
                <span><div style="font-size:14px!important">Buyer Number</div></span>
            </div>
        </div>

        <div class="d-flex justify-content-start p-2 ml-5">
            <div class="d-flex col-4">
                <input class="form-control rounded btn col-8 input-style text-left" type="text" style="font-size:12px!important;"
                    name="buyer_number" id="buyer_number">
            </div>
        </div>
    </div>

    <div class="col-12 py-2 px-5 d-flex justify-content-end">

        <input type="hidden" class="form-control-sm border border-0 rounded-pill bg col-6" name="email"
            id="email" value="{{ @$module['email'] }}"readonly>
        {{-- <input type="hidden" class="form-control-sm border border-0 rounded-pill bg col-6" name="added_by_role"
            id="added_by_email" value="{{ Auth::user()->id }}"readonly value="{{ @$user['added_by_email'] }}">
        <input type="hidden" class="form-control-sm border border-0 rounded-pill bg col-6" name="added_by_role"
            id="added_by_email" value="{{ Auth::user()->id }}"readonly value="{{ @$user['added_by_email'] }}"> --}}
            <button type="button" class="btn col-1 next-style text-white " onclick="createForm(this.id)"
            id="billing_customer" name="{{ $module['button'] }}" style="padding: 4px;" data-next="shipper_customer_tab">
        <div class="unskew">Next</div>
    </button>
    </div>
</form>
