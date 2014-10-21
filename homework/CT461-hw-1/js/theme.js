(function ($) {
  // Jquery stuff
  'use strict';
  var $body = $('body'),
      $pageLoader = $('#loader-1'),
      $pageHead = $('#main-header').find('h1'),
      $mainSection = $('#main-content'),
      $pageContent = $('#main-content').find('.container'),
      $listToInput = $('#update').find('li'),
      $deleteBox = $('#main-content').find('.check-box'),
      $footer = $('#main-footer'),
      $form = $('#toSend'),
      $formText = $('#formText'),
      $prepForm = $('#prep'),
      $completeDate = $('#completeDate'),
      $taskSubmit = [],
      $dateSubmit = [];

      $prepForm.on('click', function() {

        // Grabs text inserted through Angular
        var $taskValues = $('#confirm').find('p'),
          $taskComplete = $('#confirm').find('span');
        console.log($taskValues.length);
        console.log($taskComplete.length);

        // Pushes text into array as a string
        $taskValues.each(function () {
          $taskSubmit.push($(this).text() + ',');
        });

        $taskComplete.each(function () {
          $dateSubmit.push($(this).text() + '-');
        });

        // Passes string into textarea and submits
        $(formText).val($taskSubmit);
        $completeDate.val($dateSubmit);
        setTimeout(function () {
          console.log($taskSubmit.length);
          console.log($taskComplete.length);
          $form.submit();
        },500);
      });


      // Delete from DB styles
      $deleteBox.on('click', function() {
        $(this).toggleClass('checked');
      });

/*
      // DB list modification function
      $listToInput.on('dblclick', function() {
        $(this).find('p').hide();
        $(this).append('<input type="text" name="update" class="update" id="update-text" />');
        $('#update-text').focus();
      });

      $('#update').focusout(function() {
        $('#update-text').parent('form').submit();
        $('#update-text').hide();
      });
*/

  // Animation stuff

  $body.addClass('loading');

  $(window).load(function() {

    // Fakes page loading as an excuse to use fancy SVG loading icon (lol, sorry)
    setTimeout(function () {
      $body.removeClass('loading');
      $pageLoader.remove();
    }, 500);

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

// Dependencies : 
angular.module('task-picker', ['ui.bootstrap']);

// primary app directive :  
angular.module('task-picker').controller('TodoCtrl', function ($scope) {

  $scope.todos = [];

  $scope.today = function() {
    $scope.dt = new Date();
  };
  $scope.today();

  $scope.clear = function () {

    // Empties datepicker input
    // $scope.dt = null;

    // Empties todo array
    $scope.todos = [];
  };

  $scope.open = function($event) {

    // Opens date picker
    $event.stopPropagation();
    $scope.opened = true;
  };

  $scope.getTotalTodos = function () {

    // Displays number of todos at bottom of page
    return $scope.todos.length;
  };
  
  $scope.addTodo = function () {

    // Stores text input into todo array
    $scope.todos.push({text:$scope.formTodoText, date:$scope.dt, done:false});

    // Resets input form
    $scope.formTodoText = '';
  };
});
