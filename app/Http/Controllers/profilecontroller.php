<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class profilecontroller extends Controller
{
     
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function getPortfolio(){
         $fields = DB::table('portfolios')->get();
        return $fields;
         return view('libraryViewsContainer.portfolio')->withFields($fields);
    }
    
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
