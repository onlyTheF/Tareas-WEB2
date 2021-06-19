@extends('layouts.master')
@section('title', 'Edit Student')
@section('content')
<div class="container">
    <h2>Edit Student</h2>
    {{ Form::open(array('url' => '/students', 'method' => 'PUT')) }}
        @csrf
        <input type="hidden" name="id" value="{{ $student->id }}" />
        <div>
            <label for="txtFirstName">First name</label>
            <input type="text" id="txtFirstName" name="firstName" value="{{ $student->firstName }}" />
        </div>
        <div>
            <label for="txtLastName">Last name</label>
            <input type="text" id="txtLastName" name="lastName" value="{{ $student->lastName }}" />
        </div>
        <div>
            <label for="txtCity">City</label>
            <input type="text" id="txtCity" name="city" value="{{ $student->city }}" />
        </div>
        <div>
            <label for="txtSemester">Semester</label>
            <input type="text" id="txtSemester" name="semester" value="{{ $student->semester }}" />
        </div>
        <input type="submit" value="Send" />
    {{ Form::close() }}
</div>
@stop