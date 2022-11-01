<style>
    #shipment_details thead th {
        position: sticky !important;
        top: 0 !important;
        background: #6d71ff !important;
    }
</style>
<div class="row my-4">
    <div class="col-sm-10 col-md-10 col-lg-4 pl-0">
        <div class="information_card">
            <h6>Export Details</h6>
            <div class="information_div">
                <div class="d-flex justify-content-between my-2 py-1 "
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Company Name</span>
                    <span class="information_text">{{ @$shipments[0]['company_name'] }}</span>
                </div>
                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Customer Email</span>
                    <span class="information_text">{{ @$shipments[0]['customer_email'] }}</span>
                </div>
                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Customer Phone</span>
                    <span class="information_text">{{ @$shipments[0]['customer_phone'] }}</span>
                </div>
                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Shipment Type</span>
                    <span class="information_text">{{ @$shipments[0]['shipment_type'] }}</span>
                </div>

                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Export Date</span>
                    <span class="information_text">{{ @$shipments[0]['export_date'] }}</span>
                </div>


                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Ship Date</span>
                    <span class="information_text">{{ @$shipments[0]['ship_date'] }}</span>
                </div>

                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Sale Date</span>
                    <span class="information_text" style="overflow: hidden;">{{ @$shipments[0]['sale_date'] }}</span>
                </div>

                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Booking Number</span>
                    <span class="information_text">{{ @$shipments[0]['booking_number'] }}</span>
                </div>

                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Container Number</span>
                    <span class="information_text">{{ @$shipments[0]['container_no'] }}</span>
                </div>

                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Container Size</span>
                    <span class="information_text">{{ @$shipments[0]['container_size'] }}</span>
                </div>

                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Container Type</span>
                    <span class="information_text">{{ @$shipments[0]['container_type'] }}</span>
                </div>
                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Shipping Reference</span>
                    <span class="information_text">{{ @$shipments[0]['shipping_reference'] }}</span>
                </div>
                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">XTN Number</span>
                    <span class="information_text">{{ @$shipments[0]['xtn_number'] }}</span>
                </div>
                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">OTI Number</span>
                    <span class="information_text">{{ @$shipments[0]['oti_number'] }}</span>
                </div>
                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Shipper</span>
                    <span class="information_text">{{ @$shipments[0]['shipper'] }}</span>
                </div>
                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Terminal</span>
                    <span class="information_text">{{ @$shipments[0]['loading_terminal'] }}</span>
                </div>
                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Shipping Line</span>
                    <span class="information_text">{{ @$shipments[0]['shipping_line'] }}</span>
                </div>
                <div class="information_button d-flex justify-content-center mt-3" style="margin:50px">
                    <button
                        style="background: #1F689E; transform: skew(-30deg) !important;border:none;
                    border-radius: 4px;color:white;margin-right: 6px;font-size: 12px;">
                        <div style="transform: skew(30deg) !important;padding:1px 4px">
                            Trucking PDF
                        </div>
                    </button>
                    <button
                        style="background: #1CACD9;border:none;font-size:12px;
                    transform: skew(-30deg) !important;
                                    border-radius: 4px;color:white;margin-right: 3px;">
                        <div style="transform: skew(30deg) !important;padding:1px 12px">Edit</div>
                    </button>

                </div>
                <div>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-10 col-md-10 col-lg-8 pl-0">
        <div class="information_second_div">
            <div class="row" style="padding-bottom:60px">
                <div class=" col-sm-12 col-md-5 col-lg-5" style="padding: 10px 10px;">
                    <div class="d-flex justify-content-between my-2 py-1 "
                        style="border: 1px solid rgba(26, 88, 133, 0.17); border-radius: 10px;width: 90%;margin:4px auto ">
                        <span class="infromation_mainText ">VEHICLE LOCATION</span>
                        <span class="information_text "></span>
                    </div>
                    <div class="d-flex justify-content-between my-2 py-1  "
                        style="border: 1px solid rgba(26, 88, 133, 0.17); border-radius: 10px;width: 90%;margin:4px auto ">
                        <span class="infromation_mainText ">EXPORTER ID</span>
                        <span class="information_text "></span>
                    </div>
                    <div class="d-flex justify-content-between my-2 py-1  "
                        style="border: 1px solid rgba(26, 88, 133, 0.17); border-radius: 10px;width: 90%;margin:4px auto ">
                        <span class="infromation_mainText ">EXPORTER TYPE ISSUER</span>
                        <span class="information_text "></span>
                    </div>
                    <div class="d-flex justify-content-between my-2 py-1  "
                        style="border: 1px solid rgba(26, 88, 133, 0.17); border-radius: 10px;width: 90%;margin:4px auto ">
                        <span class="infromation_mainText ">TRANSPORTATION VALUE</span>
                        <span class="information_text "></span>
                    </div>
                    <div class="d-flex justify-content-between my-2 py-1  "
                        style="border: 1px solid rgba(26, 88, 133, 0.17); border-radius: 10px;width: 90%;margin:4px auto ">
                        <span class="infromation_mainText ">EXPORTER DOB</span>
                        <span class="information_text "></span>
                    </div>
                    <div class="d-flex justify-content-between my-2 py-1  "
                        style="border: 1px solid rgba(26, 88, 133, 0.17); border-radius: 10px;width: 90%;margin:4px auto ">
                        <span class="infromation_mainText ">CONSIGNEE DOB</span>
                        <span class="information_text "></span>
                    </div>
                    <div class="d-flex justify-content-between my-2 py-1  "
                        style="border: 1px solid rgba(26, 88, 133, 0.17); border-radius: 10px;width: 90%;margin:4px auto ">
                        <span class="infromation_mainText ">CONSGINEE</span>
                        <span class="information_text "></span>
                    </div>
                    <div class="d-flex justify-content-between my-2 py-1  "
                        style="border: 1px solid rgba(26, 88, 133, 0.17); border-radius: 10px;width: 90%;margin:4px auto ">
                        <span class="infromation_mainText ">LABEL</span>
                        <span class="information_text "></span>
                    </div>
                </div>
                <div class="col-sm-12 col-md-7 col-lg-7 mb-4">
                    <div class="information_gallary">
                        <div class="gallary_header d-flex">
                            <div class="row">
                                <div class="col-12">
                                    <div class="w-100">
                                        <div class="w-100 d-flex justify-content-center"
                                            style="
                                        margin: 10px 2px;
                                        padding: 0 6px;">
                                            <button class="img_active_button img_btn" onclick="changeImages(this.id)"
                                                tab="">
                                                <div class="imdiv">
                                                    Vehicle Images
                                                </div>
                                            </button>

                                            <button class="image_button mx-1
                                                    img_btn" style="margin-left:22px" onclick="changeImages(this.id)"
                                                    tab="auction_images">
                                                    <div class="img_button">
                                                        Auction Image
                                                    </div>
                                            </button>

                                            <button class="image_button img_btn">
                                                <div class="img_button" onclick="changeImages(this.id)"
                                                    tab="warehouse_images">Ware House
                                                    Image</div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="w-100 p-2">
                                        <img src="" alt=" "class="img_fluid mx-auto w-100">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="gallary_body">
                            <div class="d-flex flex-wrap justify-content-center changeImages">
                                <div class="img">
                                    <img src="{{ asset('images/' . @$img['name']) }}" alt=" "
                                        style="width: 60px; height: 55px; ">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12 d-flex justify-content-center ">
                            <button
                                style="background: rgba(37, 101, 4, 0.72); border-radius: 6px;border:none;color:white;transform: skew(-30deg);">
                                <div style="transform: skew(30deg);padding:1px 10px;font-size: 13px;">
                                    Download Images in Zip
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-2">
            <div class="row mt-2">
                <div class="mx-auto shipment_table w-100 scroll"
                    style="background: rgba(255, 255, 255, 0.52);
                box-shadow: 3px 5px 16px rgb(92 174 235 / 55%);
                border-radius: 10px;height:388px!important">
                    <table class="table scroll"
                        style="width:100%!important;border:none!important;overflow-x:scroll!important;">
                        <thead class="bg-custom text-white">
                            <tr>
                                <th>#</th>
                                <th>image</th>
                                <th>Year</th>
                                <th>Make</th>
                                <th>Model</th>
                                <th>Color</th>
                                <th>Vin</th>
                                <th>Status</th>
                                <th>Title No</th>
                                <th>Title State</th>
                                <th>Lot No</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($shipments[0]['vehicle'] as $vehicles)
                                <tr>
                                    <td>{{ @$vehicles['id'] }}</td>
                                    <td>
                                        <img src="{{asset(@$vehicles['warehouse_image'][0]['name'])}}" alt="" style="width:35px;height:35px;border-radius:50%;">
                                    </td>
                                    <td>{{ @$vehicles['year'] }}</td>
                                    <td>{{ @$vehicles['make'] }}</td>
                                    <td>{{ @$vehicles['model	'] }}</td>
                                    <td>{{ @$vehicles['color'] }}</td>
                                    <td>{{ @$vehicles['vin'] }}</td>
                                    <td>{{ @$vehicles['status '] }}</td>
                                    <td>{{ @$vehicles['title_number'] }}</td>
                                    <td>{{ @$vehicles['title_state '] }}</td>
                                    <td>{{ @$vehicles['pickup_location'] }}</td>
                                    <td>
                                        <button class="profile-button">
                                            <a href="{{ route('vehicle.profile') . '/' . @$vehicles['id'] }}"
                                                target="__blank">
                                                <svg width="14" height="13" viewBox="0 0 16 14"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16 7C16 7 13 2.1875 8 2.1875C3 2.1875 0 7 0 7C0 7 3 11.8125 8 11.8125C13 11.8125 16 7 16 7ZM1.173 7C1.65651 6.35698 2.21264 5.7581 2.833 5.21237C4.12 4.0845 5.88 3.0625 8 3.0625C10.12 3.0625 11.879 4.0845 13.168 5.21237C13.7884 5.7581 14.3445 6.35698 14.828 7C14.77 7.07613 14.706 7.16013 14.633 7.252C14.298 7.672 13.803 8.232 13.168 8.78763C11.879 9.9155 10.119 10.9375 8 10.9375C5.88 10.9375 4.121 9.9155 2.832 8.78763C2.21165 8.2419 1.65552 7.64301 1.172 7H1.173Z"
                                                        fill="#048B52" />
                                                    <path
                                                        d="M8 4.8125C7.33696 4.8125 6.70107 5.04297 6.23223 5.4532C5.76339 5.86344 5.5 6.41984 5.5 7C5.5 7.58016 5.76339 8.13656 6.23223 8.5468C6.70107 8.95703 7.33696 9.1875 8 9.1875C8.66304 9.1875 9.29893 8.95703 9.76777 8.5468C10.2366 8.13656 10.5 7.58016 10.5 7C10.5 6.41984 10.2366 5.86344 9.76777 5.4532C9.29893 5.04297 8.66304 4.8125 8 4.8125ZM4.5 7C4.5 6.18777 4.86875 5.40882 5.52513 4.83449C6.1815 4.26016 7.07174 3.9375 8 3.9375C8.92826 3.9375 9.8185 4.26016 10.4749 4.83449C11.1313 5.40882 11.5 6.18777 11.5 7C11.5 7.81223 11.1313 8.59118 10.4749 9.16551C9.8185 9.73984 8.92826 10.0625 8 10.0625C7.07174 10.0625 6.1815 9.73984 5.52513 9.16551C4.86875 8.59118 4.5 7.81223 4.5 7Z"
                                                        fill="#048B52" />
                                                </svg>
                                            </a>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
