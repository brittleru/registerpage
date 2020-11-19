<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
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

Route::get('/login', 'UserAuthController@login')->middleware('alreadyLoggedIn');

Route::get('/register', 'UserAuthController@register')->middleware('alreadyLoggedIn');

Route::post('/create', 'UserAuthController@create')->name('auth.create');

Route::post('/check', 'UserAuthController@check')->name('auth.check');

Route::get('/profile', 'UserAuthController@profile')->middleware('authCheck');

Route::get('/logout', 'UserAuthController@logout');
