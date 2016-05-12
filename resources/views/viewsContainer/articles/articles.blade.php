@extends('layouts.app')
@section('content')

<div class="">
  @foreach($articles as $key=>$article)
    <div class="row well">
      <h2>{{$article->title}}</h2>
      {!! $article->body !!}
    </div>
  @endforeach
</div>

@endsection
