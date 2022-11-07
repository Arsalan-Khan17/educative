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



Route::get('/logout', 'App\Http\Controllers\UserController@logout')->name('logout');
Route::get('/login', 'App\Http\Controllers\UserController@index')->name('login');
Route::post('/do_login', 'App\Http\Controllers\UserController@login')->name('do_login');

Route::middleware(\App\Http\Middleware\EnsureLogin::class)->group(function () {
    Route::get('/', function () {
        return view('index');
    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/students', [App\Http\Controllers\StudentController::class, 'index'])->name('students');
    Route::get('/user_form', [App\Http\Controllers\UserController::class, 'form'])->name('user_form');
    Route::post('/save_student', [App\Http\Controllers\StudentController::class, 'save'])->name('save_student');
    Route::post('/save_teacher', [App\Http\Controllers\TeacherController::class, 'save'])->name('save_teacher');
    Route::get('/teachers', [App\Http\Controllers\TeacherController::class, 'index'])->name('teachers');
    Route::get('/groups', [App\Http\Controllers\CommonController::class, 'index'])->name('groups');
    Route::get('/subjects', [App\Http\Controllers\CommonController::class, 'index'])->name('subjects');
    Route::get('/sessions', [App\Http\Controllers\CommonController::class, 'index'])->name('sessions');
    Route::post('/save', [App\Http\Controllers\CommonController::class, 'save'])->name('save');
    Route::get('/group_detail/{id}', [App\Http\Controllers\CommonController::class, 'group_detail'])->name('group_detail');

});
