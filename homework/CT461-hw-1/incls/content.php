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
      <button class="btn btn-default col-xs-12 col-sm-4" ng-click="addTodo()">Add</button>
    </div>
  </form>

  </div>
  <div id="confirm" class="col-sm-4 confirm section">

    <h3>Confirm</h3>
    <ul>
      <li ng-repeat="todo in todos">
      <span>{{ todo.text }}</span>
      </li>
    </ul>
    <button class="btn btn-danger col-xs-12 col-sm-4" ng-click="clear()">Clear</button>

    <form id="toSend" action="?" method="POST">
      <textarea id="formText" name="formText"></textarea>
    </form>

  </div>
  <div class="col-sm-4 section">

  <h3>View</h3>
  
  
  <? 
    echo "<ul>";
    foreach ($tasks as $task):
  ?>

  <li>
    <? echo htmlspecialchars($task, ENT_QUOTES, 'UTF-8'); ?>
  </li>

  <? 
    endforeach; 
    echo("</ul>")
  ?>

  <button class="btn btn-success col-xs-12 col-sm-4" id="prep">Update</button>

  </div>
</div> <!-- / row -->
