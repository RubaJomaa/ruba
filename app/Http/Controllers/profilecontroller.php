<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class profilecontroller extends Controller
{
     
    public function portfoilo ($username){
        return view ('portfoilo');
    }
    
     public function editProfileInfo($username){
       return view('editProfileInfo');
  }
    
    public function profile($username){
        return view('profile');
    }
    
    
     public function updateProfile(request $request){
        return view('profile');
    }
    
    
   
    
}
