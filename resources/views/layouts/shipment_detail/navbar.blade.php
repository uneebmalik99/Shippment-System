<div class="row">
    <div class="col-12 d-flex information_buttons p-0">
        <button class="mx-1 form-control shipment_information_tab col-3 next-style" tab="general" id="{{ @$shipment['id'] }}">
            <div class="unskew" id="">General</div>
        </button>
        <button class="mx-1 form-control shipment_information_tab col-2" tab="inspection" id="{{ @$shipment['id'] }}">
            <div class="unskew" id="">Inspection</div>
        </button>
        <button class="mx-1 form-control shipment_information_tab col-2" tab="services" id="{{ @$shipment['id'] }}">
            <div class="unskew" id="">Services</div>
        </button>
        <button class="mx-1 form-control shipment_information_tab col-2"  id="{{ @$shipment['id'] }}" tab="documents">
            <div class="unskew">Documents</div>
        </button>
        <button class="mx-1 form-control shipment_information_tab col-2" tab="notes" id="{{ @$shipment['id'] }}">
            <div class="unskew" id="">Notes</div>
        </button>
    </div>
</div>
