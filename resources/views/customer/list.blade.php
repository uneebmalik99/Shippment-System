@extends('layouts.partials.mainlayout')
@section('body')
    <div>
        <div class="row d-flex justify-content-between py-2">
            <div>
                @if (session('success'))
                    <div class="btn alert alert-success m-0">
                        <span>{{ session('success') }}</span>
                    </div>
                @endif
            </div>
        </div>
        <div class="bg-light px-3 pt-4 pb-2 d-flex justify-content-between">
            <div class="col-5 d-flex align-items-center text-info">
                <span><b>Show</b></span>
                <div class="col-3 d-flex justify-content-center px-1">
                    <select class="form-control border border-info rounded col-10" name="pagination" id="pagination_customer">
                        <option value="100">100</option>
                        <option value="200">200</option>
                        <option value="300">300</option>
                    </select>
                </div>
                <span><b>Entries</b></span>
            </div>
            <div class="col-7 d-flex justify-content-end align-items-center ml-4">
                <div class="col-8 p-0">
                    <input type="text" class="btn border border-info rounded col-12 text-dark text-left"
                        id="search_customer" name="search" placeholder="Search by name, company, phone, email, state...">
                </div>
                <div class="col-3">
                    <a href="{{ url(@$module['action'] . '/create') }}" class="text-white btn btn-info rounded col-12">New<i
                            class="fa fa-user pl-2"></i></a>
                </div>
            </div>
        </div>
        <div class="bg-light" id="sort" style="height: 100%;overflow-x: scroll;">
            <table class="table table-hover sortable scroll">
                <thead class="bg-light">
                    @if (@$records->count() == 0)
                        <tr>
                            <td colspan="9" class="h6 text-muted text-center">NO CUSTOMERS TO DISPLAY</td>
                        </tr>
                    @endif
                    <th class="sorttable_nosort">Sr</th>
                    <th>NAME</th>
                    <th>COMPANY</th>
                    <th>PHONE</th>
                    <th>EMAIL</th>
                    <th>STATE</th>
                    <th>COUNTRY</th>
                    <th>TAX ID</th>
                    <th class="sorttable_nosort">Action</th>
                </thead>
                <tbody id="tbody">
                    @foreach ($records as $val)
                        <tr>
                            <td>{{ @$val['id'] }}</td>
                            <td>{{ @$val['customer_name'] }}</td>
                            <td>{{ @$val['company_name'] }}</td>
                            <td>{{ @$val['phone'] }}</td>
                            <td>{{ @$val['email'] }}</td>
                            <td>{{ @$val['state'] }}</td>
                            <td>{{ @$val['country'] }}</td>
                            <td>{{ @$val['tax_id'] }}</td>
                            <td>
                                <button><a href={{ url(@$module['action'] . '/edit/' . @$val[@$module['db_key']]) }}><i
                                            class="ti-pencil"></i></a></button>
                                <button><a href={{ url(@$module['action'] . '/delete/' . @$val[@$module['db_key']]) }}><i
                                            class="ti-trash"></i></a></button>
                                <button><a href={{ route('customer.profile') . '/' . @$val[@$module['db_key']] }}><i
                                            class="ti-eye"></i></a></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end p-2" id="page">
            <div>
                <div>
                    <p>
                        Displaying {{ $records->count() }} of {{ $records->total() }} customer(s).
                    </p>
                </div>
                <div>
                    {{$records->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
