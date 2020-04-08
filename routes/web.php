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

Route::middleware('guest')->group( function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/admin', 'AdminController@showLoginForm');

    Route::post('/admin', 'AdminController@login')->name('admin.login');
});

Auth::routes();

Route::middleware('auth')->group( function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::post('/profile/avatar', 'ProfileController@update_avatar')->name('profile.avatar');

    Route::resource('profile', 'ProfileController')->except([
        'store', 'show'
    ]);
});

Route::get('/admin/dashboard', 'AdminController@index')->name('admin.dashboard')->middleware('role:admin');


