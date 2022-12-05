
<div>
    <div>
        <div class="bg-white">
            
            <div class="mt-3">
                
                <form method="POST" class="col-12" id="shipment_form">
                    @csrf
                    
                    @if(@$shipment[0]['id'])
                    <input type="hidden" id="id" name="id" value="{{@$shipment[0]['id']}}">
                    @endif
                    
                    <div class="d-xl-flex border-shipment">
                        <div class="col-12 d-lg-flex p-0">
                            <div class="col-lg-12 col-12 p-0">
                                <div class="col-12 p-0">
                                    <div class="row">

                                        <div class="tab_card col-6">
                                            <div class="col-12 py-3">
                                                <div class="text-color" style="cursor: pointer;" id="invoice_calendar"
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
                                            <div id="container_ar_no">
                                                <div class="col-12 py-2">
                                                    <div class="d-flex align-items-center">
                                                        <label for="container_num" class="col-6 px-0 font-size font-bold">Container AR Number <span
                                                                class="text-danger">*</span></label>
                                                        <div
                                                            class="d-flex align-items-center d-flex align-items-center form-control-sm border border-0 rounded-pill bg col-6">
                                                            
                                                            <input type="text" class="col-8 general_input" name="ar_number" id="ar_number"
                                                                value="{{@$invoices[0]['export']['ar_number']}}">
                    
                                                            <a class="prefix text-dark px-2 getinf"
                                                                style="text-decoration: none!important;
                                                                 background:rgb(175, 197, 234);border-radius:20px;cursor:pointer"
                                                                id="getshipmentinfo" onclick="getshipmentInfo(this.id)">
                                                                <span class="text-white px-1" id="getshippmentinfo">GetInfo</span>
                                                            </a>
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-12 py-2">
                                                    <div class="d-flex align-items-center">
                                                        <label for="customer_email"
                                                            class="col-6 px-0 font-size font-bold">Company Name</label>
                                                        <input type="text"
                                                            class="form-control-sm border border-0 rounded-pill bg col-6"
                                                            name="customer_email" id="customer_email" value="{{ @$invoices[0]['consignee']['consignee_id'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 py-2">
                                                    <div class="d-flex align-items-center">
                                                        <label for="port_of_loading"
                                                            class="col-6 px-0 font-size font-bold">Port Of Loading</label>
                                                        <input type="text"
                                                            class="form-control-sm border border-0 rounded-pill bg col-6"
                                                            name="port_of_loading" id="port_of_loading" value="">
                                                    </div>
                                                </div>
                                                <div class="col-12 py-2">
                                                    <div class="d-flex align-items-center">
                                                        <label for="destination_port"
                                                            class="col-6 px-0 font-size font-bold">Port Destination</label>
    
                                                            <input type="text"
                                                            class="form-control-sm border border-0 rounded-pill bg col-6"
                                                            name="destination_port" id="destination_port" value="{{@$invoices[0]['paid_amount'] }}">   
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-12 py-2">
                                                    <div class="d-flex align-items-center">
                                                        <label for="container_size"
                                                            class="col-6 px-0 font-size font-bold">Container Size(40HC)</label>
    
                                                            <input type="text"
                                                            class="form-control-sm border border-0 rounded-pill bg col-6"
                                                            name="container_size" id="container_size" value="">   
                                                        {{-- <input type="text"
                                                            class="form-control-sm border border-0 rounded-pill bg col-6"
                                                            name="shipment_type" id="shipment_type"> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="tab_card my-3 col-6">
                                            <div class="col-12 py-3">
                                                <div class="text-color" style="cursor: pointer;" id="invoice_calendar"
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
                                            <div id="invoice_no">
                                                <div class="col-12 py-2">
                                                    <div class="d-flex align-items-center">
                                                        <label for="invoice_no"
                                                            class="col-6 px-0 font-size font-bold">Invoice#</label>
                                                        <input type="text"
                                                            class="form-control-sm border border-0 rounded-pill bg col-6"
                                                            name="invoice_no" id="invoice_no" value="{{@$invoices[0]['invoice_no'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 py-2">
                                                    <div class="d-flex align-items-center">
                                                        <label for="invoice_date" class="col-6 px-0 font-size font-bold">
                                                            Invoice Date</label>
                                                        <input type="date"
                                                            class="form-control-sm border border-0 rounded-pill bg col-6"
                                                            name="invoice_date" id="invoice_date" value="{{@$invoices[0]['invoice_date'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 py-2">
                                                    <div class="d-flex align-items-center">
                                                        <label for="Invoice Amount"
                                                            class="col-6 px-0 font-size font-bold">Invoice Amount</label>
                                                        <input type="text"
                                                            class="form-control-sm border border-0 rounded-pill bg col-6"
                                                            name="invoice_amount" id="invoice_amount" value="{{@$invoices[0]['invoice_amount'] }}">
    
                                                    </div>
                                                </div>
                                                <div class="col-12 py-2">
                                                    <div class="d-flex align-items-center">
                                                        <label for="invoice_date"
                                                            class="col-6 px-0 font-size font-bold">Due Date</label>
                                                        <input type="date"
                                                            class="form-control-sm border border-0 rounded-pill bg col-6"
                                                            name="invoice_date" id="invoice_date" value="{{@$invoices[0]['invoice_date'] }}">
    
                                                    </div>
                                                </div>
                                                <div class="col-12 py-2">
                                                    <div class="d-flex align-items-center">
                                                        <label for="invoice_amount"
                                                            class="col-6 px-0 font-size font-bold">Status</label>
                                                        <input type="text"
                                                            class="form-control-sm border border-0 rounded-pill bg col-6"
                                                            name="invoice_amount" id="invoice_amount" value="{{@$invoices[0]['invoice_amount'] }}">
    
                                                    </div>
                                                </div>
                                                <div class="col-12 py-2">
                                                    <div class="d-flex align-items-center">
                                                        <label for="payment_date"
                                                            class="col-6 px-0 font-size font-bold">Payment Date</label>
                                                        <input type="text"
                                                            class="form-control-sm border border-0 rounded-pill bg col-6"
                                                            name="payment_date" id="payment_date" value="{{@$invoices[0]['payment_date'] }}">
    
                                                    </div>
                                                </div>
                                                <div class="col-12 py-2">
                                                    <div class="d-flex align-items-center">
                                                        <label for="received_amount"
                                                            class="col-6 px-0 font-size font-bold">Recieved Amount</label>
                                                        <input type="text"
                                                            class="form-control-sm border border-0 rounded-pill bg col-6"
                                                            name="received_amount" id="received_amount" value="{{@$invoices[0]['received_amount'] }}">
    
                                                    </div>
                                                </div>
                                                <div class="col-12 py-2">
                                                    <div class="d-flex align-items-center">
                                                        <label for="balance"
                                                            class="col-6 px-0 font-size font-bold">Balance</label>
                                                        <input type="text"
                                                            class="form-control-sm border border-0 rounded-pill bg col-6"
                                                            name="balance" id="balance" value="{{@$invoices[0]['balance'] }}">
    
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    
                                </div>
                            
                            
                            </div>
                        
                        </div>
                    
                    
                    </div>
                    
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
                            <tbody id="inovice_shipment_table">
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
