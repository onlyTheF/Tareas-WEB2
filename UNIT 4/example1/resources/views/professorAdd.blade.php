@extends('layouts.master')
@section('title', 'New Professor')

@section('content')
<div class="container pl-5 pr-5">
    <h2>New Professor</h2>
    <form action="/professors" method="POST">
        @csrf
        <div class="form-group">
            <label for="txtFirstName">First name</label>
            <input type="text" class="form-control" id="txtFirstName" name="firstName" />
        </div>
        <div class="form-group">
            <label for="txtLastName">Last name</label>
            <input type="text" class="form-control" id="txtLastName" name="lastName" />
        </div>
        <div class="form-group">
            <label for="txtCity">City</label>
            <input type="text" class="form-control" id="txtCity" name="city" />
        </div>
        <div class="form-group">
            <label for="txtAddress">address</label>
            <input type="text" class="form-control" id="txtAddress" name="address" />
        </div>
        <div class="form-group">
            <label for="txtSalary">salary</label>
            <input type="text" class="form-control" id="txtSalary" name="salary" />
        </div>
        <input type="submit" value="Send" class="btn btn-dark" />
        <a href="/professors" class="btn btn-dark">Back</a>
    </form>
</div>
@stop