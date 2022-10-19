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
    $('.modal_button').on('click', function() {
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
        $('#vehicle_form').on('submit', function(event) {
            event.preventDefault();
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
                error: function() {
                    iziToast.warning({
                        message: 'Failed to insert data!',
                        position: 'topCenter',
                        zindex: '9999999999999'
                    });
                }
            });
        });
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



{{-- add more companies --}}
<script>
  $(".add-more").click(function() {
    current_div = '<div class="input-group mb-3 after-add-more" style="border: 1px solid rgba(31, 104, 158, 0.26); filter: drop-shadow(2px 2px 2px rgba(92, 174, 235, 0.55));display:flex;"><input type="text" name="addmore[]" class="form-control" placeholder="Recipients username"><div class="input-group-append"><button class="add-more" type="button"style="background: none;outline:none !important;border:none !important"><svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg"> <g filter="url(#filter0_d_2121_81)"> <path fill-rule="evenodd" clip-rule="evenodd" d="M19 8C14.0295 8 10 12.0295 10 17C10 21.9705 14.0295 26 19 26C23.9705 26 28 21.9705 28 17C28 12.0295 23.9705 8 19 8ZM19.8182 20.2727C19.8182 20.4897 19.732 20.6978 19.5785 20.8513C19.4251 21.0047 19.217 21.0909 19 21.0909C18.783 21.0909 18.5749 21.0047 18.4215 20.8513C18.268 20.6978 18.1818 20.4897 18.1818 20.2727V17.8182H15.7273C15.5103 17.8182 15.3022 17.732 15.1487 17.5785C14.9953 17.4251 14.9091 17.217 14.9091 17C14.9091 16.783 14.9953 16.5749 15.1487 16.4215C15.3022 16.268 15.5103 16.1818 15.7273 16.1818H18.1818V13.7273C18.1818 13.5103 18.268 13.3022 18.4215 13.1487C18.5749 12.9953 18.783 12.9091 19 12.9091C19.217 12.9091 19.4251 12.9953 19.5785 13.1487C19.732 13.3022 19.8182 13.5103 19.8182 13.7273V16.1818H22.2727C22.4897 16.1818 22.6978 16.268 22.8513 16.4215C23.0047 16.5749 23.0909 16.783 23.0909 17C23.0909 17.217 23.0047 17.4251 22.8513 17.5785C22.6978 17.732 22.4897 17.8182 22.2727 17.8182H19.8182V20.2727Z"fill="#1F689E" /> </g><defs> <filter id="filter0_d_2121_81" x="0" y="0" width="38" height="38" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix" /> <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" /> <feOffset dy="2" /><feGaussianBlur stdDeviation="5" /> <feComposite in2="hardAlpha" operator="out" /> <feColorMatrix type="matrix"values="0 0 0 0 0.533333 0 0 0 0 0.533333 0 0 0 0 0.533333 0 0 0 0.2 0" /><feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_2121_81" /><feBlend mode="normal" in="SourceGraphic"in2="effect1_dropShadow_2121_81" result="shape" /> </filter></defs></svg></button> </div> </div>';
    $('.add_data_section').append(current_div);
  });
</script>
{{-- company information --}}
<script>
    $("#companypopup").click(function() {
        var tab  = $(this).attr("tab");
        // alert(tab)
        $.ajax({
            type: 'post',
            url: '{{ route('company.list') }}',
                data:{tab :tab},
                success:function(data){
                    $('#common_body').html(data);
                    $('#commonmodal').modal("show");
                    $("#close_modal").click(function() {
                        $('#commonmodal').modal("hide");
                    });
                    $("#company_save").click(function() {
                        var data  = $("#company_input").val();
                        // alert(data)
                        $.ajax({
                            type: 'post',
                            url: '{{ route('add.record') }}',
                                data:{
                                    tab :tab,
                                    name:data,
                                },
                                success:function(data){
                                    // alert(data);
                                    // if(data!=""){
                                        iziToast.success({timeout: 5000, icon: 'fa fa-check', title: 'OK', message: 'Company is saved'});
                                        $('#commonmodal').modal("hide");
                                        location.reload();
                                    // }
                                },
                                error:function(data){
                                    $name = $(".error-message").html('<strong class="text-danger" >Name already taken</strong>');
                                }
                        });
                    });
                }
           });
    });
</script>
{{-- shipping countries --}}
<script>
    $("#shippingcountriespopup").click(function() {
        var tab  = $(this).attr("tab");
        // alert(tab)
        $.ajax({
            type: 'post',
            url: '{{ route('shipping.countries') }}',
                data:{tab :tab},
                success:function(data){
                    $('#common_body').html(data);
                    $('#commonmodal').modal("show");
                    $("#close_modal").click(function() {
                        $('#commonmodal').modal("hide");
                    });
                    $("#shippingcountries_save").click(function() {
                        var data  = $("#shippingcountries_input").val();
                        $.ajax({
                            type: 'post',
                            url: '{{ route('add.record') }}',
                                data:{
                                    tab :tab,
                                    name:data,
                                },
                                success:function(data){
                                    // alert(data);
                                    // if(data!=""){
                                        iziToast.success({timeout: 5000, icon: 'fa fa-check', title: 'OK', message: 'Shipping Country is saved'});
                                        $('#commonmodal').modal("hide");
                                        location.reload();
                                    // }
                                },
                                error:function(data){
                                    $name = $(".error-message").html('<strong class="text-danger" >Name already taken</strong>');
                                }
                        });
                    });
                }
           });
    });
</script>
{{-- shipping states --}}
<script>
    $("#shippingstatespopup").click(function() {
        var tab  = $(this).attr("tab");
        // alert(tab)
        $.ajax({
            type: 'post',
            url: '{{ route('shipping.states') }}',
                data:{tab :tab},
                success:function(data){
                    $('#common_body').html(data);
                    $('#commonmodal').modal("show");
                    $("#close_modal").click(function() {
                        $('#commonmodal').modal("hide");
                    });
                    $("#shippingstates_save").click(function() {
                        var data  = $("#shippingstates_input").val();
                        $.ajax({
                            type: 'post',
                            url: '{{ route('add.record') }}',
                                data:{
                                    tab :tab,
                                    name:data,
                                },
                                success:function(data){
                                    // alert(data);
                                    // if(data!=""){
                                        iziToast.success({timeout: 5000, icon: 'fa fa-check', title: 'OK', message: 'Shipping States is saved'});
                                        $('#commonmodal').modal("hide");
                                        location.reload();
                                    // }
                                },
                                error:function(data){
                                    $name = $(".error-message").html('<strong class="text-danger" >Name already taken</strong>');
                                }
                        });
                    });
                }
           });
    });
</script>

{{-- loading ports --}}
<script>
    $("#loadingportspopup").click(function() {
        var tab  = $(this).attr("tab");
        // alert(tab)
        $.ajax({
            type: 'post',
            url: '{{ route('loading.ports') }}',
                data:{tab :tab},
                success:function(data){
                    $('#common_body').html(data);
                    $('#commonmodal').modal("show");
                    $("#close_modal").click(function() {
                        $('#commonmodal').modal("hide");
                    });
                    $("#loadingports_save").click(function() {
                        var data  = $("#loadingports_input").val();
                        $.ajax({
                            type: 'post',
                            url: '{{ route('add.record') }}',
                                data:{
                                    tab :tab,
                                    name:data,
                                },
                                success:function(data){
                                    // alert(data);
                                    // if(data!=""){
                                        iziToast.success({timeout: 5000, icon: 'fa fa-check', title: 'OK', message: 'Loading Post is saved'});
                                        $('#commonmodal').modal("hide");
                                        location.reload();
                                    // }
                                },
                                error:function(data){
                                    $name = $(".error-message").html('<strong class="text-danger" >Name already taken</strong>');
                                }
                        });
                    });
                }
           });
    });
</script>
{{-- destination countries --}}
<script>
    $("#destinationcountriespopup").click(function() {
        var tab  = $(this).attr("tab");
        // alert(tab)
        $.ajax({
            type: 'post',
            url: '{{ route('destination.countries') }}',
                data:{tab :tab},
                success:function(data){
                    $('#common_body').html(data);
                    $('#commonmodal').modal("show");
                    $("#close_modal").click(function() {
                        $('#commonmodal').modal("hide");
                    });
                    $("#destinationcountries_save").click(function() {
                        var data  = $("#destinationcountries_input").val();
                        $.ajax({
                            type: 'post',
                            url: '{{ route('add.record') }}',
                                data:{
                                    tab :tab,
                                    name:data,
                                },
                                success:function(data){
                                    // alert(data);
                                    // if(data!=""){
                                        iziToast.success({timeout: 5000, icon: 'fa fa-check', title: 'OK', message: 'Destination Country is saved'});
                                        $('#commonmodal').modal("hide");
                                        location.reload();
                                    // }
                                },
                                error:function(data){
                                    $name = $(".error-message").html('<strong class="text-danger" >Name already taken</strong>');
                                }
                        });
                    });
                }
           });
    });
</script>
{{-- destination ports --}}
<script>
    $("#destinationportpopup").click(function() {
        var tab  = $(this).attr("tab");
        // alert(tab)
        $.ajax({
            type: 'post',
            url: '{{ route('destination.port') }}',
                data:{tab :tab},
                success:function(data){
                    $('#common_body').html(data);
                    $('#commonmodal').modal("show");
                    $("#close_modal").click(function() {
                        $('#commonmodal').modal("hide");
                    });
                    $("#destinationport_save").click(function() {
                        var data  = $("#destinationport_input").val();
                        $.ajax({
                            type: 'post',
                            url: '{{ route('add.record') }}',
                                data:{
                                    tab :tab,
                                    name:data,
                                },
                                success:function(data){
                                    // alert(data);
                                    // if(data!=""){
                                        iziToast.success({timeout: 5000, icon: 'fa fa-check', title: 'OK', message: 'Destination Port is saved'});
                                        $('#commonmodal').modal("hide");
                                        location.reload();
                                    // }
                                },
                                error:function(data){
                                    $name = $(".error-message").html('<strong class="text-danger" >Name already taken</strong>');
                                }
                        });
                    });
                }
           });
    });
</script>
{{-- make ports --}}
<script>
    $("#makepopup").click(function() {
        var tab  = $(this).attr("tab");
        // alert(tab)
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
                }
           });
    });
</script>
{{-- model ports --}}
<script>
    $("#modelpopup").click(function() {
        var tab  = $(this).attr("tab");
        // alert(tab)
        $.ajax({
            type: 'post',
            url: '{{ route('model.list') }}',
                data:{tab :tab},
                success:function(data){
                    $('#common_body').html(data);
                    $('#commonmodal').modal("show");
                    $("#close_modal").click(function() {
                        $('#commonmodal').modal("hide");
                    });
                }
           });
    });
</script>
{{-- color ports --}}
<script>
    $("#colorpopup").click(function() {
        var tab  = $(this).attr("tab");
        // alert(tab)
        $.ajax({
            type: 'post',
            url: '{{ route('color.list') }}',
                data:{tab :tab},
                success:function(data){
                    $('#common_body').html(data);
                    $('#commonmodal').modal("show");
                    $("#close_modal").click(function() {
                        $('#commonmodal').modal("hide");
                    });
                }
           });
    });
</script>
{{-- title ports --}}
<script>
    $("#titlepopup").click(function() {
        var tab  = $(this).attr("tab");
        // alert(tab)
        $.ajax({
            type: 'post',
            url: '{{ route('title.list') }}',
                data:{tab :tab},
                success:function(data){
                    $('#common_body').html(data);
                    $('#commonmodal').modal("show");
                    $("#close_modal").click(function() {
                        $('#commonmodal').modal("hide");
                    });
                    $("#title_save").click(function() {
                        var data  = $("#title_input").val();
                        $.ajax({
                            type: 'post',
                            url: '{{ route('add.record') }}',
                                data:{
                                    tab :tab,
                                    name:data,
                                },
                                success:function(data){
                                    // alert(data);
                                    // if(data!=""){
                                        iziToast.success({timeout: 5000, icon: 'fa fa-check', title: 'OK', message: 'Title is saved'});
                                        $('#commonmodal').modal("hide");
                                        location.reload();
                                    // }
                                },
                                error:function(data){
                                    $name = $(".error-message").html('<strong class="text-danger" >Name already taken</strong>');
                                }
                        });
                    });
                }
           });
    });
</script>
{{-- key ports --}}
<script>
    $("#keypopup").click(function() {
        var tab  = $(this).attr("tab");
        // alert(tab)
        $.ajax({
            type: 'post',
            url: '{{ route('key.list') }}',
                data:{tab :tab},
                success:function(data){
                    $('#common_body').html(data);
                    $('#commonmodal').modal("show");
                    $("#close_modal").click(function() {
                        $('#commonmodal').modal("hide");
                    });
                }
           });
    });
</script>
{{-- auction ports --}}
<script>
    $("#auctionpopup").click(function() {
        var tab  = $(this).attr("tab");
        // alert(tab)
        $.ajax({
            type: 'post',
            url: '{{ route('auction.list') }}',
                data:{tab :tab},
                success:function(data){
                    $('#common_body').html(data);
                    $('#commonmodal').modal("show");
                    $("#close_modal").click(function() {
                        $('#commonmodal').modal("hide");
                    });
                    $("#auction_save").click(function() {
                        var data  = $("#auction_input").val();
                        $.ajax({
                            type: 'post',
                            url: '{{ route('add.record') }}',
                                data:{
                                    tab :tab,
                                    name:data,
                                },
                                success:function(data){
                                    // alert(data);
                                    // if(data!=""){
                                        iziToast.success({timeout: 5000, icon: 'fa fa-check', title: 'OK', message: 'Title is saved'});
                                        $('#commonmodal').modal("hide");
                                        location.reload();
                                    // }
                                },
                                error:function(data){
                                    $name = $(".error-message").html('<strong class="text-danger" >Name already taken</strong>');
                                }
                        });
                    });
                }
           });
    });
</script>
5:02
{{-- vehicle ports --}}
<script>
    $("#vehiclepopup").click(function() {
        var tab  = $(this).attr("tab");
        // alert(tab)
        $.ajax({
            type: 'post',
            url: '{{ route('vehicle.list') }}',
                data:{tab :tab},
                success:function(data){
                    $('#common_body').html(data);
                    $('#commonmodal').modal("show");
                    $("#close_modal").click(function() {
                        $('#commonmodal').modal("hide");
                    });
                }
           });
    });
</script>
{{-- shippment ports --}}
<script>
    $("#shippmentpopup").click(function() {
        var tab  = $(this).attr("tab");
        // alert(tab)
        $.ajax({
            type: 'post',
            url: '{{ route('shippment.list') }}',
                data:{tab :tab},
                success:function(data){
                    $('#common_body').html(data);
                    $('#commonmodal').modal("show");
                    $("#close_modal").click(function() {
                        $('#commonmodal').modal("hide");
                    });
                }
           });
    });
</script>
