@extends('layouts.base')
@section('content')
<div id="fix-for-navbar-fixed-top-spacing" style="height: 120px;">&nbsp;</div>

<div class="card bg-dark text-white">
    <h3 class="display-8" style="text-align:center;">User Info</h3>
</div>

<table style="vertical-align: middle;background-color:#E6E6FA;font-size:24px;text-align:center;"
    class="table table-striped ">
    <thead>
        <tr>
            <th>Name</th>
            <th>Boss</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$user->name}}</td>
            @if(is_null($user->boss))
            <td>No boss</td>
            @else
            <td>{{$user->boss->name}}</td>
            @endif
        </tr>
    </tbody>
</table>
<div class="card bg-dark text-white">
    <h3 class="display-8" style="text-align:center;">Meta-data</h3>
</div>
<table style="vertical-align: middle;background-color:#E6E6FA;font-size:24px;text-align:center;"
    class="table table-striped ">
    <thead>
        <tr>
            <th>Name</th>
            <th>Value</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user->metadata as $meta)
        <tr>
            <td>{{$meta->name}}</td>
            <td>{{$meta->value}}</td>
            <td>
                <form action="{{ route('metadata.destroy', $meta->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
<div class="card bg-dark text-white">
    <h3 class="display-8" style="text-align:center;">Employees</h3>
</div>
<table style="vertical-align: middle;background-color:#E6E6FA;font-size:24px;text-align:center;"
    class="table table-striped ">
    <thead>
        <tr>
            <th>Name</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user->employees as $employee)
        <tr>
            <td>{{$employee->name}}</td>
            <td><a href="{{ route('users.unhire', ['boss' => $user, 'employee' => $employee])}}"
                            class="btn btn-primary">Unhire employee</a></td>
        </tr>
        @endforeach

    </tbody>
</table>
<form style="text-align:center;" action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <p style="text-align:center;"><button type="submit" class="btn btn-danger">Delete User</button></p>
</form>
<p style="text-align:center;"><a href="{{ route('users.edit', $user->id) }}" style="width:200px"
        class="btn btn-primary">Edit</a></p>

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
                @foreach ($users->where('boss_id', '!=' ,$user->id)->where('id', '!=' ,$user->id) as $employee)
                <tr>
                    <td>{{$employee->name}}</td>
                    <td><a href="{{ route('users.hire', ['boss' => $user, 'employee' => $employee])}}"
                            class="btn btn-primary">Hire employee</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>




        <div id="fix-for-navbar-fixed-bottom-spacing" style="height: 320px;">&nbsp;</div>

        @endsection