/*
doc:
questions filtration:
filters available:
1. your feed (according to my user_topics)
2. all feed (site questions)
3. your questions (questions by me)
4. Questions You've Interacted With (likes and answer)
5. questions of some topic
*/

$(document).ready(function(){
  filterYourTopicsFeed();
  $('#topic_filter').css({visibility: 'hidden'});

  $('#filter').change(function(e){
    $('#topic_filter').css({visibility: 'hidden'});
    var c = Number($(this).val());
    switch(c)
    {
      case 1://type 2
      $('#questionsList').empty();
      filterAllSiteFeed();
      break;
      case 2:
      $('#questionsList').empty();
      filterYourQuestions();
      break;
      case 3:
      $('#questionsList').empty();
      filterQuestionsYouInteractedWith();
      break;
      case 4://type 5
      $('#topic_filter').css({visibility: 'visible'});
      break;
      default://type 1
      $('#questionsList').empty();
      filterYourTopicsFeed();
      break;
    }
  });

  $('#topic_filter').change(function(e){
    $('#questionsList').empty();
    var topic_id = Number($(this).val());
    filterQuestionsOfTopic(topic_id);
  });

  function filterYourTopicsFeed()
  {
    $('#questionsList').empty();
    $.ajax({
      url: '/home/filter/1/-1',
      type: 'GET',
      success: function(response){
        // console.log(response.questions);
        response.questions.forEach(function(value, key){
          $('#questionsList').append(
            '<div class="col-md-12">'+
            '<hr>'+
            '<a href="/profile/' + value.user.name + '">' + value.user.name + '</a>'+
            '<h1>'+
            '<a href="/question/' + value.id + '">' + value.title + '</a>'+
            '</h1>'+
            '</div>'
          );
        });
      },
      error: function(error){
        $('#questionsList').append("Error: " + error);
      }
    });
  }

  function filterAllSiteFeed()
  {
    $.ajax({
      url: '/home/filter/2/-1',
      type: 'GET',
      success: function(response){
        response.questions.forEach(function(value, key){
          $('#questionsList').append(
            '<div class="col-md-12">'+
            '<hr>'+
            '<a href="/profile/' + value.user.name + '">' + value.user.name + '</a>'+
            '<h1>'+
            '<a href="/question/' + value.id + '">' + value.title + '</a>'+
            '</h1>'+
            '</div>'
          );
        });
      },
      error: function(error){
        $('#questionsList').append("Error: " + error);
      }
    });
  }

  function filterYourQuestions()
  {
    $.ajax({
      url: '/home/filter/3/-1',
      type: 'GET',
      success: function(response){
        response.questions.forEach(function(value, key){
          $('#questionsList').append(
            '<div class="col-md-12">'+
            '<hr>'+
            '<a href="/profile/' + value.user.name + '">' + value.user.name + '</a>'+
            '<h1>'+
            '<a href="/question/' + value.id + '">' + value.title + '</a>'+
            '</h1>'+
            '</div>'
          );
        });
      },
      error: function(error){
        $('#questionsList').append("Error: " + error);
      }
    });
  }

  function filterQuestionsOfTopic(topic_id)
  {
    $.ajax({
      url: '/home/filter/5/' + topic_id,
      type: 'GET',
      success: function(response){
        response.questions.forEach(function(value, key){
          $('#questionsList').append(
            '<div class="col-md-12">'+
            '<hr>'+
            '<a href="/profile/' + value.user.name + '">' + value.user.name + '</a>'+
            '<h1>'+
            '<a href="/question/' + value.id + '">' + value.title + '</a>'+
            '</h1>'+
            '</div>'
          );
        });
      },
      error: function(error){
        $('#questionsList').append("Error: " + error);
      }
    });
  }

  function filterQuestionsYouInteractedWith()
  {
    $.ajax({
      url: '/home/filter/4/-1',
      type: 'GET',
      success: function(response){
        response.questions.forEach(function(value, key){
          $('#questionsList').append(
            '<div class="col-md-12">'+
            '<hr>'+
            '<a href="/profile/' + value.user.name + '">' + value.user.name + '</a>'+
            '<h1>'+
            '<a href="/question/' + value.id + '">' + value.title + '</a>'+
            '</h1>'+
            '</div>'
          );
        });
      },
      error: function(error){
        $('#questionsList').append("Error: " + error);
      }
    });
  }

});
