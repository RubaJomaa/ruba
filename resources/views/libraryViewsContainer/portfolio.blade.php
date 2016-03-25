@extends('layouts.app')

@section('content')

<div class="container" style="opacity:0.9">
    <div class="container-fluid">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
            <form method="get" action="/portfolio">
                {!! csrf_field() !!}
                 Overview : <textarea rows="3" cols="30" name="overview" contenteditable="false"> {{$fields->overview}} </textarea><br>
                Skills : <textarea rows="3" cols="30" name="skills" contenteditable="false">  {{$fields->skills}} </textarea><br>
                Achievements: <textarea rows="3" cols="30" name="achievements" contenteditable="false">  {{$fields->achievements}} </textarea><br>
                Work History: <textarea rows="3" cols="30" name="work_history" contenteditable="false">  {{$fields->work_history}} </textarea><br>
                Education: <textarea rows="3" cols="30" name="education" contenteditable="false">  {{ $fields->education }} </textarea><br>
                Languages: <textarea rows="2" cols="30" name="languages" contenteditable="false">  {{ $fields->languages }}</textarea><br>

    <footer><h1 class="col-md-3 col-offset-3">
    <a href="/home" class="button">Ok </a><br>
    <a href="/portfolioEdit" class="button">Edit </a><br>
         </h1>
    </footer>
                 </form>
            </div>
</div>
         </div>
        </div>

@endsection
