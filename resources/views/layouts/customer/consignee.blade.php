<div class="d-flex justify-content-between">
    <div>
        <button class="border-0 form-control text-muted"> <i class="ti-user"></i><b> Account</b></button>
    </div>
    <div>
        <button class="btn btn-info form-control rounded"><i class="ti-truck"></i> <b>Consignee</b></button>
    </div>
    <div>
        <button class="border-0 form-control text-muted"><i class="ti-clipboard"></i><b> Billing
                Information</b></button>
    </div>
    <div>
        <button class="border-0 form-control text-muted"><i class="ti-bell"></i><b>
                Notifications</b></button>
    </div>
    <div>
        <button class="border-0 form-control text-muted"><i class="fa-solid fa-link"></i><b>
                documents</b></button>
    </div>
</div>
<div class="card user-card rounded mt-3">
    <div class="px-3 d-flex justify-cotent center">
        <h6 class="text-muted"><b>Consignee Information</b></h6>
    </div>
    <div class="col-12 mt-2">
        <div class="text-muted text-left">
            <b>Consignee</b>
        </div>
        <div class="d-flex justify-content-start py-3">
            <div class="text-muted d-flex"><input type="radio" name="consignee" value="same"><span class="px-2">
                    Same
                    as Billing Party</span></div>
            <div class="text-muted d-flex px-2"><input type="radio" name="consignee" value="new"><span
                    class="px-2"> Add New Consginee</span></div>
        </div>

        <div class="text-muted text-left">
            <b>Consolidate</b>
        </div>
        <div class="d-flex justify-content-start py-3">
            <div class="text-muted d-flex"><input type="radio" name="consolidate" value="yes"><span
                    class="px-2">Yes</span></div>
            <div class="text-muted d-flex px-2"><input type="radio" name="consolidate" value="no"><span
                    class="px-2"> No</span></div>
        </div>

        <div class="text-muted text-left">
            <b>Return the original shipping document to</b>
        </div>
        <div class="d-flex justify-content-start py-3">
            <div class="text-muted d-flex"><input type="radio" name="return" value="send_back"><span
                    class="px-2">Send back to me</span></div>
            <div class="text-muted d-flex px-2"><input type="radio" name="return" value="pick_up"><span
                    class="px-2"> Pick up from office</span></div>
        </div>

        <div class="text-muted text-left">
            <b>Insurance</b>
        </div>
        <div class="d-flex justify-content-start py-3">
            <div class="text-muted d-flex"><input type="radio" name="insurance" value="yes"><span
                    class="px-2">Yes</span></div>
            <div class="text-muted d-flex px-2"><input type="radio" name="insurance" value="no"><span
                    class="px-2">No</span></div>
        </div>

        <div class="text-muted text-left">
            <b>Destination Port</b>
        </div>
        <div class="d-flex justify-content-start py-3">
            <div class="text-muted d-flex"><input type="radio" name="destination_port" value="single"><span
                    class="px-2">Single</span></div>
            <div class="text-muted d-flex px-2"><input type="radio" name="destination_port" value="multiple"><span
                    class="px-2">Multiple</span></div>
        </div>
        <div class="text-muted"><input class="form-control w-25 border border-primary rounded" type="text"
                name="port"></div>
        <div class="d-flex justify-content-start mt-2">
            <input class="btn btn-info rounded" type="submit" value="Submit">
        </div>
    </div>
</div>
