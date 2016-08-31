//Breakpoints
var bpS = 450;
var bpM = 770;
var bpL = 1200;
var bpX = 1600;

// determines the center point of the menu buttons,
// for calculating which element the button is on top of
var buttonPadding = 60;

// used to prevent the scroll event from firing while the contact form is opening (because the
// main content is fading out simultaneously).
var contactFormOpen = false;

// time in milliseconds that the contact form takes to open
var contactAnimationSpeed = 300;

// Scroll icon is only visible until the user starts scrolling
var isScrollIconVisible = true;

$(document).ready(function(){

  //Images on mobile are too small for text overlay, so only display as overlay on larger screens
  if(window.innerWidth > bpS){
    $(".project-overlay-text").addClass("overlay-text");
  }

  //prepare image text overlays (home page)
  $(".overlay-text").addClass("hidden overlay-text-fixed");

  //set menu color on load
  checkMenuColor();

  resizeTitleDiv();
  $(window).resize("resizeTitleDiv");

  $(window).scroll(function(){

    //Makes sure menu buttons are visible against their background
    if(!contactFormOpen){ //Contact form is fixed, so prevent changes
      checkMenuColor();
    }

    scrollTextOverlays();

    if(isScrollIconVisible) {
      $("#div-scroll-icon").fadeOut(400);
    }
  });

  $(".a-contact").click(function(){
    openContactForm();
    return false;
  });

});

// Checks if the menu buttons are on a light or dark background,
// then colors the buttons appropriately.
function checkMenuColor(){

  //logo is a fixed color, so don't bother checking background
  if(!$(".div-logo").hasClass("can-change-color")){
    return;
  }

  //Get dom element directly behind center of logo
  var elem = undefined;
  $(".background-dark, .background-light").each(function(){
    //check if button is within selected element
    if($(this)[0].getBoundingClientRect().top < buttonPadding && $(this)[0].getBoundingClientRect().bottom > buttonPadding){
      elem = this;

      // Background elements are not stacked,
      // so assume we have found the only possible element and exit the loop
      return false;
    }
  });

  if(elem == null || $(elem).hasClass("background-light")){
    if($("#img-logo-purple").hasClass("hidden")){
      setButtonsDark();
    }
  } else {
    if($("#img-logo-white").hasClass("hidden")){
      setButtonsLight();
    }
  }
}

//Use Ajax to retrieve and present the contact form
function openContactForm(){

  toggleContactButton();

  if($("#div-contact-placeholder").is(":visible")) { //contact form is closing
    contactFormOpen = false;
    $(".div-contact-container").fadeOut(200, function(){
      $("#div-contact-placeholder").css('min-height', 'auto').height(window.innerHeight);
      $("#div-contact-placeholder").animate({width: 'toggle', height: 'toggle', opacity: 'toggle'}, 400, 'swing', function(){
        $("#div-main-container").fadeIn(function(){
          checkMenuColor();
        });
      });
    });

  } else { //contact form is opening
    contactFormOpen = true;
    $("#div-main-container").fadeOut(200);
    setButtonsLight();

    $("#div-contact-placeholder").height(window.innerHeight).animate({width: 'toggle', height: 'toggle', opacity: 'toggle'}, 400, 'swing', function () {
      $("#div-contact-placeholder").load("contact_content.php", function () {

        $("#div-contact-placeholder").css('min-height', '100%').height('auto'); //Removes temporary height since content is now loaded
        $(".div-contact-container").hide();
        $(".div-contact-container").fadeIn(200);
      });
    });
  }
}

//transitions contact button from a triangle to an X
function toggleContactButton(){
  if($(".line01").hasClass("line01-active")){
    $(".line01").removeClass("line01-active");
    $(".line02").removeClass("line02-active");
    $(".line03").removeClass("line03-active");
    $(".div-contact-button .text").fadeIn();
    $(".div-logo").delay(400).fadeIn();
  } else {
    $(".line01").addClass("line01-active");
    $(".line02").addClass("line02-active");
    $(".line03").addClass("line03-active");
    $(".div-contact-button .text, .div-logo").fadeOut();
  }
}

//Change the menu buttons to white
function setButtonsLight(){

  $("#img-logo-purple").addClass("hidden");
  $("#img-logo-white").removeClass("hidden");
  $(".div-contact-button .text").removeClass("font-dark").addClass("font-light");
  $(".div-contact-button .line").removeClass("background-dark").addClass("background-light");
}

//Change the menu buttons to purple
function setButtonsDark(){

  $("#img-logo-white").addClass("hidden");
  $("#img-logo-purple").removeClass("hidden");
  $(".div-contact-button .text").removeClass("font-light").addClass("font-dark");
  $(".div-contact-button .line").removeClass("background-light").addClass("background-dark");
}


function scrollTextOverlays(){
  $(".overlay-text").each(function(){

    var parentBottom = $(this).parent()[0].getBoundingClientRect().bottom;
    var parentTop = $(this).parent()[0].getBoundingClientRect().top;

    if(parentTop <= 80 && parentBottom > 80){
      if($(this).hasClass("hidden")){
        $(this).removeClass("hidden");
      }
    } else {
      if (!$(this).hasClass("hidden")) {
        $(this).addClass("hidden");
      }
    }
  });
}

//resize the title div (prevents a resizing glitch on mobile browsers when the address bar hides)
function resizeTitleDiv(){
  var ht = window.innerHeight < 1100 ? window.innerHeight : 1100;
  $("#title-container, .div-feature").height(ht);
}