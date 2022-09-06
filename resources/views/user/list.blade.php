@extends('layouts.partials.mainlayout')
@section('body')

{{-- <div class="px-3 pt-4 pb-2 d-flex justify-content-between">
        <div class="col-6 d-flex align-items-center text-info">
            <span>Show</span>
            <select class="mx-2 form-control border border-info rounded col-2" name="pagination" id="pagination_vehicle">
                <option value="100">100</option>
                <option value="200">200</option>
                <option value="300">300</option>
            </select>
            <span>Entries</span>
        </div>
        <div class="col-6 d-flex justify-content-end">
            <input type="text" class="form-control border border-info rounded col-10" id="search_user" name="search"
                placeholder="Search">
        </div>
    </div> --}}
    <div class="bg-light mt-4" style="height: 100%;overflow-x: scroll;">
        <table class="table table-hover sortable scroll" id="user_table">
            <thead>
                <th class="sorttable_nosort">Sr</th>
                <th>USERNAME</th>
                <th>EMAIL</th>
                <th>STATUS</th>
                <th>CITY</th>
                <th>STATE</th>
                <th>PHONE</th>
                <th>CUSTOMER NAME</th>
                @if(@$role == 1)
                <th class="sorttable_nosort">ACTION</th>
                @endif
            </thead>
            <tbody id="tbody">
                @if (@$records->count() == 0)
                    <tr>
                        <td colspan="10" class="h6 text-muted text-center">NO CUSTOMERS TO DISPLAY</td>
                    </tr>
                @endif
                <?php $i = 1; ?>
                @foreach ($records as $val)
                    <tr>
                        <td>{{ @$i }}</td>
                        <td>{{ @$val['username'] }}</td>
                        <td>{{ @$val['email'] }}</td>
                        <td>{{ @$val['status'] }}</td>
                        <td>{{ @$val['city'] }}</td>
                        <td>{{ @$val['state'] }}</td>
                        <td>{{ @$val['phone'] }}</td>
                        <td>{{ @$val['customer_name'] }}</td>
                        @if($role == 1)
                        <td>
                            <button><a href={{ url($module['action'] . '/edit/' . $val[$module['db_key']]) }}><i 
                                        class="ti-pencil"></i></a></button>
                            <button><a href={{ url($module['action'] . '/delete/' . $val[$module['db_key']]) }}><i class="ti-trash"></i></a></button>
                        </td>
                        @endif
                    </tr>
                    <?php $i++; ?>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- <div class="d-flex justify-content-end p-2" id="page">
        <div>
            <div>
                <p>
                    Displaying {{ $records->count() }} of {{ $records->total() }} user(s).
                </p>
            </div>
            <div>
                {{$records->links()}}
            </div>
        </div>
    </div> --}}
@endsection
