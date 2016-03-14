<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class setupController extends Controller
{
     public function stepOne(){
       return view('stepOne');
  }
    
     public function stepTwo(){
       return view('stepTwo');
  }
    
     public function stepThree(){
       return view('stepThree');
  }
    
    
    
    
    
}

}
