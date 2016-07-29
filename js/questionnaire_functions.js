
var timeoutId;
$(document).ready(function(){
  $('form input, form textarea').on('input propertychange change', function() {

    var type = $(this).attr('type');
    if(type=="radio" || type == "checkbox"){

      var list_id = $(this).attr('name');
      var checked = $(this)[0].checked;
      var item_id = $(this)[0].id;

      clearTimeout(timeoutId);
      timeoutId = setTimeout(function() {
        // Runs 1 second (1000 ms) after the last change
        savePicklist(list_id, item_id, checked, type);
      }, 1000);

    } else {

      var value = $(this).val();
      var id = $(this)[0].id;

      clearTimeout(timeoutId);
      timeoutId = setTimeout(function() {
        // Runs 1 second (1000 ms) after the last change
        saveQuestionAnswer(id, value);
      }, 1000);

    }
  });
});

function saveQuestionAnswer(id, value)
{
  var question = {};
  question.id = id;
  question.answer = value;

  var jsonPacket = JSON.stringify(question);

  $.ajax({
    type: "POST",
    url: "save_questionnaire.php",
    data: {json: jsonPacket},
    success: function(data){
      //alert("save successful");
      $('.div-save-status').html("saved").show().fadeOut(2000);

    },
    failure: function(errMsg){
      //alert(errMsg);
    }
  });
}

function savePicklist(list_id, item_id, checked, type){
  var question = {};
  question.list_id = list_id;
  question.item_id = item_id;
  question.checked = checked;
  question.type = type;

  var jsonPacket = JSON.stringify(question);

  $.ajax({
    type: "POST",
    url: "save_questionnaire.php",
    data: {json: jsonPacket},
    success: function(data){
      $('.div-save-status').html("saved").show().fadeOut(2000);
    },
    failure: function(errMsg){
      $('.div-save-status').html(errMsg).show().fadeOut(2000);
    }
  });
}

$('.questionnaire-form').submit(function(e) {
  saveQuestionAnswer();
  e.preventDefault();
});