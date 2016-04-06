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

Route::group(['middleware' => 'web'], function () {
  Route::auth();
  Route::get('/home','HomeController@index');
  Route::get('/','indexController@index');
  //setup
  Route::get('/setup/stepOne','setupController@getStepOne');
  Route::post('/setup/stepOne','setupController@postStepOne');
  Route::get('/setup/stepTwo','setupController@getStepTwo');
  Route::post('/setup/stepTwo','setupController@postStepTwo');
  Route::get('/setup/stepThree','setupController@getStepThree');
  Route::post('/setup/stepThree','setupController@postStepThree');

  //for questions and answers
  Route::post('/postQuestion','questionController@postQuestion'); //if i ask a question it will call this function
  Route::get('/postQuestion','questionController@getQuestion'); // to show questions
  Route::patch('/question/{questionID}','questionController@editQuestion'); //if i post a question then i want to edit it
  Route::delete('/question/{questionID}','questionController@deleteQuestion'); // if i want to delete my question
  Route::get('/question/{questionID}/answers','questionController@getAnswers');// to show answers of specific question
  Route::post('/question/{questionID}/answers','questionController@postAnswer');// to answer a specific question
  Route::delete('/question/{questionID}/answers','questionController@deleteAnswer');// to delete answer
  Route::patch('/question/{questionID}/answers','questionController@editAnswer');// to edit your answer


  //for profile
  Route::get('/profile/{username}' ,'profileController@getProfile');
  //for profile info
  Route::get('/profile/{username}/profile-info','profileController@getProfileInfo');
  Route::post('/profile/{username}/profile-info' ,'profileController@storeProfileInfo');
  Route::patch('/profile/{username}/profile-info' ,'profileController@updateProfileInfo');

  //for CV in profile
  Route::get('/profile/{username}/portfolio','profileController@getPortfolio');
  Route::post('/profile/{username}/portfolio','profileController@storePortfolio');
  Route::patch('/profile/{username}/portfolio','profileController@updatePortfolio');
  //for attachments
  Route::post('/profile/{username}/portfolio/attach', 'profileController@attachToPortfolio');
  //Route::get('/profile/{username}/portfolio/download', 'profileController@download');

  //for contacts info
  Route::get('/profile/{username}/contact-info','profileController@getContact');
  Route::post('/profile/{username}/contact-info','profileController@storeContact');
  Route::patch('/profile/{username}/contact-info','profileController@updateContact');


  //for user's questions Library
  //Route::get('/myLibrary/{$username}','homeController@getLibrary');
  //Route::post('/myLibrary/{$username}','homeController@postLibrary');

  //for calender
  //  Route::get('/calender','homeController@getCalender');
  //  Route::post('/calender','homeController@postCalender'); //for to do list

});
