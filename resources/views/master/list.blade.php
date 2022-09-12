@extends('layouts.partials.mainlayout')
@section('body')
<style>
    .heading_icon{
    display: flex;
    background: lightgray;
    width: 121px;
    justify-content: space-around;
    height: 28px;
    margin-right: -15px;
    }
    .card_main{
        border:none!important;
        
    }
    .card_main p{
    font-size: 13px;
    position: relative;
    top: 25px;
    background: lightgray;
    width: 60px;
    text-align: center;
    }
    
</style>
<div class="container">
    <div class="row mt-3">
        <div class="card col-lg-12 col-md-12 col-12 mx-auto">
            <div class="card_head d-flex justify-content-between">
                 <div class="heading_text">
                    <div>Book Now</div>
                    <div>Lorem ipsum dolor sit amet.</div>
                 </div>
                 <div class="heading_icon">
                    <div><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                    <div><i class="fa fa-refresh" aria-hidden="true"></i></div>
                    <div><i class="fa fa-cog" aria-hidden="true"></i></div>
                 </div>
                
            </div>
            <div class="row">
                <div class="card shadow col-sm-6 col-md-6 col-lg-6 mx-auto card_main border">
                    <div class="">
                        <p class="mx-auto">Vehicls</p>
                        <hr style="border-top:1px solid grey;width:inherit">
                    </div>
                    <div class="text_fields">
                        <form action="">
                            <div class="row">
                                <div class="col-12">
                                    <label class="" for="user">Make</label>
                                     <div class="input-group mb-2 mr-sm-2">
                                    <input type="text" class="form-control" id="user" placeholder="Username">
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label class="" for="make">Make</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                      <input type="text" class="form-control" id="make">
                                    </div>
                                </div>
                                <div class="col-6">
                                      <label class="" for="weight">Weight</label>
                                        <div class="input-group mb-2 mr-sm-2">
                                        <input type="text" class="form-control" id="weight" >
                                </div>
                                </div>
                            </div>

                            <div class="row" >
                                <div class="col-11 mx-auto  d-flex justify-content-end" style="border-top:1px solid green;">
                                    <div class="py-3">
                                        <button class="px-3 py-1 btn-primary" style="outline:none!impotant;border:none!important;border-radius:8px">Save</button>
                                </div>
                                </div>
                                
                            </div>
                            
                        </form>
                    </div>
            </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
