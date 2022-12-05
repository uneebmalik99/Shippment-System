{{-- @foreach($buyer_ids as $ids)
{{dd($ids['billings'][0]['company_name'])}}
@endforeach --}}
<div>
    <div>
        <div class="bg-white">
            @include('shipment.navbar')
            <div class="mt-3">
                <div class="col-12 d-flex justify-content-end">
                    <input type="text" style="outline:none!important;font-size:13px!important;color:gray!important" id="shipment_search" name="shipment_search" onkeyup="search_shipment()" placeholder="Search VIN">
                </div>
                <form method="POST" class="col-12" id="shipment_form">
                    @csrf
                    <div class="mt-2 bg-light" id="shipment_body">
                        <table id="" class="table ">
                            <thead class="bg-custom">
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
                            <tbody id="shipment_table">
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Search Vehicles</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                {{-- @foreach ($vehicles as $vehicle)
                                <tr>
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
                                        
                                </tr>
                                @endforeach --}}
                            </tbody>
                        </table>


                        <table class="table" style="background:lightgray;">
                            <tbody id="add_vehicles">
                                @if(@$shipment)
                                @foreach ($shipment[0]['vehicle'] as $vehicle)
                               <tr>
                                       <td>{{ @$vehicle['year'] }}</td>
                                       <td>{{ @$vehicle['make'] }}</td>
                                       <td>{{ @$vehicle['model'] }}</td>
                                       <td>{{ @$vehicle['vin'] }}</td>
                                       <td>{{ @$vehicle['title'] }}</td>
                                       <td>{{ @$vehicle['title_state'] }}</td>
                                       <td>{{ @$vehicle['title_number'] }}</td>
                                       <td>{{ @$vehicle['customer_name'] }}</td>
                                       <td class="text-center"><input type="checkbox" value="{{ @$vehicle['id'] }}"
                                               id="{{@$vehicle['id']}}" tab="{{@$vehicle['id']}}" name="vehicle[]" onclick="removerow(this.id)" checked></td>
                                        
                               </tr>
                               @endforeach
                               @endif

                               @if(@$vehicle_cart)
                               @foreach ($vehicle_cart as $vehicle)
                               <tr>
                                <td>{{ @$vehicle['vehicle']['year'] }}</td>
                                <td>{{ @$vehicle['vehicle']['make'] }}</td>
                                <td>{{ @$vehicle['vehicle']['model'] }}</td>
                                <td>{{ @$vehicle['vehicle']['vin'] }}</td>
                                <td>{{ @$vehicle['vehicle']['title'] }}</td>
                                <td>{{ @$vehicle['vehicle']['title_state'] }}</td>
                                <td>{{ @$vehicle['vehicle']['title_number'] }}</td>
                                <td>{{ @$vehicle['vehicle']['customer_name'] }}</td>
                                <td class="text-center">
                                    <input type="checkbox" value="{{ @$vehicle['vehicle']['id'] }}" id="{{@$vehicle['id']}}"  tab="{{@$vehicle['id']}}" name="vehicle[]" onclick="removerow(this.id)" checked></td>
                                
                        </tr>
                               @endforeach
                               @endif
                            </tbody>
                        </table>
                    </div>
                    @if(@$shipment[0]['id'])
                    <input type="hidden" id="id" name="id" value="{{@$shipment[0]['id']}}">
                    @endif
                    <div class="d-xl-flex border-shipment">
                        <div class="col-12 d-lg-flex p-0">
                            <div class="col-lg-6 col-12 p-0">
                                <div class="col-12 p-0">
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
                                                <span class="p-2">Invoice Detail Information</span>
                                            </div>
                                        </div>
                                        <div id="shipment_customer_body">
                                            <div class="col-12 py-2">
                                                <div class="d-flex py-2">
                                                    <div class="col-5 p-0">
                                                        <label for="vin"
                                                            class="form-control border border-0 px-0"><b>Container AR number</b></label>
                                                    </div>
                                                    <div class="col-7 p-0">
                                                        <input type="text" {{ @$invoices[0]['export']['ar_number'] }}
                                                            class="form-control-sm border border-0 rounded-pill col-12" name="vin"
                                                            id="vin"
                                                            @if (\Request::route()->getName() == 'invoice.create' || @$invoices[0]['export']['ar_number'] == null) value="{{ old('vin') }}" @else value= "{{ @$vehicle['vin'] }}" @endif>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="customer_email"
                                                        class="col-6 px-0 font-size font-bold">Customer Name</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="customer_email" id="customer_email" value="{{ @$invoices[0]['consignee']['consignee_id'] }}">
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="customer_phone"
                                                        class="col-6 px-0 font-size font-bold">Total Amount</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="customer_phone" id="customer_phone" value="{{ @$invoices[0]['total_amount']  }}">
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="shipment_type"
                                                        class="col-6 px-0 font-size font-bold">Paid Amount</label>

                                                        <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="customer_phone" id="customer_phone" value="{{@$invoices[0]['paid_amount'] }}">   
                                                    {{-- <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="shipment_type" id="shipment_type"> --}}
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
                                                <span class="p-2">Invoice Information</span>
                                            </div>
                                        </div>
                                        <div id="shipment_calendar_body">
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="loading_date"
                                                        class="col-6 px-0 font-size font-bold">Damaged</label>
                                                    <input type="date"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="loading_date" id="loading_date" value="{{@$invoices[0]['adjustment_damaged'] }}">
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="adjustment_storage" class="col-6 px-0 font-size font-bold">
                                                        Storage</label>
                                                    <input type="date"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="adjustment_storage" id="adjustment_storage" value="{{@$invoices[0]['adjustment_storage'] }}">
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="adjustment_other"
                                                        class="col-6 px-0 font-size font-bold">Other</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="adjustment_other" id="adjustment_other" value="{{@$invoices[0]['adjustment_other'] }}">

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
                                                        class="col-6 px-0 font-size font-bold">Note</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="booking_number" id="booking_number" value="{{@$invoices[0]['note'] }}">

                                                </div>
                                            </div>
                                            
                                    </div>

                                    

                                    

                                </div>
                            </div>

                            
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <div class="col-6">
                            <div class="col-3">
                                <button type="button" class="btn next-style text-white col-12 py-1"
                                    id="shipment_general_finish" onclick="display_model()" style="cursor: pointer;">
                                    <div class="unskew">Cancel</div>
                                </button>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end col-6">

                            <div class="col-3">
                                <button type="reset" class="btn next-style text-white col-12 py-1"
                                    id="general_vehicle" value="Reset" style="cursor: pointer;">
                                    <div class="unskew">Clear</div>
                                </button>
                            </div>
                            <div class="col-3">
                                <input type="hidden" class="next_tab" id="attachments">
                                <button type="button" class="btn next-style text-white col-12 py-1"
                                    onclick="create_invoice_form(this.id)" id="general_invoice"
                                    style="cursor: pointer;" tab="attachments_invoice_tab">
                                    <div class="unskew">Save</div>
                                </button>
                            </div>
                           
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
