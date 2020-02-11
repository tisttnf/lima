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
// Support
Route::resource('/prodi', 'ProdiController');
Route::resource('/semester', 'SemesterController');
Route::resource('/peran', 'PeranController');
// Project
Route::resource('/project', 'ProjectController');
Route::resource('/mvpproject', 'MvpprojectController');
// Route::resource('/sprint-project', 'SprintProjectController');
// Route::resource('/log-project', 'LogProjectController');
// 