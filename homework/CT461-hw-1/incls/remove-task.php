<?
  if (isset($_GET['deletetask'])) {
    try {
      $sql = 'DELETE FROM tasks WHERE id = :id';
      $s =$pdo->prepare($sql);
      $s->bindValue(':id', $_POST['id']);
      $s->execute();
    }
    catch (PDOException $e) {   
      $status = '<span class="alert-danger">Error deleting task</span>';
    }
  }
?>
