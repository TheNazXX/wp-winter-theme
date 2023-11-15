'use strict';

/* Background Awesomeness
/* ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## */
jQuery(function ($) {
  var jQuerywindow = jQuery(window);
  var jQuerystars1 = jQuery('#stars1'); // Smaller
  var jQuerystars2 = jQuery('#stars2'); // Bigger
  var jQuerycloud1 = jQuery('#cloud1'); // Cloud Left 1
  var jQuerycloud2 = jQuery('#cloud2'); // Cloud Left 2
  var jQuerycloud3 = jQuery('#cloud3'); // Cloud Left 3
  var jQuerycloud4 = jQuery('#cloud4'); // Cloud Right 1
  var jQuerycloud5 = jQuery('#cloud5'); // Cloud Right 2

  $(window).scroll(function () {
    var yPos = -jQuerywindow.scrollTop();

    // Stars
    jQuerystars1.css({ top: 0 + yPos / 8 + 'px' });
    jQuerystars2.css({ top: 0 + yPos / 3 + 'px' });

    // Clouds Left
    jQuerycloud1.css({ top: 10 + yPos + 'px' });
    jQuerycloud2.css({ top: 190 + yPos + 'px' });
    jQuerycloud3.css({ top: 410 + yPos + 'px' });

    // Clouds Right
    jQuerycloud4.css({ top: 0 + yPos + 'px' });
    jQuerycloud5.css({ top: 290 + yPos + 'px' });
  });

  $("a[href='#top']").on('click', function () {
    jQuery('html, body').animate({ scrollTop: 0 }, 'slow');
    return false;
  });

  $('.ul-drop > li').on('click', function () {
    jQuery(this).children('ul').toggle({ display: 'toggle' });
  });

  $('.drop-menu > a').on('click', function () {
    jQuery(this).parents('div').children('.ul-drop').toggle({ display: 'toggle' });
  });

  if ($('#slider').length){
    $('#slider').flexslider({
      animation: 'fade',
      controlNav: false,
      nextText: '',
      prevText: '',
    });
  }

  if($('#photo-gallery').length){
    $('#photo-gallery').flexslider({
        animation: 'slide',
        controlNav: false,
        nextText: '',
        prevText: '',
      });
  }
    
  $('#about-slider').flexslider({
    animation: 'fade',
    controlNav: false,
    nextText: '',
    prevText: '',
  });
});



/* Init Room
/* ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## ## */
function InitRoom() {
  jQuery('#room-slider').flexslider({
    animation: 'fade',
    controlNav: false,
    nextText: '',
    prevText: '',
  });
}


