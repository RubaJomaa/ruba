<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB; 

class setupController extends Controller
{
     public function getStepOne(){
      $fields = DB::table('interesting_fields')->get();
         return view('libraryViewsContainer.stepOne')->withFields($fields);
  }
    /*
     public function getStepTwo(){
       return view('stepTwo');
  }
    
     public function getStepThree(){
       return view('stepThree');
  }
     public function postStepOne(){
       return view('stepOne');
  }
    
     public function postStepTwo(){
       return view('stepTwo');
  }
    
     public function postStepThree(){
       return view('stepThree');
  }
    
    
    
    */
    
}


