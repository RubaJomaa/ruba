<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class questionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getQuestion(Request $request){

    }
    public function postQuestion(Request $request){

    }
    public function editQuestion(Request $request){

    }
    public function deleteQuestion(Request $request){

    }
    public function getAnswers(Request $request){

    }
    public function postAnswer(Request $request){

    }
    public function editAnswer(Request $request){

    }
    public function deleteAnswer(Request $request){

    }

}
