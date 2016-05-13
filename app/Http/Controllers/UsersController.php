<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use Response;
use Auth;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{

  public function index()
  {
    $users = \App\User::where('is_admin', 0)->select('id', 'name')->get();
    return view('viewsContainer.users.users', compact(['users']));
  }

  public function getUsersOfNamesStartingWith(Request $request, $string)
  {
    if(Request::ajax())
    {
      $users = \App\User::get();
      $match_users = [];
      foreach ($users as $i => $user)
      {
        if(str_contains(strtolower($user->name), strtolower($string)))
        {
          array_push($match_users, $user);
        }
      }
      return response()->json([
        'users' => $match_users
      ]);
    }
  }
}
