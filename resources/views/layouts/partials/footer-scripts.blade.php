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
{{-- Vehicles pagination and filter --}}
{{-- image upload --}}
<script type="text/javascript" src="{{ asset('assets/js/image-uploader.min.js') }}"></script>
<script>
    $('#search_vehicle').on('keyup', function() {
        $value = $(this).val();
        $pagination = $('#pagination_vehicle').val();
        $.ajax({
            type: 'get',
            url: '{{ URL::to('admin/vehicles/search') }}',
            data: {
                'search': $value,
                'pagination': $pagination
            },
            success: function(data) {
                console.log('search working');
                $('#tbody').html(data.table);
                $('#page').html(data.pagination);
            }
        });
    })
    $('#pagination_vehicle').on('change', function() {
        $value = $(this).val();
        $search = $('#search_vehicle').val();
        $.ajax({
            type: 'get',
            url: '{{ URL::to('admin/vehicles/pagination') }}',
            data: {
                'search': $search,
                'pagination': $value
            },
            success: function(data) {
                console.log('pagination working')
                $('#tbody').html(data.table);
                $('#page').html(data.pagination);
            }
        });
    })
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
    $('.profile_tabs').on('click', function() {
        $('.profile_tabs').removeClass('btn btn_custom rounded text-white');
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
    $('#notification_body').on('click', function() {
        $id = $(this).val();
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

{{-- Photos grid js --}}
<script>
    // $(function() {
    //     $i = 1;
    //     $("#fileupload_vehicle").change(function() {
    //         alert('asdaad');
    //         if (typeof(FileReader) != "undefined") {
    //             var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
    //             $($(this)[0].files).each(function() {
    //                 var dvPreview = $("#dvPreview" + $i);
    //                 dvPreview.html("");
    //                 var file = $(this);
    //                 if ($i <= 4) {
    //                     if (regex.test(file[0].name.toLowerCase())) {
    //                         var reader = new FileReader();
    //                         reader.onload = function(e) {
    //                             var img = $("<img />");
    //                             img.attr("style",
    //                                 "height:100px;width: 100px; padding:5px;");
    //                             img.attr("src", e.target.result);
    //                             dvPreview.append(img);
    //                             dvPreview.next().children().removeClass('d-none');
    //                         }
    //                         reader.readAsDataURL(file[0]);
    //                         $i++;
    //                     } else {
    //                         alert(file[0].name + " is not a valid image file.");
    //                         dvPreview.html("");
    //                         return false;
    //                     }
    //                 } else {
    //                     alert('Only 4 images allowed.');
    //                 }
    //             });
    //         } else {
    //             alert("This browser does not support HTML5 FileReader.");
    //         }
    //     });
    // });
</script>

{{-- Delete Image --}}
<script>
    $('.delete').on('click', function() {
        // alert('asdas');
        $image = $(this).parent().prev().children();
        $image.remove();
        $(this).addClass('d-none');
        $i--;
    });
</script>

{{-- Attachment Photo Grid --}}
{{-- <script>
    $(function() {
        $i = 1;
        $("#fileupload_attach").change(function() {
            if (typeof(FileReader) != "undefined") {
                var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
                $($(this)[0].files).each(function() {
                    var dvPreview = $("#dvPreview" + $i);
                    dvPreview.html("");
                    var file = $(this);
                    if ($i <= 15) {
                        if (regex.test(file[0].name.toLowerCase())) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                var img = $("<img />");
                                img.attr("style",
                                    "height:100px;width: 100px; padding:5px; border-radius:15px;"
                                );
                                img.attr("src", e.target.result);
                                dvPreview.append(img);
                                dvPreview.next().children().removeClass('d-none');
                            }
                            reader.readAsDataURL(file[0]);
                            $i++;
                        } else {
                            alert(file[0].name + " is not a valid image file.");
                            dvPreview.html("");
                            return false;
                        }
                    } else {
                        alert('Only 4 images allowed.');
                    }
                });
            } else {
                alert("This browser does not support HTML5 FileReader.");
            }
        });
    });
</script> --}}

{{-- Exit Modal --}}
<script>
    $('.close').on('click', function() {
        $('#exampleModal').modal('hide');
    })
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
        // alert($('#added_by_role').val());
        if (id == "general")
            $data = {
                customer_number: $('#customer_number').val(),
                sales_person: $('#sales_person').val(),
                customer_name: $('#customer_name').val(),
                inside_person: $('#inside_person').val(),
                level: $('#level').val(),
                lead: $('#lead').val(),
                status: $('#status').val(),
                main_phone: $('#main_phone').val(),
                payment_type: $('#payment_type').val(),
                main_fax: $('#main_fax').val(),
                payment_term: $('#payment_term').val(),
                customer_email: $('#customer_email').val(),
                industry: $('#industry').val(),
                price_code: $('#price_code').val(),
                source: $('#source').val(),
                customer_type: $('#customer_type').val(),
                sales_type: $('#sales_type').val(),
                round: $('#round').val(),
                location_number: $('#location_number').val(),
                country: $('#country').val(),
                zip_code: $('#zip_code').val(),
                state: $('#state').val(),
                address_1: $('#address_1').val(),
                address_2: $('#address_2').val(),
                add_by_email: $('#add_by_email').val(),
                added_by_role: $('#added_by_role').val(),
            };
        else if (id == "billing")
            $data = {
                first_name: $('#first_name').val(),
                company_name: $('#company_name').val(),
                country: $('#country').val(),
                last_name: $('#last_name').val(),
                company_email: $('#company_email').val(),
                city: $('#city').val(),
                phone: $('#phone').val(),
                address: $('#address').val(),
                zip_code: $('#zip_code').val(),
                foreign_passport_number: $('#foreign_passport_number').val(),
                identification_number: $('#identification_number').val(),
                expiry_date: $('#expiry_date').val(),
                shipping: $('.shipping:checked').val(),
                shipment_type: $('.shipment_type:checked').val(),
                purchased_from: $('.purchased_from:checked').val(),
                request_pickup: $('.request_pickup:checked').val(),
                end_use: $('.end_use:checked').val(),
                buyer_number: $('#buyer_number').val(),
                customer_email: $('#customer_email').val(),
            };
        else if (id == "shipper")
            $data = {
                shipper_name: $('#shipper_name').val(),
                contact_person_name: $('#contact_person_name').val(),
                phone: $('#phone').val(),
                company_email: $('#company_email').val(),
                country: $('#country').val(),
                city: $('#city').val(),
                zip_code: $('#zip_code').val(),
                address: $('#address').val(),
                consignee: $('.consignee:checked').val(),
                consolidate: $('.consolidate:checked').val(),
                original_shipping_documents: $('.original_shipping_documents:checked').val(),
                insurance: $('.insurance:checked').val(),
                destination_port: $('.destination_port:checked').val(),
                customer_email: $('#customer_email').val(),
            };
        else if (id == "quotation")
            $data = {
                destination_port: $('#destination_port').val(),
                valid_from: $('#valid_from').val(),
                valid_till: $('#valid_till').val(),
                container_size: $('#container_size:selected').val(),
                vehicle: $('#vehicle').val(),
                loading_port: $('#loading_port').val(),
                shipping_line: $('#shipping_line').val(),
                default: $('#default').val(),
                special_rate: $('#special_rate').val(),
                customer_email: $('#customer_email').val(),
            };
        else
            alert('no tab');

        $.ajax({
            type: 'post',
            url: '{{ URL::to('admin/customers/create') }}/' + $tab,
            data: {
                tab: $tab,
                data: $data,
            },
            success: function(data) {
                $('.modal-body').html(data.view);
                $('#exampleModal').modal('show');
            }
        });
    }
</script>

<script>
    function slide(id) {
        if (id == "client") {
            $("#client_body").slideToggle();
        } else {
            $("#shipper_body").slideToggle();
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
    function create_vehicle_form() {
        $('#vehicle_form').on('submit', function(event) {
            event.preventDefault();
            var formData = new FormData(jQuery('#vehicle_form')[0]);
            $.ajax({
                method: 'POST',
                url: '{{ URL::to('admin/vehicles/create_form') }}',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    alert(data.result);
                    $('.modal-body').html(data.view);
                    $('#exampleModal').modal('show');
                    // console.log(data);
                }
            });
        });
    }
</script>
