<div>
    <div>
        <div class="bg-white">
            @include('shipment.navbar')
            <div class="mt-3">
                <form method="POST" class="col-12" id="shipment_form">
                    @csrf
                    <div class="mt-2 bg-light" id="shipment_body">
                        <table id="shipment_vehicle_table" class="table ">
                            <thead class="bg-custom text-dark">
                                <tr style="font-size: 11px!important">
                                    <th>YEAR</th>
                                    <th>MAKE</th>
                                    <th>MODEL</th>
                                    <th>VIN</th>
                                    <th>TITLE</th>
                                    <th>TITLE STATE</th>
                                    <th>TITLE NUMBER</th>
                                    <th>CUSTOMER</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($vehicles as $vehicle)
                                        <td>{{ @$vehicle['year'] }}</td>
                                        <td>{{ @$vehicle['make'] }}</td>
                                        <td>{{ @$vehicle['model'] }}</td>
                                        <td>{{ @$vehicle['vin'] }}</td>
                                        <td>{{ @$vehicle['title'] }}</td>
                                        <td>{{ @$vehicle['title_state'] }}</td>
                                        <td>{{ @$vehicle['title_number'] }}</td>
                                        <td>{{ @$vehicle['customer_name'] }}</td>
                                        <td class="text-center"><input type="checkbox" value="{{ @$vehicle['id'] }}"
                                                id="vehicle" name="vehicle[]"></td>
                                        {{-- <input type="hidden" value="{{ @$vehicle['id'] }}"> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-xl-flex border-shipment">
                        <div class="col-12 d-lg-flex p-0">
                            <div class="col-lg-6 col-12 p-0">
                                <div class="col-12">
                                    <div class="tab_card my-3">
                                        <div class="col-7 py-3">
                                            <div class="text-color" style="cursor: pointer;" id="shipment_customer"
                                                onclick="slide(this.id)">
                                                <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                                <span class="p-2">Customer Information</span>
                                            </div>
                                        </div>
                                        <div id="shipment_customer_body">
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="company_name"
                                                        class="col-6 px-0 font-size font-bold">Company
                                                        Name</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="company_name" id="company_name">
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="customer_email"
                                                        class="col-6 px-0 font-size font-bold">Customer
                                                        Email</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="customer_email" id="customer_email">
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="customer_phone"
                                                        class="col-6 px-0 font-size font-bold">Customer
                                                        Phone</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="customer_phone" id="customer_phone">
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="shipment_type"
                                                        class="col-6 px-0 font-size font-bold">Shipment
                                                        Type</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="shipment_type" id="shipment_type">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab_card my-3">
                                        <div class="col-7 py-3">
                                            <div class="text-color" style="cursor: pointer;" id="shipment_calendar"
                                                onclick="slide(this.id)">
                                                <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                                <span class="p-2">Schedule Information</span>
                                            </div>
                                        </div>
                                        <div id="shipment_calendar_body">
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="loading_date"
                                                        class="col-6 px-0 font-size font-bold">Loading
                                                        Date</label>
                                                    <input type="date"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="loading_date" id="loading_date">
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="cut_off_date" class="col-6 px-0 font-size font-bold">Cut
                                                        off
                                                        Date</label>
                                                    <input type="date"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="cut_off_date" id="cut_off_date">
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="sale_date" class="col-6 px-0 font-size font-bold">Sale
                                                        Date</label>
                                                    <input type="date"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="sale_date" id="sale_date">
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="est_arrival_date"
                                                        class="col-6 px-0 font-size font-bold">Est
                                                        Arrival
                                                        Date</label>
                                                    <input type="date"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="est_arrival_date" id="est_arrival_date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab_card my-3">
                                        <div class="col-7 py-3">
                                            <div class="text-color" style="cursor: pointer;" id="shipment_container"
                                                onclick="slide(this.id)">
                                                <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                                <span class="p-2">Container Information</span>
                                            </div>
                                        </div>
                                        <div id="shipment_container_body">
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="booking_number"
                                                        class="col-6 px-0 font-size font-bold">Booking
                                                        Number</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="booking_number" id="booking_number">

                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="container_number"
                                                        class="col-6 px-0 font-size font-bold">Container Number</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="container_no" id="container_number">
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="container_size"
                                                        class="col-6 px-0 font-size font-bold">Container
                                                        Size</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="container_size" id="container_size">
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="container_type"
                                                        class="col-6 px-0 font-size font-bold">Container
                                                        Type</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="container_type" id="container_type">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab_card my-3">
                                        <div class="col-7 py-3">
                                            <div class="text-color" style="cursor: pointer;" id="shipment_reference"
                                                onclick="slide(this.id)">
                                                <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                                <span class="p-2">Reference Information</span>
                                            </div>
                                        </div>
                                        <div id="shipment_reference_body">
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="shipping_reference"
                                                        class="col-6 px-0 font-size font-bold">Shipping
                                                        Reference</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="shipping_reference" id="shipping_reference">
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="ase-itn_number"
                                                        class="col-6 px-0 font-size font-bold">
                                                        ASE-ITN
                                                        No</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="ase-itn_number" id="ase-itn_number">
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="xtn_number" class="col-6 px-0 font-size font-bold">XTN
                                                        No</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="xtn_number" id="xtn_number">
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <td class="col-6">
                                                        <label for="oti_number"
                                                            class="col-6 px-0 font-size font-bold">OTI
                                                            Number</label>
                                                        <input type="text"
                                                            class="form-control-sm border border-0 rounded-pill bg col-6"
                                                            name="oti_number" id="oti_number">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab_card my-3">
                                        <div class="col-7 py-3">
                                            <div class="text-color" style="cursor: pointer;" id="shipment_users"
                                                onclick="slide(this.id)">
                                                <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                                <span class="p-2">Users Information</span>
                                            </div>
                                        </div>
                                        <div id="shipment_users_body">
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="select_consignee "
                                                        class="col-6 px-0 font-size font-bold">Consignee</label>
                                                    <select
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="select_consignee" id="select_consignee">
                                                        @foreach ($consignees as $consignee)
                                                            <option
                                                                class="form-control-sm border border-0 rounded-pill bg col-6"
                                                                value="{{ $consignee['id'] }}">
                                                                {{ $consignee['consignee_name'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="shipper" class="col-6 px-0 font-size font-bold">
                                                        Shipper
                                                    </label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="shipper" id="shipper">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-6 col-12 p-0">
                                <div class="col-12">
                                    <div class="tab_card my-3">
                                        <div class="col-7 py-3">
                                            <div class="text-color" style="cursor: pointer;" id="shipment_loading"
                                                onclick="slide(this.id)">
                                                <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                                <span class="p-2">Loading Information</span>
                                            </div>
                                        </div>
                                        <div id="shipment_loading_body">
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="loading_terminal"
                                                        class="col-6 px-0 font-size font-bold">Loading
                                                        Terminal</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="loading_terminal" id="loading_terminal">
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="loading_port"
                                                        class="col-6 px-0 font-size font-bold">Port</label>
                                                    {{-- <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="loading_port" id="loading_port"> --}}
                                                    <select
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="loading_port" id="loading_port">
                                                        @foreach ($location as $locations)
                                                            <option value="{{ $locations['id'] }}">
                                                                {{ $locations['name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="loading_state"
                                                        class="col-6 px-0 font-size font-bold">State</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="loading_state" id="loading_state">
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="loading_country"
                                                        class="col-6 px-0 font-size font-bold">Country</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="loading_country" id="loading_country">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab_card my-3">
                                        <div class="col-7 py-3">
                                            <div class="text-color" style="cursor: pointer;"
                                                id="shipment_destination" onclick="slide(this.id)">
                                                <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                                <span class="p-2">Destination Information</span>
                                            </div>
                                        </div>
                                        <div id="shipment_destination_body">
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="destination_terminal"
                                                        class="col-6 px-0 font-size font-bold px-1">Destination
                                                        Terminal</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="destination_terminal" id="destination_terminal">
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="destination_port"
                                                        class="col-6 px-0 font-size font-bold">Port</label>
                                                    {{-- <input type="date"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="destination_port" id="destination_port"> --}}
                                                    <select
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="destination_port" id="destination_port">
                                                        @foreach ($location as $locations)
                                                            <option value="{{ $locations['id'] }}">
                                                                {{ $locations['name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="destination_state"
                                                        class="col-6 px-0 font-size font-bold">State</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="destination_state" id="destination_state">
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="destination_country"
                                                        class="col-6 px-0 font-size font-bold">Country
                                                        Line</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="destination_country" id="destination_country">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab_card my-3">
                                        <div class="col-7 py-3">
                                            <div class="text-color" style="cursor: pointer;" id="shipment_shipping"
                                                onclick="slide(this.id)">
                                                <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                                <span class="p-2">Shipping Information</span>
                                            </div>
                                        </div>
                                        <div id="shipment_shipping_body">
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="shipping_line"
                                                        class="col-6 px-0 font-size font-bold">Shipping
                                                        Line</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="shipping_line" id="shipping_line">

                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="vessel"
                                                        class="col-6 px-0 font-size font-bold">Vessel</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="vessel" id="vessel">
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="seal_number"
                                                        class="col-6 px-0 font-size font-bold">Seal
                                                        No</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="seal_number" id="seal_number">
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="voyage"
                                                        class="col-6 px-0 font-size font-bold">Voyage
                                                        Type</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="voyage" id="voyage">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab_card my-3">
                                        <div class="col-7 py-3">
                                            <div class="text-color" style="cursor: pointer;" id="shipment_units"
                                                onclick="slide(this.id)">
                                                <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                                <span class="p-2">Units Information</span>
                                            </div>
                                        </div>
                                        <div id="shipment_units_body">
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="units"
                                                        class="col-6 px-0 font-size font-bold">Units</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="units" id="units">
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="types"
                                                        class="col-6 px-0 font-size font-bold">Types</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="types" id="types">
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="insurance"
                                                        class="col-6 px-0 font-size font-bold">Insurance</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="insurance" id="insurance">
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="fmc_license_number"
                                                        class="col-6 px-0 font-size font-bold">FMC
                                                        License
                                                        No</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="fmc_license_number" id="fmc_license_number">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab_card my-3">
                                        <div class="col-7 py-3">
                                            <div class="text-color" style="cursor: pointer;" id="note"
                                                onclick="slide(this.id)">
                                                <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                                <span class="p-2">Note</span>
                                            </div>
                                        </div>
                                        <div id="note_body">
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="notes"
                                                        class="col-6 px-0 font-size font-bold">Note</label>
                                                    <textarea type="text" class="form-control-sm border border-0 col-6 card-pill" name="notes" id="notes"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <div class="d-flex justify-content-end col-6">
                            <div class="col-3">
                                <button type="reset" class="btn next-style text-white col-12 py-1"
                                    id="general_vehicle" value="Reset" style="cursor: pointer;">
                                    <div class="unskew">Clear</div>
                                </button>
                            </div>
                            <div class="col-3">
                                <button type="submit" class="btn next-style text-white col-12 py-1"
                                    onclick="create_shipment_form(this.id)" id="general_shipment"
                                    style="cursor: pointer;">
                                    <div class="unskew">Save</div>
                                </button>
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn next-style text-white col-12 py-1"
                                    id="shipment_general_finish" onclick="display_model()" style="cursor: pointer;">
                                    <div class="unskew">Finish</div>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
