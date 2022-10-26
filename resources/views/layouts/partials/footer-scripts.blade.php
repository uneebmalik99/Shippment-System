<script type="text/javascript" src="{{ asset('assets/bower_components/jquery/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/bower_components/popper.js/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/bower_components/bootstrap/js/bootstrap.min.js') }}"></script>

{{-- sortTable --}}
<script src="{{ asset('assets/js/sorttable.js') }}"></script>

<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{ asset('assets/bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}">
</script>

<!-- Switch component js -->
<script type="text/javascript" src="{{ asset('assets/bower_components/switchery/js/switchery.min.js') }}"></script>

<!-- modernizr js -->
<script type="text/javascript" src="{{ asset('assets/bower_components/modernizr/js/modernizr.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/bower_components/modernizr/js/css-scrollbars.js') }}"></script>

<!-- classie js -->
<script type="text/javascript" src="{{ asset('assets/bower_components/classie/js/classie.js') }}"></script>

<!-- i18next.min.js -->
<script type="text/javascript" src="{{ asset('assets/bower_components/i18next/js/i18next.min.js') }}"></script>
<script type="text/javascript"
    src="{{ asset('assets/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js') }}"></script>
<script type="text/javascript"
    src="{{ asset('assets/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js') }}">
</script>
<script type="text/javascript" src="{{ asset('assets/bower_components/jquery-i18next/js/jquery-i18next.min.js') }}">
</script>

{{-- Calendar js --}}
<script type="text/javascript" src="{{ asset('assets/pages/full-calender/calendar.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/bower_components/moment/js/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/bower_components/fullcalendar/js/fullcalendar.min.js') }}">
</script>

<!-- Custom js -->
<script type="text/javascript" src="{{ asset('assets/js/script.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/pages/advance-elements/navbar-elements.js') }}"></script>
<script src="{{ asset('assets/js/pcoded.min.js') }}"></script>
<script src="{{ asset('assets/js/demo-12.js') }}"></script>
<script src="{{ asset('assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.mousewheel.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}" defer></script>
<script type="text/javascript" src="{{ asset('assets/pages/sticky/js/sticky.js') }}"></script>

<!--sticky js-->
<script type="text/javascript" src="{{ asset('assets/pages/sticky/js/trumbowyg.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/pages/sticky/js/jquery.minicolors.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/pages/sticky/js/jquery.postitall.js') }}"></script>

{{-- Custom JS for views --}}
<script type="text/javascript" src="{{ asset('js/ddtf.js') }}"></script>


{{-- image upload --}}
<script type="text/javascript" src="{{ asset('assets/js/image-uploader.min.js') }}"></script>
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
{{-- <script type="text/javascript" src="{{ asset('js/jquery-latest.min.js') }}"></script> --}}

<script>
    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('upload-img');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>



{{-- csrf tokens --}}
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'csrftoken': '{{ csrf_token() }}'
        }
    });
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
{{-- csrf tokens end --}}

{{-- Vehicle pagination and search end --}}

{{-- User pagination and filer --}}
<script>
    $('#search_user').on('keyup', function() {
        $value = $(this).val();
        $pagination = $('#pagination_user').val();
        $.ajax({
            type: 'get',
            url: '{{ URL::to('admin/users/search') }}',
            data: {
                'search': $value,
                'pagination': $pagination
            },
            success: function(data) {
                console.log($value, $pagination, 'search');
                $('#tbody').html(data.table);
                $('#page').html(data.pagination);
            }
        });
    })
    $('#pagination_user').on('change', function() {
        $value = $(this).val();
        $search = $('#search_user').val();
        $.ajax({
            type: 'get',
            url: '{{ URL::to('admin/users/pagination') }}',
            data: {
                'search': $search,
                'pagination': $value
            },
            success: function(data) {
                console.log($value, $search, 'pagination')
                $('#tbody').html(data.table);
                $('#page').html(data.pagination);
            }
        });
    })
</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'csrftoken': '{{ csrf_token() }}'
        }
    });
</script>

{{-- Vehicle tabs --}}
<script>
    $('.vehicles').on('click', function() {
        $search = $('#search_vehicle').val();
        $pagination = $('#pagination_vehicle').val();
        $check = $(this).attr('id');
        $.ajax({
            type: 'get',
            url: '{{ URL::to('admin/vehicles/tabs') }}',
            data: {
                'check': $check,
                'pagination': $pagination,
            },
            success: function(data) {
                console.log($check, $pagination);
                $('#tbody').html(data.table);
                $('#page').html(data.pagination);
                // console.log($search, $pagination);
                // $(this).css('background-color', 'yellow');
            }
        });
    })
</script>
{{-- Location tabs --}}
<script>
    $('.locations').on('click', function() {
        $search = $('#search_vehicle').val();
        $pagination = $('#pagination_vehicle').val();
        $check = $('.vehicles').attr('id');
        $location = $(this).attr('id');
        $.ajax({
            type: 'get',
            url: '{{ URL::to('admin/vehicles/location') }}',
            data: {
                'search': $search,
                'pagination': $pagination,
                'check': $check,
                'location': $location,
            },
            success: function(data) {
                console.log($search, $pagination, $check, $location);
                $('#tbody').html(data.table);
                $('#page').html(data.pagination);
                // $(this).css('background-color', 'yellow');
            }
        });
    })
</script>

{{-- Profile page tabs --}}
<script>
    $('.profile_tabs').on('click', function() {
        $('.profile_tabs').removeClass('btn_custom rounded text-white');
        $('.profile_tabs').addClass('border-0 form-control text-muted');
        $id = $(this).attr('cust_id');
        $tab = $(this).attr('id');
        // alert($tab);
        $(this).addClass('btn btn_custom rounded text-white');
        $(this).removeClass('border-0 form-control text-muted');
        $.ajax({
            type: 'get',
            url: '{{ URL::to('admin/customers/profile_tab') }}',
            data: {
                'tab': $tab,
                'id': $id,
            },
            success: function(data) {
                console.log(data);
                $('#tab_body').html(data);
            }
        });
    })
</script>

{{-- Notifications --}}
<script>
    $('.notification_body').on('click', function() {
        $id = $(this).val();
        // alert('adasdasd');
        $(this).addClass('bg-info border border-light rounded');
        $.ajax({
            type: 'get',
            url: '{{ URL::to('admin/notifications/status') }}',
            data: {
                'id': $id
            },
            success: function(data) {
                if (data == 0) {
                    $('.notification-time').removeClass('text-muted');
                    $('.notification-time').addClass('text-white');
                }

            }
        });
    })
</script>

<script>
    $('.close').on('click', function() {
        $('#exampleModal').modal('hide');
    })

    function hidemodal() {
        $('#exampleModal').modal('hide');

    }
</script>

{{-- Load Modal --}}
<script>
    $('.modal_button').on('click', function(){
        $id = $(this).attr('id');
        $tab = "general";
        if ($id == "customer") {
            $.ajax({
                type: 'get',
                url: '{{ URL::to('admin/customers/create') }}',
                data: {
                    'tab': $tab
                },
                success: function(data) {
                    $('.modal-body').html(data);
                    $('#exampleModal').modal('show');
                    $('.user_image').imageUploader({
                        maxFiles: 1
                    });
                }
            });
        } else if ($id == "vehicle") {
            $.ajax({
                type: 'get',
                url: '{{ URL::to('admin/vehicles/create') }}',
                data: {
                    'tab': $tab
                },
                success: function(data) {
                    // console.log(data);
                    $('.modal-body').html(data);
                    $('#exampleModal').modal('show');
                    $('.billofsales').imageUploader({
                        maxFiles: 4,
                        imagesInputName: 'billofsales',
                    });
                    $('.originaltitle').imageUploader({
                        maxFiles: 4,
                        imagesInputName: 'originaltitle',
                    });
                    $('.pickup').imageUploader({
                        maxFiles: 4,
                        imagesInputName: 'pickup',
                    });
                    $('.vehicle_auction_image').imageUploader({
                        imagesInputName: 'auction_images',
                        maxFiles: 15

                    });
                    $('.vehicle_warehouse_image').imageUploader({
                        imagesInputName: 'warehouse_images',
                        maxFiles: 15
                    });
                }
            });
        } else if ($id == "shipment") {
            $.ajax({
                type: 'get',
                url: '{{ URL::to('admin/shipments/create') }}',
                data: {
                    'tab': $tab
                },
                success: function(data) {
                    $('.modal-body').html(data);
                    $('#exampleModal').modal('show');
                    $('#shipment_vehicle_table').DataTable({
                        "lengthChange": false,
                        "info": false,
                        "bPaginate": false,
                        "lengthMenu": [
                            [50, 100, 500],
                            [50, 100, 500]
                        ],
                        language: {
                            search: "",
                            sLengthMenu: "_MENU_",
                            searchPlaceholder: "Search"
                        },
                    });
                    $('.shipment-inovice').imageUploader({
                        maxFiles: 4,
                        imagesInputName: 'shipment_inovice',
                    });
                    $('.stamp_title').imageUploader({
                        maxFiles: 4,
                        imagesInputName: 'stamp_title',

                    });
                    $('.loading_image').imageUploader({
                        maxFiles: 4,
                        imagesInputName: 'loading_image',

                    });
                    $('.other-document').imageUploader({
                        maxFiles: 4,
                        imagesInputName: 'other_document',

                    });
                }
            });
        }
    })
</script>

<script>
    $('.comingsoon').click(function(event) {
        event.preventDefault();
        iziToast.success({
            zindex: '9999999999999',
            position: 'topCenter',
            message: "Coming Soon!",
        });

    });
</script>

<script>
    function slide(id) {
        switch (id) {
            case ('client'):
                $("#client_body").slideToggle();
                break;
            case ('buyer'):
                $("#buyer_body").slideToggle();
                break;
            case ('title'):
                $("#title_body").slideToggle();
                break;
            case ('shipper'):
                $("#shipper_body").slideToggle();
                break;
            case ('charges'):
                $("#charges_body").slideToggle();
                break;
            case ('general'):
                $("#general_body").slideToggle();
                break;
            case ('sales_application'):
                $("#sales_application_body").slideToggle();
                break;
            case ('financial'):
                $("#financial_body").slideToggle();
                break;
            case ('sale_association'):
                $("#sale_association_body").slideToggle();
                break;
            case ('shipment_customer'):
                $("#shipment_customer_body").slideToggle();
                break;
            case ('shipment_calendar'):
                $("#shipment_calendar_body").slideToggle();
                break;
            case ('shipment_container'):
                $("#shipment_container_body").slideToggle();
                break;
            case ('shipment_reference'):
                $("#shipment_reference_body").slideToggle();
                break;
            case ('shipment_users'):
                $("#shipment_users_body").slideToggle();
                break;
            case ('shipment_loading'):
                $("#shipment_loading_body").slideToggle();
                break;
            case ('shipment_destination'):
                $("#shipment_destination_body").slideToggle();
                break;
            case ('shipment_shipping'):
                $("#shipment_shipping_body").slideToggle();
                break;
            case ('shipment_units'):
                $("#shipment_units_body").slideToggle();
                break;
            case ('note'):
                $("#note_body").slideToggle();
                break;
        }
    }
</script>

<script>
    function create_vehicle_form(id) {
        // $('#vehicle_form').on('submit', function(event) {
            // event.preventDefault();
            $tab_id = id;
            $next_tab = $('#' + $tab_id).data('next');
            var formData = new FormData(jQuery('#vehicle_form')[0]);
            $.ajax({
                method: 'POST',
                url: '{{ URL::to('admin/vehicles/create_form') }}',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    // iziToast.success({
                    //     title: 'Vehicle',
                    //     message: 'Successfully inserted record!',
                    //     position: 'topCenter',
                    //     zindex: '9999999999999',

                    // });
                    $('.modal-body').html(data.view);
                    $('#exampleModal').modal('show');
                    $('.vehicle_auction_image').imageUploader({
                        maxFiles: 15,
                        imagesInputName: 'auction_images',


                    });
                    $('.billofsales').imageUploader({
                        maxFiles: 15,
                        imagesInputName: 'billofsales',

                    });
                    $('.pickup').imageUploader({
                        maxFiles: 15,
                        imagesInputName: 'pickup',


                    });
                    $('.originaltitle').imageUploader({
                        maxFiles: 15,
                        imagesInputName: 'originaltitle',

                    });
                    $('.vehicle_warehouse_image').imageUploader({
                        maxFiles: 15,
                        imagesInputName: 'warehouse_images',

                    });
                    $('#' + $tab_id + '_tab').removeClass('next-style');
                    $('#' + $tab_id + '_tab').addClass('tab_style');
                    $('#' + $next_tab).addClass('next-style');
                },
                error: function(xhr, status, errorThrown) {
                   
                    console.log(xhr.responseJSON['errors']);
                    if(xhr.responseJSON['errors']['customer_name']){
                        $('#customer_name_error').html('<small style="margin-left:72px">Please Fill*</small>');
                    }
                    if(xhr.responseJSON['errors']['buyer_id']){
                        $('#buyer_error').html('<small style="margin-left:72px">Please Fill*</small>');
                    }
                    if(xhr.responseJSON['errors']['vin']){
                        $('#vin_error').html('<small style="margin-left:72px">Please Fill*</small>');
                    }
                    
                    
                    
                    if(xhr.responseJSON['errors']['auction']){
                        $('#auction_error').html('<small style="margin-left:72px">Please Fill*</small>');
                    }
                    if(xhr.responseJSON['errors']['color']){
                        $('#color_error').html('<small style="margin-left:72px">Please Fill*</small>');
                    }
                    if(xhr.responseJSON['errors']['value']){
                        $('#value_error').html('<small style="margin-left:72px">Please Fill*</small>');
                    }
                    
                    if(xhr.responseJSON['errors']['weight']){
                        $('#weight_error').html('<small style="margin-left:72px">Please Fill*</small>');
                    }
                    if(xhr.responseJSON['errors']['key']){
                        $('#key_error').html('<small style="margin-left:72px">Please Fill*</small>');
                    }
                    if(xhr.responseJSON['errors']['status']){
                        $('#status_error').html('<small style="margin-left:72px">Please Fill*</small>');
                    }
                    // $('#buyer_error').html('<small style="margin-left:72px">Please Fill*</small>');
                    // $('#key_error').html('<small style="margin-left:72px">Please Fill*</small>');
                }
            });
        // });
    }
</script>

<script>
    function import_docs() {
        $tab = "general";
        $.ajax({
            type: 'get',
            url: '{{ URL::to('admin/vehicles/import') }}',
            data: {
                'tab': $tab,
            },
            success: function(data) {
                console.log(data);
                $('.import-body').html(data);
                $('#exampleModal2').modal('show');
            }
        });
    }
</script>

<script>
    function viewnotification(id) {
        $id = id;
        $.ajax({
            type: 'post',
            url: '{{ route('customer.changeNotification') }}',
            data: {
                'id': $id
            },
            success: function(data) {
                console.log(data[0].id);

                $('#subject').html(data[0].subject);
                $('#expiry_date').html(data[0].expiry_date);
                $('#message').html(data[0].message);
            }
        });
    }
</script>

<script>
    function closemodal() {
        $('#exampleModal1').modal('hide');
    }

    function createRole() {
        $.ajax({
            type: 'get',
            url: '{{ route('user.createroles') }}',
            success: function(data) {
                $('.modal-body').html(data);
                $('#exampleModal').modal('show');
            }
        });

    }

    function addRole() {

        $.ajax({
            type: 'post',
            url: '{{ route('user.addRole') }}',
            data: $('form').serialize(),
            success: function(data) {
                //    alert(data);

                iziToast.success({
                    title: 'Vehicle',
                    message: data.name + " Added Successfully!",
                    position: 'topCenter',
                    zindex: '9999999999999',

                });

                $('#exampleModal').modal('hide');
                location.reload();

            }
        });
    }

    function updateRole(id) {
        $id = id;
        $.ajax({
            type: "post",
            url: "{{ route('user.updatemodelshow') }}",
            data: {
                id: $id
            },
            success: function(data) {
                // alert(data);
                $('.modal-body').html(data);
                $('#exampleModal').modal('show');
            }
        });
    }


    function billofsales() {
        var formData = new FormData(jQuery('#billofsales')[0]);
        formData.append('tab', 'billofsales');
        $.ajax({
            method: 'POST',
            url: '{{ URL::to('admin/vehicles/attachments') }}',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                console.log(data);
                iziToast.success({
                    title: 'Success',
                    message: 'Auction Images inserted !',
                    timeout: 1500,
                    position: 'topCenter',
                    zindex: '9999999999999',
                });
            },
            error: function() {
                iziToast.warning({
                    message: 'Failed to insert data!',
                    position: 'topCenter',
                    zindex: '9999999999999'
                });
            }
        });

    }

    function originalTitle() {

        var formData = new FormData(jQuery('#billofsales')[0]);
        formData.append('tab', 'originalTitle');

        $.ajax({
            method: 'POST',
            url: '{{ URL::to('admin/vehicles/attachments') }}',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                console.log(data);
                iziToast.success({
                    title: 'Success',
                    message: 'Auction Images inserted !',
                    timeout: 1500,
                    position: 'topCenter',
                    zindex: '9999999999999',
                });
            },
            error: function() {
                iziToast.warning({
                    message: 'Failed to insert data!',
                    position: 'topCenter',
                    zindex: '9999999999999'
                });
            }
        });

    }


    function pickup() {

        var formData = new FormData(jQuery('#billofsales')[0]);
        formData.append('tab', 'pickup');

        $.ajax({
            method: 'POST',
            url: '{{ URL::to('admin/vehicles/attachments') }}',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                console.log(data);
                iziToast.success({
                    title: 'Success',
                    message: 'Auction Images inserted !',
                    timeout: 1500,
                    position: 'topCenter',
                    zindex: '9999999999999',
                });
            },
            error: function() {
                iziToast.warning({
                    message: 'Failed to insert data!',
                    position: 'topCenter',
                    zindex: '9999999999999'
                });
            }
        });

    }
</script>

<script>
    function getInfo() {
        // vin = KM8JUCAC4DU604504;

        tab = $('#getinfo').attr('tab');

        if (tab == 'getinfo') {
            vin = $('#vin').val();
            var url = 'https://vpic.nhtsa.dot.gov/api/vehicles/decodevinvaluesextended/' + vin + '?format=json';
            if (vin == '') {
                alert('Please Enter Vin Number');
            } else {
                $.ajax({
                    type: 'GET',
                    url: url,
                    success: function(data) {
                        console.log(data.Results[0]);
                        vehicle = data.Results[0];
                        $('#model').val(vehicle.Model);
                        $('#make').val(vehicle.Make);
                        $('#year').val(vehicle.ModelYear);
                        $('#vehicle_type').val(vehicle.VehicleType);
                        $('#weight').val(vehicle.CurbWeightLB);
                        $('#value').val(vehicle.BasePrice);
                        $('#getinfo').attr('tab', 'reset');
                        $('#getinfo').text('Reset');

                    }
                });
            }

        } else {
            $('#model').val('');
            $('#make').val('');
            $('#year').val('');
            $('#vehicle_type').val('');
            $('#weight').val('');
            $('#value').val('');
            $('#getinfo').attr('tab', 'getinfo');
            $('#getinfo').text('GetInfo');


        }
    }
</script>


{{-- add records --}}
<script>
    $(".popup_button").click(function() {
        var tab  = $(this).attr("tab"); 
        var id  = $(this).attr("id"); 
        // alert(tab);
        // alert(id);
        $.ajax({  
            type: 'post',
            url: '{{ route('master.showmodel') }}',
                data:{tab :tab},  
                success:function(data){  
                    $('#common_body').html(data);  
                    $('#commonmodal').modal("show");
                    $("#close_modal").click(function() {
                        $('#commonmodal').modal("hide");
                    }); 
                    $(".add-more").click(function() {
                        current_div = '<div class="input-group mb-3 after-add-more" style="border: 1px solid rgba(31, 104, 158, 0.26); filter: drop-shadow(2px 2px 2px rgba(92, 174, 235, 0.55));display:flex;"><input type="text" name="addmore[]" class="form-control common_input" placeholder=""><div class="input-group-append"><button class="add-more" type="button"style="background: none;outline:none !important;border:none !important"><svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg"> <g filter="url(#filter0_d_2121_81)"> <path fill-rule="evenodd" clip-rule="evenodd" d="M19 8C14.0295 8 10 12.0295 10 17C10 21.9705 14.0295 26 19 26C23.9705 26 28 21.9705 28 17C28 12.0295 23.9705 8 19 8ZM19.8182 20.2727C19.8182 20.4897 19.732 20.6978 19.5785 20.8513C19.4251 21.0047 19.217 21.0909 19 21.0909C18.783 21.0909 18.5749 21.0047 18.4215 20.8513C18.268 20.6978 18.1818 20.4897 18.1818 20.2727V17.8182H15.7273C15.5103 17.8182 15.3022 17.732 15.1487 17.5785C14.9953 17.4251 14.9091 17.217 14.9091 17C14.9091 16.783 14.9953 16.5749 15.1487 16.4215C15.3022 16.268 15.5103 16.1818 15.7273 16.1818H18.1818V13.7273C18.1818 13.5103 18.268 13.3022 18.4215 13.1487C18.5749 12.9953 18.783 12.9091 19 12.9091C19.217 12.9091 19.4251 12.9953 19.5785 13.1487C19.732 13.3022 19.8182 13.5103 19.8182 13.7273V16.1818H22.2727C22.4897 16.1818 22.6978 16.268 22.8513 16.4215C23.0047 16.5749 23.0909 16.783 23.0909 17C23.0909 17.217 23.0047 17.4251 22.8513 17.5785C22.6978 17.732 22.4897 17.8182 22.2727 17.8182H19.8182V20.2727Z"fill="#1F689E" /> </g><defs> <filter id="filter0_d_2121_81" x="0" y="0" width="38" height="38" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix" /> <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" /> <feOffset dy="2" /><feGaussianBlur stdDeviation="5" /> <feComposite in2="hardAlpha" operator="out" /> <feColorMatrix type="matrix"values="0 0 0 0 0.533333 0 0 0 0 0.533333 0 0 0 0 0.533333 0 0 0 0.2 0" /><feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_2121_81" /><feBlend mode="normal" in="SourceGraphic"in2="effect1_dropShadow_2121_81" result="shape" /> </filter></defs></svg></button> </div> </div>';
                        $('.add_data_section').append(current_div);
                    });
                    $("#data_save").click(function() {
                        var formData = new FormData($('#common_fields')[0]);
                        //  console.log(...formData);
                         formData.append('tab', tab);
                        //  formData.append('id', data);
                        $.ajax({
                            method: 'post',
                            url: '{{ route('master.save') }}',
                            data: formData,
                            processData: false,
                            contentType: false,
                            success:function(data){
                                if(data=='success'){
                                    iziToast.success({timeout: 5000, icon: 'fa fa-check', title: 'OK', message: 'Successfully Record Saved'});
                                    $('#commonmodal').modal("hide");
                                    location.reload();
                                }
                                if(data=='recordexist'){
                                    iziToast.error({timeout: 10000,icon: 'fa fa-warning', title: 'Error', message: 'Record Already Exist'});
                                    $('#commonmodal').modal("hide");
                                    // location.reload();
                                }
                            },  
                        }); 
                    }); 
                }  
           }); 
    }); 
</script>

{{-- make records --}}
<script>
    $("#makepopup").click(function() {
        var tab  = $(this).attr("tab"); 
        // alert(tab);
        $.ajax({  
            type: 'post',
            url: '{{ route('make.list') }}',
                data:{tab :tab},  
                success:function(data){  
                $('#common_body').html(data);  
                $('#commonmodal').modal("show");
                $("#close_modal").click(function() {
                    $('#commonmodal').modal("hide");
                });
                $(".add-more").click(function() {
                    current_div = '<div class="input-group mb-3 after-add-more" style="border: 1px solid rgba(31, 104, 158, 0.26); filter: drop-shadow(2px 2px 2px rgba(92, 174, 235, 0.55));display:flex;"><input type="text" name="addmore[]" class="form-control make_input" placeholder="Enter Company Name"><div class="input-group-append"><button class="add-more" type="button"style="background: none;outline:none !important;border:none !important"><svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg"> <g filter="url(#filter0_d_2121_81)"> <path fill-rule="evenodd" clip-rule="evenodd" d="M19 8C14.0295 8 10 12.0295 10 17C10 21.9705 14.0295 26 19 26C23.9705 26 28 21.9705 28 17C28 12.0295 23.9705 8 19 8ZM19.8182 20.2727C19.8182 20.4897 19.732 20.6978 19.5785 20.8513C19.4251 21.0047 19.217 21.0909 19 21.0909C18.783 21.0909 18.5749 21.0047 18.4215 20.8513C18.268 20.6978 18.1818 20.4897 18.1818 20.2727V17.8182H15.7273C15.5103 17.8182 15.3022 17.732 15.1487 17.5785C14.9953 17.4251 14.9091 17.217 14.9091 17C14.9091 16.783 14.9953 16.5749 15.1487 16.4215C15.3022 16.268 15.5103 16.1818 15.7273 16.1818H18.1818V13.7273C18.1818 13.5103 18.268 13.3022 18.4215 13.1487C18.5749 12.9953 18.783 12.9091 19 12.9091C19.217 12.9091 19.4251 12.9953 19.5785 13.1487C19.732 13.3022 19.8182 13.5103 19.8182 13.7273V16.1818H22.2727C22.4897 16.1818 22.6978 16.268 22.8513 16.4215C23.0047 16.5749 23.0909 16.783 23.0909 17C23.0909 17.217 23.0047 17.4251 22.8513 17.5785C22.6978 17.732 22.4897 17.8182 22.2727 17.8182H19.8182V20.2727Z"fill="#1F689E" /> </g><defs> <filter id="filter0_d_2121_81" x="0" y="0" width="38" height="38" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix" /> <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" /> <feOffset dy="2" /><feGaussianBlur stdDeviation="5" /> <feComposite in2="hardAlpha" operator="out" /> <feColorMatrix type="matrix"values="0 0 0 0 0.533333 0 0 0 0 0.533333 0 0 0 0 0.533333 0 0 0 0.2 0" /><feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_2121_81" /><feBlend mode="normal" in="SourceGraphic"in2="effect1_dropShadow_2121_81" result="shape" /> </filter></defs></svg></button> </div> </div>';
                    $('.add_data_section').append(current_div);
                });
            // master.makeadd
                $("#input_make").on("change", function(e) {
                    var tab  = $(this).attr("tab"); 
                    var model_id = $("#input_make").val();
                    // alert(tab);alert(model_id);
                    $.ajax({  
                    type: 'post',
                    url: '{{ route('master.seriesadd') }}',
                    data:{
                        tab :tab,
                        model_id:model_id,
                    },  
                    success:function(data){  
                        // console.log(data)
                        html ='<div class="form-group" id="model_section">';
                        html += '<select class="form-control" name="model"  id="input_model" tab="model">';
                        html += '<option disabled selected>select model</option>';
                        data.forEach(function(key, value) {
                            html +='<option value="'+key.id+'">' +key.name+ '</option>';
                        });
                        html += '</select></div>';
                        $('#model_section').empty().append(html);
                        
                        $("#input_model").on("change", function(e) {
                                var tab  = $(this).attr("tab"); 
                                var model_id = $("#input_model").val();
                                // alert(model_id);alert(tab);
                                $.ajax({  
                                    type: 'post',
                                    url: '{{ route('master.seriesadd') }}',
                                    data:{
                                    tab :tab,
                                    model_id:model_id,
                                },
                                success:function(data){  
                                    console.log(data)
                                    html ='<div class="form-group" id="series_section">';
                                    html += '<select class="form-control" name="series" id="input_series" tab="series">';
                                    data.forEach(function(key, value) {
                                        html +='<option value="' +key.id+ '">' +key.name+ '</option>';
                                    });
                                    html += '</select></div>';
                                    $('#series_section').empty().append(html);
                                }
                            });   

                        }); 
                    }
                });

                 
                $("#make_save").click(function() {
                var formData = new FormData($('#make_fields')[0]);
                //  console.log(...formData);return
                    formData.append('tab', tab);
                    formData.append('id', data);
                $.ajax({
                    method: 'post',
                    url: '{{ route('add.make') }}',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success:function(data){
                        if(data=='success'){
                            iziToast.success({timeout: 5000, icon: 'fa fa-check', title: 'OK', message: 'Successfully Record Saved'});
                            $('#commonmodal').modal("hide");
                            location.reload();
                        }
                        if(data=='recordexist'){
                            iziToast.error({timeout: 10000,icon: 'fa fa-warning', title: 'Error', message: 'Record Already Exist'});
                            $('#commonmodal').modal("hide");
                            // location.reload();
                        }
                    },  
                }); 
            });


                }); 
            }  
        }); 
    }); 
</script>


{{-- delete records --}}
<script>
    function deletemaster(id,tab){
        // alert(id);
        // alert(tab);
        if (confirm('Do you really want to delete this record ?')) {
        var current_id = $(".current_id").val();
        $.ajax({  
            type: 'post',
            url: '{{ route('master.delete') }}',
                data:{
                    tab :tab,
                    id:id,
                },  
                success:function(data){
                    if(data=='deleted'){
                        iziToast.success({timeout: 5000, icon: 'fa fa-check', title: 'OK', message: 'Successfully Record Deleted'});
                        $('#commonmodal').modal("hide");
                        location.reload();
                    }
                },  
        }); 
    }
    }
</script>

{{-- update saved records --}}
<script>
    function updatemaster(id,tab){
        // alert(id);
        // alert(tab);
        $.ajax({  
            type: 'post',
            url: '{{ route('update.master') }}',
                data:{tab :tab,id:id},  
                success:function(data){  
                    $('#common_body').html(data);  
                    $('#commonmodal').modal("show");
                    $("#close_modal").click(function() {
                        $('#commonmodal').modal("hide");
                    }); 
                    $(".save_btn").click(function() {
                        var name  = $("#input_value").val(); 
                        var id    = $(this).val();
                        // alert(name);
                        // alert(id);
                        $.ajax({  
                            type: 'post',
                            url: '{{ route('update.save') }}',
                                data:{
                                    tab :tab,
                                    id:id,
                                    name:name,
                                },  
                                success:function(data){
                                if(data=='updated'){
                                    iziToast.success({timeout: 5000, icon: 'fa fa-check', title: 'OK', message: 'Successfully Record Updated'});
                                    $('#commonmodal').modal("hide");
                                    location.reload();
                                }
                            },  
                        }); 
                    }); 
                }  
           }); 
    }
</script>

{{-- status check --}}
<script>
     $('input[type=checkbox].status_change').change(function () {
        var id = $(this).attr("id"); 
        var tab = $(this).attr("tab"); 
        var status  = $(this).val(); 

       
        $.ajax({  
            type: 'post',
            url: '{{ route('master.status') }}',
                data:{
                    tab :tab,
                    status:status,
                    id:id
                },  
                success:function(data){  
                    if(data=='updated'){
                        iziToast.success({timeout: 5000, icon: 'fa fa-check', title: 'OK', message: 'Successfully Status Updated'});
                        $('#commonmodal').modal("hide");
                        location.reload();
                    }
                }
        });
    });

</script>



<script>
document.onreadystatechange = function () {
var state = document.readyState
if (state == 'interactive') {
   document.getElementById('contents').style.visibility="hidden";
} else if (state == 'complete') {
  setTimeout(function(){
     document.getElementById('interactive');
     document.getElementById('load').style.visibility="hidden";
     document.getElementById('contents').style.visibility="visible";
  },1000);
}
}
</script>
