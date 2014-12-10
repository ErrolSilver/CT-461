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




  $("#primarySubmit").click(function(e){
      var item=$("#item").val();
      var rating=$("#rating").val();

      console.log(item);
      console.log(rating);

      e.preventDefault();
      
      $.ajax({
        type:"post",
        url:"incls/process.php",
        data:"item="+item+"&rating="+rating,
        success:function(){
          $('#item').val('');
          $("#primaryContent").load("index.php #itemContainer");
        }
      });
    });

  $('#search').click(function(e) {
    e.preventDefault();

    $.ajax({
      type:"get",
      url:"index.php",
      data:"search="+search,
      success:function(){
        $("#mainWrapper").load("jokes.html.php .results");
      }
    });
  });


})(jQuery);
