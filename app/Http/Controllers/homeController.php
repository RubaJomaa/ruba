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
    $user = Auth::user();
    $questions = [];
    $topics = \App\Topic::get();
    $user_topics = \App\User_Topic::where([
                                        ['user_id',$user->id],
                                        ['added', 1]
                                        ])
                                  ->join('topics', 'users_topics.topic_id', '=', 'topics.id')
                                  ->get();
    foreach ($user_topics as $topic) {
      $questions_of_topic = \App\Question::where('topic_id',$topic->id)->get()->reverse();
      foreach ($questions_of_topic as $question) {
        $user_of_question = \App\User::where('id',$question->user_id)->first();
        $question['user'] = $user_of_question;
        array_push($questions, $question);
      }
    }

    //collect the $questions in a Laravel Collection, sort them by created_at field,
    //reverse them to get them from the latest to the earliest, and get them all
    $questions = collect($questions)->sortBy('created_at')->reverse()->values()->all();
    $stream_type = 'Your Feed';
    return view('home',compact(['topics', 'stream_type', 'user_topics','questions','user_of_question']));
  }

  public function getStreamOfType(Request $request, $stream_type)
  {
    return response()->json(['stream_type' => $stream_type]);
  }

}
