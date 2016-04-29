<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AnswersController extends Controller
{
  public function postAnswer(Request $request, $id)
  {
    if(Request::ajax())
    {
      $answer = Request::get('answer');
      $answerORM = new \App\Answer;
      $answerORM->user_id = Auth::user()->id;
      $answerORM->answer = $answer;
      $answerORM->question_id = $id;
      $question = \App\Question::find($id);
      $question->answers_count = $question->answers_count+1;
      $question->save();
      $answerORM->save();
      return response()->json(Request::all());
      //return the response as json, in be able to access its fields in javascript
    }
  }

  public function editAnswer(){

  }
  public function deleteAnswer(){

  }
}
