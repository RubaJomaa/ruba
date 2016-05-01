<?php

namespace App\Http\Controllers;
use App\Topic;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Auth;

class HomeController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $user = Auth::user();
    $questions = [];
    $topics = \App\Topic::get();
    $user_topics = \App\User_Topic::where([
                                        ['user_id',$user->id],
                                        ['added', 1]
                                        ])
                                  ->join('topics', 'users_topics.topic_id', '=', 'topics.id')
                                  ->get();

    return view('home',compact(['topics', 'user_topics']));
  }

  public function getStreamOfType(Request $request, $stream_type, $topic_id)
  {
    // 1. your feed (according to my user_topics)
    // 2. all feed (site questions)
    // 3. your questions (questions by me)
    // 4. Questions You've Interacted With (likes and answers)
    // 5. questions of some topic

    $user = Auth::user();
    $questions = [];
    $topics = \App\Topic::get();
    $user_topics = \App\User_Topic::where([
                                        ['user_id',$user->id],
                                        ['added', 1]
                                        ])
                                  ->join('topics', 'users_topics.topic_id', '=', 'topics.id')
                                  ->get();

    switch ($stream_type)
    {
      case 2:
        foreach ($topics as $topic)
        {
          $questions_of_topic = \App\Question::where('topic_id', $topic->id)->get()->reverse();
          foreach ($questions_of_topic as $question)
          {
            $user_of_question = \App\User::where('id', $question->user_id)->first();
            $question['user'] = $user_of_question;
            array_push($questions, $question);
          }
        }
        break;
      case 3:
        $temp_questions = \App\Question::where('user_id', $user->id)->get();
        foreach ($temp_questions as $question)
        {
          $user_of_question = \App\User::where('id', $question->user_id)->first();
          $question['user'] = $user_of_question;
          array_push($questions, $question);
        }
        break;
      case 4:
        // TODO: get questions of rated answers by the user
        $answeredQuestions =
          \App\Answer::where('answers.user_id', '=', $user->id)
                      ->rightjoin('questions', 'answers.question_id', '=', 'questions.id')
                      ->select('questions.*')
                      ->distinct()
                      ->get();
          foreach ($answeredQuestions as $question)
          {
            $user_of_question = \App\User::where('id', $question->user_id)->first();
            $question['user'] = $user_of_question;
            array_push($questions, $question);
          }
        break;
      case 5:
        $temp_questions = \App\Question::where('topic_id', $topic_id)->get();
        foreach ($temp_questions as $question)
        {
          $user_of_question = \App\User::where('id', $question->user_id)->first();
          $question['user'] = $user_of_question;
          array_push($questions, $question);
        }
        break;
      default:
        foreach ($user_topics as $topic)
        {
          $questions_of_topic = \App\Question::where('topic_id',$topic->topic_id)->get()->reverse();
          foreach ($questions_of_topic as $question)
          {
            $user_of_question = \App\User::where('id',$question->user_id)->first();
            $question['user'] = $user_of_question;
            array_push($questions, $question);
          }
        }
        break;
    }
    //collect the $questions in a Laravel Collection, sort them by created_at field,
    //reverse them to get them from the latest to the earliest, and get them all
    $questions = collect($questions)->sortBy('created_at')->reverse()->values()->all();
    return response()->json(['questions' => $questions]);
  }

}
