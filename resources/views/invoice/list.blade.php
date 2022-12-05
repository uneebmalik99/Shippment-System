@extends('layouts.partials.mainlayout')
@section('body')


    <div class="p-2">
        <!-- {{-- <div class="row">
            <div class="col-6">
                <div class="d-flex justify-content-between">
                    <div class="col-9">
                        <div class="navi-group">
                            <div class="d-flex p-2">
                                <span class="d-flex align-items-center">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M20.71 19.29L17.31 15.9C18.407 14.5025 19.0022 12.7767 19 11C19 9.41775 18.5308 7.87103 17.6518 6.55544C16.7727 5.23985 15.5233 4.21447 14.0615 3.60897C12.5997 3.00347 10.9911 2.84504 9.43928 3.15372C7.88743 3.4624 6.46197 4.22433 5.34315 5.34315C4.22433 6.46197 3.4624 7.88743 3.15372 9.43928C2.84504 10.9911 3.00347 12.5997 3.60897 14.0615C4.21447 15.5233 5.23985 16.7727 6.55544 17.6518C7.87103 18.5308 9.41775 19 11 19C12.7767 19.0022 14.5025 18.407 15.9 17.31L19.29 20.71C19.383 20.8037 19.4936 20.8781 19.6154 20.9289C19.7373 20.9797 19.868 21.0058 20 21.0058C20.132 21.0058 20.2627 20.9797 20.3846 20.9289C20.5064 20.8781 20.617 20.8037 20.71 20.71C20.8037 20.617 20.8781 20.5064 20.9289 20.3846C20.9797 20.2627 21.0058 20.132 21.0058 20C21.0058 19.868 20.9797 19.7373 20.9289 19.6154C20.8781 19.4936 20.8037 19.383 20.71 19.29V19.29ZM5 11C5 9.81332 5.3519 8.65328 6.01119 7.66658C6.67047 6.67989 7.60755 5.91085 8.7039 5.45673C9.80026 5.0026 11.0067 4.88378 12.1705 5.11529C13.3344 5.3468 14.4035 5.91825 15.2426 6.75736C16.0818 7.59648 16.6532 8.66558 16.8847 9.82946C17.1162 10.9933 16.9974 12.1997 16.5433 13.2961C16.0892 14.3925 15.3201 15.3295 14.3334 15.9888C13.3467 16.6481 12.1867 17 11 17C9.4087 17 7.88258 16.3679 6.75736 15.2426C5.63214 14.1174 5 12.5913 5 11Z"
                                            fill="#ABABAB" />
                                    </svg>
                                </span>
                                <input type="search" class="form-control text-div fw-bold"
                                    placeholder="Customer name , Customer ID">
                            </div>
                        </div>
                    </div>
                    <div class="col-3 d-flex align-items-center">
                        <div>
                            <button type="button" class="btn form-control text-white px-4 py-1 search-btn">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}} -->
        <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
    style="z-index:99999;">
    <div class="modal-dialog modal-fullscreen scrollable mw-100 m-2 px-3 py-2" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between title_style">
                <div>
                    <h5 class="modal-title text-white" id="exampleModalLabel">New {{ $module['singular'] }}</h5>
                </div>
                <div>
                    <button type="button" class="close text-white h6" data-dismiss="modal" aria-label="Close"
                        style="margin-top: -11px;
                    font-size: 26px;">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                ...
            </div>
        </div>
    </div>
</div>
{{-- Modal End --}}
        <div class="d-flex justify-content-end">
            <div>
                
                <button type="button"
                                        class="text-white form-control-sm border py-1 btn-info rounded modal_button px-2 col-12"
                                        style="background: rgb(62 88 113) !important;" data-target="#exampleModal"
                                        onclick="createInvoice()">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a class="text-white d-flex align-items-center">
                                                <span class="pl-2 font-size">Add New Invoice</span></a>
                                        </div>
                                    </button>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-head">
                <div class="container-fluid">
                    <div class="p-3">
                        <div class="bg-view p-3 ">
                            <span class="text-clr"><b>View</b></span>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card-body overflow-auto">
                <table class="table">
                    <thead>
                        <tr class="tb-head text-muted">
                            <th>Customer Name</th>
                            <th>Customer ID</th>
                            <th>Total amount</th>
                            <th>Paid amount</th>
                            <th>Balance</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- {{dd(@$records)}} --}}
                       @foreach($records as $invoice)
                       <tr class="tb-body text-muted">
                            <th scope="row">{{@$invoice['user']['username']}}</th>
                            <td>{{@$invoice['customer_user_id']}}</td>
                            <td>{{@$invoice['total_amount']}}</td>
                            <td>{{@$invoice['amount_paid']}}</td>
                            <td>{{@$invoice['discount']}}</td>
                            <td class="d-flex justify-content-around">
                            <button class='profile-button'
                            ><a href="{{route('invoice.detail_page').'/'.$invoice['id']}}">
                               <svg width='14' height='13' viewBox='0 0 16 14' fill='none'
                                   xmlns='http://www.w3.org/2000/svg'>
                                   <path
                                       d='M16 7C16 7 13 2.1875 8 2.1875C3 2.1875 0 7 0 7C0 7 3 11.8125 8 11.8125C13 11.8125 16 7 16 7ZM1.173 7C1.65651 6.35698 2.21264 5.7581 2.833 5.21237C4.12 4.0845 5.88 3.0625 8 3.0625C10.12 3.0625 11.879 4.0845 13.168 5.21237C13.7884 5.7581 14.3445 6.35698 14.828 7C14.77 7.07613 14.706 7.16013 14.633 7.252C14.298 7.672 13.803 8.232 13.168 8.78763C11.879 9.9155 10.119 10.9375 8 10.9375C5.88 10.9375 4.121 9.9155 2.832 8.78763C2.21165 8.2419 1.65552 7.64301 1.172 7H1.173Z'
                                       fill='#048B52' />
                                   <path
                                       d='M8 4.8125C7.33696 4.8125 6.70107 5.04297 6.23223 5.4532C5.76339 5.86344 5.5 6.41984 5.5 7C5.5 7.58016 5.76339 8.13656 6.23223 8.5468C6.70107 8.95703 7.33696 9.1875 8 9.1875C8.66304 9.1875 9.29893 8.95703 9.76777 8.5468C10.2366 8.13656 10.5 7.58016 10.5 7C10.5 6.41984 10.2366 5.86344 9.76777 5.4532C9.29893 5.04297 8.66304 4.8125 8 4.8125ZM4.5 7C4.5 6.18777 4.86875 5.40882 5.52513 4.83449C6.1815 4.26016 7.07174 3.9375 8 3.9375C8.92826 3.9375 9.8185 4.26016 10.4749 4.83449C11.1313 5.40882 11.5 6.18777 11.5 7C11.5 7.81223 11.1313 8.59118 10.4749 9.16551C9.8185 9.73984 8.92826 10.0625 8 10.0625C7.07174 10.0625 6.1815 9.73984 5.52513 9.16551C4.86875 8.59118 4.5 7.81223 4.5 7Z'
                                       fill='#048B52' />
                               </svg>

                               </a>
                       </button>
                       <button class='edit-button'>
                                        <a href="{{route('invoice.get_update').'/'.$invoice['id']}}">
                                            <svg width='14' height='13' viewBox='0 0 16 16' fill='none'
                                                xmlns='http://www.w3.org/2000/svg'>
                                                <path
                                                    d='M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z'
                                                    fill='#2C77E7'/>
                                            </svg>
                                        </a>
                                    </button>
                       <button class='delete-button'>
                       <a href="{{route('invoice.get_delete').'/'.$invoice['id']}}">
                           <svg width='14' height='13' viewBox='0 0 12 12' fill='none'
                               xmlns='http://www.w3.org/2000/svg'>
                               <path
                                   d='M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z'
                                   fill='#EF5757' />
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
    {{-- -Invoice Scripts --}}

<script>
    function createInvoice(){
        $.ajax({
            type: 'GET',
            url: '{{ route('invoice.create') }}',
            success: function(data) {
                $('.modal-body').html(data);
                $('#exampleModal').modal('show');
            }
        });
    }
</script>
@endsection
