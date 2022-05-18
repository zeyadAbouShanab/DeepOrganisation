@extends('layouts.base')
<div id="fix-for-navbar-fixed-top-spacing" style="height: 70px;">&nbsp;</div>

@section('content')

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="mt-4 p-5 bg-dark text-white ">
            <h1 style="font-family: Monaco">Welcome to the Organisation!</h1>
        </div>
    </div>
</div>
<br>
<div class="card bg-dark text-white">
            <h1 class="display-8" style="font-family: Arial;text-align:center;">Organisation tree</h1>
        </div>
<table style="vertical-align: middle;background-color:#E6E6FA;font-size:16px" class="table">
    <thead>
    @foreach($bosses as $boss)
        <tr>
            <th>
                <ul>
                    <li>{{$boss->name}}</li>
                    @if(count($boss->employees))
                    @include('users.employeesList',['employees' => $boss->employees])
                    @endif
                </ul>
            </th>
        </tr>
        @endforeach
    </thead>
</table>
</div>

<div class="container mt-3 ">
    <div class="container mt-3 ">
        <div class="card bg-dark text-white">
            <h1 class="display-8" style="font-family: Cursive;text-align:center;">Users</h1>
        </div>
        <table style="vertical-align: middle;background-color:#E6E6FA;font-size:16px;text-align:center;"
            class="table table-striped">
            <thead>
                <tr>
                    <th style="width:70%">User Name</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allusers as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td><a href="{{ route('users.show', $user->id) }}" class="btn btn-primary">Show user details</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endsection