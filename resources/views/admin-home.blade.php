@extends('layouts.admin-layout')

@section('content')

        <div class="row" style="margin-top:2em;">
            <div class="col s12 m4">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title" style="font-weight: bolder">Users</span>
                        <p style="font-weight: bolder">{{'Total Users - '.count($users)}}</p>
                        <table>
                            <thead>
                            <tr>
                                <th>Car Owners</th>
                                <th>Car Valets</th>
                                <th>Franchisees</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                            <td>{{count($car_onwers)}}</td>
                            <td>{{count($car_valets)}}</td>
                            <td>{{ count($franchisees)}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-action">
                        <a href="{{url('users')}}">View Users</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title" style="font-weight: bolder">Pricing</span>
                        <p style="font-weight: bolder">{{'Total Users - '.count($users)}}</p>
                        <table>
                            <thead>
                            <tr>
                                <th>Car Owners</th>
                                <th>Car Valets</th>
                                <th>Franchisees</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{count($car_onwers)}}</td>
                                <td>{{count($car_valets)}}</td>
                                <td>{{ count($franchisees)}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-action">
                        <a href="#">View Pricing</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title" style="font-weight: bolder">Requests</span>
                        <p style="font-weight: bolder">{{'Total Requests - '.count($users)}}</p>
                        <table>
                            <thead>
                            <tr>
                                <th>Car Owners</th>
                                <th>Car Valets</th>
                                <th>Franchisees</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{count($car_onwers)}}</td>
                                <td>{{count($car_valets)}}</td>
                                <td>{{ count($franchisees)}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-action">
                        <a href="#">View Requests</a>
                    </div>
                </div>
            </div>
        </div>

@endsection
