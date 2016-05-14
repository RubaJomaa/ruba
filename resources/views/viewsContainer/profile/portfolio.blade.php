@extends('layouts.profile-master')

@section('profile-content')
<div class="container" style="opacity:0.9">
  <div class="container-fluid">
    <div class="well profile-inner-container col-md-10">
      @if($infors)
      <script type="text/javascript">
      $(document).ready(function(){
        $('textarea').css({display: 'none'});
        $('input').css({display: 'none'});
        $('#cancelEditButton').css({display: 'none'});
        $('button[name=update]').css({display: 'none'});

        $('#editButton').click(function(){
          $('textarea').css({display: 'inline-block'});
          $('input').css({display: 'inline-block'});
          $('.field').css({display: 'none'});
          $('#cancelEditButton').css({display:'inline-block'});
          $('button[name=update]').css({display: 'inline-block'});
          $(this).css({display:'none'});
        });

        $('#cancelEditButton').click(function(){
          $('textarea').css({display: 'none'});
          $('input').css({display: 'none'});
          $('.field').css({display: 'inline-block'});
          $('#cancelEditButton').css({display: 'none'});
          $('button[name=update]').css({display: 'none'});
          $('#editButton').css({display: 'inline-block'});
        });
      })
      </script>
      <form method="post" action="/profile/{{$username}}/portfolio">
        {!! csrf_field() !!}
        <input type="hidden" name="_method" value="PATCH">
          
            <table>
                <tr><td class="f-label">Overview </td><td class="f-input"><textarea rows="3" cols="30" name="overview" > {{$infors->overview}}</textarea> <span class="field"> {{$infors->overview}} </span> <br></td></tr>
                <tr><td class="f-label">Skills </td><td class="f-input"><textarea rows="3" cols="30" name="skills">{{$infors->skills}}</textarea> <span class="field"> {{$infors->skills}} </span>  <br></td></tr>
                <tr><td class="f-label">Achievments </td><td class="f-input"> <textarea rows="3" cols="30" name="achievements" > {{$infors->achievements}}</textarea> <span class="field"> {{$infors->achievements}} </span><br></td></tr>
                <tr><td class="f-label">Work History </td><td class="f-input"> <textarea rows="3" cols="30" name="work_history"> {{$infors->work_history}}</textarea> <span class="field"> {{$infors->work_history}} </span><br></td></tr>
                <tr><td class="f-label">Education </td><td class="f-input"> <textarea rows="3" cols="30" name="education">{{$infors->education}}</textarea> <span class="field"> {{$infors->education}} </span><br></td></tr>
                <tr><td class="f-label">Languages </td><td class="f-input"><textarea rows="2" cols="30" name="languages"> {{$infors->languages}}</textarea><span class="field"> {{$infors->languages}} </span><br><br></td></tr>
          </table>
        @if($isMe)
        <button class="btn btn-default" type="submit" name="update">Update</button>
        <button class="btn btn-default" id="editButton" type="button" name="button">Edit</button>
        <button class="btn btn-default" id="cancelEditButton" type="button" name="button">Cancel</button>
        @endif
        @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
      </form>
      @else
      @if($isMe)
      <form action="/profile/{{$username}}/portfolio" method="post" >
        {!! csrf_field() !!}
          <table>
          <tr><td class="f-label">Overview </td><td class="f-input"> <textarea rows="3" cols="30" name="overview" placeholder="say something about your self" > </textarea><br></td></tr>
          <tr><td class="f-label">Skills </td><td class="f-input"> <textarea rows="3" cols="30" name="skills" placeholder="ex.web programming"></textarea><br></td></tr>
          <tr><td class="f-label">Achievments </td><td class="f-input"> <textarea rows="3" cols="30" name="achievements" placeholder="ex.your success" ></textarea><br></td></tr>
          <tr><td class="f-label">Work History </td><td class="f-input"> <textarea rows="3" cols="30" name="work_history" placeholder="ex.places where you work"></textarea><br></td></tr>
          <tr><td class="f-label">Education </td><td class="f-input"> <textarea rows="3" cols="30" name="education" placeholder="ex.your university name"></textarea><br></td></tr>
         <tr><td class="f-label">Languages</td><td class="f-input"><textarea rows="2" cols="30" name="languages" placeholder="ex.english"></textarea><br><br>
             </td>
            </tr>
        
          </table>
        <input type="submit" value="store" >
        @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
      </form>
      @else
      this user have no information
      @endif
      @endif
      @if($isMe)
      <br>
      <form action="/profile/{{$username}}/portfolio/attach" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <input type="file" name="filename">
        <input class="btn btn-default" type="submit" value="Upload">
      </form>
      @endif
      <?php // TODO: show attacment  ?>
      <?php // TODO: the form not only have a file , it is also have a title  ?>

      @if( $attaches)
      <h1> File list</h1>
      @foreach($entries as $entry)
      @if(
      $entry->mimi_type == 'image/png'  ||
      $entry->mimi_type == 'image/jpeg' ||
      $entry->mimi_type == 'image/gif'  ||
      $entry->mimi_type == 'image/JPEG' ||
      $entry->mimi_type == 'image/GIF'  ||
      $entry->mimi_type == 'image/PNG'
      )

      <div class="row tableRow" >
        <ul class="thumbnails">
          <div class="col-md-6">
            <table>
              <tbody>
                <tr>
                  <td>
                    <img src="{{asset($entry->path)}}" alt="ALT NAME" class="img-responsive" width="100" height="100" onmouseover="style=width:400px; height:400px;"/>
                    <div class="caption">
                      <p>{{$entry->user_attachment_name}}</p>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </ul>
      </div>

      @else

      <table>
        <tbody>
          <tr>
            <td>
              <div class="col-md-6">
                <form action="/profile/{{$username}}/portfolio/download" method="get">
                  {!! csrf_field() !!}
                  <div class="row tableRow">
                    <a href="/users_attachments/files/{{$entry->title}}" download>{{$entry->user_attachment_name}}</a><div><br>
                    </form>

                  </div>
                </td>
              </tr>
            </tbody>
          </table>
          @endif
          @endforeach
          @endif
          <?php // TODO: سعاد اعمليها :  كبسة تفتح بوب اب لرفع الفايل  ?>
          <?php // TODO: url down  ?>
        </div>
      </div>
    </div>
    @endsection
