<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Request;
use App\Http\Controllers\Controller;


class likesController extends Controller
{

  public function postLike(Request $requset)
  {
    if(Request::ajax())
    {
      $data = Request::all();

      $answer_id = Request::get('answer_id');
      return $answer_id;
      $like = new \App\Like;
      $like->user_id = Auth::user()->id;
      $like->answer_id = $answer_id;
      $answer = \App\Answer::find($answer_id);
      $answer->likes_count = $answer->likes_count + 1 ;
      $like-> save();
      $answer-> save();

      die;
    }

  }
}
