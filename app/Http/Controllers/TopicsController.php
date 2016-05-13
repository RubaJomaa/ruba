<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use Response;
use Auth;
use App\Http\Controllers\Controller;

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

    public function getTopics()
    {
      if(!Auth::user()->is_admin)
        return view('errors.401');
      $topics = \App\Topic::all();
      return view('viewsContainer.admin.topics', compact(['topics']));
    }

    public function addTopic(Request $request)
    {
      $topic_name = Request::get('name');
      $topic = new \App\Topic;
      $topic->topic_name = $topic_name;
      $topic->save();
      return redirect()->back();
    }

    public function deleteTopic()
    {
      $id = Request::get('id');
      \App\Topic::find($id)->delete();
      return redirect()->back();
    }

    public function updateTopic()
    {
      $id = Request::get('id');
      $name = Request::get('name');
      $topic = \App\Topic::find($id);
      $topic->topic_name = $name;
      $topic->save();
      return redirect()->back();
    }

}
