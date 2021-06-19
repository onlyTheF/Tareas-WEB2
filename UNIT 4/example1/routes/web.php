<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\TestController@show');
Route::get('/welcome/{id}', 'App\Http\Controllers\HelloController@welcome');

Route::get('/professors', 'App\Http\Controllers\professorController@getProfessors');
Route::get('/professors/{id}', 'App\Http\Controllers\professorController@getProfessor');
Route::get('/professorsAdd', 'App\Http\Controllers\professorController@showProfessorAdd');
Route::post('/professors', 'App\Http\Controllers\professorController@postProfessor');
Route::put('/professors', 'App\Http\Controllers\professorController@putProfessor');
Route::delete('/professorsDelete/{id}', 'App\Http\Controllers\professorController@DeleteProfessor');
Route::get('/AjaxProfessor', 'App\Http\Controllers\StudentAjaxController@getProfessors');
Route::get('/AjaxProfessor/{id}', 'App\Http\Controllers\StudentAjaxController@getProfessor');
Route::post('/AjaxProfessor', 'App\Http\Controllers\StudentAjaxController@postProfessor');
Route::put('/AjaxProfessor', 'App\Http\Controllers\StudentAjaxController@putProfessor');
Route::delete('/AjaxProfessor/{id}', 'App\Http\Controllers\StudentAjaxController@deleteStudent');



Route::get('/students', 'App\Http\Controllers\StudentController@getStudents');
Route::get('/studentadd', 'App\Http\Controllers\StudentController@showStudentAdd');
Route::get('/studentaddangular', 'App\Http\Controllers\StudentController@showStudentAddAngular');
Route::post('/students', 'App\Http\Controllers\StudentController@postStudent');
Route::get('/students/{id}', 'App\Http\Controllers\StudentController@getStudent');
Route::put('/students', 'App\Http\Controllers\StudentController@putStudent');
Route::get('/ajaxstudents', 'App\Http\Controllers\StudentAjaxController@getStudents');
Route::post('/ajaxstudents', 'App\Http\Controllers\StudentAjaxController@postStudent');
Route::put('/ajaxstudents', 'App\Http\Controllers\StudentAjaxController@putStudent');
Route::delete('/ajaxstudents/{id}', 'App\Http\Controllers\StudentAjaxController@deleteStudent');

Route::get('/resultjson', function () {
    return [
        'firstName' => 'Fabian',
        'lastName' => 'Mendez'
    ];
});

Route::get('/test/{id}', function ($id) {
    $data = [
        'one' => 'You selected one',
        'two' => 'You selected two'
    ];

    if (!array_key_exists($id, $data)) {
        abort(404, 'Not found');
    }

    return $data[$id] ?? "The record doesn't exist";
});

Route::get('/example', function () {
    $data = [
        'one' => 'You selected one',
        'two' => 'You selected two'
    ];

    $id = request('id');

    if (!array_key_exists($id, $data)) {
        abort(404, 'Not found');
    }

    return $data[$id] ?? "The record doesn't exist";
});
