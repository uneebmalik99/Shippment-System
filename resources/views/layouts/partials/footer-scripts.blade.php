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
{{-- Multiple image upload --}}
<script src="{{ asset('assets/pages/jquery.filer/js/jquery.filer.min.js') }}"></script>
<script src="{{ asset('assets/pages/filer/custom-filer.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/pages/filer/jquery.fileuploads.init.js') }}" type="text/javascript"></script>
{{-- Vehicles pagination and filter --}}
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
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'csrftoken': '{{ csrf_token() }}'
        }
    });
</script>
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
                console.log($value, $pagination, 'search');
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
