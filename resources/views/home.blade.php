@extends('layouts.user-logged')

@section('content')

    <div class="row" style="margin-top:2em;">

        <div class="col s12 m4">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title" style="font-weight: bolder">Requests</span>
                    <p style="font-weight: bolder">{{'Total Requests - 0'}}</p>
                    <table>
                        <thead>
                        <tr>
                            <th>Completed</th>
                            <th>In Progress</th>
                            <th>Waiting</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-action">
                    <a href="#">View Requests</a>
                </div>
            </div>
        </div>
        <div class="col s12 m4">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title" style="font-weight: bolder">Cars</span>
                    <p style="font-weight: bolder">{{'Total Cars - 0'}}</p>
                    <table>
                        <thead>
                        <tr>
                            <th>SUV</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                           
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-action">
                    <a href="#">View Cars</a>
                    <a href="#">Add Car</a>
                </div>
            </div>
        </div>
    </div>

@endsection
