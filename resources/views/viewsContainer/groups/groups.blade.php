@extends('layouts.app')
@section('content')

@foreach($groups as $group)
<div class="group well">
  <h1><a href="{{url('/group/'.$group->id)}}">{{$group->title}}</a></h1>
</div>
@endforeach

@endsection
