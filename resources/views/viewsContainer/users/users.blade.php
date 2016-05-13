@extends('layouts.app')

@section('content')

<div class="container">
  <ul>
    @foreach($users as $key => $user)
    <li>
      <span>
        <a href="{{url('/profile/'.$user->name)}}">
          {{$user->name}}
        </a>
      </span>
    </li>
    @endforeach
  </ul>
</div>

@endsection
