@extends('layouts.base')

@section('content')
<div id="fix-for-navbar-fixed-top-spacing" style="height: 140px;">&nbsp;</div>

<div class="card bg-dark text-white">
            <h3 class="display-8" style="text-align:center;">New User</h3>
        </div>
<form style="background-color:#E6E6FA;font-size:20px;font-weight:bold;padding-left:20px" action="{{ route('users.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name"><br>User name: </label>
        <input name="name" maxlength="255" type="text" class="form-control @error('name') is-invalid @enderror"
            id="name" placeholder="Ex: Steve Jobs" value="{{ old('name', '') }}">

        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <br>
    <div class="form-group">
        <label for="meta_name"><br>User meta data: </label><br>
        <input label= "Meta-data name" name="meta_name" maxlength="255" type="text" class="form-control @error('meta_name') is-invalid @enderror"
            id="meta_name" placeholder="Meta data name" value="{{ old('meta_name', '') }}">

        @error('meta_name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
        <input label= "Meta-data value" name="meta_value" maxlength="255" type="text" class="form-control @error('meta_value') is-invalid @enderror"
            id="meta_value" placeholder="Meta data value" value="{{ old('meta_value', '') }}">

        @error('meta_value')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

    </div>
    <br>
    <div class="form-group">
    <p style="text-align:center;"><button type="submit" style="width:200px" class="btn btn-primary">Add new user</button></p>
    </div>
    <div id="fix-for-navbar-fixed-bottom-spacing" style="height: 40px;">&nbsp;</div>

    @endsection