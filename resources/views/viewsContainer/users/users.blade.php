@extends('layouts.app')

@section('content')

<div class="container">
  <ul>
    @foreach($users as $key => $user)
    <div class="group-at-groups">
      <a class="q-user-card no-anchor-style pointer-cursor" href="{{url('/profile/'.$user->name)}}">
        <img class="q-user-img img-circle" src="/images/user.png" width="50"/>
        <span class="q-user-name">{{$user->name}}</span>
      </a>
    </div>
    @endforeach
  </ul>
</div>

@endsection
