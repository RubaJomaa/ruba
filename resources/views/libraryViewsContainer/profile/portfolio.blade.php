@extends('layouts.app')

@section('content')

<div class="container" style="opacity:0.9">
  <div class="container-fluid">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>
        {{$username}} <br>
        @if($infors)
        <script type="text/javascript">
        $(document).ready(function(){
          $('textarea').css({display: 'none'});
          $('#cancelEditButton').css({display: 'none'});

          $('#editButton').click(function(){
            $('textarea').css({display: 'inline-block'});
            $('.field').css({display: 'none'});
            $('#cancelEditButton').css({display:'inline-block'});
          });

          $('#cancelEditButton').click(function(){
            $('textarea').css({display: 'none'});
            $('.field').css({display: 'inline-block'});
            $('#cancelEditButton').css({display: 'none'});
          });


        })
        </script>
        @if($isMe)
        <button id="editButton" type="button" name="button">edit</button>
        <button id="cancelEditButton" type="button" name="button">cancel</button>
        @endif
        <form method="post" action="/profile/{{$username}}/portfolio">
          {!! csrf_field() !!}
          <input type="hidden" name="_method" value="PATCH">
          Overview : <textarea rows="3" cols="30" name="overview" > {{$infors->overview}}</textarea> <span class="field"> {{$infors->overview}} </span> <br>
          Skills : <textarea rows="3" cols="30" name="skills">{{$infors->skills}}</textarea> <span class="field"> {{$infors->skills}} </span>  <br>
          Achievements: <textarea rows="3" cols="30" name="achievements" > {{$infors->achievements}}</textarea> <span class="field"> {{$infors->achievements}} </span><br>
          Work History: <textarea rows="3" cols="30" name="work_history"> {{$infors->work_history}}</textarea> <span class="field"> {{$infors->work_history}} </span><br>
          Education: <textarea rows="3" cols="30" name="education">{{$infors->education}}</textarea> <span class="field"> {{$infors->education}} </span><br>
          Languages: <textarea rows="2" cols="30" name="languages"> {{$infors->languages}}</textarea><span class="field"> {{$infors->languages}} </span><br>
          <input type="submit" value="update">
        </form>
        @else
        @if($isMe)
        <form action="/profile/{{$username}}/portfolio" method="post" >
          {!! csrf_field() !!}
          Overview : <textarea rows="3" cols="30" name="overview" placeholder="say something about your self" > </textarea><br>
          Skills : <textarea rows="3" cols="30" name="skills" placeholder="ex.web programming"></textarea><br>
          Achievements: <textarea rows="3" cols="30" name="achievements" placeholder="ex.your success" ></textarea><br>
          Work History: <textarea rows="3" cols="30" name="work_history" placeholder="ex.places where you work"></textarea><br>
          Education: <textarea rows="3" cols="30" name="education" placeholder="ex.your university name"></textarea><br>
          Languages: <textarea rows="2" cols="30" name="languages" placeholder="ex.english"></textarea><br>
          <input type="submit" value="store" >
        </form>
        @else
        this user have no information
        @endif
        @endif
      </div>
      @if($isMe)
      <form action="/profile/{{$username}}/portfolio/attache" method="post" enctype="multipart/form-data">
         {!! csrf_field() !!}
        <input type="file" name="filename">
        <input type="submit">
    </form>
      @endif
    <?php // TODO: show attacment  ?>
   <?php // TODO: the form not only have a file , it is also havr a title  ?>
    <?php // TODO: url down  ?>
      <a href="/profile/{{$username}}" > Back </a>
    </div>
  </div>
</div>

@endsection
