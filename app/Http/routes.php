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
  Route::get('/home/filter/{stream_type}/{topic_id}', 'HomeController@getStreamOfType');
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
  //Route::get('/postQuestion','questionController@getQuestions'); // to show questions
  Route::get('/question/{questionID}','questionController@getQuestion');
  Route::patch('/question/{questionID}','questionController@editQuestion'); //if i post a question then i want to edit it
  Route::delete('/question/{questionID}','questionController@deleteQuestion'); // if i want to delete my question

  Route::post('/question/{questionID}/answers','AnswersController@postAnswer');//to answer a specific question

  Route::post('/question/{questionID}/library','questionController@postToLibrary'); //to add question to a library

 // Route::delete('/question/{questionID}/answers/{answer_id}','AnswersController@deleteAnswer');// to delete answer
 // Route::patch('/question/{questionID}/answers/{answer_id}','AnswersController@editAnswer');// to edit your answer
  Route::post('/question/{questionID}/answer/{answerID}/like','likesController@postLike');// to like an answer

// users
  Route::get('/users', 'UsersController@index');
  Route::post('/users/namesstartwith/{string}', 'UsersController@getUsersOfNamesStartingWith');

  Route::get('/groups', 'GroupsController@index');
  Route::get('/group/{group_id}', 'GroupsController@getGroup');
  Route::get('/groups/new/{question_id}/wizard', 'GroupsController@getGroupWizard');
  Route::post('/groups/new/{question_id}/wizard', 'GroupsController@createGroup');
  Route::post('/group/{group_id}/library', 'GroupsController@toggleOpinionLibrary');
  Route::get('/articles', 'ArticlesController@index');
  Route::get('/group/{group_id}/article', 'ArticlesController@getArticleComposition');
  Route::get('/article/{article_id}/json', 'ArticlesController@getArticleJSON');
  Route::get('/article/{id}', 'ArticlesController@getArticle');
  Route::post('/article/{article_id}', 'ArticlesController@updateArticle');
  Route::post('/article/{article_id}/publish', 'ArticlesController@publishArticle');

  //for profile
  Route::get('/profile/{username}' ,'profileController@getProfile');
  //for profile info
  Route::get('/profile/{username}/profile-info','profileController@getProfileInfo');
  Route::post('/profile/{username}/profile-info' ,'profileController@storeProfileInfo');
  Route::patch('/profile/{username}/profile-info' ,'profileController@updateProfileInfo');

  //for user topics
  Route::get('/profile/{username}/user_topics','profileController@getUserTopics');
  Route::post('/profile/{username}/user_topics/add', 'profileController@addUserTopic');
  Route::delete('/profile/{username}/user_topics/delete', 'profileController@deleteUserTopic');

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

  Route::get('/profile/{username}/library','profileController@getLibrary'); // to get the library page

// topics
  Route::get('/topics', 'TopicsController@getTopics');
  Route::post('/topics', 'TopicsController@addTopic');
  Route::delete('/topics', 'TopicsController@deleteTopic');
  Route::patch('/topics', 'TopicsController@updateTopic');
  Route::post('/checkInteractivityFactor', 'TopicsController@checkInteractivityFactor');

});
