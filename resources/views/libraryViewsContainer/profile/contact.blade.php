@extends('layouts.app')

@section('content')
<?php // TODO:  layout here contain the header of the profile  ?>
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>

        {{$username}} <br>
        @if($cinfos)
        <script type="text/javascript">
        $(document).ready(function(){
          $('input').css({display: 'none'});
          $('#cancelEditButton').css({display: 'none'});

          $('#editButton').click(function(){
            $('input').css({display: 'inline-block'});
            $('.field').css({display: 'none'});
            $('#cancelEditButton').css({display:'inline-block'});
          });

          $('#cancelEditButton').click(function(){
            $('input').css({display: 'none'});
            $('.field').css({display: 'inline-block'});
            $('#cancelEditButton').css({display: 'none'});
          });

        })
        </script>
        @if($isMe)
        <button id="editButton" type="button" name="button">edit</button>
        <button id="cancelEditButton" type="button" name="button">cancel</button>
        @endif
        <form action="/profile/{{$username}}/contact-info" method="post" >
          {!! csrf_field() !!}
          <input type="hidden" name="_method" value="PATCH">
          Email: <input type="email" name="email" value="{{$cinfos->email}}">  <span class="field"> {{$cinfos->email}}</span><br>
          Phone Number: <input type="number" name="phone_number" value="{{$cinfos->phone_number}}" >  <span class="field">{{$cinfos->phone_number}}</span><br>
          Telephone Number: <input type="tel" name="telephone_number" value="{{$cinfos->telephone_number}}"> <span class="field"> {{$cinfos->telephone_number}} </span> <br>
          <input type="submit" value="update" >
        </form>

        @else
        @if($isMe)
        <form action="/profile/{{$username}}/contact-info" method="post" >
          {!! csrf_field() !!}
          Email: <input type="email" name="email" placeholder="ruba@yahoo.com"> <br>
          Phone Number: <input type="tel" name="phone_number" placeholder="0599-659-588" > <br>
          Telephone Number: <input type="tel" name="telephone_number" placeholder="04-2466-648">  <br>
          <input type="submit" value="store" >
        </form>
        @else
        this user have no information
        @endif
        @endif
      </div>
        <a href="/profile/{{$username}}" > Back </a>
    </div>
  </div>
</div>

@endsection
