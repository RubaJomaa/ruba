<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

use Illuminate\Http\Request;
use App\User_attachment;
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
    $entries = User_attachment::all();
    $user = $this -> checkUsername($username);
    if(!$user)
    return view('errors.404');
    else
    {
      $isMe=false;
      if($user->id == Auth::user()->id)
      $isMe=true;
      $infors= \App\Portfolio::where('user_id',$user->id)->first();

      $attaches= \App\User_attachment::where('user_id',$user->id)->first();
      return view('libraryViewsContainer.profile.portfolio', compact(['username','infors','isMe','entries','attaches']));
    }
  }
  public function storePortfolio(Request $request , $username)
  {
    $user = $this->checkUsername($username);
    $this->validate($request, [
    'skills' => 'required',
    'overview' => 'required',
    'achievements' => 'required',
    'education' => 'required',
    ]);
    if(!$user)
    return view('errors.404');
    else
    {

      if($user->id != Auth::user()->id)
      return view('errors.401');//you can create a 401 page (unauthorized)

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
    $this->validate($request, [
    'skills' => 'required',
    'overview' => 'required',
    'achievements' => 'required',
    'education' => 'required',
    ]);
    if(!$user)
    return view('errors.404');
    else
    {

      if($user->id != Auth::user()->id)
      return view('errors.401');//you can create a 401 page (unauthorized)

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
    $this->validate($request, [
    'first_name' => 'required',
    'last_name' => 'required',
    'country' => 'required',
    ]);
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
    $this->validate($request, [
    'first_name' => 'required',
    'last_name' => 'required',
    'country' => 'required',
    ]);
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
      $this->validate($request, [
      'email' => 'required',
      'phone_number' => 'required|integer',
      'telephone_number' => 'required|integer',
      ]);
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
    $this->validate($request, [
      'email' => 'required',
      'phone_number' => 'required|integer',
      'telephone_number' => 'required|integer',
    ]);
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
    $img=false;
    $user = $this->checkUsername($username);
    $file = $request->file('filename');
		$extension = $file->getClientOriginalExtension();
		Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
		$entry = new User_attachment();
    $entry->user_id = $user->id;
    if($extension=='jpg' || $extension=='gif' || $extension=='png' ||$extension=='JPG' || $extension=='GIF' || $extension=='PNG' )
    {
      $name=$file->getFilename().'.'.$extension;
      $entry->path= 'img/album/'.$name;
      $file->move('img/album/', $name);
    }
	  $entry->mimi_type  =$file->getClientMimeType();
		$entry->user_attachment_name = $file->getClientOriginalName();
		$entry->title = $file->getFilename().'.'.$extension;
		$entry->save();
		return back();
  }

  public function download($title){

		$entry = User_attachment::where('title', '=', $title)->firstOrFail();
		$file = Storage::disk('local')->get($entry->title);

		return (new Response($file, 200))
              ->header('Content-Type', $entry->mimi_type);

	}

}
