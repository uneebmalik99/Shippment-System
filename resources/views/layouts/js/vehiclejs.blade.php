{{-- <script>
    $('#vehicle_search').on('keyup', function() {
        $value = $(this).val();
        $pagination = $('#vehicle_pagination').val();
        $warehouse = $('#vehicle_warehouse').val();
        $.ajax({
            type: 'get',
            url: '{{ URL::to('admin/vehicles/search') }}',
            data: {
                'search': $value,
                'pagination': $pagination,
                'warehouse': $warehouse,
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
                // $('#vehicle_search').html("");
            }
        });
    })
</script>

<script>
    $('.vehicle_filtering').on('change', function() {
        $warehouse = $('#vehicle_warehouse').val();
        $year = $('#vehicle_year').val();
        $make = $('#vehicle_make').val();
        $.ajax({
            type: 'get',
            url: '{{ URL::to('admin/vehicles/filtering') }}',
            data: {
                'warehouse': $warehouse,
                'year': $year,
                'make': $make
            },
            success: function(data) {
                console.log(data);
                $('#vehicle_tbody').html(data.table);
                $('#page').html(data.pagination);
            }
        });
    });
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
                $('#page').html(data.pagination);

            }
        });
    });
</script>

<script>
    $('#vehicle_year').on('change', function() {
        $value = $(this).val();
        $.ajax({
            type: 'get',
            url: '{{ URL::to('admin/vehicles/year') }}',
            data: {
                'year': $value
            },
            success: function(data) {
                $('#vehicle_tbody').html(data.table);
                $('#page').html(data.pagination);

            }
        });
    });
</script>

<script>
    $('#vehicle_make').on('change', function() {
        $value = $(this).val();
        $.ajax({
            type: 'get',
            url: '{{ URL::to('admin/vehicles/make') }}',
            data: {
                'make': $value
            },
            success: function(data) {
                $('#vehicle_tbody').html(data.table);
                $('#page').html(data.pagination);

            }
        });
    });
</script> --}}

<script type="text/javascript">
    $('#vehicle_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('vehicle.datatable') }}",
        columns: [{
                data: 'Customer Name',
                name: 'customer_name'
            },
            {
                data: 'VIN',
                name: 'vin'
            },
            {
                data: 'YEAR',
                name: 'year'
            },
            {
                data: 'MAKE',
                name: 'make'
            },
            {
                data: 'MODEL',
                name: 'model'
            },
            {
                data: 'VEHICLE TYPE',
                name: 'vehicle_type'
            },
            {
                data: 'STATUS',
                name: 'status'
            },
            {
                data: 'BUYER',
                name: 'buyer'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]
    });
</script>
