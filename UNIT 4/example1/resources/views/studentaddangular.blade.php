@extends('layouts.master')
@section('title', 'New Student')

@section('content')
<script type="text/javascript">
    var app = angular.module('StudentAddModule', []);
    app.controller('StudentAddController', ($scope, $http) => {
        $scope.student = {};

        $scope.addStudent = () => {
            $http.post('/ajaxstudents', $scope.student).then((result) => {
                console.log(result);
            })
        }
    })
</script>
<div class="container pl-5 pr-5" ng-app="StudentAddModule" ng-controller="StudentAddController">
    <h2>{{ $pagetitle }}</h2>
    <p>
        @{{ student.firstName }}
    </p>
    <form action="/students" method="POST">
        @csrf
        <div class="form-group">
            <label for="txtFirstName">First name</label>
            <input type="text" class="form-control" id="txtFirstName" name="firstName" ng-model="student.firstName" />
        </div>
        <div class="form-group">
            <label for="txtLastName">Last name</label>
            <input type="text" class="form-control" id="txtLastName" name="lastName" ng-model="student.lastName" />
        </div>
        <div class="form-group">
            <label for="txtCity">City</label>
            <input type="text" class="form-control" id="txtCity" name="city" ng-model="student.city" />
        </div>
        <div class="form-group">
            <label for="txtSemester">Semester</label>
            <input type="text" class="form-control" id="txtSemester" name="semester" ng-model="student.semester" />
        </div>
        <input type="button" value="Send" class="btn btn-dark" ng-click="addStudent()" />
        <a href="/students" class="btn btn-dark">Back</a>
    </form>
</div>
@stop