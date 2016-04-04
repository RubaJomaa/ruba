<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Input;
use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class questionController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function postQuestion(){

      if(Request::ajax()) {
      $data = Input::all();
      print_r($data);
      die;
    }

  }

  public function getQuestion(){

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
