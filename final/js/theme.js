(function ($) {
  // Jquery stuff
  'use strict';
  var $navBar = $('#primaryNav'),
    navPos = $navBar.offset().top;

  $(window).scroll(function(){
    var scroll = $(window).scrollTop();

      console.log(scroll);
      console.log(navPos);

    if (scroll >= navPos) {
      $navBar.addClass('fixed');
    }
    else $navBar.removeClass('fixed');
  });
})(jQuery);
