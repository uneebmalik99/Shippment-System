@extends('layouts.partials.mainlayout')
@section('body')
<style>
   .pcoded-inner-content {
    background: linear-gradient(184.57deg, rgba(255, 255, 255, 0.89) 3.7%, rgba(198, 230, 255, 0.89) 111.45%);
}
    
    .dashboard_heading{
        font-weight: bold;
    }
    .parent{
        position: relative;
    }
    .child{
        position: absolute;
        right: 14%;
        top: 10%;
        background: linear-gradient(180deg, #16B797 21.51%, rgba(44, 119, 231, 0.38) 100%);
        width: 27px;
        height: 27px;
        border-radius:50%;
        display:flex;
        justify-content: center;
        align-items:center;
        
    }
    .dispatch_card .child{
        background: linear-gradient(180deg, rgba(44, 119, 231, 0.86) 21.51%, rgba(28, 172, 217, 0.26) 100%);
    }
    .onhand_card .child{
        background: linear-gradient(180.32deg, #F47E91 34.24%, rgba(105, 108, 255, 0.21) 158.18%);
    }
    .manifest_card .child{
        background: linear-gradient(182.63deg, #97DBA1 41.61%, rgba(44, 119, 231, 0.23) 185.42%);
    }
    .shipped_card .child{
        background: linear-gradient(187.22deg, rgba(236, 184, 0, 0.63) 29.79%, #FFFFFF 117.95%);
    }
    .arrived_card .child{
        background: linear-gradient(180.42deg, #E38CC3 26.03%, rgba(44, 119, 231, 0.26) 119.67%);
    }
    .vehicle_card{
        background: #FFFFFF;
        box-shadow: -8px 0px 4px #8CDDCD, 4px 9px 20px #CECEFA;
        border-radius: 15px;
        width: 218px;
        margin-left: -11px;
    }
    .dispatch_card{
        background: #FFFFFF;
        box-shadow: -8px 0px 6px rgba(7, 131, 224, 0.65), 4px 9px 10px #CECEFA;
        border-radius: 15px;
        width: 218px;
        margin-left: -11px;
    }
    .onhand_card{
        background: #FFFFFF;
        box-shadow: -8px 0px 4px rgba(253, 53, 80, 0.59), 4px 9px 10px #CECEFA;
        border-radius: 15px;
        width: 218px;
        margin-left: -11px;

    }
    .manifest_card{
        background: #FFFFFF;
        box-shadow: -8px 0px 4px rgba(22, 202, 32, 0.45), 4px 9px 20px #CECEFA;
        border-radius: 15px;
        width: 218px;
        margin-left: -11px;
    }
    .shipped_card{
        background: #FFFFFF;
        box-shadow: -8px 0px 4px rgba(224, 176, 5, 0.59), 4px 9px 20px #CECEFA;
        border-radius: 15px;
        width: 218px;
        margin-left: -11px;
    }
    .arrived_card{
        background: #FFFFFF;
        box-shadow: -8px 0px 4px #E279BB, 4px 9px 10px #CECEFA;
        border-radius: 15px;
        width: 218px;
        margin-left: -11px;
    }
    .card_body{
        padding:10px
    }
    .vehicle_card h4, .dispatch_card h4, .onhand_card h4, .manifest_card h4, .shipped_card h4, .arrived_card h4{
        font-weight: 400;
        font-size: 12px;
        /* line-height: 27px; */
        color: #4E4D4D;
        margin: 8px 0;

    }
    .vehicle_card b, .dispatch_card b, .onhand_card b, .manifest_card b,
    .shipped_card b, .arrived_card b{
        font-family: 'Inter';
        font-style: normal;
        font-weight: 400;
        font-size: 22px;
        /* line-height: 36px; */
        line-height: 1;
        color: #1DC7A5;
    }
    .dispatch_card b{
        color:#3896E1!important;
    }
    .onhand_card b{
        color:  #F47E91;
    }
    .manifest_card b{
        color: #87D891;
    }
    .shipped_card b{
        color:#EBC43E;
    }
    .arrived_card b{
        color:  #E38CC3;
    }
.vehicle_card p, .dispatch_card p, .onhand_card p, .manifest_card p,
.shipped_card p, .arrived_card p{
    font-family: 'Inter';
    font-style: normal;
    font-weight: 400;
    font-size: 12px;
    line-height: 22px;
    color: #3D3D3D;
    margin: 8px 0;
    }
    .vehicle_card button, .dispatch_card button, .onhand_card button, .manifest_card button, .shipped_card button, .arrived_card button{
    width: 97px;
    height: 20px;
    background: linear-gradient(181.66deg, #16B797 1.41%, #F2F2F2 163.4%);
    border-radius: 18px;
    font-size: 12px;
    margin-left: 18%;
    color: #fff;
    outline: none;
    border: none;
    }
    .dispatch_card button{
        background: linear-gradient(181.66deg, #3DA2F8 1.41%, #C2D7E4 163.4%);
        border-radius: 18px;
    }
    .onhand_card button{
        background: linear-gradient(180.32deg, #F47E91 34.24%, rgba(105, 108, 255, 0.21) 158.18%);
        border-radius: 18px;
    }
    .manifest_card button{
        background: linear-gradient(181.66deg, #87D891 1.41%, #F2F2F2 163.4%);
        border-radius: 18px;
    }
    .shipped_card button{
        background: linear-gradient(181.66deg, #E1C564 1.41%, #F2F2F2 163.4%);
        border-radius: 18px;
    }
    .arrived_card button{
        background: linear-gradient(181.07deg, #E27BBC 0.91%, #FFFFFF 241.45%);
        border-radius: 18px;
    }
    .dashboard_card{
    width: 217px;
    margin-left: 31px;
    height: 283px;
    background: #FFFFFF;
    box-shadow: -8px 0px 4px rgb(105 108 255 / 49%), 4px 9px 10px #cecefa;
    border-radius: 15px;
    }

    .car_header{
        border-bottom:1px solid #696CFF;
        height: 36px;
    }
    .dashboard_card h6{
        font-size: 12px;
        padding: 12px 13px;
        color:1px solid #696CFF;

    }
    .dashboard_card a{
        padding: 6px 19px;
    }
   
    .dispatched_vehicles{
    background: linear-gradient(0deg, #1F689E, #1F689E), rgba(255, 255, 255, 0.13);
    box-shadow: 3px 5px 16px rgba(31, 104, 158, 0.86);
    border-radius: 10px;
    color:#fff;

    }
    .dispatched_vehicles p{
        margin-top:12px;
        font-size: 12px;
    }
    
    .dispatch_search input{
        width: 284px;
        border: 2px solid #1F689E;
        border-radius: 10px;
        padding: 6px 10px;
        outline:none;
    }
    .dispatch_search input:focus{
        outline:none;
    }
    .dispatch_search button{
        width: 88px;
        /* height: 50px; */
        margin-left:20px;
        background: #1F689E;
        border-radius: 5px;
        padding: 7px 10px;
        outline:none;
        border:none;
        color:#fff;
    }
    .table {
  border:  .7px solid #B3B3B3;
}
.card_footer p{
    font-size: 8px!important;
}
progress{
    width: 118px;
    height: 11px;
}

@media (max-width: 780px) {
  .boxes{
    display: flex;
    flex-direction: column;
  }
  .col-lg-4{
    margin-bottom:20px!important;
  }
}

</style>


<div class="container-fluid">
    {{-- dashboard heading --}}
    <div class="row">
        <div class="col-12 mx-auto">
            <div class="d-flex dashboard_heading">
                <div style="vertical-align: middle;margin-top:6px;margin-right:8px"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <mask id="path-1-inside-1_1317_355" fill="white">
                    <path d="M12.531 1.72034C12.4613 1.6505 12.3786 1.59508 12.2875 1.55727C12.1963 1.51946 12.0987 1.5 12 1.5C11.9014 1.5 11.8037 1.51946 11.7126 1.55727C11.6214 1.59508 11.5387 1.6505 11.469 1.72034L2.469 10.7203C2.3994 10.7901 2.34423 10.8729 2.30665 10.964C2.26908 11.0552 2.24983 11.1528 2.25 11.2513V21.7513C2.25 21.9503 2.32902 22.141 2.46967 22.2817C2.61032 22.4223 2.80109 22.5013 3 22.5013H9.75C9.94891 22.5013 10.1397 22.4223 10.2803 22.2817C10.421 22.141 10.5 21.9503 10.5 21.7513V15.7513H13.5V21.7513C13.5 21.9503 13.579 22.141 13.7197 22.2817C13.8603 22.4223 14.0511 22.5013 14.25 22.5013H21C21.1989 22.5013 21.3897 22.4223 21.5303 22.2817C21.671 22.141 21.75 21.9503 21.75 21.7513V11.2513C21.7502 11.1528 21.7309 11.0552 21.6933 10.964C21.6558 10.8729 21.6006 10.7901 21.531 10.7203L19.5 8.69084V3.75134C19.5 3.55243 19.421 3.36166 19.2803 3.22101C19.1397 3.08036 18.9489 3.00134 18.75 3.00134H17.25C17.0511 3.00134 16.8603 3.08036 16.7197 3.22101C16.579 3.36166 16.5 3.55243 16.5 3.75134V5.69084L12.531 1.72034ZM3.75 21.0013V11.5618L12 3.31184L20.25 11.5618V21.0013H15V15.0013C15 14.8024 14.921 14.6117 14.7803 14.471C14.6397 14.3304 14.4489 14.2513 14.25 14.2513H9.75C9.55109 14.2513 9.36032 14.3304 9.21967 14.471C9.07902 14.6117 9 14.8024 9 15.0013V21.0013H3.75Z"/>
                    </mask>
                    <path d="M12.531 1.72034C12.4613 1.6505 12.3786 1.59508 12.2875 1.55727C12.1963 1.51946 12.0987 1.5 12 1.5C11.9014 1.5 11.8037 1.51946 11.7126 1.55727C11.6214 1.59508 11.5387 1.6505 11.469 1.72034L2.469 10.7203C2.3994 10.7901 2.34423 10.8729 2.30665 10.964C2.26908 11.0552 2.24983 11.1528 2.25 11.2513V21.7513C2.25 21.9503 2.32902 22.141 2.46967 22.2817C2.61032 22.4223 2.80109 22.5013 3 22.5013H9.75C9.94891 22.5013 10.1397 22.4223 10.2803 22.2817C10.421 22.141 10.5 21.9503 10.5 21.7513V15.7513H13.5V21.7513C13.5 21.9503 13.579 22.141 13.7197 22.2817C13.8603 22.4223 14.0511 22.5013 14.25 22.5013H21C21.1989 22.5013 21.3897 22.4223 21.5303 22.2817C21.671 22.141 21.75 21.9503 21.75 21.7513V11.2513C21.7502 11.1528 21.7309 11.0552 21.6933 10.964C21.6558 10.8729 21.6006 10.7901 21.531 10.7203L19.5 8.69084V3.75134C19.5 3.55243 19.421 3.36166 19.2803 3.22101C19.1397 3.08036 18.9489 3.00134 18.75 3.00134H17.25C17.0511 3.00134 16.8603 3.08036 16.7197 3.22101C16.579 3.36166 16.5 3.55243 16.5 3.75134V5.69084L12.531 1.72034ZM3.75 21.0013V11.5618L12 3.31184L20.25 11.5618V21.0013H15V15.0013C15 14.8024 14.921 14.6117 14.7803 14.471C14.6397 14.3304 14.4489 14.2513 14.25 14.2513H9.75C9.55109 14.2513 9.36032 14.3304 9.21967 14.471C9.07902 14.6117 9 14.8024 9 15.0013V21.0013H3.75Z" fill="#214986"/>
                    <path d="M12.531 1.72034L-39.861 53.9801L-39.8329 54.0082L-39.8048 54.0364L12.531 1.72034ZM12 1.5V75.5V1.5ZM11.469 1.72034L63.7949 54.0462L63.828 54.0132L63.861 53.9801L11.469 1.72034ZM2.469 10.7203L-49.8569 -41.6056L-49.8899 -41.5726L-49.9229 -41.5395L2.469 10.7203ZM2.25 11.2513H76.25V11.1853L76.2499 11.1192L2.25 11.2513ZM2.25 21.7513H-71.75H2.25ZM10.2803 22.2817L62.6062 74.6076L10.2803 22.2817ZM10.5 15.7513V-58.2487H-63.5V15.7513H10.5ZM13.5 15.7513H87.5V-58.2487H13.5V15.7513ZM21.75 11.2513L-52.2499 11.1192L-52.25 11.1853V11.2513H21.75ZM21.531 10.7203L73.9229 -41.5395L73.8803 -41.5822L73.8376 -41.6249L21.531 10.7203ZM19.5 8.69084H-54.5V39.3587L-32.8066 61.0361L19.5 8.69084ZM18.75 3.00134V-70.9987V3.00134ZM16.5 5.69084L-35.8358 58.0069L90.5 184.39V5.69084H16.5ZM3.75 21.0013H-70.25V95.0013H3.75V21.0013ZM3.75 11.5618L-48.5759 -40.7641L-70.25 -19.09V11.5618H3.75ZM12 3.31184L64.3259 -49.0141L12 -101.34L-40.3259 -49.0141L12 3.31184ZM20.25 11.5618H94.25V-19.09L72.5759 -40.7641L20.25 11.5618ZM20.25 21.0013V95.0013H94.25V21.0013H20.25ZM15 21.0013H-59V95.0013H15V21.0013ZM9 21.0013V95.0013H83V21.0013H9ZM64.923 -50.5394C57.9792 -57.5007 49.7304 -63.0236 40.6492 -66.7919L-16.0743 69.9064C-24.9733 66.2138 -33.0566 60.8017 -39.861 53.9801L64.923 -50.5394ZM40.6492 -66.7919C31.5679 -70.5602 21.8323 -72.5 12 -72.5V75.5C2.36504 75.5 -7.17521 73.5992 -16.0743 69.9064L40.6492 -66.7919ZM12 -72.5C2.16781 -72.5 -7.56781 -70.5603 -16.6492 -66.7919L40.0743 69.9064C31.1751 73.5992 21.6349 75.5 12 75.5V-72.5ZM-16.6492 -66.7919C-25.7306 -63.0235 -33.9794 -57.5006 -40.923 -50.5394L63.861 53.9801C57.0567 60.8016 48.9735 66.2137 40.0743 69.9064L-16.6492 -66.7919ZM-40.8569 -50.6056L-49.8569 -41.6056L54.7949 63.0462L63.7949 54.0462L-40.8569 -50.6056ZM-49.9229 -41.5395C-56.8599 -34.5849 -62.3582 -26.3313 -66.1035 -17.2503L70.7168 39.1784C67.0467 48.0771 61.6587 56.1652 54.8609 62.9802L-49.9229 -41.5395ZM-66.1035 -17.2503C-69.8488 -8.16938 -71.7674 1.56066 -71.7499 11.3835L76.2499 11.1192C76.2671 20.7449 74.3869 30.2797 70.7168 39.1784L-66.1035 -17.2503ZM-71.75 11.2513V21.7513H76.25V11.2513H-71.75ZM-71.75 21.7513C-71.75 41.5762 -63.8746 60.5892 -49.8562 74.6076L54.7956 -30.0442C68.5327 -16.3071 76.25 2.3243 76.25 21.7513H-71.75ZM-49.8562 74.6076C-35.8378 88.626 -16.8248 96.5013 3 96.5013V-51.4987C22.427 -51.4987 41.0584 -43.7814 54.7956 -30.0442L-49.8562 74.6076ZM3 96.5013H9.75V-51.4987H3V96.5013ZM9.75 96.5013C29.5748 96.5013 48.5878 88.626 62.6062 74.6076L-42.0456 -30.0442C-28.3084 -43.7814 -9.67698 -51.4987 9.75 -51.4987V96.5013ZM62.6062 74.6076C76.6246 60.5892 84.5 41.5763 84.5 21.7513H-63.5C-63.5 2.32425 -55.7826 -16.3072 -42.0456 -30.0442L62.6062 74.6076ZM84.5 21.7513V15.7513H-63.5V21.7513H84.5ZM10.5 89.7513H13.5V-58.2487H10.5V89.7513ZM-60.5 15.7513V21.7513H87.5V15.7513H-60.5ZM-60.5 21.7513C-60.5 41.5761 -52.6247 60.5891 -38.6062 74.6076L66.0456 -30.0442C79.7828 -16.307 87.5 2.32443 87.5 21.7513H-60.5ZM-38.6062 74.6076C-24.5877 88.6261 -5.57472 96.5013 14.25 96.5013V-51.4987C33.6769 -51.4987 52.3084 -43.7814 66.0456 -30.0442L-38.6062 74.6076ZM14.25 96.5013H21V-51.4987H14.25V96.5013ZM21 96.5013C40.8247 96.5013 59.8377 88.6261 73.8562 74.6076L-30.7956 -30.0442C-17.0584 -43.7814 1.5731 -51.4987 21 -51.4987V96.5013ZM73.8562 74.6076C87.8747 60.5891 95.75 41.5761 95.75 21.7513H-52.25C-52.25 2.32443 -44.5327 -16.307 -30.7956 -30.0442L73.8562 74.6076ZM95.75 21.7513V11.2513H-52.25V21.7513H95.75ZM95.7499 11.3835C95.7674 1.56066 93.8488 -8.16938 90.1035 -17.2503L-46.7168 39.1784C-50.3869 30.2797 -52.2671 20.7449 -52.2499 11.1192L95.7499 11.3835ZM90.1035 -17.2503C86.3583 -26.3312 80.86 -34.5849 73.9229 -41.5395L-30.8609 62.9802C-37.6588 56.1651 -43.0467 48.0771 -46.7168 39.1784L90.1035 -17.2503ZM73.8376 -41.6249L71.8066 -43.6544L-32.8066 61.0361L-30.7756 63.0656L73.8376 -41.6249ZM93.5 8.69084V3.75134H-54.5V8.69084H93.5ZM93.5 3.75134C93.5 -16.0735 85.6247 -35.0865 71.6062 -49.1049L-33.0456 55.5469C-46.7827 41.8098 -54.5 23.1783 -54.5 3.75134H93.5ZM71.6062 -49.1049C57.5879 -63.1233 38.5749 -70.9987 18.75 -70.9987V77.0013C-0.67708 77.0013 -19.3085 69.284 -33.0456 55.5469L71.6062 -49.1049ZM18.75 -70.9987H17.25V77.0013H18.75V-70.9987ZM17.25 -70.9987C-2.5749 -70.9987 -21.5879 -63.1233 -35.6062 -49.1049L69.0456 55.5469C55.3085 69.284 36.6771 77.0013 17.25 77.0013V-70.9987ZM-35.6062 -49.1049C-49.6247 -35.0865 -57.5 -16.0735 -57.5 3.75134H90.5C90.5 23.1783 82.7827 41.8098 69.0456 55.5469L-35.6062 -49.1049ZM-57.5 3.75134V5.69084H90.5V3.75134H-57.5ZM68.8358 -46.6252L64.8668 -50.5957L-39.8048 54.0364L-35.8358 58.0069L68.8358 -46.6252ZM77.75 21.0013V11.5618H-70.25V21.0013H77.75ZM56.0759 63.8877L64.3259 55.6377L-40.3259 -49.0141L-48.5759 -40.7641L56.0759 63.8877ZM-40.3259 55.6377L-32.0759 63.8877L72.5759 -40.7641L64.3259 -49.0141L-40.3259 55.6377ZM-53.75 11.5618V21.0013H94.25V11.5618H-53.75ZM20.25 -52.9987H15V95.0013H20.25V-52.9987ZM89 21.0013V15.0013H-59V21.0013H89ZM89 15.0013C89 -4.82339 81.1247 -23.8364 67.1062 -37.8549L-37.5456 66.7969C-51.2828 53.0597 -59 34.4282 -59 15.0013H89ZM67.1062 -37.8549C53.0877 -51.8734 34.0747 -59.7487 14.25 -59.7487V88.2513C-5.1769 88.2513 -23.8084 80.5341 -37.5456 66.7969L67.1062 -37.8549ZM14.25 -59.7487H9.75V88.2513H14.25V-59.7487ZM9.75 -59.7487C-10.0748 -59.7487 -29.0878 -51.8733 -43.1062 -37.8549L61.5456 66.7969C47.8084 80.534 29.177 88.2513 9.75 88.2513V-59.7487ZM-43.1062 -37.8549C-57.1246 -23.8365 -65 -4.82357 -65 15.0013H83C83 34.4284 75.2826 53.0599 61.5456 66.7969L-43.1062 -37.8549ZM-65 15.0013V21.0013H83V15.0013H-65ZM9 -52.9987H3.75V95.0013H9V-52.9987Z" fill="#214986" mask="url(#path-1-inside-1_1317_355)"/>
                    </svg></div>
                <div>
                    <h2 style="color:#1F689E">Dashboard Analytics</h2>
                </div>
            </div>
        </div>
    </div>
    {{-- dashboard heading end --}}


                 


  

    

    
    <div class="row my-4">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8">
            <div class="row">

                <div class="d-flex boxes mx-auto">
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="vehicle_card">
                            <div class="card_body">
                                <h4>All Vehicles</h4>
                                <b>{{count(@$all_vehicles)}}</b>
                                <p>Inventory Value:$ {{@$allVehicles_value}}</p>
                                
                                <button class="">View Report</button>
                                
                            </div>
                            
                            <div class="child">
                                   <img src="{{asset('images/vehicle.png')}}" alt="" width="14px">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="dispatch_card">
                            <div class="card_body">
                                <h4>Dispatched</h4>
                                <b>{{@$dispatch_count}}</b>
                                <p>Inventory Value:$ {{@$dispatch_value}}</p>
                                
                                <button class="">View Report</button>
                                
                            </div>
                            
                            <div class="child">
                                   <img src="{{asset('images/dispatch.png')}}" alt="" width="14px">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="onhand_card">
                            <div class="card_body">
                                <h4>On Hand</h4>
                                <b>{{@$onhand_count}}</b>
                                <p>Inventory Value:$ {{@$onhand_value}}</p>
                                
                                <button class="">View Report</button>
                                
                            </div>
                            
                            <div class="child">
                                   <img src="{{asset('images/onhand.png')}}" alt="" width="14px">
                            </div>
                        </div>
                    </div>

                </div>
                
              {{-- <div class="p-1"> --}}
                  {{-- <div class="col-sm-12 col-md-4 col-lg-4" style="border:1px solid red;">
                      <div class="vehicle_card">
                          <div class="card_body">
                              <h4>All Vehicles</h4>
                              <b>8410</b>
                              <p>Inventory Value:$ 435433</p>
                              
                              <button class="">View Report</button>
                              
                          </div>
                          
                          <div class="child">
                                 <img src="{{asset('images/vehicle.png')}}" alt="">
                          </div>
                      </div>
                  </div> --}}
              {{-- </div> --}}

              
             
              

                
            </div>

            <div class="row mt-3">
                <div class="d-flex boxes mx-auto">
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="manifest_card">
                            <div class="card_body">
                                <h4>Manifest</h4>
                                <b>{{@$manifest_count}}</b>
                                <p>Inventory Value:$ {{@$manifest_value}}</p>
                                
                                <button class="">View Report</button>
                                
                            </div>
                            
                            <div class="child">
                                   <img src="{{asset('images/manifest.png')}}" alt="" width="14px">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="shipped_card">
                            <div class="card_body">
                                <h4>Shipped</h4>
                                <b>{{@$shipped_count}}</b>
                                <p>Inventory Value:$ {{@$shipped_value}}</p>
                                
                                <button class="">View Report</button>
                                
                            </div>
                            
                            <div class="child">
                                   <img src="{{asset('images/shipped.png')}}" alt="" width="14px">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="arrived_card">
                            <div class="card_body">
                                <h4>Arrived</h4>
                                <b>{{@$arrived_count}}</b>
                                <p>Inventory Value:$ {{@$arrived_value}}</p>
                                
                                <button class="">View Report</button>
                                
                            </div>
                            
                            <div class="child">
                                   <img src="{{asset('images/arrived.png')}}" alt="" width="14px">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            
        </div>


        <div class="col-12 col-sm-12 col-md-3 col-lg-3 mx-auto">
            <div class="row mx-auto">
                <div class="col-12 mx-auto">
                    <div class="dashboard_card mx-auto">
                        <div class="car_header d-flex justify-content-between">
                            <h6>Shippement</h6>
                            <a href="">...</a>
                        </div>
                    

                        <div class="card_chart">

                            <div class="col-6">
                                {{-- <div class="cards"> --}}
                                    <div class="card-block">
                                        <div id="piechart"></div>
                                    </div>
                                {{-- </div> --}}
                            </div>
                            
                        </div>


                        <div class="card_footer d-flex justify-content-between px-3">
                            <div><p>Booked</p></div>
                            <div><p>25</p></div>
                        </div>


                        <div class="card_footer d-flex justify-content-between px-3" style="border-top:1px solid #696CFF">
                            <div><p>Shipped</p></div>
                            <div><p>25</p></div>
                        </div>

                        <div class="card_footer d-flex justify-content-between px-3" style="border-top:1px solid #696CFF">
                            <div><p>Arrived</p></div>
                            <div><p>10</p></div>
                        </div>

                        <div class="card_footer d-flex justify-content-between px-3" style="border-top:1px solid #696CFF">
                            <div><p>Completed</p></div>
                            <div><p>10</p></div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
   
    </div>


<br>

</div>

<div class="container" style="background:white;">


    
    <div class="row">
        <div class="col-12 dispatched_vehicles">
            <p>Dispatched Vehicles</p>
        </div>
    </div>
<br><br>
    <div class="row">

        <div class="d-none d-sm-none d-md-block col-md-6 col-lg-6"></div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex justify-content-center">
            <div class="dispatch_search">
            <input type="text" placeholder="Search" name="search"   id="search">
            <button>Search</button>
            </div>
        </div>
    </div>

    <br>

    <div class="row mt-4">
        <div class="col-12 table-responsive">
            <table class="table">
                <thead style="border-top:1px solid red;">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Phone</th>
                        <th>State</th>
                        <th>Country</th>
                        <th>Status</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(@$customers as $item)
                    <tr>
                        <td>{{$item['customer_name']}}</td>
                        <td>{{$item['customer_email']}}</td>
                        <td>{{$item['level']}}</td>
                        <td>{{$item['main_phone']}}</td>
                        <td>{{$item['state']}}</td>
                        <td>{{$item['country']}}</td>
                        <td>{{$item['status']}}</td>
                        <td>{{$item['address_1']}}</td>
                    </tr>

                @endforeach

                   

                    


                    
                </tbody>

            </table>
        </div>
    </div>

</div>
<br>



{{-- google map --}}
<div class="container-fluid" >
    <div class="row my-4 shadow">

        <div class="col-sm-12 col-md-7 col-lg-6 mx-auto mb-2" style="background:#ffff">
    
            <div class="map_heading car_header d-flex justify-content-between">
                <h6>Recent Order</h6>
                <a href="">...</a>
    
            </div>
    
            <div class="row">
                <div class="col-8 d-flex justify-content-center align-items-center mx-auto" style="border-right:1px solid blue;">

                    <img src="{{asset('images/map.png')}}" alt="" width="185px" height="200px">

                </div>
                <div class="col-4">

                    <label for="file"  style="color:green">New Jersey</label><br>	
                    <progress id="file" value="32" max="100" style="background:green;"> 32% </progress>
        
                    <label for="file" style="color:#EF5757">Savannah</label><br>	
                    <progress id="file" value="32" max="100" style="background:#EF5757;"> 32% </progress>

                    <label for="file" style="color:#47D000">Savannah</label><br>	
                    <progress id="file" value="32" max="100" style="background:#47D000"> 32% </progress>

                    <label for="file" style="color:#696CFF">Savannah</label><br>	
                    <progress id="file" value="32" max="100" style="background:#696CFF"> 32% </progress>

                    <label for="file" style="color:#ECB800">Savannah</label><br>	
                    <progress id="file" value="32" max="100" style="background:#ECB800"> 32% </progress>

                    <label for="file" style="color:#FF8514">Savannah</label><br>	
                    <progress id="file" value="32" max="100" style="background:#FF8514"> 32% </progress>

                    <label for="file" style="color:#1CACD9">Savannah</label><br>	
                    <progress id="file" value="32" max="100" style="background:#1CACD9"> 32% </progress>

                    
                </div>
            </div>
            
        </div>
        <div class="col-1">

        </div>
    
        <div class="col-sm-12 col-md-5 col-lg-5 mx-auto" style="background:#fff">

            <div class="map_heading car_header d-flex justify-content-between">
                <h6>Chat</h6>
                <a href="">...</a>
    
            </div>
           
        </div>
    
       </div>
    </div>

{{-- google chart --}}
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    // Load google charts
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    
    // Draw the chart and set the chart values
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
      ['Task', 'Hours per Day'],
      ['Booked', 10],
      ['Shipped', 2],
      ['Arrived', 4],
      ['Completed', 2],
    ]);
    
      // Optional; add a title and set the width and height of the chart
      var options = {'':'', 'width':180, 'height':96};
    
      // Display the chart inside the <div> element with id="piechart"
      var chart = new google.visualization.PieChart(document.getElementById('piechart'));
      chart.draw(data, options);
    }
    </script>
@endsection


