
$(document).ready(function(){

  $(window).scroll(function(){
    var pos = $(window).scrollTop();
    if(pos >= window.innerHeight){
      if($(".div-logo").hasClass("font-dark")){
        $(".div-logo").removeClass("font-dark");
      }
      if($(".div-contact").hasClass("font-dark")){
        $(".div-contact").removeClass("font-dark");
      }
      $(".div-logo").addClass("font-light");
      $(".div-contact").addClass("font-light");
    } else {
      if($(".div-logo").hasClass("font-light")){
        $(".div-logo").removeClass("font-light");
      }
      if($(".div-contact").hasClass("font-light")){
        $(".div-contact").removeClass("font-light");
      }
      $(".div-logo").addClass("font-dark");
      $(".div-contact").addClass("font-dark");
    }
  });

});