<?php

namespace App\Http\Controllers;
use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class questionController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function postQuestion(Request $request)
  {

    if(Request::ajax())
    {
      $data = Request::all();
      print_r($data);
      $title=Request::get('title');
      $question_body=Request::get('question_body');
      $topic_id=Request::get('topic');
      $question = new \App\Question;
      $question->user_id = Auth::user()->id;
      $question->title = $title;
      $question->question_body = $question_body;
      $question->topic_id = $topic_id;
      $question->answered=0;
      $question->answers_count=0;
      $question->save();
      die;
      $user=Auth::user();
      $topics= \App\User_Topic::where('user_id', $user->id)->first();
      $questions = \App\Question::where('topic_id' , $topics->topic_id)->first();
      return view('home', compact(['questions']));
    }
  }

  public function getQuestion()
  {
    $user=Auth::user();
    $topics= \App\User_Topic::where('user_id', $user->id)->first();
    $questions = \App\Question::where('topic_id' , $topics->topic_id)->first();
    return $topics;
    return view('home', compact(['questions']));

  }
  public function editQuestion(){

  }
  public function deleteQuestion(){

  }
  public function getAnswers(){

  }
  public function postAnswer(){

  }
  public function editAnswer(){

  }
  public function deleteAnswer(){

  }

}
