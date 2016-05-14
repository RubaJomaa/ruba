/*
:doc:
to post a question using ajax
*/

$(document).ready(function(){

  var newQuestionHTML;
  var user_name;
  init();

  function init()
  {

    user_name = username.replace("{", "").replace("}", "");
    newQuestionHTML = function(user_name, Q_id, Q_title){
      return '<div class="col-md-12 questions-stream-item">'+
      '<a class="q-user-card no-anchor-style pointer-cursor" href="/profile/' + user_name + '">'+
      '<img class="q-user-img img-circle" src="/images/user.png" width="50"/>'+
      '<span class="q-user-name">'+user_name+'</span>'+
      '</a>'+
      '<h3 class="q-title">'+
      '<a class="no-anchor-style pointer-cursor" href="">' + Q_title + '</a>'+
      '</h3>'+
      '</div>';
    };

    $postQ.submit(submitPostQuestion);
  }

  function submitPostQuestion(e)
  {
    e.preventDefault();
    var data1 = CKEDITOR.instances.postQEditor.getData();//this code gets the edited content, use it with you share the question
    var _token = $('input[name=_token]').val();
    var title = $('input[name=title]').val();
    var question_body = $(data1).val();
    var topic = $('select[name=topic]').val();
    var tagged_people = $('input[name=tagged_people]').val();
    var data = {
      _token: _token,
      title: title,
      question_body: data1,
      topic: topic,
      tagged_people: tagged_people,
    };

    $.ajax({
      url: '/postQuestion',
      type: 'POST',
      data: data,
      success: postQuestionSuccess,
      error: postQuestionError
    });

    return false;
  }

  function postQuestionSuccess(data)
  {
    var QToPrepend = newQuestionHTML(username, data.id, data.title);
    $questionsList.prepend(QToPrepend);
    CKEDITOR.instances.postQEditor.setData('');//clears the editor
    $newQTitle.val('');
  }

  function postQuestionError(error)
  {
    alert("Error:" + error.data)
  }
});
