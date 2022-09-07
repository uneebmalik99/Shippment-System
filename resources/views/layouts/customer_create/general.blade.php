@include('layouts.customer_create.navbar')
<form action={{ $action }} method="POST" id="form">
    @csrf
    <div class="d-flex">
        <div class="col-6 p-0">
            <div class="d-flex justify-content-between py-3">
                <div class="col-6 d-flex align-items-center">
                    <div class="text-color">
                        <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="p-2 ">General Information</span>
                    </div>
                </div>
                <div class="col-6 d-flex align-items-center">
                    <div class="text-color">
                        <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="p-2 ">Sales Application</span>
                    </div>
                </div>
            </div>
            <div class="d-flex py-3">
                <div class="col-6">
                    <div class="d-flex align-items-center">
                        <label for="customer_number" class="col-6 px-0 font-size font-bold">Customer Number</label>
                        <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                            name="customer_number" id="customer_number" value="{{ @$user['customer_number'] }}">
                    </div>
                    <div class="d-flex justify-content-end">
                        <span class="text-danger">
                            @error('customer_number')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex align-items-center">
                        <label for="sales_person" class="col-6 px-0 font-size font-bold">Sales person</label>
                        <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                            name="sales_person" id="sales_person" value="{{ @$user['sales_person'] }}">
                    </div>
                    <div class="d-flex justify-content-end">
                        <span class="text-danger">
                            @error('sales_person')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
            </div>
            <div class="d-flex py-3">
                <div class="col-6">
                    <div class="d-flex align-items-center">
                        <label for="customer_name" class="col-6 px-0 font-size font-bold">Customer Name</label>
                        <input type="name" class="form-control-sm border border-0 rounded-pill bg col-6"
                            name="customer_name" id="customer_name" value="{{ @$user['customer_name'] }}"
                            placeholder="0000-0000000" pattern="[0-9]{4}-[0-9]{7}">
                    </div>
                    <div class="d-flex justify-content-end">
                        <span class="text-danger">
                            @error('customer_name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-6 d-flex align-items-center">
                    <label for="inside_person" class="col-6 px-0 font-size font-bold">Inside person</label>
                    <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                        name="address_line1" id="inside_person" value="{{ @$user['address_line1'] }}">
                </div>
            </div>
            <div class="d-flex py-3">
                <div class="col-6">
                    <div class="d-flex align-items-center">
                        <label for="level" class="col-6 px-0 font-size font-bold">Level</label>
                        <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                            name="address_line2" id="level" value="{{ @$user['address_line2'] }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex align-items-center">
                        <label for="lead" class="col-6 px-0 font-size font-bold">Lead</label>
                        <input type="email" class="form-control-sm border border-0 rounded-pill bg col-6"
                            name="lead" id="lead" value="{{ Auth::user()->email }}"readonly
                            value="{{ @$user['lead'] }}">
                    </div>
                </div>
            </div>
            <div class="d-flex py-3">
                <div class="col-6">
                    <div class=" d-flex align-items-center">
                        <label for="status" class="col-6 px-0 font-size font-bold">Status</label>
                        <input type="status" class="form-control-sm border border-0 rounded-pill bg col-6"
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
                <div class="col-6 d-flex align-items-center">
                    <div class="text-color">
                        <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="p-2 ">Financial Information</span>
                    </div>
                </div>

            </div>
            <div class="d-flex py-3">
                <div class="col-6">
                    <div class=" d-flex align-items-center">
                        <label for="main_phone" class="col-6 px-0 font-size font-bold">Main phone</label>
                        <input type="main_phone" class="form-control-sm border border-0 rounded-pill bg col-6"
                            name="main_phone" id="main_phone" value="{{ @$user['main_phone'] }}">
                    </div>
                    <div class="d-flex justify-content-end">
                        <span class="text-danger">
                            @error('main_phone')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex align-items-center">
                        <label for="payment_type" class="col-6 px-0 font-size font-bold">Payment Type</label>
                        <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                            name="payment_type" id="payment_type" value="{{ @$user['payment_type'] }}">
                    </div>
                </div>

            </div>
            <div class="d-flex py-3">
                <div class="col-6">
                    <div class=" d-flex align-items-center">
                        <label for="main_fax" class="col-6 px-0 font-size font-bold">Main fax</label>
                        <input type="main_fax" class="form-control-sm border border-0 rounded-pill bg col-6"
                            name="main_fax" id="main_fax" value="{{ @$user['main_fax'] }}">
                    </div>
                    <div class="d-flex justify-content-end">
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex align-items-center">
                        <label for="payment_term" class="col-6 px-0 font-size font-bold">Payment Term</label>
                        <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                            name="payment_term" id="payment_term" value="{{ @$user['payment_term'] }}">
                    </div>
                </div>
            </div>
            <div class="d-flex py-3">
                <div class="col-6">
                    <div class=" d-flex align-items-center">
                        <label for="customer_email" class="col-6 px-0 font-size font-bold">Email</label>
                        <input type="email" class="form-control-sm border border-0 rounded-pill bg col-6"
                            name="customer_email" id="customer_email" value="{{ @$user['customer_email'] }}">
                    </div>
                    <div class="d-flex justify-content-end">
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-6">
                    <div class=" d-flex align-items-center">
                        <label for="industry" class="col-6 px-0 font-size font-bold">Industry</label>
                        <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                            name="industry" id="industry" value="{{ @$user['industry'] }}">
                    </div>
                    <div class="d-flex justify-content-end">
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex align-items-center">
                        <label for="price_code" class="col-6 px-0 font-size font-bold">Price code</label>
                        <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                            name="price_code" id="price_code" value="{{ @$user['city'] }}">
                    </div>
                </div>
            </div>
            <div class="d-flex py-3">
                <div class="col-6">
                    <div class=" d-flex align-items-center">
                        <label for="source" class="col-6 px-0 font-size font-bold">Source</label>
                        <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                            name="source" id="source" value="{{ @$user['source'] }}">
                    </div>
                    <div class="d-flex justify-content-end">
                        <span class="text-danger">
                            @error('source')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
            </div>
            <div class="d-flex py-3">
                <div class="col-6">
                    <div class=" d-flex align-items-center">
                        <label for="customer_type" class="col-6 px-0 font-size font-bold">Customer Type</label>
                        <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                            name="customer_type" id="customer_type" value="{{ @$user['customer_type'] }}">
                    </div>
                    <div class="d-flex justify-content-end">
                        <span class="text-danger">
                            @error('customer_type')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
            </div>
            <div class="d-flex py-3">
                <div class="col-6">
                    <div class=" d-flex align-items-center">
                        <label for="sales_type" class="col-6 px-0 font-size font-bold">Sales Type</label>
                        <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                            name="sales_type" id="sales_type" value="{{ @$user['sales_type'] }}">
                    </div>
                    <div class="d-flex justify-content-end">
                        <span class="text-danger">
                            @error('sales_type')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 p-0">
            <div class="d-flex py-3">
                <div class="col-12 d-flex align-items-center">
                    <div class="text-color">
                        <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="p-2 ">Sales Association</span>
                    </div>
                </div>
            </div>
            <div class="d-flex py-3">
                <div class="col-12">
                    <div class="d-flex align-items-center">
                        <label for="location_number" class="col-6 px-0 font-size font-bold">Location Number</label>
                        <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                            name="location_number" id="location_number" value="{{ @$user['location_number'] }}">
                    </div>
                    <div class="d-flex justify-content-end">
                        <span class="text-danger">
                            @error('location_number')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
            </div>
            <div class="d-flex py-3">
                <div class="col-12">
                    <div class="d-flex align-items-center">
                        <label for="country" class="col-6 px-0 font-size font-bold">Country</label>
                        <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                            name="country" id="country" value="{{ @$user['country'] }}">
                    </div>
                    <div class="d-flex justify-content-end">
                        <span class="text-danger">
                            @error('country')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
            </div>
            <div class="d-flex py-3">
                <div class="col-12">
                    <div class="d-flex align-items-center">
                        <label for="zip_code" class="col-6 px-0 font-size font-bold">Zip code</label>
                        <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                            name="zip_code" id="zip_code" value="{{ @$user['zip_code'] }}">
                    </div>
                    <div class="d-flex justify-content-end">
                        <span class="text-danger">
                            @error('zip_code')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
            </div>
            <div class="d-flex py-3">
                <div class="col-12">
                    <div class="d-flex align-items-center">
                        <label for="state" class="col-6 px-0 font-size font-bold">State</label>
                        <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                            name="state" id="state" value="{{ @$user['state'] }}">
                    </div>
                    <div class="d-flex justify-content-end">
                        <span class="text-danger">
                            @error('state')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
            </div>
            <div class="d-flex py-3">
                <div class="col-12">
                    <div class="d-flex align-items-center">
                        <label for="address_1" class="col-6 px-0 font-size font-bold">Address (1)</label>
                        <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                            name="address_1" id="address_1" value="{{ @$user['address_1'] }}">
                    </div>
                    <div class="d-flex justify-content-end">
                        <span class="text-danger">
                            @error('address_1')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
            </div>
            <div class="d-flex py-3">
                <div class="col-12">
                    <div class="d-flex align-items-center">
                        <label for="address_2" class="col-6 px-0 font-size font-bold">Address (2)</label>
                        <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                            name="address_2" id="address_2" value="{{ @$user['address_2'] }}">
                    </div>
                    <div class="d-flex justify-content-end">
                        <span class="text-danger">
                            @error('address_2')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 p-0">
            <div class="col-12 py-3">
                <div class="col-12">
                    <input type="file" name="image[]" class="form-control border border-info rounded col-12 w-100"
                        id="fileupload" multiple="multiple">
                </div>
                <div class="d-flex p-2">
                    <div class="d-flex flex-column align-items-center">
                        <div id="dvPreview1" class="vehicle_image">
                        </div>
                        <div><i class="fa fa-trash delete d-none" style="cursor:pointer;"></i></div>
                    </div>
                    <div class="d-flex flex-column align-items-center">
                        <div id="dvPreview2" class="vehicle_image">
                        </div>
                        <div><i class="fa fa-trash delete d-none" style="cursor:pointer;"></i></div>
                    </div>
                </div>
                <div class="d-flex p-2">
                    <div class="d-flex flex-column align-items-center">
                        <div id="dvPreview3" class="vehicle_image">
                        </div>
                        <div><i class="fa fa-trash delete d-none" style="cursor:pointer;"></i></div>
                    </div>
                    <div class="d-flex flex-column align-items-center">
                        <div id="dvPreview4" class="vehicle_image">
                        </div>
                        <div><i class="fa fa-trash delete d-none" style="cursor:pointer;"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 py-2 px-5 d-flex justify-content-end">
        <input type="hidden" class="form-control-sm border border-0 rounded-pill bg col-6" name="add_by_email"
            id="add_by_email" readonly value="{{ Auth::user()->email }}">
        <input type="hidden" class="form-control-sm border border-0 rounded-pill bg col-6" name="added_by_role"
            id="added_by_role" readonly value="{{ Auth::user()->id }}">
        <input type="button" value="Next" class="btn col-1 next-style text-white" onclick="createForm(this.id)"
            id="general" name="{{ $module['button'] }}">
    </div>
</form>
