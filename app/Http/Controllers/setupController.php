<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB; 

class setupController extends Controller
{
   
   
    public function __construct(){
        $this->middleware('auth');
    }
 
     public function getStepOne(){
      $fields = DB::table('interesting_fields')->get();
         return view('libraryViewsContainer.stepOne')->withFields($fields);
         
  }
    
    // to store the value of user interesting fields
   public function postStepOne(){
        // how to deal with checkbox
        return redirect('/setup/stepTwo');
       
   }
    
    
     public function getStepTwo(){  
       return view('libraryViewsContainer.stepTwo'); // here we have the cv form  
  }
    
     public function postStepTwo(Request $request){
        
         $overview = $request->input('overview');
         $skills =  $request->input('skills');
         $achievements = $request->input('achievements');
         $work_history = $request->input('work_history'); 
         $education = $request->input('education');
         $languages = $request->input('languages');
   
         DB::table('portfolios')->insert(['overview'=>$overview , 'skills'=>$skills , 'achievements'=>$achievements ,'work_history'=>$work_history, 'education'=>$education,'languages'=>$languages ]);
         return redirect('/setup/stepThree');
       
   }
    
    /*
     public function getStepThree(){
       return view('stepThree');
  }
    
    
    
    
     public function postStepThree(){
       return view('stepThree');
  }
    
    
    
    */
    
}


