@extends('layouts.partials.mainlayout')
@section('body')
    <div class="bg-primary bg-gradient p-3">
        <h5 class="text-white">Attachments</h5>
    </div>
    <div>
        <div class="bg-white">
            <div class="col-8 d-flex p-0">
                <div class="col-3 px-1 general">
                    <button class="btn btn-secondary col-12">General</button>
                </div>
                <div class="col-3 px-1">
                    <button class="btn btn-secondary col-12"><a class="text-decoration-none text-white"
                            href="{{ route('shipment.attachments') }}">Attachments</a></button>
                </div>
                <div class="col-3 px-1">
                    <button class="btn btn-secondary col-12">Not Available</button>
                </div>
                <div class="col-3">
                    <button class="btn btn-secondary col-12">Not Available</button>
                </div>
            </div>
        </div>
    </div>
@endsection
