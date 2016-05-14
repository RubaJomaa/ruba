<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use Response;
use Auth;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
  public function index()
  {
    $articles = \App\Article::where('is_published', 1)->get();
    return view('viewsContainer.articles.articles', compact(['articles']));
  }

  public function getArticleJSON($article_id)
  {
    $article = \App\Article::find($article_id);
    return response()->json([
      'article' => $article
    ]);
  }

  public function getArticle($id)
  {
    $article = \App\Article::find($id);
    $members = \App\Member::join('groups', 'members.group_id', '=', 'groups.id')
                            ->join('articles', 'groups.id', '=', 'articles.group_id')
                            ->where('articles.id', $article->id)
                            ->join('users', 'members.user_id', '=', 'users.id')
                            ->select('users.id', 'users.name')
                            ->get();
    return view('viewsContainer.articles.article', compact(['article', 'members']));
  }

  public function getArticleComposition($group_id)
  {
    $library = \App\Answer::join('library', 'answers.id', '=', 'library.answer_id')
                          ->join('users', 'answers.user_id', '=', 'users.id')
                          ->where('library.group_id', $group_id)
                          ->select('answers.id', 'library.id as library_id',
                                    'answer', 'answers.user_id', 'users.name')
                          ->get();
    $article = \App\Article::where('group_id', $group_id)->first();
    return view('viewsContainer.groups.composeArticle', compact(['library', 'article']));
  }

  public function updateArticle(Request $request, $article_id)
  {
    if(Request::ajax())
    {
      $article_body = Request::get('body');
      $article = \App\Article::where('id', $article_id)->first();
      $article->body = $article_body;
      $article->save();

      return response()->json([
        'status' => 200,
        'message' => 'success',
        'article' => $article
      ]);
    }
  }

  public function publishArticle(Request $request, $article_id)
  {
    if(Request::ajax())
    {
      $article_body = Request::get('body');
      $article = \App\Article::where('id', $article_id)->first();
      $article->body = $article_body;
      $article->is_published = 1;
      $article->save();

      return response()->json([
        'status' => 200,
        'message' => 'success',
        'article' => $article
      ]);
    }
  }
}
