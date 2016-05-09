<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use Response;
use Auth;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
  public function index()
  {
    return view('viewsContainer.articles.articles');
  }
}
