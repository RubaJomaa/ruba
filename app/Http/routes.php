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
//Route::get('/register','indexController@register');
//Route::get('/login','indexController@login');
Route::get('/stepOne','setupController@getStepOne');
Route::post('/stepOne','setupController@postStepOne');
Route::get('/stepTwo','setupController@getStepTwo');
Route::post('/stepOne','setupController@postStepTwo');
Route::get('/stepThree','setupController@getStepThree');
Route::post('/stepThree','setupController@postStepThree');
            
Route::get('/homePage','homeController@homePage');
Route::get('/profile/{$username}','profileController@profile($username)');
Route::get('/editProfileInfo/{$username}','profileController@editProfileInfo($username)');
Route::post('/editProfileInfo/{$username}','profileController@postEditProfileInfo($username)');
Route::get('/portfoilo/{$username}','profileController@portfoilo($username)');
Route::get('/calender','homeController@calender');
Route::get('/questions/{$questionID}','questionsController@answerQ($questionID)');


//for password reset
/*
Route::get('/password/emial','Auth/PasswordController@getEmail');
Route::post('/password/emial','Auth/PasswordController@postEmail');
Route::get('/password/reset/{token}','Auth/PasswordController@getReset');
Route::post('/password/reset','Auth/PasswordController@postReset');
*/

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
