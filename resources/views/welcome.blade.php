@extends('layouts.app')

@section('content')
<div class="col-md-12">
  <img src="{{('/images/grp5.png')}}" width="100%"/>
</div>
<div class="col-md-12 intro-boxes">
  <div class="container">
    <div class="col-md-3 col-md-offset-1 intro-box">
      <h3>Find an Answer</h3>
      <hr>
      <p class="ruba">
        <b>Ask World</b> is an ask & answer system.
        You find the best answers on your questions.
        <br>You may include figures, graphs, equations,
        codes and images-- as well as text to your question
        to make it comprehensive.
      </p>
    </div>
    <div class="col-md-3 col-md-offset-1 intro-box">
      <h3>Team Discussion</h3>
      <hr>
      <p class="ruba">
        You may wish to ask specific members who you know or like the way they answer.
        <br><b>Ask World</b> offers a wizard to create a group discussion
        system out of a question and a few members.
      </p>
    </div>
    <div class="col-md-3 col-md-offset-1 intro-box">
      <h3>Publish Articles</h3>
      <hr>
      <p class="ruba">
        Once you feel alright towards your question on the group discussion,
        you may wish to publish an article concluding the discussion to the world.
        <br><b>Ask World</b> offers a scratch board for the members to author the article.
      </p>
    </div>

  </div>
</div>
<hr>
<div class="col-md-12 research-goal-box">
  <div class="container research-goal">
    <h3>Passion</h3>
    <hr>
    <p>
      <b>Ask World</b> team is passionate about publishing research papers out of group disscussions.
      Much like articles out of discussions.
      <br><br><b>Ask World</b> team is working on offering any tools
      needed in the process of write researches and experimenting concepts.
    </p>
  </div>
</div>
<div class="col-md-12 footer-box">
  <div class="container footer">
    <a class="nav-color navbar-brand" href="">
      <span>
        <img src="{{asset('/images/ruba.png')}}" alt="" width="250" />
      </span>
      
    </a>
    <br>
    <br><br><br>
    <center>copyright © Ask World 2016  (RubaJomaa)</cemter>
  </div>
</div>
@endsection
