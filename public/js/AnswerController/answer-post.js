/*
:doc:
answer post controller with ajax
*/

$(document).ready(function(){

  init();

  ///
  function init()
  {
    $('#answerForm').submit(submitAnswer);
  }

  function submitAnswer(e)
  {
    e.preventDefault();
    var answer = CKEDITOR.instances.answerEditor.getData(),
    _token = $('#answerForm input[name=_token]').val(),
    data = {
      _token: _token,
      answer: answer,
      question_id: questionId
    };

    $.ajax({
      url: '/question/' + questionId + '/answers',
      type: 'POST',
      data: data,
      success: postAnswerSuccess,
      error: postAnswerError
    });

    return false;
  }

  function postAnswerSuccess(data)
  {
    var newAnswer = '<div class="well">' +
    username +
    '<hr>' +
    data.answer +
    '</div>';
    $('#answersList').prepend(newAnswer); //adds the answer to the view and renders it
    CKEDITOR.instances.answerEditor.setData(''); //clears the editor
  }

  function postAnswerError(data)
  {
    alert(data.error);
  }

});
