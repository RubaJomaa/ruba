<?php

namespace App\Http\Controllers;
use App\Topic;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Auth;

class HomeController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('auth');
  }


  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $fields = DB::table('topics')->get();
    $user = Auth::user();
    $questions = [];
    $user_topics = \App\User_Topic::where('user_id',$user->id)->get();
    foreach ($user_topics as $topic) {
      $questions_of_topic = \App\Question::where('topic_id',$topic->id)->get();
      foreach ($questions_of_topic as $question) {
        array_push($questions , $question);
        $user_of_question = \App\User::where('id',$question->user_id)->get();

       //return   $user_of_question;
      }
    }

    return view('home',compact(['fields','questions','user_of_question']));
  }
}
