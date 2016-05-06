<?php

namespace App\Http\Controllers;
use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Response;

class questionController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function getQuestion($questionID )
  {

    $isMe = false;

    $question = \App\Question::Find($questionID);

      if(Auth::user()->id == $question->user_id){
        $isMe=true;
    }
    $question['user'] = $this->getUserById($question->user_id);
    $question['answers'] = $this->getAnswers($questionID);
    return view('viewsContainer.questions.question', compact(['question','isMe']));
  }

  public function postQuestion(Request $request)
  {
    if(Request::ajax())
    {
      $data = Request::all();
      $title = Request::get('title');
      $question_body = Request::get('question_body');
      $topic_id = Request::get('topic');
      $question = new \App\Question;
      $question->user_id = Auth::user()->id;
      $question->title = $title;
      $question->question_body = $question_body;
      $question->topic_id = $topic_id;
      $question->answered = 0;
      $question->answers_count = 0;
      $question->save();
      return $question;
      die;
    }
  }

  public function editQuestion(Request $request, $id)
  {
    if(Request::ajax())
    {
      $question = \App\Question::find($id);
      if($title = Request::get('title'))
        $question->title = $title;
      else if($question_body = Request::get('question_body'))
        $question->question_body = $question_body;
      /*
        add other else-ifs for other fields, like tagged people
      */
      $question->save();
      die;
    }
  }

  public function deleteQuestion(Request $request, $id)
  {

    $question = \App\Question::find($id);
    $question->delete();
    return redirect('/home');
  }

  private function getUserById($id)
  {
    return \App\User::Find($id);
  }

/*
  This function is gonna be used within the getQuestion
*/
  private function getAnswers($q_id)
  {
    $answers = \App\Answer::where('question_id', $q_id)->get();
    foreach ($answers as $key => $value)
    {
      $user = \App\User::find($value->user_id);
      $answers[$key]['user'] = $user;
    }
    return $answers;
  }
  public function postToLibrary(Request $request, $questionId)
  {
    if(Request::ajax())
    {
      $data = Request::all();
      $library = new \App\Question_Library;
      $library->user_id = Auth::user()->id;
      $library->question_id = $questionId;
      $library->added = true;
      $library-> save();

      return response()->json([
                  'status' => 200,
                  'message' => 'success',
                  'library' => $library
                ]
                );
    }
  }

}
