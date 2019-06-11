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

Route::post('login', 'PassportController@login');
Route::post('register', 'PassportController@register');
 
Route::middleware('auth:api')->group(function () {
    Route::post('api/login-username', 'AppLoginController@loginUserName');
    Route::post('api/login-contact', 'AppLoginController@loginContactNumber');

    Route::post('api/register-user', 'AppLoginController@register');

    Route::post('api/get-challenges', 'MainController@showChallenges');
    Route::post('api/get-friends', 'MainController@showFriends');

 
});
