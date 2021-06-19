@extends('layouts.master')
@section('title', 'Edit Professor')
@section('content')
<div class="container">
    <h2>Edit Professor</h2>
    {{ Form::open(array('url' => '/professors', 'method' => 'PUT')) }}
        @csrf
        <input type="hidden" name="id" value="{{ $professor->id }}" />
        <div>
            <label for="txtFirstName">First name</label>
            <input type="text" id="txtFirstName" name="firstName" value="{{ $professor->firstName }}" />
        </div>
        <div>
            <label for="txtLastName">Last name</label>
            <input type="text" id="txtLastName" name="lastName" value="{{ $professor->lastName }}" />
        </div>
        <div>
            <label for="txtCity">City</label>
            <input type="text" id="txtCity" name="city" value="{{ $professor->city }}" />
        </div>
        <div>
            <label for="txtAddress">address</label>
            <input type="text" id="txtAddress" name="address" value="{{ $professor->address }}" />
        </div>
        <div>
            <label for="txtSalary">salary</label>
            <input type="text" id="txtSalary" name="salary" value="{{ $professor->salary }}" />
        </div>
        <input type="submit" value="Send" />
    {{ Form::close() }}
</div>
@stop