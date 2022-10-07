<div>
    <div>
        <div class="bg-white">
            @include('shipment.navbar')
            <div class="col-12 py-3 d-flex flex-column justify-content-center">
                <div class="col-12 d-flex">
                    <div class="shipment-inovice rounded text-center p-2 col-6" name="shipment_inovice[]">
                        <small>Shipment Inovices</small>
                    </div>
                    <div class="stamp_title rounded text-center p-2 col-6" name="stamp_title[]">
                        <small>Stamp Titles</small>
                    </div>
                </div>
                <div class="col-12 d-flex">
                    <div class="loading_image rounded text-center p-2 col-6" name="loading_image[]">
                        <small>Loading Images</small>
                    </div>
                    <div class="other-document rounded text-center p-2 col-6" name="other_document[]">
                        <small>Other Documents</small>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-3">
                <div class="d-flex justify-content-end col-6">
                    {{-- <div class="col-3">
                        <button type="reset" class="btn next-style text-white col-12 py-1" id="general_vehicle"
                            value="Reset" style="cursor: pointer;">
                            <div class="unskew">Clear</div>
                        </button>
                    </div> --}}
                    <div class="col-3">
                        <button type="submit" class="btn next-style text-white col-12 py-1"
                            onclick="shipment_images_upload(this.id)" id="attachments`_shipment"
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
        </div>
    </div>
</div>
