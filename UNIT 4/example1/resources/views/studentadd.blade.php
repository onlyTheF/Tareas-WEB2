@extends('layouts.master')
@section('title', 'New Student')

@section('content')
<div class="container pl-5 pr-5">
    <h2>New Student</h2>
    <form action="/students" method="POST">
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
            <label for="txtSemester">Semester</label>
            <input type="text" class="form-control" id="txtSemester" name="semester" />
        </div>
        <input type="submit" value="Send" class="btn btn-dark" />
        <a href="/students" class="btn btn-dark">Back</a>
    </form>
</div>
@stop