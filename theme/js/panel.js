
var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
  mode: mixedMode,
  selectionPointer: true,
  lineNumbers: true,
  keyMap: "sublime",
  theme: "monokai",
  matchBrackets: true,
  tabSize: 2,

});

$(window).keypress(function(event) {
  if (!(event.which == 115 && event.ctrlKey) && !(event.which == 19)) return true;
  var code = editor.getValue();
  var file_way = $("#file_way").val();
  $.ajax({
    type: 'post',
    url: 'save_file.php',
    data: 'file_way='+file_way+'&code='+code,
    success:function(comment)
    {
      $("#code_alert").fadeIn(500);
      setInterval(function(){
        $("#code_alert").fadeOut(500);
      }, 500);
    }
  });
});

var last_key = 0;
var code_meta_key = 91;
var code_s = 83;

$(window).keydown(function (e){
  if (e.metaKey && e.keyCode == 83) {
    var code = editor.getValue();
    var file_way = $("#file_way").val();
    $.ajax({
      type: 'post',
      url: 'save_file.php',
      data: 'file_way='+file_way+'&code='+code,
      success:function(comment)
      {
        $("#code_alert").stop().fadeIn(500);
        $(".wait").show();
        $(".wait").css({'cursor' : 'wait'});
        setInterval(function(){
          $("#code_alert").fadeOut(1000);
          $(".wait").css({'cursor' : 'wait'});
          $(".wait").fadeOut(500);
        }, 500);
      }
    });
    return false;
  }
});

$(document).ready(function(){
  var width = $(window).width();
  var height = $(window).height();

  var codemirror = height - 120;

  $(".CodeMirror").height(codemirror);

  $("#plus").click(function(){
    $(".area").addClass("fullwidth-area");

    $(".fullwidth-area").height(height);
    $(".CodeMirror").height(codemirror);

    $(this).hide();
    $("#minus").show();
  });

  $("#minus").click(function(){
    $(".area").removeClass("fullwidth-area");

    $(".CodeMirror").height(codemirror);
    $(this).hide();
    $("#plus").show();
  });

});

/* search JS */
$(document).ready(function(){


  $(".validate").validate();
	$(".validate_1").validate();
	$(".validate_2").validate();
	$(".validate_3").validate();
	$(".validate_4").validate();
});

/**/
