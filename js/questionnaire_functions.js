
var timeoutId;
$(document).ready(function(){
  $('form input, form textarea').on('input propertychange change', function() {
    console.log('Textarea Change');
    //alert($(this).val());
    //alert($(this)[0].id);
    var value = $(this).val();
    var id = $(this)[0].id;

    clearTimeout(timeoutId);
    timeoutId = setTimeout(function() {
      // Runs 1 second (1000 ms) after the last change
      saveToDB(id, value);

      //$('.div-save-status').html();
    }, 1000);
  });
});


function saveToDB(id, value)
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
      alert("save successful");
    },
    failure: function(errMsg){
      alert(errMsg);
    }
  });
}


$('.questionnaire-form').submit(function(e) {
  saveToDB();
  e.preventDefault();
});