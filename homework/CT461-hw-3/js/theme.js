(function ($) {
  // Jquery stuff
  'use strict';

  $("#primarySubmit").click(function(e){
      var item=$("#item").val();
      var rating=$("#rating").val();

      console.log(item);
      console.log(rating);

      e.preventDefault();
      
      $.ajax({
        type:"post",
        url:"incls/controller.php",
        data:"item="+item+"&rating="+rating,
        success:function(){
          $('#item').val('');
          $("#primaryContent").load("index.php #itemContainer");
        }
      });
    });

  $('#removeItem').click(function(e) {
    var del = $(this).val();

    $.ajax({
      type:"post",
      url:"incls/controller.php",
      data:"delete="+del,
      success:function(){
        $("#primaryContent").load("index.php #itemContainer");
      }
    });
    e.preventDefault();
  });


  $('#rating').on("change mousemove", function() {
      console.log($('#rating').val());
  });


  $('body').on('scroll', function() {
    var pos = $('#primarySection').offset().top;
    $('#primarySection').css({
      'background-position': '0%' + -pos/25 + '%',
    });       
  });

})(jQuery);
