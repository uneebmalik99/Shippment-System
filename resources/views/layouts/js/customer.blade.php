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

    // function changeImages(id) {
    //     // alert(tab);
    //     $id = $('#' + id).attr('tab');
    //     $tab = id;


    //     $.ajax({
    //         type: 'post',
    //         url: '{{ URL::to('admin/vehicle/vehicle_changeImages') }}',
    //         data: {
    //             'tab': $tab,
    //             'id': $id,
    //         },
    //         success: function(data) {
    //             // alert(data);
    //             console.log(data);
    //             $('.changeImages').html(data);
    //         }
    //     });

    // }


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
            },
            error: function(response) {
                $('#name_error').text('*');
                $('#username_error').text('*');
                $('#password_error').text('*');
                $('#phone_error').text('*');
                $('#fax_error').text('*');
                $('#email_error').text('*');
                $('#source_error').text('*');
                $('#company_name_error').text('*');
                $('#company_email_error').text('*');
                $('#customer_type_error').text('*');
                $('#sales_type_error').text('*');
                $('#payment_type_error').text('*');
                $('#payment_term_error').text('*');
                $('#industry_error').text('*');
                $('#sales_person_error').text('*');
                $('#inside_person_error').text('*');
                $('#level_error').text('*');
                $('#location_number_error').text('*');
                $('#country_error').text('*');
                $('#zip_code_error').text('*');
                $('#state_error').text('*');
                $('#address_line1_error').text('*');
                $('#address_line2_error').text('*');
                $('#price_code_error').text('*');
            }
        });
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
                            iziToast.success({
                            zindex: '9999999999999',
                            position: 'topCenter',
                            title: 'Deleted',
                            message: data,
                });
                setTimeout(function() {
            window.location.reload(true);
        }, 2000);
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

    }

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

    function skip_view(id) {
        $id = id;
        $tab = $('#' + $id).attr('nexttab');
        // alert($tab);
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