@extends('layouts.master')
@section('title', 'Professor List')

@section('content')
<h2>Professor List</h2>

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
                address
            </th>
            <th>
                salary
            </th>
        </tr>
    </head>
    <tbody>
        @foreach ($professors as $professor)
        <tr>
            <td>
                {{ $professor->firstName }}
            </td>
            <td>
                {{ $professor->lastName }}
            </td>
            <td>
                {{ $professor->city }}
            </td>
            <td>
                {{ $professor->address }}
            </td>
            <td>
                {{ $professor->salary  }}
            </td>
            <td>
                <a href="/professors/{{ $professor->id }}">Edit</a>
                {{ Form::open(array('url' => '/professors', 'method' => 'DELETE')) }}
                    @csrf
                    <a href="/professorsDelete/{{ $professor->id }}">Delete</a>
                {{ Form::close() }}

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="/professorsAdd" class="btn btn-dark">New Professor</a>
@stop