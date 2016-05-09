CKEDITOR.replace('groupAnswerEditor');
$(document).ready(function()
{
  init();

  function init()
  {
    $('.library-check').each(function(i, a){
      if($(a).data('checked'))
        $($(a).children()[0]).addClass('glyphicon-check');
      else
        $($(a).children()[0]).addClass('glyphicon-unchecked');
    });
    $('.addToLibrary').submit(addToLibrary);
    $('.addToLibrary').on('click', 'a', function(){
      $($(this).parent()).submit();
    });
    $('#groupAnswerEditorForm').submit(submitAnswer);
  }

  function addToLibrary(e)
  {
    e.preventDefault();
    var answerId = $(this.aid).val(),
      index = $(this.index).val(),
      _token = $(this._token).val(),
      $instance = $('#addToLibrary'+index),
      data = {
        _token: _token,
        answer_id : answerId
      };
    $.ajax({
      url: '/group/'+groupId+'/library',
      type: 'POST',
      data: data,
      success: function(response){
        if(response.status == 200)
        {
          var $anchor = $($instance.children()[3]);
          var $glyph = $($anchor.children()[0]);
          if($anchor.data('checked') == 1)
          {
            var ansID = $instance.data('answer').id;
            $('.group-library-opinion').each(function(i, v){
              var id = $(v).data('answerid');
              if(id == ansID)
              {
                $(v).remove();
                return;
              }
            });
            $anchor.data('checked', 0);
            $glyph.removeClass('glyphicon-check')
            .addClass('glyphicon-unchecked');
          }
          else
          {
            var string = '<div data-answerid="'+$instance.data('answer').id+'" class="group-library-opinion">'+
              '<span class="group-library-opinion-check">'+
                '<span class="glyphicon glyphicon-check"></span>'+
              '</span>'+
              '<span class="group-library-opinion-body">'+
                $instance.data('answer').answer.substring(0, 10) + '...' +
              '</span>'+
            '</div>';
            $('.group-library-opinions').append(string);
            $anchor.data('checked', 1);
            $glyph.removeClass('glyphicon-unchecked')
            .addClass('glyphicon-check');
          }
        }
      },
      error: function(error){
        console.log(error);
      }
    });
    return false;
  }

  function submitAnswer(e)
  {
    e.preventDefault();
    var answer = CKEDITOR.instances.groupAnswerEditor.getData();
    _token = $('#groupAnswerEditorForm input[name=_token]').val();
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
    var newAnswer = '<div class="group-opinion">' +
    '<div class="group-opinion-body">' +
      data.answer +
    '<hr></div>';
    $('.group-opinions').prepend(newAnswer);//adds the answer to the view and renders it
    CKEDITOR.instances.groupAnswerEditor.setData('');//clears the editor
  }

  function postAnswerError(data)
  {
    console.log(data);
  }

});
