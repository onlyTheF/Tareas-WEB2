@extends('layouts.master')
@section('title', 'Delete Professor')
@section('content')
<div class="container">
    <h2>Delete Professor</h2>
    {{ Form::open(array('url' => '/professors', 'method' => 'DELETE')) }}
        @csrf
        <input type="hidden" name="id" value="{{ $professor->id }}" />
        <input type="submit" value="Seeend" />
    {{ Form::close() }}
</div>
@stop