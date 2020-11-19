<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use Illuminate\Support\Facades\Mail;
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

// Auth::routes(['verify'=>true]);

// Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/login', 'UserAuthController@login')->middleware('alreadyLoggedIn');

Route::get('/register', 'UserAuthController@register')->middleware('alreadyLoggedIn');

Route::post('/create', 'UserAuthController@create')->name('auth.create');

Route::post('/check', 'UserAuthController@check')->name('auth.check');

Route::get('/profile', 'UserAuthController@profile')->middleware('authCheck');

Route::get('/logout', 'UserAuthController@logout');




Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function() {
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);  // all names prefixed in route:list with admin


});
