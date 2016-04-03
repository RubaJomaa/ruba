<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Auth;
class setupController extends Controller
{
  // TODO: validation and session to pop up msgs to endicate if things done correctly or not
    public function __construct(){
        $this->middleware('auth');
    }

     public function getStepOne(){
              $count=Auth::user()->setup_count;
              if($count==0){
             $fields = DB::table('topics')->get();
             return view('viewsContainer.setup.stepOne')->withFields($fields);
            }
           elseif($count==1){
             return redirect('/setup/stepTwo');
           }
           elseif($count==2){
             return redirect('/setup/stepThree');
           }
           else {
                return view('errors.404');
           }

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
       DB::table('users_topics')->insert (['user_id'=> $user_id , 'topic_id'=>$user_fields , 'added'=> $added ,'interactivity_factor'=> $interactivity_factor] );
       }
       $count=Auth::user()->setup_count;
       $countUp = $count + 1 ;
       DB::table('users')->where('id', Auth::user()->id)->update(['setup_count' => $countUp ]);
       return redirect('/setup/stepTwo');

     }

     public function getStepTwo(){
       $count=Auth::user()->setup_count;
      if($count==0){
             return redirect('/setup/stepOne');
        }
     elseif($count==1){
            return view('viewsContainer.setup.stepTwo'); // here we have the cv form

       }
     elseif($count==2){
            return redirect('/setup/stepThree');
      }
     else {
           return view('errors.404');
    }
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
         $count=Auth::user()->setup_count;
         $countUp = $count + 1 ;
         DB::table('users')->where('id', Auth::user()->id)->update(['setup_count' => $countUp ]);
         return redirect('/setup/stepThree');

   }


     public function getStepThree(){

       $count=Auth::user()->setup_count;
       if($count==0){
             return redirect('/setup/stepOne');
        }
       elseif($count==1){
            return redirect('/setup/stepTwo');
       }
       elseif($count==2){
           return view('viewsContainer.setup.stepThree');
       }
       else {
           return view('errors.404');
       }

  }
   public function postStepThree(Request $request ){

       $first_name = $request->input('first_name');
       $last_name =  $request->input('last_name');
       $gender = $request->gender;
       $country = $request->input('country');
       $city = $request->input('city');
       $date_of_birth = $request->input('date_of_birth');
       $address = $request->input('address');
       $birth_place = $request->input('birth_place');
       $user_id = Auth::user()->id;
       DB::table('profiles_info')->insert(['first_name'=>$first_name , 'last_name'=>$last_name , 'sex'=>$gender , 'country'=>$country ,'city'=>$city , 'date_of_birth'=>$date_of_birth ,'address'=>$address , 'birth_place'=>$birth_place ,'user_id'=>$user_id  ]);
       $count=Auth::user()->setup_count;
       $countUp = $count + 1 ;
       DB::table('users')->where('id', Auth::user()->id)->update(['setup_count' => $countUp ]);
       return redirect('/home');
  }
}
