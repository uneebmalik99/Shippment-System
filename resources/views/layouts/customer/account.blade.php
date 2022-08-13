<div class="d-flex justify-content-between">
    <div>
        <button class="btn btn-info form-control rounded"> <i class="ti-user"></i><b> Account</b></button>
    </div>
    <div>
        <button class="border-0 form-control text-muted"><i class="ti-truck"></i> <b>Consignee</b></button>
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
        <h6 class="text-muted"><b>User's Projects List</b></h6>
    </div>
    <div class="col-12 mt-5 p-0">

        <table class="table">
            <thead>
                <th scope="col" class="py-2 px-3">
                    <h5>Projects</h5>
                    <span wire:click="sortBy('name')" class="float-right text-sm" style="cursor: pointer;">
                        <i class="ti-arrow-up"></i>
                        <i class="ti-arrow-down text-muted"></i>
                    </span>
                </th>
                <th scope="col" class="py-2 px-3">
                    <h5>Total</h5>
                </th>
                <th scope="col" class="py-2 px-3">
                    <h5>Progress</h5>
                    <span class="float-right text-sm" style="cursor: pointer;">
                        <i class="ti-arrow-up"></i>
                        <i class="ti-arrow-down text-muted"></i>
                    </span>
                </th>
                <th scope="col" class="py-2 px-3">
                    <h5>Hours</h5>
                </th>
            </thead>
            <tbody>
                <td class="text-muted">
                    <div class="d-flex justify-content-start">
                        New Vehicles
                    </div>
                </td>
                <td class="text-muted">
                    <div class="d-flex justify-content-start">
                        212
                    </div>
                </td>
                <td rowspan="2">
                    <div class="progress">
                        <div class="progress-bar progress-bar-success" role="progressbar" style="width: 65%"
                            aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">60%</div>
                    </div>
                </td>
                <td class="text-muted">
                    <div class="d-flex justify-content-start">
                        88:19th
                    </div>
                </td>
            </tbody>
        </table>
    </div>
</div>
