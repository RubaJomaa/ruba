@extends('layouts.app')
@section('content')
<div class="container">
  <div class="col-md-12">
    @foreach($groups as $group)
    <div class="group-at-groups">
      <h2><a class="no-anchor-style pointer-cursor" href="{{url('/group/'.$group->id)}}">{{str_limit($group->title, 100)}}</a></h2>
    </div>
    @endforeach
  </div>
</div>

@endsection
