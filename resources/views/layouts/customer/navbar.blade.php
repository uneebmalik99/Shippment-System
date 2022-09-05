<div class="d-flex justify-content-between">
    <div>
        <button class="btn btn_custom rounded text-white profile_tabs" id="account" style="cursor: pointer;"
            cust_id="{{ @$user['id'] }}">
            <i class="ti-user"></i><b> Account</b>
        </button>
    </div>
    <div>
        <button class="border-0 form-control text-muted profile_tabs" id="consignee" style="cursor: pointer;"
            cust_id="{{ @$user['id'] }}">
            <i class="ti-truck"></i>
            <b>Consignee</b></button>
    </div>
    <div>
        <button class="border-0 form-control text-muted profile_tabs" id="billing" style="cursor: pointer;"
            cust_id="{{ @$user['id'] }}">
            <i class="ti-clipboard"></i><b> Billing Information</b>
        </button>
    </div>
    <div>
        <button class="border-0 form-control text-muted profile_tabs" id="notification" style="cursor: pointer;"
            cust_id="{{ @$user['id'] }}">
            <i class="ti-bell"></i><b> Notifications</b>
        </button>
    </div>
    <div>
        <button class="border-0 form-control text-muted profile_tabs" id="document" style="cursor: pointer;"
            cust_id="{{ @$user['id'] }}">
            <i class="fa-solid fa-link"></i><b> Documents</b>
        </button>
    </div>
</div>
