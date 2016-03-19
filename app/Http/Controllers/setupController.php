<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Auth;
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
    public function postStepOne(Request $request){
     // TODO: if the inputs are the same , ignore them
        // how to deal with checkbox
       $user_id = Auth::user()->id;
       foreach( $request->all() as $key=>$value)
       {
           if ($key=='_token')
               continue;
       $user_id = Auth::user()->id;
       $interactivity_factor = 0 ;
       $user_fields = $value ;
       $added = 1;
       DB::table('users_interests')->insert (['user_id'=> $user_id , 'interesting_field_id'=>$user_fields , 'added'=> $added ,'interactivity_factor'=> $interactivity_factor] );
       }
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
         $user_id = Auth::user()->id;
         DB::table('portfolios')->insert(['overview'=>$overview , 'skills'=>$skills , 'achievements'=>$achievements ,'work_history'=>$work_history, 'education'=>$education,'languages'=>$languages , 'user_id'=>$user_id ]);
         return redirect('/setup/stepThree');

   }


     public function getStepThree(){
       return view('libraryViewsContainer.stepThree');
  }


     public function postStepThree(Request $request){
       $first_name = $request->input('first_name');
       $last_name =  $request->input('last_name');
       $sex = $request->input('sex');
       $country = $request->input('country');
       $city = $request->input('city');
       $date_of_birth = $request->input('date_of_birth');
       $address = $request->input('address');
       $birth_place = $request->input('birth_place');
       $user_id = Auth::user()->id;
       DB::table('profiles_info')->insert(['first_name'=>$first_name , 'last_name'=>$last_name , 'sex'=>$sex , 'country'=>$country ,'city'=>$city , 'date_of_birth'=>$date_of_birth ,'address'=>$address , 'birth_place'=>$birth_place ,'user_id'=>$user_id  ]);
       return redirect('/home');
  }
}
