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
    
    
    public function getPortfolio(){
         $username = Auth::username();
        
         $fields = DB::table('portfolios')->get();
         return view('libraryViewsContainer.profile.portfolio')->withFields($fields);
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
