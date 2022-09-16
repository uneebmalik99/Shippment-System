<script>
    $('.vehicle_filtering').on('change', function() {
        $warehouse = $('#vehicle_warehouse').val();
        $year = $('#vehicle_year').val();
        $make = $('#vehicle_make').val();
        $model = $('#vehicle_model').val();
        $status = $('#vehicle_status').val();
        // alert($warehouse);
        $.ajax({
            type: 'get',
            url: '{{ URL::to('admin/vehicles/filtering') }}',
            data: {
                'warehouse': $warehouse,
                'year': $year,
                'make': $make,
                'model': $model,
                'status': $status,
            },
            success: function(data) {
                console.log(data);
                $('#vehicle_tbody').html(data.table);
                $('#page').html(data.pagination);
            }
        });
    });
</script>
