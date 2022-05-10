<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
// Admin
Route::get('/', 'HomeController@index');

// Login
Route::get('login', 'LoginController@showLoginForm');
Route::post('', 'LoginController@login');
Route::post('logout', 'LoginController@logout');

//AllClassSection
Route::get('/all_course', 'AllCourseController@getAllCourse');
//getCourseInRegis
Route::get('/registration_course', 'RegisCourseController@getCourseInRegis');

// Schedule
Route::get('/schedule', 'ScheduleController@getSchedule');

// Faculty
Route::resource('/faculty', 'FacultyController');

// Major
Route::resource('/major', 'MajorController');

//  Class
Route::resource('/class', 'ClassController');

//  Course
Route::resource('course', 'CourseController');

//  Semester
Route::resource('semester', 'SemesterController');

//  ClassSection
Route::resource('class_section', 'ClassSectionController');

//  User
Route::resource('user', 'UserController');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
