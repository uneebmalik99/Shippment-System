<script>
    function create_shipment_form(id) {
        // $('#shipment_form').on('submit', function(event) {
            // event.preventDefault();
            var formData = new FormData(jQuery('#shipment_form')[0]);
            $next_tab = $('.next_tab').attr('id');
            formData.append('tab', $next_tab);
            $.ajax({
                method: 'POST',
                url: '{{ URL::to('admin/shipments/general') }}',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    // console.log(data);
                    $('.modal-body').html(data);
                    $('#exampleModal').modal('show');
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
                    iziToast.success({
                        title: 'Success',
                        message: 'Data inserted successfully!',
                        timeout: 1500,
                        position: 'topCenter',
                        zindex: '9999999999999',
                    });
                },
                error: function() {
                    iziToast.warning({
                        message: 'Failed to insert data!',
                        timeout: 1500,
                        position: 'topCenter',
                        zindex: '9999999999999'
                    });
                }
            });
        // });
    }
</script>

<script>
    $('.shipment_filtering').on('change', function() {
        $port_of_loading = $('#port_of_loading').val();
        $loading_date = $('#loading_date').val();
        $arrival_date = $('#arrival_date').val();
        $destination_port = $('#destination_port').val();
        $.ajax({
            type: 'get',
            url: '{{ URL::to('admin/shipments/filtering') }}',
            data: {
                'port_of_loading': $port_of_loading,
                'loading_date': $loading_date,
                'arrival_date': $arrival_date,
                'destination_port': $destination_port,
            },
            success: function(data) {
                console.log(data);
                $('#shipment_tbody').html(data);
            }
        });

    });
</script>

<script>
    function shipment_images_upload(id) {
        var formData = new FormData(jQuery('#shipment_attachments_form')[0]);
        console.log(...formData);
        $.ajax({
            method: 'POST',
            url: '{{ URL::to('admin/shipment/create_images') }}',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                iziToast.success({
                    title: 'Success',
                    message: 'Data inserted successfully!',
                    timeout: 1500,
                    position: 'topCenter',
                    zindex: '9999999999999',
                });
                setTimeout(function() {
                    window.location.reload(true);
                }, 1500);
            }
        });
    }


    function search_shipment() {
        $search_shipmentText = $('#shipment_search').val();

        $.ajax({
            method: 'POST',
            url: '{{ route('shipments.search_shipment') }}',
            data: {
                'searchText': $search_shipmentText,
            },
            success: function(data) {
                console.log(data);
                $('#shipment_table').html(data);
            }
        });
    }




    function FetchState() {
        $country = $('#loading_country').val();

        $.ajax({
            method: 'POST',
            url: '{{ route('shipments.FetchState') }}',
            data: {
                'country_id': $country,
            },
            success: function(data) {
                console.log(data);
                $('#loading_state').html(data);
            }
        });


    }

    function FetchPort() {
        $state = $('#loading_state').val();

        $.ajax({
            method: 'POST',
            url: '{{ route('shipments.FetchPort') }}',
            data: {
                'state_id': $state,
            },
            success: function(data) {
                console.log(data);
                $('#loading_port').html(data);
            }
        });

    }

    function FetchTerminal() {
        $port = $('#loading_port').val();

        $.ajax({
            method: 'POST',
            url: '{{ route('shipments.FetchTerminal') }}',
            data: {
                'port_id': $port,
            },
            success: function(data) {
                console.log(data);
                $('#loading_terminal').html(data);
            }
        });

    }

    function DestinationState() {
        $country_id = $('#destination_country').val();

        $.ajax({
            method: 'POST',
            url: '{{ route('shipments.FetachDestiState') }}',
            data: {
                'country_id': $country_id,
            },
            success: function(data) {
                console.log(data);
                $('#destination_state').html(data);
            }
        });
    }

    function FetachDestinationPort() {
        $state_id = $('#destination_state').val();

        $.ajax({
            method: 'POST',
            url: '{{ route('shipments.FetachDestiPort') }}',
            data: {
                'state_id': $state_id,
            },
            success: function(data) {
                console.log(data);
                $('#destination_port').html(data);
            }
        });
    }

    function FetchDestiTerimals() {
        $port_id = $('#destination_port').val();

        $.ajax({
            method: 'POST',
            url: '{{ route('shipments.FetachDestiTerminal') }}',
            data: {
                'port_id': $port_id,
            },
            success: function(data) {
                console.log(data);
                $('#destination_terminal').html(data);
            }
        });
    }

    function customer_details() {
        company_name = $('#company_name').val();

        $.ajax({
            method: 'POST',
            url: '{{ route('shipments.customer_details') }}',
            data: {
                'company_name': company_name,
            },
            success: function(data) {
                $('#customer_email').val(data[0]['email']);
                $('#customer_phone').val(data[0]['phone']);
            }
        });
    }

    function add_vehicle(id) {
        var td = event.target.parentNode;
        var tr = td.parentNode; // the row to be removed
        tr.parentNode.removeChild(tr);

        $.ajax({
            method: 'POST',
            url: '{{ route('shipments.add_vehicles') }}',
            data: {
                'id': id,
            },
            success: function(data) {
                $('#add_vehicles').append(data);
            }
        });
    }

    function removerow() {
        // alert('del');
        var td = event.target.parentNode;
        var tr = td.parentNode; // the row to be removed
        tr.parentNode.removeChild(tr);
    }

    function editShipment(id){
        $id = id;

        $.ajax({
            method: 'POST',
            url: '{{ route('shipments.edit') }}',
            data: {
                'id': $id,
            },
            success: function(data) {
                console.log(data);
                // $('.modal-body').html(data);
                $('.modal-body').html(data);
                $('#exampleModal').modal('show');
            }
        });

    }
</script>
