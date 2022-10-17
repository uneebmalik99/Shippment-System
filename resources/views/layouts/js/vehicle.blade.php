<script>
    $('.vehicle_filtering').on('change', function() {
        $warehouse = $('#vehicle_warehouse').val();
        $year = $('#vehicle_year').val();
        $make = $('#vehicle_make').val();
        $model = $('#vehicle_model').val();
        $status = $('#vehicle_status').val();
        $status_name = $('#vehicle_status').find(":selected").text();
        // alert($make);
        $.ajax({
            type: 'get',
            url: '{{ URL::to('admin/vehicles/filtering') }}',
            data: {
                'warehouse': $warehouse,
                'year': $year,
                'make': $make,
                'model': $model,
                'status': $status,
                'status_name': $status_name,
            },
            success: function(data) {


                if (data.view) {
                    $('#status_body').html(data.view);
                } else {
                    console.log(data);
                    $('#status_body').html(data);
                }
                $('#new_order_table').DataTable({
                    scrollX: true,
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
                $('#dispatched_table').DataTable({
                    scrollX: true,
                    "columnDefs": [{
                        "width": "20%",
                    }],
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
                $('#on_hand_table').DataTable({
                    scrollX: true,
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
                $('#towing_table').DataTable({
                    scrollX: true,
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
                $('#vehicle_filter_table').DataTable({
                    scrollX: true,
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

                $('#no_title').DataTable({
                    scrollX: true,
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
            }
        });
    });
</script>
<script>
    function auction_images() {
        $('#vehicle_auction_form').on('submit', function(event) {
            event.preventDefault();
            var formData = new FormData(jQuery('#vehicle_auction_form')[0]);
            formData.append('tab', 'auction');
            // console.log(formData);
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
        });
    }
</script>
<script>
    function warehouse_images() {
        $('#vehicle_warehouse_form').on('submit', function(event) {
            event.preventDefault();
            var formData = new FormData(jQuery('#vehicle_warehouse_form')[0]);
            formData.append('tab', 'warehouse');
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
                        message: 'Warehouse Images inserted!',
                        timeout: 1500,
                        position: 'topCenter',
                        zindex: '9999999999999',
                    });
                    console.log(data);
                }
            });
        });

    }
</script>
<script>
    function auction_invoice() {
        $('#vehicle_invoice_form').on('submit', function(event) {
            event.preventDefault();
        });
        var formData = new FormData(jQuery('#vehicle_invoice_form')[0]);
        formData.append('tab', 'invoice');
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
                    message: 'Invoice inserted successfully!',
                    timeout: 1500,
                    position: 'topCenter',
                    zindex: '9999999999999',
                });
                console.log(data);
            }
        });


    }
</script>
<script>
    function action_copy() {
        $('#vehicle_copy_form').on('submit', function(event) {
            event.preventDefault();
        });
        var formData = new FormData(jQuery('#vehicle_copy_form')[0]);
        formData.append('tab', 'auction_copy');
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
                    message: 'Auction copy inserted successfully!',
                    timeout: 1500,
                    position: 'topCenter',
                    zindex: '9999999999999',
                });
                console.log(data);
            }
        });
    }
</script>
<script>
    function display_model() {
        iziToast.success({
            title: 'Success',
            message: 'Vehicle Created Successfully!',
            position: 'topCenter',
            zindex: '9999999999999',
        });
        $('#exampleModal').modal('hide');
        setTimeout(function() {
            window.location.reload(true);
        }, 2000);
    }
</script>
<script>
    $('.vehicle_information_tab').on('click', function() {
        $id = $(this).attr('id');
        $tab = $(this).attr('tab');
        $('.vehicle_information_tab').removeClass('active_information_button col-3');
        $('.vehicle_information_tab').addClass('col-2');
        $(this).removeClass('col-2');
        $(this).addClass('active_information_button col-3');
        $.ajax({
            type: 'get',
            url: '{{ URL::to('admin/vehicle/vehicle_informationTab') }}',
            data: {
                'tab': $tab,
                'id': $id,
            },
            success: function(data) {
                $('#vehicle_information_main').html(data);
            }
        });
    });

    function changeImages(id) {
        $id = $('#' + id).attr('tab');
        $tab = id;
        // alert(id);

        $('.img_btn').removeClass('img_active_button');
        $('.img_btn').addClass('image_button');
        $('#' + id).addClass('img_active_button');
        $('#' + id).removeClass('image_button');

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


    function fetchVehicles(id) {
        $tab = $('#' + id).attr('tab');
        $id = id;
        $.ajax({
            type: 'post',
            url: '{{ URL::to('admin/vehicle/fetchVehciles') }}',
            data: {
                'tab': $tab,
                'id': $id,
            },
            success: function(data) {
                console.log(data);

                $('#status_body').html(data.view);

                $('#new_order_table').DataTable({
                    scrollX: true,
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
                $('#dispatched_table').DataTable({
                    "columnDefs": [{
                        "width": "20%",

                    }],
                    scrollX: true,
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
                $('#on_hand_table').DataTable({
                    scrollX: true,
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
                $('#no_title').DataTable({
                    scrollX: true,
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
                $('#towing_table').DataTable({
                    scrollX: true,
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
                $('#vehicle_filter_table').DataTable({
                    scrollX: true,
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
            }
        });
    }
</script>
{{-- edit vehicle info --}}
<script>
    function updatevehicle(id) {
        $id = id;
        $.ajax({
            type: 'get',
            url: '{{ URL::to('admin/vehicles/update') }}/' + $id,
            data: {
                'id': $id
            },
            processData: false,
            contentType: false,
            success: function(data) {
                console.log(data);
                $('.modal-body').html(data);
                $('#exampleModal').modal('show');
                $('.user_image').imageUploader({
                    maxFiles: 1
                });


            }
        });
    }

    $(document).on('click', 'input[name="main_checkbox"]', function() {
        if (this.checked) {
            $('input[name="checkboxes"]').each(function() {
                this.checked = true;
            })
        } else {
            $('input[name="checkboxes"]').each(function() {
                this.checked = false;
            })

        }
        toggleDeleteAllBtn();
    })

    $(document).on('change', 'input[name="checkboxes"]', function() {
        if ($('input[name="checkboxes"]').length == $('input[name="checkboxes"]:checked').length) {
            $('input[name="main_checkbox"]').prop('checked', true);
        } else {
            $('input[name="main_checkbox"]').prop('checked', false);

        }
        toggleDeleteAllBtn();
    })


    function toggleDeleteAllBtn() {
        if ($('input[name="checkboxes"]:checked').length > 0) {
            $('button#deleteAllbtn').text('Delete (' + $('input[name="checkboxes"]:checked').length + ')').removeClass(
                'd-none');
        } else {
            $('#deleteAllbtn').addClass('d-none');
        }
    }


    $(document).on('click', '#deleteAllbtn', function() {
        var deleteAllid = [];
        $('input[name="checkboxes"]:checked').each(function() {
            deleteAllid.push($(this).data('id'));
        });
        $.ajax({
            type: 'post',
            url: '{{ route('Vehicle.SelectedDelete') }}',
            data: {
                ids: deleteAllid
            },
            success: function(data) {
                iziToast.warning({
                    title: 'Vehicle',
                    message: data.success,
                    position: 'topCenter',
                    zindex: '9999999999999',
                });


                setTimeout(function() {
                    window.location.reload(true);
                }, 2000);


            }
        });



    });


    function vehicle_attachments(){
        var formData = new FormData(jQuery('#vehicle_attacments')[0]);

        $.ajax({
                method: 'POST',
                url: '{{ URL::to('admin/vehicles/attachments') }}',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    console.log(data);
                    $('#exampleModal').modal('hide');
                    iziToast.success({
                        title: 'Success',
                        message: 'Images inserted !',
                        timeout: 1500,
                        position: 'topCenter',
                        zindex: '9999999999999',
                    });
                setTimeout(function() {
                    window.location.reload(true);
                }, 2000);

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
