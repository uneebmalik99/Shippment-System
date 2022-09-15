<script>
    $('#vehicle_search').on('keyup', function() {
        $value = $(this).val();
        $pagination = $('#vehicle_pagination').val();
        $warehouse = $('#vehicle_warehouse').val();
        $.ajax({
            type: 'get',
            url: '{{ URL::to('admin/vehicles/search') }}',
            data: {
                'search': $value,
                'pagination': $pagination
            },
            success: function(data) {
                $('#vehicle_tbody').html(data.table);
                $('#page').html(data.pagination);
            }
        });
    })
</script>

<script>
    $('#vehicle_pagination').on('change', function() {
        $value = $(this).val();
        $.ajax({
            type: 'get',
            url: '{{ URL::to('admin/vehicles/pagination') }}',
            data: {
                'pagination': $value
            },
            success: function(data) {
                console.log(data)
                $('#vehicle_tbody').html(data.table);
                $('#page').html(data.pagination);
            }
        });
    })
</script>

<script>
    $('#vehicle_warehouse').on('change', function() {
        $value = $(this).val();
        $.ajax({
            type: 'get',
            url: '{{ URL::to('admin/vehicles/warehouse') }}',
            data: {
                'warehouse': $value
            },
            success: function(data) {
                $('#vehicle_tbody').html(data.table);
            }
        });
    });
</script>
