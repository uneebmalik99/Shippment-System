<script type="text/javascript" src="<?php echo e(asset('assets/bower_components/jquery/js/jquery.min.js'), false); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/bower_components/jquery-ui/js/jquery-ui.min.js'), false); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/bower_components/popper.js/js/popper.min.js'), false); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/bower_components/bootstrap/js/bootstrap.min.js'), false); ?>"></script>

<script src="<?php echo e(asset('assets/js/sorttable.js'), false); ?>"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="<?php echo e(asset('assets/bower_components/jquery-slimscroll/js/jquery.slimscroll.js'), false); ?>">
</script>
<!-- Switch component js -->
<script type="text/javascript" src="<?php echo e(asset('assets/bower_components/switchery/js/switchery.min.js'), false); ?>"></script>
<!-- modernizr js -->
<script type="text/javascript" src="<?php echo e(asset('assets/bower_components/modernizr/js/modernizr.js'), false); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/bower_components/modernizr/js/css-scrollbars.js'), false); ?>"></script>
<!-- classie js -->
<script type="text/javascript" src="<?php echo e(asset('assets/bower_components/classie/js/classie.js'), false); ?>"></script>
<!-- i18next.min.js -->
<script type="text/javascript" src="<?php echo e(asset('assets/bower_components/i18next/js/i18next.min.js'), false); ?>"></script>
<script type="text/javascript"
    src="<?php echo e(asset('assets/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js'), false); ?>"></script>
<script type="text/javascript"
    src="<?php echo e(asset('assets/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js'), false); ?>">
</script>
<script type="text/javascript" src="<?php echo e(asset('assets/bower_components/jquery-i18next/js/jquery-i18next.min.js'), false); ?>">
</script>
<!-- Custom js -->
<script type="text/javascript" src="<?php echo e(asset('assets/js/script.js'), false); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/pages/advance-elements/navbar-elements.js'), false); ?>"></script>
<script src="<?php echo e(asset('assets/js/pcoded.min.js'), false); ?>"></script>
<script src="<?php echo e(asset('assets/js/demo-12.js'), false); ?>"></script>
<script src="<?php echo e(asset('assets/js/jquery.mCustomScrollbar.concat.min.js'), false); ?>"></script>
<script src="<?php echo e(asset('assets/js/jquery.mousewheel.min.js'), false); ?>"></script>
<script src="<?php echo e(asset('js/app.js'), false); ?>" defer></script>
<script type="text/javascript" src="<?php echo e(asset('assets/pages/sticky/js/sticky.js'), false); ?>"></script>

<!--sticky js-->
<script type="text/javascript" src="<?php echo e(asset('assets/pages/sticky/js/trumbowyg.min.js'), false); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/pages/sticky/js/jquery.minicolors.min.js'), false); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/pages/sticky/js/jquery.postitall.js'), false); ?>"></script>

<script src="<?php echo e(asset('assets/pages/jquery.filer/js/jquery.filer.min.js'), false); ?>"></script>
<script src="<?php echo e(asset('assets/pages/filer/custom-filer.js'), false); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/pages/filer/jquery.fileuploads.init.js'), false); ?>" type="text/javascript"></script>

<script>
    $('#search_vehicle').on('keyup', function() {
        $value = $(this).val();
        $pagination = $('#pagination_vehicle').val();
        $.ajax({
            type: 'get',
            url: '<?php echo e(URL::to('admin/vehicles/search'), false); ?>',
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
            url: '<?php echo e(URL::to('admin/vehicles/pagination'), false); ?>',
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

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'csrftoken': '<?php echo e(csrf_token(), false); ?>'
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





<script>
    $('#search_user').on('keyup', function() {
        $value = $(this).val();
        $pagination = $('#pagination_user').val();
        $.ajax({
            type: 'get',
            url: '<?php echo e(URL::to('admin/users/search'), false); ?>',
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
            url: '<?php echo e(URL::to('admin/users/pagination'), false); ?>',
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
            'csrftoken': '<?php echo e(csrf_token(), false); ?>'
        }
    });
</script>



<script>
    $('#search_customer').on('keyup', function() {
        $value = $(this).val();
        $pagination = $('#pagination_customer').val();
        $.ajax({
            type: 'get',
            url: '<?php echo e(URL::to('admin/customers/search'), false); ?>',
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
            url: '<?php echo e(URL::to('admin/customers/pagination'), false); ?>',
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
            'csrftoken': '<?php echo e(csrf_token(), false); ?>'
        }
    });
</script>



<script>
    $('.vehicles').on('click', function() {
        $search = $('#search_vehicle').val();
        $pagination = $('#pagination_vehicle').val();
        $check = $(this).attr('id');
        $.ajax({
            type: 'get',
            url: '<?php echo e(URL::to('admin/vehicles/tabs'), false); ?>',
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

<script>
    $('.locations').on('click', function() {
        $search = $('#search_vehicle').val();
        $pagination = $('#pagination_vehicle').val();
        $check = $('.vehicles').attr('id');
        $location = $(this).attr('id');
        $.ajax({
            type: 'get',
            url: '<?php echo e(URL::to('admin/vehicles/location'), false); ?>',
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
            url: '<?php echo e(URL::to('admin/customers/profile_tab'), false); ?>',
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


<script>
    $('#notification_body').on('click', function() {
        $id = $(this).val();
        $(this).addClass('bg-info border border-light rounded');
        $.ajax({
            type: 'get',
            url: '<?php echo e(URL::to('admin/notifications/status'), false); ?>',
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
    $(function() {
        $i = 1;
        $("#fileupload").change(function() {
            // alert('asdaad');
            if (typeof(FileReader) != "undefined") {
                var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
                $($(this)[0].files).each(function() {
                    var dvPreview = $("#dvPreview" + $i);
                    dvPreview.html("");
                    var file = $(this);
                    if ($i <= 4) {
                        if (regex.test(file[0].name.toLowerCase())) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                var img = $("<img />");
                                img.attr("style",
                                    "height:100px;width: 100px; padding:5px;");
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
</script>


<script>
    $('.delete').on('click', function() {
        // alert('asdas');
        $image = $(this).parent().prev().children();
        $image.remove();
        $(this).addClass('d-none');
        $i--;
    });
</script>


<script>
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
</script>


<script>
    $('.close').on('click', function() {
        $('#exampleModal').modal('hide');
    })
</script>


<script>
    $('.modal_button').on('click', function() {
        $tab = "general";
        $.ajax({
            type: 'get',
            url: '<?php echo e(URL::to('admin/customers/create'), false); ?>',
            data: {
                'tab': $tab
            },
            success: function(data) {
                $('.modal-body').html(data);
                $('#exampleModal').modal('show');
            }
        });
    })
</script>


<script>
    function changemodal(id) {
        $tab = id;
        $.ajax({
            type: 'get',
            url: '<?php echo e(URL::to('admin/customers/create'), false); ?>',
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
            url: '<?php echo e(URL::to('admin/customers/create'), false); ?>/' + $tab,
            data: {
                tab: $tab,
                data: $data,
            },
            success: function(data) {
                alert(data.sresult);
                $('.modal-body').html(data.view);
                $('#exampleModal').modal('show');
            }
        });
    }
</script>
<?php /**PATH C:\xampp\htdocs\TRT\Shippment-System\resources\views/layouts/partials/footer-scripts.blade.php ENDPATH**/ ?>