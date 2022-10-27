@extends('layouts.partials.mainlayout')
@section('body')
<style>
    .unknow {
        background-image: url("/public/image/Group/142.png");
        background-repeat: no-repeat !important;
        background-position: bottom !important;
        background-size: cover !important;
    }
    
    .create_master {
        background: #7ABAE9!important;
        box-shadow: 8px 8px 4px rgba(31, 104, 158, 0.19)!important;
        border-radius: 10px!important;
        color:white!important;
    }
    
    .row-border {
        background: rgba(255, 255, 255, 0.13)!important;
        box-shadow: 3px 5px 16px rgba(31, 104, 158, 0.86)!important;
        border-radius: 10px!important;
    }
    .masterheading {
        color: #1F689E!important;
    }
    
    .span {
        color: #214986!important;
    }
    
    td {
        color: #214986!important;
        font-weight: 600!important;
        font-size: 13px!important;
    }
    
    .icondown {
        border: 1px solid #1F689E!important;
    border-radius: 3px!important;
    width: 20px!important;
    height: 20px!important;
    margin-left:5px!important;

    }
</style>



<div class="container-fluid">
    <div class="row">
        <div class="unknow">
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row my-3">
                <div class="col-6 d-flex align-items-end">
                    <div class="masterheading">
                        <h5 class="m-0">MASTER</h5>
                    </div>
                    <div class="icondown ms-3">
                        <i>
                            <svg width="18" height="14" viewBox="-1 1 18 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g filter="url(#filter0_d_864_122)">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M3 1L7.66667 6.33333L12.3333 1H3Z" fill="black" />
                                </g>
                                <defs>
                                    <filter id="filter0_d_864_122" x="0" y="0" width="17.333" height="13.332"
                                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix in="SourceAlpha" type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                        <feOffset dx="1" dy="3" />
                                        <feGaussianBlur stdDeviation="2" />
                                        <feComposite in2="hardAlpha" operator="out" />
                                        <feColorMatrix type="matrix"
                                            values="0 0 0 0 0.12158 0 0 0 0 0.406867 0 0 0 0 0.620833 0 0 0 1 0" />
                                        <feBlend mode="normal" in2="BackgroundImageFix"
                                            result="effect1_dropShadow_864_122" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_864_122"
                                            result="shape" />
                                    </filter>
                                </defs>
                            </svg>
                        </i>
                    </div>

                </div>
                <div class="col-6 d-flex justify-content-end">
                    <button type="button" class="btn btn-sm create_master"><span class="span"><b>Create Master</b></span></button>
                </div>
            </div>
            <div class="row row-border mb-3" style="height: 100%;overflow-x: scroll;">
                <table class="scroll">
                    <tbody>
                        <tr>
                            <td class="p-3 col-2">PORTING OF LOADING</td>
                            <td class="p-3 text-center col-2">Country</td>
                            <td class="p-3 text-center col-1">State</td>
                            <td class="p-3 text-center col-1">City</td>
                            <td class="p-3 text-center col-1">Terminal port</td>
                            <td class="p-3 text-center col-1">Terminal</td>
                            <td class="p-3 text-center col-1">Terminal</td>
                            <td class="p-3 text-center col-1">Terminal</td>
                        </tr>
                    </tbody>

                </table>

            </div>
            <div class="row row-border mb-3" style="height: 100%;overflow-x: scroll;">
                <table class="scroll">
                    <tbody>
                        <tr>
                            <td class="p-3 col-2">PORTING OF Delivery</td>
                            <td class="p-3 text-center col-2">Country</td>
                            <td class="p-3 text-center col-1">State</td>
                            <td class="p-3 text-center col-1">City</td>
                            <td class="p-3 text-center col-1">Terminal port</td>
                            <td class="p-3 text-center col-1">Terminal</td>
                            <td class="p-3 text-center col-1">Terminal</td>
                            <td class="p-3 text-center col-1">Terminal</td>
                        </tr>
                    </tbody>

                </table>

            </div>
            <div class="row row-border mb-3" style="height: 100%;overflow-x: scroll;">
                <table class="scroll">
                    <tbody>
                        <tr>
                            <td class="p-3 col-2">AUCTION</td>
                            <td class="p-3 text-center col-2">Auction Name</td>
                            <td class="p-3 text-center col-1">State</td>
                            <td class="p-3 text-center col-1">City</td>
                            <td class="p-3 text-center col-1">Terminal port</td>
                            <td class="p-3 text-center col-1">Terminal</td>
                            <td class="p-3 text-center col-1">Terminal</td>
                            <td class="p-3 text-center col-1">Terminal</td>
                        </tr>
                    </tbody>

                </table>

            </div>
            <div class="row row-border mb-3" style="height: 100%;overflow-x: scroll;">
                <table class="scroll">
                    <tbody>
                        <tr>
                            <td class="p-3 col-2">CAR STATUS</td>
                            <td class="p-3 text-center col-2">New order</td>
                            <td class="p-3 text-center col-1">Post order</td>
                            <td class="p-3 text-center col-1">Dispatch order</td>
                            <td class="p-3 text-center col-1">On Hand</td>
                            <td class="p-3 text-center col-1">Booked</td>
                            <td class="p-3 text-center col-1">Shipped</td>
                            <td class="p-3 text-center col-1">Compeleted</td>
                        </tr>
                    </tbody>

                </table>

            </div>
            <div class="row row-border mb-3" style="height: 100%;overflow-x: scroll;">
                <table class="scroll">
                    <tbody>
                        <tr>
                            <td class="p-3 col-2">TOWED BY</td>
                            <td class="p-3 text-center col-2">GBO Shipping</td>
                            <td class="p-3 text-center col-1">Self delivery</td>
                            <td class="p-3 text-center col-1">Shipper</td>
                            <td class="p-3 text-center col-1"></td>
                            <td class="p-3 text-center col-1"></td>
                            <td class="p-3 text-center col-1"></td>
                            <td class="p-3 text-center col-1"></td>
                        </tr>
                    </tbody>

                </table>

            </div>
            <div class="row row-border mb-3" style="height: 100%;overflow-x: scroll;">
                <table class="scroll">
                    <tbody>
                        <tr>
                            <td class="p-3 col-2">TITLED STATUS</td>
                            <td class="p-3 text-center col-2">Exportable</td>
                            <td class="p-3 text-center col-1">Bill Sale</td>
                            <td class="p-3 text-center col-1">Pandig</td>
                            <td class="p-3 text-center col-1">of site</td>
                            <td class="p-3 text-center col-1">Lien</td>
                            <td class="p-3 text-center col-1"></td>
                            <td class="p-3 text-center col-1">Rejected</td>
                        </tr>
                    </tbody>

                </table>

            </div>
            <div class="row row-border mb-3" style="height: 100%;overflow-x: scroll;">
                <table class="scroll">
                    <tbody>
                        <tr>
                            <td class="p-3 col-2">TITLED STATE</td>
                            <td class="p-3 text-center col-2">Country</td>
                            <td class="p-3 text-center col-1">States</td>
                            <td class="p-3 text-center col-1"></td>
                            <td class="p-3 text-center col-1"></td>
                            <td class="p-3 text-center col-1"></td>
                            <td class="p-3 text-center col-1"></td>
                            <td class="p-3 text-center col-1"></td>
                        </tr>
                    </tbody>

                </table>

            </div>
            <div class="row row-border mb-3" style="height: 100%;overflow-x: scroll;">
                <table class="scroll">
                    <tbody>
                        <tr>
                            <td class="p-3 col-2">VEHICLE</td>
                            <td class="p-3 text-center col-2">Make</td>
                            <td class="p-3 text-center col-1">Model</td>
                            <td class="p-3 text-center col-1">Trim</td>
                            <td class="p-3 text-center col-1">weight</td>
                            <td class="p-3 text-center col-1"></td>
                            <td class="p-3 text-center col-1"></td>
                            <td class="p-3 text-center col-1"></td>
                        </tr>
                    </tbody>

                </table>

            </div>
            <div class="row row-border mb-3" style="height: 100%;overflow-x: scroll;">
                <table class="scroll">
                    <tbody>
                        <tr>
                            <td class="p-3 col-2">COLOR</td>
                            <td class="p-3 text-center col-2">Color</td>
                            <td class="p-3 text-center col-1"></td>
                            <td class="p-3 text-center col-1"></td>
                            <td class="p-3 text-center col-1"></td>
                            <td class="p-3 text-center col-1"></td>
                            <td class="p-3 text-center col-1"></td>
                            <td class="p-3 text-center col-1"></td>
                        </tr>
                    </tbody>

                </table>

            </div>
            <div class="row row-border mb-3" style="height: 100%;overflow-x: scroll;">
                <table class="scroll">
                    <tbody>
                        <tr>
                            <td class="p-3 col-2">SHIPPER</td>
                            <td class="p-3 text-center col-2">Shipper Name</td>
                            <td class="p-3 text-center col-1">Shipper warehouse</td>
                            <td class="p-3 text-center col-1">Address</td>
                            <td class="p-3 text-center col-1">Zip code</td>
                            <td class="p-3 text-center col-1">Contact</td>
                            <td class="p-3 text-center col-1">Email</td>
                            <td class="p-3 text-center col-1"></td>
                        </tr>
                    </tbody>

                </table>

            </div>
            <div class="row row-border mb-3" style="height: 100%;overflow-x: scroll;">
                <table class="scroll">
                    <tbody>
                        <tr>
                            <td class="p-3 col-2">CONTAINER TYPE</td>
                            <td class="p-3 text-center col-2">Container type</td>
                            <td class="p-3 text-center col-1">Container size</td>
                            <td class="p-3 text-center col-1"></td>
                            <td class="p-3 text-center col-1"></td>
                            <td class="p-3 text-center col-1"></td>
                            <td class="p-3 text-center col-1"></td>
                            <td class="p-3 text-center col-1"></td>
                        </tr>
                    </tbody>

                </table>

            </div>



        </div>
    </div>

</div>

@endsection