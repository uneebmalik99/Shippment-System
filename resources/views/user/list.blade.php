@extends('layouts.partials.mainlayout')
@section('body')
    <table class="table">
        <thead>
            <th>Sr</th>
            <th>Username</th>
            <th>Email</th>
            <th>Stauts</th>
            <th>City</th>
            <th>State</th>
            <th>Phone</th>
            <th>Customer Name</th>
            <th>Action</th>
        </thead>
        <tbody>
            {{-- @dd($records) --}}
            @foreach ($records as $val)
                <tr>
                    <td>{{ @$val['id'] }}</td>
                    <td>{{ @$val['username'] }}</td>
                    <td>{{ @$val['email'] }}</td>
                    <td>{{ @$val['status'] }}</td>
                    <td>{{ @$val['city'] }}</td>
                    <td>{{ @$val['state'] }}</td>
                    <td>{{ @$val['phone'] }}</td>
                    <td>{{ @$val['customer_name'] }}</td>
                    <td>
                        <button><a href={{ url($module['action'] . '/edit/' . $val[$module['db_key']]) }}><i
                                    class="ti-pencil"></i></a></button>
                        <button><a href={{ url($module['action'] . '/delete/' . $val[$module['db_key']]) }}><i
                                    class="ti-trash"></i></a></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
