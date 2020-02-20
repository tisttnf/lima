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
    return view('auth.login');
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
Route::resource('/sprintproject', 'SprintprojectController');
// Route::resource('/logproject', 'LogprojectController');
// Tim
Route::resource('/tim', 'TimController');
Route::resource('/membertim', 'MembertimController');
// Skor
Route::resource('/timskor', 'TimskorController');
Route::resource('/membertimskor', 'MembertimskorController');