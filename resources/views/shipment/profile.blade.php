@extends('layouts.partials.mainlayout')
@section('body')
    @include('layouts.shipment_detail.navbar')
    <div class="shipment_tab_body">
        @include('layouts.shipment_detail.general')
    </div>
@endsection
