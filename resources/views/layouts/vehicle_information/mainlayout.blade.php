<style>
    .header {
        background: #1F689E;
        box-shadow: inset 10px 14px 28px rgba(0, 0, 0, 0.25);
    }
    
    .header h2 {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 500;
        font-size: 22px;
        line-height: 22px;
        color: #FFFFFF;
        padding: 20px 20px;
    }
    
    .information_buttons {
        margin-left: 18px;
    }
    
    .information_buttons button {
        border: 1px solid #1c71b0 !important;
        box-shadow: 6px 6px 4px rgba(48, 148, 175, 0.47) !important;
        transform: skew(-30deg) !important;
        margin: 2px 3px;
        background-color: #fff;
        color: #1F689E;
        width: 220px;
        /* padding: 2px 22px; */
        cursor: pointer;
    }
    
    .information_buttons button:focus {
        outline: none;
    }
    
    .active_information_button {
        background: linear-gradient( 254.1deg, #10c3ea 4.82%, #337fb8 61.08%) !important;
        border: 1px solid #1c71b0 !important;
        box-shadow: 6px 6px 4px rgba(48, 148, 175, 0.47) !important;
        transform: skew(-30deg) !important;
        border-radius: 2px !important;
        color: #fff !important;
    }
    
    .information_card {
        background: rgba(255, 255, 255, 0.52)!important;
        box-shadow: 3px 5px 16px rgba(92, 174, 235, 0.55)!important;
        border-radius: 10px!important;
    }
    
    .information_card h6 {
        color: #6D8DA6;
        padding: 10px 10px;
        font-size: 14px;
    }
    
    .infromation_mainText {
        font-family: 'Inter';
        font-style: normal;
        /* font-weight: 600; */
        color: #6D8DA6;
        margin-left: 15px;
        font-size: 13px;
    }
    
    .information_text {
        color: #9C9C9C;
        font-size: 11px;
        margin-right: 15px;
    }
    
    .information_second_div {
        background: rgba(255, 255, 255, 0.52);
        box-shadow: 3px 5px 16px rgba(92, 174, 235, 0.55);
        border-radius: 10px;
    }
    
    .information_gallary {
        border: 1px solid rgba(26, 88, 133, 0.17);
        margin-right: 10px;
        padding-bottom: 28px;
        border-radius: 10px;
    }
    
    .gallary_header {
        background: #F2F6F8;
        /* background: red; */
        border-radius: 10px;
    }
    
    .gallary_body .img {
        margin: 10px 20px;
    }
    
    .information_second_div h4 {
        color: #6D8DA6;
        font-size: 14px;
        padding: 10px 10px;
    }
    
    .image_button {
        border: 1px solid rgba(26, 88, 133, 0.17);
        border-radius: 10px;
        font-size: 13px!important;
        padding: 1px 14px;
        cursor: pointer;
        background-color: transparent!important;
    }
    
    .img_active_button {
        background: rgba(145, 191, 224, 0.3);
        border: 1px solid rgba(26, 88, 133, 0.17);
        border-radius: 10px;
        padding: 1px 14px;
        font-size: 13px!important;
        cursor: pointer;
    }
    
    .img_active_button:focus,
    .image_button:focus {
        outline: none;
    }
    
    .image_button .img_button,
    .img_active_button .img_button {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 600;
        /* font-size: 16px; */
        /* line-height: 19px; */
        color: #4D89B5;
    }
    
    .img img {
        border: 1px solid #18517C;
        border-radius: 10px;
    }
    
    textarea:focus {
        outline: none;
    }
    .inspection_heading h6 {
        color: #6D8DA6;
        padding: 10px 50px;
        font-size: 18px;
    }
    .Notes {
        /* width: 732px; */
        /* width: 100%; */
        margin: 0px 14px;
        height: 36px;
        border: 1px solid rgba(26, 88, 133, 0.17);
    }
    
    .Notes a {
        color: #3F8DC8;
        margin-left: 15px;
        text-decoration: none;
    }
    
</style>

<div class="container_fluid">
    {{-- <div class="header">
        <h2>Vehicle Information</h2>
    </div> --}}
    @include('layouts.vehicle_information.navbar')

    <div id="vehicle_information_main">
        @include('layouts.vehicle_information.general')

    </div>




    

</div>