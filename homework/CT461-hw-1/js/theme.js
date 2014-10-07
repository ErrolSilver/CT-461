(function ($) {
  // Jquery stuff
  'use strict';
  var $body = $('body'),
      $pageLoader = $('#loader-1'),
      $pageHead = $('#main-header').find('h1'),
      $mainSection = $('#main-content'),
      $pageContent = $('#main-content').find('.container'),
      $footer = $('#main-footer'),
      $form = $('#toSend'),
      $formText = $('#formText'),
      $prepForm = $('#prep'),
      $contentSubmit = [];

      $prepForm.on('click', function() {

        // Grabs text inserted by Angular
        var $textValues = $('#confirm').find('span');

        // Pushes text into array as a string
        $textValues.each(function () {
          $contentSubmit.push($(this).text());
        });

        // Passes string into textarea and submits
        $(formText).val($contentSubmit);
        setTimeout(function () {
          $form.submit();
        },500);
      });



  // Animation stuff

  $body.addClass('loading');

  $(window).load(function() {

    // Fakes page loading as an excuse to use fancy SVG loading icon (lol, sorry)
    setTimeout(function () {
      $body.removeClass('loading');
      $pageLoader.remove();
    }, 1000);

    $pageHead.velocity('transition.slideUpBigIn', 3000);
    fadeIn($mainSection, 1500, 500);
    fadeIn($pageContent, 1000, 1500);
    $footer.delay(2000).velocity({'height': '3.2rem'}, 750);

  });

  // Takes parameters to fade any element
  function fadeIn(elem, speed, delay) {
    elem.css('opacity', '0').delay(delay);
    elem.velocity({'opacity': '1'}, speed);
  }

})(jQuery);

// Angular stuff
function TodoCtrl($scope) {

  // Definites todo array
  $scope.todos = [];

  $scope.getTotalTodos = function () {

    // Displays number of todos at bottom of page
    return $scope.todos.length;
  };
  
  $scope.addTodo = function () {

    // Stores text input into todo array
    $scope.todos.push({text:$scope.formTodoText, done:false});
    $scope.formTodoText = '';
  };
  
  $scope.clear = function () {

    // Empties todo array
    $scope.todos = [];
  };
}
