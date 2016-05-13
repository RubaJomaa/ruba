<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use Response;
use Auth;
use App\Http\Controllers\Controller;

class GroupsController extends Controller
{
  public function index()
  {
    $groups = \App\Group::join('questions', 'groups.question_id', '=', 'questions.id')
                          ->join('members', 'groups.id', '=', 'members.group_id')
                          ->where('members.user_id', Auth::user()->id)
                          ->select('groups.id', 'questions.title')
                          ->get();

    return view('viewsContainer.groups.groups', compact(['groups']));
  }

  public function getGroup($group_id)
  {

    $group = \App\Group::find($group_id);

    $question = $group->question()->first();

    $members = \App\Member::join('users', 'members.user_id', '=', 'users.id')
                            ->where('group_id', $group_id)
                            ->select('users.id', 'members.id as member_id', 'name', 'is_group_admin')
                            ->get();
    $answers = \App\Answer::where('question_id', $question->id)
                          ->join('users', 'answers.user_id', '=', 'users.id')
                          ->select('answers.id', 'answer', 'users.id as user_id', 'name')
                          ->get();

    $library_answers =
      \App\Answer::join('library', 'answers.id', '=', 'library.answer_id')
      ->join('users', 'answers.user_id', '=', 'users.id')
      ->where('library.group_id', $group_id)
      ->select('answers.id', 'library.id as library_id',
                'answer', 'answers.user_id', 'users.name')
      ->get();

    foreach ($answers as $i => $answer)
    {
      if (\App\Library::where('answer_id', $answer->id)->exists())
      {
        $answers[$i]['is_saved'] = 1;
      }
      else
      {
        $answers[$i]['is_saved'] = 0;
      }
    }
    return view('viewsContainer.groups.group', compact('question', 'group', 'members', 'answers', 'library_answers'));
  }

  public function getGroupWizard($question_id)
  {
    $question = \App\Question::find($question_id);
    return view('viewsContainer.groups.wizard', compact(['question']));
  }

  public function createGroup(Request $request, $question_id)
  {
    $question = \App\Question::find($question_id);

    $group = new \App\Group;
    $group->question_id = $question_id;
    $group->save();

    $article = new \App\Article;
    $article->title = $question->title;
    $article->topic_id = $question->topic_id;
    $article->body = $question->question_body;
    $article->group_id = $group->id;
    $article->save();

    $member = new \App\Member;
    $member->user_id = Auth::user()->id;
    $member->group_id = $group->id;
    $member->is_group_admin = 1;
    $member->save();

    return redirect()->action('GroupsController@getGroup', ['group_id' => $group->id]);
  }

  public function toggleOpinionLibrary(Request $request, $group_id)
  {
    if(Request::ajax())
    {
      $answer_id = Request::get('answer_id');
      $item = \App\Library::where([
                                  ['group_id', $group_id],
                                  ['answer_id', $answer_id]
                                ])
                                ->first();
      if(isset($item))
      {
        \App\Library::where([
                              ['group_id', $group_id],
                              ['answer_id', $answer_id]
                            ])->delete();
        return response()->json([
          'status' => 200,
          'message' => 'success',
          'library_item_id' => $item->id
        ]);
      }
      else
      {
        $_item = new \App\Library;
        $_item->group_id = $group_id;
        $_item->answer_id = $answer_id;
        $_item->save();
        return response()->json([
          'status' => 200,
          'message' => 'success',
          'library_item_id' => $_item->id
        ]);
      }
    }
  }

}
