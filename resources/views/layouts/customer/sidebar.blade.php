<div class="col-3 h-100 p-0">
    <div class="col-lg-12 p-0">
        <div class="card user-card rounded">
            <div class="card-header-img">
                <img class="img-fluid w-50" src="{{ asset('assets/images/pattern5.png') }}" alt="card-img" />
                <div>
                    <h6 class="mx-0 my-2 text-muted"><b>{{ strtoupper(@$user['customer_name']) }}</b></h6>
                    <span class="font-size">{{ @$user['customer_email'] }}</span>
                </div>

            </div>
            {{-- <p>
                Lorem ipsum dolor sit amet, consectet ur
                adipisicing elit, sed do eiusmod temp or
                incidi dunt ut labore et.
            </p> --}}

            <div>
                <div class="p-3">
                    <div class="d-flex justify-content-start">
                        <span class="text-muted"><b>Details</b></span>
                    </div>
                    <hr class="m-0" style="border:1px solid #555454">
                </div>
                <div class="d-flex flex-column align-items-start">
                    <span class="text-muted py-1 px-3">
                        <b>Username:</b> {{ @$user['customer_name'] }}
                    </span>
                    <span class="text-muted py-1 px-3">
                        <b>Email:</b> {{ @$user['customer_email'] }}
                    </span>
                    <span class="text-muted py-1 px-3">
                        <b>Status:</b>
                        @if (@$val['status'] == '1')
                            <div class="badge badge-success py-1 px-2 rounded">Active</div>
                        @else
                            <div class="badge badge-danger py-1 px-2 rounded">In Active</div>
                        @endif
                    </span>
                    <span class="text-muted py-1 px-3">
                        <b>Role:</b> customer
                    </span>
                    <span class="text-muted py-1 px-3">
                        <b>Tax id:</b> {{ @$user['tax_id'] }}
                    </span>
                    <span class="text-muted py-1 px-3">
                        <b>Contact:</b> {{ @$user['main_phone'] }}
                    </span>
                    <span class="text-muted py-1 px-3">
                        <b>Country:</b> {{ @$user['country'] }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
