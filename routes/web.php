<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/student', 'StudentController@index');
Route::post('/student', 'StudentController@index');


Route::get('/viewstdjson', 'StudentController@viewstdjson');
Route::post('/viewstdsjsonpost', 'StudentController@viewstdsjsonpost');
Route::get('/dormfilepdf/{std}', 'StudentController@DormFilePDF');
Route::get('/leavefilepdf/{std}', 'StudentController@LeaveFilePDF');

Route::get('/createstudent', 'StudentController@CreateStudent');
Route::post('/createstudentjson', 'StudentController@createstudentjson');

Route::get('/viewstdadmin', 'StudentController@viewstdadmin');
Route::get('/editstudent/{id}', 'StudentController@editstudent');
Route::post('/EditStudentJson', 'StudentController@EditStudentJson');
Route::post('/delstudentjson', 'StudentController@DelStudentJson');