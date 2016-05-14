@extends('layouts.app')
@section('content')

<div class="container">
  <div class="col-md-12">
    @foreach($articles as $key=>$article)
    <div class="group-at-groups">
      <h2><a class="no-anchor-style pointer-cursor" href="{{url('/article/'.$article->id)}}">{{str_limit($article->title, 100)}}</a></h2>
    </div>
    @endforeach
  </div>
</div>

@endsection
