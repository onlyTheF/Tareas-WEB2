@extends('layouts.master')
@section('title', 'Students List')

@section('content')
<h2>Students List</h2>

<form action="/students" method="GET">
    <label for="txtFirstName">First name</label>
    <input id="txtFirstName" name="firstName" value="{{ $firstName }}" />
    <label for="txtLastName">Last name</label>
    <input id="txtLastName" name="lastName" value="{{ $lastName }}" />
    <label for="txtCity">City</label>
    <input id="txtCity" name="city"  value="{{ $city }}" />
    <label for="txtSemester">Semester</label>
    <input id="txtSemester" name="semester" value="{{ $semester }}" />
    <input type="submit" value="Search" />
</form>

<table class="table table-dark table-striped table-hover">
    <thead>
        <tr>
            <th>
                First name
            </th>
            <th>
                Last name
            </th>
            <th>
                City
            </th>
            <th>
                Semester
            </th>
        </tr>
    </head>
    <tbody>
        @foreach ($students as $student)
        <tr>
            <td>
                {{ $student->firstName }}
            </td>
            <td>
                {{ $student->lastName }}
            </td>
            <td>
                {{ $student->city }}
            </td>
            <td>
                {{ $student->semester }}
            </td>
            <td>
                <a href="/students/{{ $student->id }}">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="/studentadd" class="btn btn-dark">New student</a>
@stop