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
{{-- Vehicles pagination and filter --}}
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
{{-- User pagination and user end --}}

{{-- Customer pagination and filer --}}
<script>
    $('#search_customer').on('keyup', function() {
        $value = $(this).val();
        $pagination = $('#pagination_customer').val();
        $.ajax({
            type: 'get',
            url: '{{ URL::to('admin/customers/search') }}',
            data: {
                'search': $value,
                'pagination': $pagination
            },
            success: function(data) {
                alert(data);
                // console.log($value, $pagination, 'search');
                $('#tbody').html(data.table);
                $('#page').html(data.pagination);
            }
        });
    })
    $('#pagination_customer').on('change', function() {
        $value = $(this).val();
        $search = $('#search_customer').val();
        $.ajax({
            type: 'get',
            url: '{{ URL::to('admin/customers/pagination') }}',
            data: {
                'search': $search,
                'pagination': $value
            },
            success: function(data, page) {
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
{{-- Customer pagination and user end --}}

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
    $('.vehicle_information_tab').on('click', function() {
        $id = $(this).attr('id');
        $tab = $(this).attr('tab');

        $('.vehicle_information_tab').removeClass('active_information_button');
        $(this).addClass('active_information_button');

        $.ajax({
            type: 'get',
            url: '{{ URL::to('admin/vehicle/vehicle_informationTab') }}',
            data: {
                'tab': $tab,
                'id': $id,
            },
            success: function(data) {
                console.log(data);
                $('#vehicle_information_main').html(data);
            }
        });
    });

    function changeImages(id) {
        // alert(tab);
        $id = $('#' + id).attr('tab');
        $tab = id;


        $.ajax({
            type: 'post',
            url: '{{ URL::to('admin/vehicle/vehicle_changeImages') }}',
            data: {
                'tab': $tab,
                'id': $id,
            },
            success: function(data) {
                // alert(data);
                console.log(data);
                $('.changeImages').html(data);
            }
        });

    }

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

{{-- Delete Image
<script>
    $('.delete').on('click', function() {
        // alert('asdas');
        $image = $(this).parent().prev().children();
        $image.remove();
        $(this).addClass('d-none');
        $i--;
    });
</script> --}}

<script>
    $('.close').on('click', function() {
        $('#exampleModal').modal('hide');
    })
</script>

{{-- Load Modal --}}
{{-- <script>
    $('.modal_button').on('click', function() {
        $id = $(this).attr('id');
        // alert('adsaasd');
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
                    $('.input-images-1').imageUploader({
                        maxFiles: 4
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
                    // console.log(data);
                    $('.modal-body').html(data);
                    $('#exampleModal').modal('show');
                    $('#shipment_vehicle_table').DataTable({
                        language: {
                            search: "",
                            sLengthMenu: "_MENU_",
                            searchPlaceholder: "Search"
                        },

                    });
                    $('.shipment-images-1').imageUploader({
                        maxFiles: 4
                    });
                }
            });
        }
    })
</script> --}}
{{-- Load Modal --}}
<script>
    $('.modal_button').on('click', function() {
        $id = $(this).attr('id');
        // alert('adsaasd');
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
                    // console.log(data);
                    $('.modal-body').html(data);
                    $('#exampleModal').modal('show');
                    $('#shipment_vehicle_table').DataTable({
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

{{-- Change Modal --}}
<script>
    function changemodal(id) {
        $tab = id;
        $.ajax({
            type: 'get',
            url: '{{ URL::to('admin/customers/create') }}',
            data: {
                'tab': $tab
            },
            success: function(data) {
                $('.modal-body').html(data);
                $('#exampleModal').modal('show');
            }
        });
    }
</script>

{{-- General data insert --}}
<script>
    function createForm(id) {

        $tab = id;
        $next_tab = $('#' + $tab).data('next');
        if (id == "general_customer") {
            var formData = new FormData(jQuery('#customer_general_form')[0]);
        } else if (id == "billing_customer") {
            var formData = new FormData(jQuery('#customer_billing_form')[0]);
        } else if (id == "shipper_customer") {
            var formData = new FormData(jQuery('#customer_shipper_form')[0]);
        } else if (id == "quotation_customer") {
            var formData = new FormData(jQuery('#customer_quotation_form')[0]);
        } else {
            alert('no tab');
        }

        formData.append('tab', $tab);
        $.ajax({
            type: 'post',
            url: '{{ URL::to('admin/customers/create') }}/' + $tab,
            processData: false,
            contentType: false,
            data: formData,

            success: function(data) {
                iziToast.success({
                    zindex: '9999999999999',
                    position: 'topCenter',
                    title: data.result,
                    message: data.tab,
                });
                console.log(data);
                $('.modal-body').html(data.view);
                $('#exampleModal').modal('show');
                $('.navbar_tab').removeClass('next-style');
                $('.navbar_tab').addClass('tab_style');
                $('#' + $next_tab).addClass('next-style');
                if (data.quotation == 'fade') {
                    // alert('asdassd');
                    $('#exampleModal').modal('hide');
                    location.reload();
                }

            }
        });
    }
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
    function change() {
        if (typeof(FileReader) != "undefined") {
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
            $($(this)[0].files).each(function() {
                var images = $("#images" + $i);
                images.html("");
                var file = $(this);
                alert('asdas');
                if ($i <= 4) {
                    if (regex.test(file[0].name.toLowerCase())) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            var img = $("<img />");
                            img.attr("style",
                                "height:100px;width: 100px; padding:5px;");
                            img.attr("src", e.target.result);
                            images.append(img);
                            images.next().children().removeClass('d-none');
                        }
                        reader.readAsDataURL(file[0]);
                        $i++;
                    } else {
                        alert(file[0].name + " is not a valid image file.");
                        images.html("");
                        return false;
                    }
                } else {
                    alert('Only 4 images allowed.');
                }
            });
        } else {
            alert("This browser does not support HTML5 FileReader.");
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
                    iziToast.success({
                        title: 'Vehicle',
                        message: 'Successfully inserted record!',
                        position: 'topCenter',
                        zindex: '9999999999999',

                    });
                    $('.modal-body').html(data.view);
                    $('#exampleModal').modal('show');
                    $('.vehicle_auction_image').imageUploader({
                        maxFiles: 15
                    });
                    $('.vehicle_warehouse_image').imageUploader({
                        maxFiles: 15
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

    function change_status(id) {

        iziToast.question({
            timeout: 20000,
            close: false,
            overlay: true,
            displayMode: 'once',
            id: 'question',
            zindex: 999,
            title: 'Hey',
            message: 'Are you sure to change Status ?',
            position: 'center',
            buttons: [
                ['<button><b>YES</b></button>', function(instance, toast) {

                    $.ajax({
                        type: 'get',
                        url: "{{ route('customer.changeStatus') }}" + '/' + id,
                        success: function(data) {
                            alert(data);
                            location.reload();
                        }
                    });

                    instance.hide({
                        transitionOut: 'fadeOut'
                    }, toast, 'button');

                }, true],
                ['<button>NO</button>', function(instance, toast) {

                    instance.hide({
                        transitionOut: 'fadeOut'
                    }, toast, 'button');

                }],
            ],
            onClosing: function(instance, toast, closedBy) {
                console.info('Closing | closedBy: ' + closedBy);
            },
            onClosed: function(instance, toast, closedBy) {
                console.info('Closed | closedBy: ' + closedBy);
            }
        });

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
</script>

<script>
    function Update_Customer(id) {
        var data = document.querySelector('#updateCustomers');
        var formData = new FormData(data);
        $.ajax({
            type: 'post',
            url: '{{ route('customers.update') }}',
            processData: false,
            contentType: false,
            data: formData,
            success: function(data) {

                iziToast.success({
                    title: 'Customer',
                    message: data,
                    position: 'topCenter',
                    zindex: '9999999999999',

                });

                $('#exampleModal').modal('hide');
                location.reload();



            }
        });
    }
</script>

<script>
    function filterTable(val) {
        $tab = val;

        $.ajax({
            type: 'post',
            url: '{{ route('customer.FilterTable') }}',
            data: {
                'id': $tab,
            },
            success: function(data) {

                console.log(data);
                $('#tbody').html(data);
            }
        });

    }
</script>
