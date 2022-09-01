<div class="card user-card rounded mt-3">
    <div class="px-3 d-flex">
        <h6 class="text-muted"><b>User's Projects List</b></h6>
    </div>
</div>
<div class="bg-light" style="height: 100%;overflow-x: scroll;">
    <table class="table table-hover sortable scroll">
        <thead class="bg-light">
            <th>CUSTOMER NAME</th>
            <th>CUSTOMER ID</th>
            <th>COMAPANY NAME</th>
            <th>ADDRESS 1</th>
            <th>ADDRESS 2</th>
            <th>PHONE</th>
            <th>CITY</th>
            <th>STATE</th>
            <th>COUNTRY</th>
            <th>ZIP CODE</th>
        </thead>
        <tbody>
            {{-- @if (@$user->count() == 0)
                <tr>
                    <td colspan="10" class="h6 text-muted text-center">NO CUSTOMERS TO DISPLAY</td>
                </tr>
            @endif --}}
                <tr>
                    <td>{{ @$user['customer_name'] }}</td>
                    <td>{{ @$user['customer_number'] }}</td>
                    <td>{{ @$user['industry'] }}</td>
                    <td>{{ @$user['address_1'] }}</td>
                    <td>{{ @$user['address_2'] }}</td>
                    <td>{{ @$user['main_phone'] }}</td>
                    <td>{{ @$user['city'] }}</td>
                    <td>{{ @$user['state'] }}</td>
                    <td>{{ @$user['country'] }}</td>
                    <td>{{ @$user['zip_code '] }}</td>
                    {{-- <td>
                        <button>
                            <a href={{ url($module['action'] . '/edit/' . $val[$module['db_key']]) }}>
                                <i class="ti-pencil"></i>
                            </a>
                        </button>
                        <button><a href={{ url($module['action'] . '/delete/' . $val[$module['db_key']]) }}>
                                <i class="ti-trash"></i>
                            </a>
                        </button>
                    </td> --}}
                </tr>
        </tbody>
    </table>
</div>
