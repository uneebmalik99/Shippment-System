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
        $tab = "attachments";
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
