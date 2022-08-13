@extends('layouts.partials.mainlayout')
@section('body')
    <div class="row d-flex justify-content-between py-2">
        <div>
            @if (session('success'))
                <div class="btn alert alert-success m-0">
                    <span>{{ session('success') }}</span>
                </div>
            @endif
        </div>
        <div>
            <button class="btn btn-secondary"><a href="{{ url($module['action'] . '/create') }}" class="text-white">New
                    Customer</a></button>
        </div>
    </div>
    <table class="table">
        <thead>
            <th>Sr</th>
            <th>Name</th>
            <th>Company</th>
            <th>Phone</th>
            <th>Email</th>
            <th>State</th>
            <th>Country</th>
            <th>tax_id</th>
            <th>Action</th>
        </thead>
        <tbody>
            {{-- @dd($records) --}}
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
                        <button><a href={{ url($module['action'] . '/edit/' . $val[$module['db_key']]) }}><i
                                    class="ti-pencil"></i></a></button>
                        <button><a href={{ url($module['action'] . '/delete/' . $val[$module['db_key']]) }}><i
                                    class="ti-trash"></i></a></button>
                        <button><a href={{ route('user.profile') .'/'. $val[$module['db_key']] }}><i
                                    class="ti-eye"></i></a></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    @endsection
