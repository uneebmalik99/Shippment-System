<div>
    <div>
        <div class="bg-white">
            @include('shipment.navbar')
            <form method="POST" enctype="multipart/form-data" id="shipment_attachments_form">
                <div class="col-12 py-3 d-flex justify-content-center">
                    <div class="px-lg-3 col-lg-5 py-lg-0">
                        <div class="box box-bg-2 col-12">
                            @csrf
                            <div class="col-5 my-3 p-0 d-flex justify-content-center"
                                style="border-bottom:2px solid #3181b9;">
                                <b>Shipment Inovices</b>
                            </div>
                            <div class="shipment-inovice my-2" name="shipment_inovice[]" style="padding-top: .5rem;">
                            </div>
                        </div>
                    </div>

                    <div class="px-lg-3 col-lg-5 py-lg-0">
                        <div class="box box-bg-2 col-12">
                            @csrf
                            <div class="col-5 my-3 p-0 d-flex justify-content-center"
                                style="border-bottom:2px solid #3181b9;">
                                <b>Stamp Titles</b>
                            </div>
                            <div class="stamp_title my-2" name="stamp_title[]" style="padding-top: .5rem;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 py-3 d-flex justify-content-center">
                    <div class="px-lg-3 col-lg-5 py-lg-0">
                        <div class="box box-bg-2 col-12">
                            @csrf
                            <div class="col-5 my-3 p-0 d-flex justify-content-center"
                                style="border-bottom:2px solid #3181b9;">
                                <b>Loading Images</b>
                            </div>
                            <div class="loading_image my-2" name="loading_image[]" style="padding-top: .5rem;">
                            </div>
                        </div>
                    </div>

                    <div class="px-lg-3 col-lg-5 py-lg-0">
                        <div class="box box-bg-2 col-12">
                            @csrf
                            <div class="col-5 my-3 p-0 d-flex justify-content-center"
                                style="border-bottom:2px solid #3181b9;">
                                <b>Other Documents</b>
                            </div>
                            <div class="other-document my-2" name="other_document[]" style="padding-top: .5rem;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <div class="d-flex justify-content-end col-6">
                        <div class="col-3">
                            <button type="button" class="btn next-style text-white col-12 py-1"
                                onclick="shipment_images_upload(this.id)" id="attachments`_shipment"
                                style="cursor: pointer;">
                                <div class="unskew">Save</div>
                            </button>
                        </div>
                        <div class="col-3">
                            <input type="hidden" name="shipment_id" value="20">
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
