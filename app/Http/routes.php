<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','indexController@index');    
Route::get('/register','indexController@register');
Route::get('/login','indexController@login');
Route::get('/stepOne','setupController@stepOne');
Route::get('/stepTwo','setupController@stepTwo');
Route::get('/stepThree','setupController@stepThree');
Route::get('/homePage','homeController@homePage');
Route::get('/profile/{$username}','profileController@profile($username)');
Route::get('/editProfileInfo/{$username}','profileController@editProfileInfo($username)');
Route::get('/portfoilo/{$username}','profileController@portfoilo($username)');
Route::get('/calender','homeController@calender');
Route::get('/questions/{$questionID}','questionsController@answerQ($questionID)');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/home','HomeController@index');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/home','HomeController@index');
});
