<?php

namespace App\Http\Controllers;

use Request;
// use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;

class TopicsController extends Controller
{
    public function checkInteractivityFactor(Request $request)
    {
      if(Request::ajax())
      {
        $user = Auth::user();
        $topic_id = Request::get('topic_id');
        $topic = \App\User_Topic::where([
          ['topic_id', $topic_id],
          ['user_id', $user->id]
        ])->first();

        if(isset($topic))
        {
          $user_topic = $topic;
          if(!$user_topic->added)
          {
            $user_topic->interactivity_factor++;
            if($user_topic->interactivity_factor == 5)
              $user_topic->added = 1;
            $user_topic->save();
            return "success";
          }
        }
        else
        {
          $user_topic = new \App\User_topic;
          $user_topic->user_id = $user->id;
          $user_topic->topic_id = $topic_id;
          $user_topic->added = 0;
          $user_topic->interactivity_factor = 1;
          $user_topic->save();
          return "success";
        }
      }
    }
}
