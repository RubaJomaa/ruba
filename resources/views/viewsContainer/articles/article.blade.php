@extends('layouts.app')
@section('content')
<div class="jumbotron group-header">
  <h1>
    {{$article->title}}
  </h1>
</div>
<div class="container">
  <div class="col-md-2 members-at-article">
    <h3>Authors</h3>
    @foreach($members as $key=>$member)
    <div class="member-at-article">
      <a class="q-user-card no-anchor-style pointer-cursor" href="{{url('/profile/'.$member->name)}}">
        <img class="q-user-img img-circle" src="/images/user.png" width="50"/>
        <span class="q-user-name">{{$member->name}}</span>
      </a>
    </div>
    @endforeach
  </div>
  <div class="col-md-9 col-md-offset-1 article-body">
    {!! $article->body !!}
  </div>
</div>
@endsection
