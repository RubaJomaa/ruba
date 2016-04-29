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
  $('#topic_filter').css({visibility: 'hidden'});

  $('#filter').change(function(e){
    $('#topic_filter').css({visibility: 'hidden'});
    var c = Number($(this).val());
    switch(c)
    {
      case 0:
      break;
      case 1:
      break;
      case 2:
      break;
      case 3:
      break;
      case 4:
      $('#topic_filter').css({visibility: 'visible'});
      break;
    }
    $.ajax({
      url: '/home?stream=all site',
      type: 'GET',
      success: function(response){
        console.log(response);
      },
      error: function(error){
        console.log(error);
      }
    });

  });

  $('#topic_filter').change(function(e){
    var topic_id = Number($(this).val());

  });

});
