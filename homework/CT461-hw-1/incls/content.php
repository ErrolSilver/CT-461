<div class="row">
  <header class="col-xs-12">
    <!--<h2>Hello World</h2>-->
  </header>
</div>

<div class="row content">
  <div class="col-sm-4 section">

  <h3>Add: {{ formTodoText }}</h3>
  <form role="form">
    <div class="form-group">
      <input class="form-control form-group" placeholder="I need to..." type="text" ng-model="formTodoText" ng-model-instant />

      <h4>Complete by:</h4>
      <div class="row calender-wrap">
        <div class="col-xs-12">
          <p class="input-group">
            <input type="text" class="form-control" datepicker-popup="{{format}}" ng-model="dt" is-open="opened" min-date="minDate" max-date="'2015-06-22'" datepicker-options="dateOptions" date-disabled="disabled(date, mode)" ng-required="true" close-text="Close" />
            <span class="input-group-btn">
              <button type="button" class="btn btn-default" ng-click="open($event)"><i class="glyphicon glyphicon-calendar"></i></button>
            </span>
          </p>
        </div>
      </div>

      <button class="btn btn-default submit col-xs-12 col-sm-4" ng-click="addTodo()">Add</button>
    </div>
  </form> <!-- / Add -->

  </div>
  <div id="confirm" class="col-sm-4 confirm section">

    <h3>&nbsp;</h3>
    <!-- i still want this h3 i just dont know what to put here yet :( -->
    
    <ul>
      <li ng-repeat="todo in todos">
      <p>{{ todo.text }} </p>
      <span class="task-date">{{ todo.date | date:'fullDate' }}</span>
      
      </li>
    </ul>
    <button class="btn btn-danger col-xs-12 col-sm-4 submit" ng-click="clear()">Clear</button>

    <form id="toSend" action="?" method="POST">
      <textarea id="completeDate" name="completeDate" class="invisible"></textarea>
      <textarea id="formText" name="formText"></textarea>
    </form>

  </div>
  <div id="update" class="col-sm-4 section update">

  <h3>View</h3>
  
  
  <? 
    echo "<ul>";
    foreach ($tasks as $task):
  ?>

  <li>
    <form action="?deletetask" method="post">
      <button class="check-box" value="Delete" type="submit">
        <i class="glyphicon glyphicon-ok"></i>
      </button>
      <p>
        <? echo htmlspecialchars($task['text'], ENT_QUOTES, 'UTF-8'); ?>
        <span class="task-date">
          <? echo htmlspecialchars($task['complete-by'], ENT_QUOTES, 'UTF-8'); ?>
        </span>
      </p>


      <input type="hidden" name="id" value="<? echo $task['id']; ?>" />
    </form>
  </li>

  <? 
    endforeach; 
    echo("</ul>")
  ?>

  <button class="btn btn-success col-xs-12 col-sm-4 submit" id="prep">Update</button>

  </div>
</div> <!-- / row -->
