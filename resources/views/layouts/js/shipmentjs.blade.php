<script>
    function create_shipment_form(id) {
        $('#shipment_form').on('submit', function(event) {
            event.preventDefault();
            var formData = new FormData(jQuery('#shipment_form')[0]);
            $.ajax({
                method: 'POST',
                url: '{{ URL::to('admin/shipments/general') }}',
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
                        timeout: 1500,
                        position: 'topCenter',
                        zindex: '9999999999999'
                    });
                }
            });
        });
    }
</script>
