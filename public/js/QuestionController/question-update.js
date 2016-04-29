/*
:doc:
to update question information using ajax
*/
$(document).ready(function(){

  initQ();

  ///
  function initQ()
  {
    if(q_user_id == user_id)
    {
      $q_body.attr('contenteditable', true);
    }
    else
    {
      $q_title.attr('contenteditable', false);

    }

    oldTitle = $q_title.text();
    oldBody = $q_body.html();

    $q_title.blur(function(){
      if(oldTitle != $q_title.text())
      $PutQT.submit();
    });

    $q_body.blur(function(){
      if(oldBody.trim() != $q_body.html().trim())
      $PutQB.submit();
    });

    $PutQT.submit(submitUpdateTitle);

    $PutQB.submit(submitUpdateBody);
  }

  function submitUpdateTitle(e)
  {
    e.preventDefault();
    var newT = $q_title.text(),
    _token = $('#PutQT input[name=_token]').val(),
    _method = 'patch',
    data = {
      _token: _token,
      _method: _method,
      title: newT
    };

    $.ajax({
      url: '/question/' + questionId,
      type: 'POST',
      data: data,
      success: updateTitleSuccess,
      error: updateTitleError
    });

    return false;
  }

  function submitUpdateBody(e)
  {
    e.preventDefault();
    var newB = $q_body.html(),
    _token = $('#PutQB input[name=_token]').val(),
    _method = 'patch',
    data = {
      _token: _token,
      _method: _method,
      question_body: newB
    };

    $.ajax({
      url: '/question/' + questionId,
      type: 'POST',
      data: data,
      success: updateBodySuccess,
      error: updateBodyError
    });

    return false;
  }

  function updateTitleSuccess(data)
  {
    oldTitle = $q_title.text();
    $q_title_msg.show();
    $q_title_msg.html("title saved successfully")
    $q_title_msg.css({color: 'green'});
    $q_title_msg.fadeOut(4000);
  }

  function updateTitleError(data)
  {
    $q_title_msg.show();
    $q_title_msg.html("Error")
    $q_title_msg.css({color: 'red'});
    $q_title.text(oldTitle);
    $q_title_msg.fadeOut(4000);
  }

  function updateBodySuccess(data)
  {
    oldBody = $q_body.html().trim();
    $q_body_msg.show();
    $q_body_msg.html("body saved successfully")
    $q_body_msg.css({color: 'green'});
    $q_body_msg.fadeOut(4000);
  }

  function updateBodyError(data)
  {
    $q_body_msg.show();
    $q_body_msg.html("Error")
    $q_body_msg.css({color: 'red'});
    $q_body.text(oldBody);
    $q_body_msg.fadeOut(4000);
  }

});
