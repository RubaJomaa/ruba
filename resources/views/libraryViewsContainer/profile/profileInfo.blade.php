@extends('layouts.app')

@section('content')
<?php // TODO:  layout here contain the header of the profile  ?>
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>

        {{$username}} <br>
        @if($infos)
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
        <form action="/profile/{{$username}}/profile-info" method="post" >
          {!! csrf_field() !!}
          <input type="hidden" name="_method" value="PATCH">
          First name: <input type="text" name="first_name" value="{{$infos->first_name}}">  <span class="field"> {{$infos->first_name}}</span><br>
          Last name: <input type="text" name="last_name" value="{{$infos->last_name}}" >  <span class="field">{{$infos->last_name}}</span><br>
          Gender: <input type="radio" name="gender" value="male" @if($infos->sex=='male')checked="checked" @endif > <span class="field">  @if($infos->sex=='male') male  @endif </span> <br>
          <input type="radio" name="gender" value="female" @if($infos->sex=='female')checked="checked" @endif ><span class="field"> </span>  @if($infos->sex=='female') female  @endif  <br>
          <input type="radio" name="gender" value="other" @if($infos->sex=='other' || !$infos->sex )checked="checked" @endif > <span class="field"> @if($infos->sex=='other' || !$infos->sex) other  @endif </span>  <br>
          Date Of Birth: <input type="text"  name="date_of_birth" value="{{$infos->date_of_birth}}" >  <span class="field">{{$infos->date_of_birth}} </span> <br>
          Country: <input type="text"  name="country" value=" {{$infos->country}} "> <span class="field">{{$infos->country}} </span>  <br>
          City : <input type="text" name="city"value=" {{$infos->city}}"> <span class="field">{{$infos->city}} </span> <br>
          Address: <input type="text"  name="address" value="{{$infos->address}} "> <span class="field">{{$infos->address}} </span> <br>
          Birth Place: <input type="text"  name="birth_place" value="{{$infos->birth_place}}"> <span class="field">{{$infos->birth_place}} </span> <br>
          <input type="submit" value="update" >
        </form>

        @else
        @if($isMe)
        <form action="/profile/{{$username}}/profile-info" method="post" >
          {!! csrf_field() !!}
          First name: <input type="text" name="first_name" placeholder="ex.ruba" >  <br>
          Last name: <input type="text" name="last_name" placeholder="ex.jomaa" >  <br>
          Gender: <input type="radio" name="gender" value="female" >female <br>
          <input type="radio" name="gender" value="male" > male <br>
          <input type="radio" name="gender" value="other" >other  <br>
          Date Of Birth: <input type="text"name="date_of_birth" placeholder="ex.1/1/1994"> <br>
          Country: <input type="text" name="country" placeholder="ex.palestine">  <br>
          City : <input type="text" name="city" placeholder="ex.jenin"><br>
          Address: <input type="text"  name="address" placeholder="ex.main street" > <br>
          Birth Place: <input type="text" name="birth_place" placeholder="ex.jenin">  <br>
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
