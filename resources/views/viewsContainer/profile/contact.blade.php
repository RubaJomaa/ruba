@extends('layouts.profile-master')

@section('profile-content')
<?php // TODO:  layout here contain the header of the profile  ?>
<div class="container">
  <div class="container-fluid">
    <div class="well profile-inner-container col-md-10">
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

          <table>
             <tr><td class="f-label">Email </td><td class="f-input">
         <input type="email" name="email" value="{{$cinfos->email}}">  <span class="field"> {{$cinfos->email}}</span><br></td></tr>
           <tr><td class="f-label">Phone Number </td><td class="f-input"> <input type="tel" name="phone_number" value="{{$cinfos->phone_number}}" >  <span class="field">{{$cinfos->phone_number}}</span><br></td></tr>
           <tr><td class="f-label">Telephone Number </td><td class="f-input"><input type="tel" name="telephone_number" value="{{$cinfos->telephone_number}}"> <span class="field"> {{$cinfos->telephone_number}} </span> <br></td></tr>
        </table>
          <input type="submit" value="update" >
        </form>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        @else
        @if($isMe)
        <form action="/profile/{{$username}}/contact-info" method="post" >
          {!! csrf_field() !!}
          <table>

           <tr><td class="f-label">Email </td><td class="f-input">
             <input type="email" name="email" placeholder="ruba@yahoo.com"> <br></td></tr>
         <tr><td class="f-label">Phone Number </td><td class="f-input">
           <input type="tel" name="phone_number" placeholder="0599-659-588" > <br></td></tr>
           <tr><td class="f-label">Telephone Number </td><td class="f-input">
             <input type="tel" name="telephone_number" placeholder="04-2466-648">  <br></td></tr>
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
      </div>
    </div>
</div>

@endsection
