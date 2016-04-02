<?php

namespace App\Http\Controllers;
use App\Interesting_field;
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

    $fields = DB::table('interesting_fields')->get();
    return view('home',compact(['fields']));

  }

}
