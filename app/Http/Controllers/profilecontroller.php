<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Auth;

class profilecontroller extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }


  public function getPortfolio($username)
  {
    $user = $this -> checkUsername($username);
    if(!$user)
    return view('errors.404');
    else
    {
      $isMe=false;
      if($user->id == Auth::user()->id)
      $isMe=true;
      $infors= \App\Portfolio::where('user_id',$user->id)->first();
      return view('libraryViewsContainer.profile.portfolio', compact(['username','infors','isMe']));
    }
  }
  public function storePortfolio(Request $request , $username)
  {
    $user = $this->checkUsername($username);

    if(!$user)
    return view('errors.404');
    else
    {

      if($user->id != Auth::user()->id)
      return view('errors.404');//you can create a 401 page (unauthorized)

      $portfolio = new \App\Portfolio;
      $portfolio->user_id = $user->id;
      $portfolio->overview = $request->overview;
      $portfolio->skills = $request->skills;
      $portfolio->achievements = $request->achievements;
      $portfolio->work_history = $request->work_history;
      $portfolio->education = $request->education;
      $portfolio->languages = $request->languages;

      $user->setup_count = 2;
      $user->save();
      $portfolio->save();
      return back();
    }

  }

  public function updatePortfolio(Request $request , $username)
  {
    $user = $this->checkUsername($username);

    if(!$user)
    return view('errors.404');
    else
    {

      if($user->id != Auth::user()->id)
      return view('errors.404');//you can create a 401 page (unauthorized)

      $portfolio= \App\Portfolio::where('user_id' , $user->id)->first();
      $portfolio->overview = $request->overview;
      $portfolio->skills = $request->skills;
      $portfolio->achievements = $request->achievements;
      $portfolio->work_history = $request->work_history;
      $portfolio->education = $request->education;
      $portfolio->languages = $request->languages;
      $portfolio->save();
      return back();
    }
  }

  public function getProfile($username){
    $user = $this ->  checkUsername($username);
    if(!$user)
    return view('errors.404');
    else
    return view('libraryViewsContainer.profile.userProfile', compact(['username']));
  }

  function checkUsername($username)
  {
    if(Auth::user()->name == $username)
    {
      $user = Auth::user();
    }
    else
    {
      $user = \App\User::where('name', $username)->first();
      if(!$user)
      return false;
    }

    return $user;
  }

  public function getProfileInfo($username){

    $user = $this -> checkUsername($username);
    if(!$user)
    return view('errors.404');
    else
    {
      $isMe=false;
      if($user->id == Auth::user()->id)
      $isMe=true;
      $infos= \App\ProfileInfo::where('user_id',$user->id)->first();
      return view('libraryViewsContainer.profile.profileInfo', compact(['username','infos','isMe']));

    }
  }

  public function storeProfileInfo(Request $request , $username)
  {
    $user = $this->checkUsername($username);

    if(!$user)
    return view('errors.404');
    else
    {

      if($user->id != Auth::user()->id)
      return view('errors.401');//you can create a 401 page (unauthorized)

      $profile_info = new \App\ProfileInfo;
      $profile_info->user_id = $user->id;
      $profile_info->first_name = $request->first_name;
      $profile_info->last_name = $request->last_name;
      $profile_info->sex = $request->gender;
      $profile_info->date_of_birth = $request->date_of_birth;
      $profile_info->country = $request->country;
      $profile_info->city = $request->city;
      $profile_info->address = $request->address;
      $profile_info->birth_place = $request->birth_place;
      $user->setup_count = 3;
      $user->save();
      $profile_info->save();
      return back();
    }
  }

  public function updateProfileInfo(Request $request , $username)
  {
    $user = $this->checkUsername($username);

    if(!$user)
    return view('errors.404');
    else
    {

      if($user->id != Auth::user()->id)
      return view('errors.401');//you can create a 401 page (unauthorized)

      $profile_info = \App\ProfileInfo::where('user_id' , $user->id)->first();
      $profile_info->first_name = $request->first_name;
      $profile_info->last_name = $request->last_name;
      $profile_info->date_of_birth = $request->date_of_birth;
      $profile_info->sex = $request->gender;
      $profile_info->country = $request->country;
      $profile_info->address = $request->address;
      $profile_info->city = $request->city;
      $profile_info->birth_place = $request->birth_place;

      $profile_info->save();
      return back();
    }
  }

  public function getContact($username)
  {
    $user = $this -> checkUsername($username);
    if(!$user)
    return view('errors.404');
    else
    {
      $isMe=false;
      if($user->id == Auth::user()->id)
      $isMe=true;
      $cinfos= \App\Contact::where('user_id',$user->id)->first();
      return view('libraryViewsContainer.profile.contact', compact(['username','cinfos','isMe']));

    }
  }
  public function storeContact(Request $request , $username)
  {

    $user = $this->checkUsername($username);

    if(!$user)
    return view('errors.404');
    else
    {

      if($user->id != Auth::user()->id)
      return view('errors.401');//you can create a 401 page (unauthorized)

      $contact = new \App\Contact;
      $contact->user_id = $user->id;
      $contact->email = $request->email;
      $contact->phone_number = $request->phone_number;
      $contact->telephone_number = $request->telephone_number;
      $contact->save();
      return back();
    }

  }

  public function updateContact(Request $request , $username)
  {
    $user = $this->checkUsername($username);

    if(!$user)
    return view('errors.404');
    else
    {

      if($user->id != Auth::user()->id)
      return view('errors.401');

      $contact = \App\Contact::where('user_id', $user->id)->first();
      $contact->email = $request->email;
      $contact->phone_number = $request->phone_number;
      $contact->telephone_number = $request->telephone_number;

      $contact->save();
      return back();
    }
  }
  public function attacheToPortfolio($username , Request $request)
  {

  }

}
