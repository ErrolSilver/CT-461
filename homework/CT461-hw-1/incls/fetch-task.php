<?
  try {

    // Pull task list from DB for use in third column
    $sql = 'SELECT id,task,complete_by FROM tasks';
    $result = $pdo->query($sql);


    while ($row = $result->fetch()) {
      $tasks[] = array('id' => $row['id'], 'text' => $row['task'], 'complete-by' => $row['complete_by']);
    }
  }
  catch (PDOException $e) {
    $status = '<span class="alert-danger">Error fetching tasks</span>';
  }
?>
