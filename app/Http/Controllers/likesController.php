<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use Response;
use Auth;
use App\Http\Controllers\Controller;

class likesController extends Controller
{

  public function postLike(Request $requset)
  {
    if(Request::ajax())
    {
      $data = Request::all();
      $answer_id = Request::get('answerId');
      $like = new \App\Like;
      $like->user_id = Auth::user()->id;
      $like->answer_id = $answer_id;
      $answer = \App\Answer::find($answer_id);
      $count = $answer->likes_count;
      $answer->likes_count = $count + 1 ;
      $like-> save();
      $answer-> save();
      // die;
      return response()->json([
                  'status' => 200,
                  'message' => 'success',
                  'answer' => $answer//i return the whole updated answer
                ]
                );
    }

  }
}
