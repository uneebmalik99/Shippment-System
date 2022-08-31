@include('layouts.customer_create.navbar')
<form action={{ $action }} method="POST" class="mt-3">
    @csrf
    <div class="d-flex justify-content-around p-2">
        <div class="col-4 d-block">
            <div>
                <label for="shipper_name" class="text-info font-style">Shipper Name</label>
            </div>
            <div>
                <input type="text" class="form-control rounded btn col-10 input-style text-left" name="shipper_name"
                    id="shipper_name">
            </div>
        </div>
        <div class="col-4 d-block">
            <div>
                <label for="contact_person_name" class="text-info font-style">Contact Person Name</label>
            </div>
            <div>
                <input type="text" class="form-control rounded btn col-10 input-style text-left"
                    name="contact_person_name" id="contact_person_name">
            </div>
        </div>
        <div class="col-4 d-block">
            <div>
                <label for="phone" class="text-info font-style">Phone</label>
            </div>
            <div>
                <input type="text" class="form-control rounded btn col-10 input-style text-left" name="phone"
                    id="phone">
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-around p-2">
        <div class="col-4 d-block">
            <div>
                <label for="company_email" class="text-info font-style">Company Email</label>
            </div>
            <div>
                <input type="text" class="form-control rounded btn col-10 input-style text-left" name="company_email"
                    id="company_email">
            </div>
        </div>
        <div class="col-4 d-block">
            <div>
                <label for="country" class="text-info font-style">Country</label>
            </div>
            <div>
                <input type="text" class="form-control rounded btn col-10 input-style text-left" name="country"
                    id="country">
            </div>
        </div>
        <div class="col-4 d-block">
            <div>
                <label for="city" class="text-info font-style">City</label>
            </div>
            <div>
                <input type="text" class="form-control rounded btn col-10 input-style text-left" name="city"
                    id="city">
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between p-2">
        <div class="col-4 d-block">
            <div>
                <label class="text-info font-style" for="zip_code">Zip code</label>
            </div>
            <div>
                <input class="form-control rounded btn col-10 input-style text-left" type="text" name="zip_code"
                    id="zip_code">
            </div>
        </div>
        <div class="col-8 d-block">
            <div>
                <label class="text-info font-style" for="address">Address</label>
            </div>
            <div>
                <input class="form-control rounded btn col-11 input-style text-left" type="text" name="address"
                    id="address">
            </div>
        </div>
    </div>
    <div>
        <div class="d-flex justify-content-between p-2">
            <div class="col-4 text-left text-info">
                <label><b>Consignee</b></label>
            </div>
        </div>

        <div class="d-flex justify-content-start p-2">
            <div class="text-muted d-flex align-items-center col-3">
                <input class="text-muted d-flex px-2 consignee" type="radio" name="consignee"
                    value="same as billing party" id="billing_party">
                <label class="px-2 m-0" for="billing_party">Same as Billing Party</label>
            </div>

            <div class="text-muted d-flex align-items-center col-3">
                <input class="text-muted d-flex px-2 consignee" type="radio" name="consignee" value="new consignee"
                    id="new_consignee">
                <label class="px-2 m-0" for="new_consignee">Add New Consignee</label>
            </div>
        </div>
    </div>

    <div>
        <div class="d-flex justify-content-between p-2">
            <div class="col-4 text-left text-info">
                <label><b>Consolidate</b></label>
            </div>
        </div>

        <div class="d-flex justify-content-start p-2">
            <div class="text-muted d-flex  align-items-center col-3">
                <input class="text-muted d-flex px-2 consolidate" type="radio" name="consolidate" value="send back"
                    id="send_back">
                <label class="px-2 m-0" for="send_back">Send back to me</label>
            </div>

            <div class="text-muted d-flex  align-items-center col-3">
                <input class="text-muted d-flex px-2 consolidate" type="radio" name="consolidate"
                    value="pick up from office" id="pick_up">
                <label class="px-2 m-0" for="pick_up">Pick up from office</label>
            </div>
        </div>
    </div>

    <div>
        <div class="d-flex justify-content-between p-2">
            <div class="col-4 text-left text-info">
                <label><b>Return the original shipping documents to</b></label>
            </div>
        </div>

        <div class="d-flex justify-content-start p-2">
            <div class="text-muted d-flex align-items-center col-3">
                <input class="text-muted d-flex px-2 original_shipping_documents" type="radio"
                    name="original_shipping_documents" value="yes" id="document_yes">
                <label class="px-2 m-0" for="document_yes">Yes</label>
            </div>

            <div class="text-muted d-flex align-items-center col-3">
                <input class="text-muted d-flex px-2 original_shipping_documents" type="radio"
                    name="original_shipping_documents" value="no" id="document_no">
                <label class="px-2 m-0" for="document_no">No</label>
            </div>
        </div>
    </div>

    <div>
        <div class="d-flex justify-content-between p-2">
            <div class="col-4 text-left text-info">
                <label><b>Insurance</b></label>
            </div>
        </div>

        <div class="d-flex justify-content-start p-2">
            <div class="text-muted d-flex align-items-center col-3">
                <input class="text-muted d-flex px-2 insurance" type="radio" name="insurance" value="yes"
                    id="insurance_yes">
                <label for="insurance_yes" class="px-2 m-0">Yes</label>
            </div>

            <div class="text-muted d-flex align-items-center col-3">
                <input class="text-muted d-flex px-2 insurance" type="radio" name="insurance" value="no"
                    id="insurance_no">
                <label for="insurance_no" class="px-2 m-0">No</label>
            </div>
        </div>
    </div>

    <div>
        <div class="d-flex justify-content-between p-2">
            <div class="col-4 text-left text-info">
                <label><b>Destination Port</b></label>
            </div>
        </div>

        <div class="d-flex justify-content-start p-2">
            <div class="text-muted d-flex col-3">
                <input class="text-muted d-flex px-2 destination_port" type="radio" name="destination_port"
                    value="single" id="single">
                <label class="px-2 m-0" for="single">Single</label>
            </div>

            <div class="text-muted d-flex col-3">
                <input class="text-muted d-flex px-2 destination_port" type="radio" name="destination_port"
                    value="multiple" id="multiple">
                <label class="px-2 m-0" for="multiple">Multiple</label>
            </div>
        </div>
    </div>

    <div class="col-6 py-2">
        {{-- <input type="hidden" class="form-control-sm border border-0 rounded-pill bg col-6" name="added_by_role"
            id="added_by_email" value="{{ Auth::user()->id }}"readonly value="{{ @$user['added_by_email'] }}"> --}}
        <input type="button" value="{{ $module['button'] }}" class="btn btn-primary rounded"
            onclick="createForm(this.id)" id="shipper" name="{{ $module['button'] }}">
    </div>
</form>
