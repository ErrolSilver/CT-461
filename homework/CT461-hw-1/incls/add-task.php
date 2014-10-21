<?
  if (isset($_POST['formText'])) {

    // Split input into array
    $data = $_POST['formText'];
    $datum = explode(",", $data);

    $dates = $_POST['completeDate'];
    $date = explode("-",  $dates);

    
    // If form is posted, add input into table
    try {
      for ($i = 0; $i < count($datum); $i++) { 
        $sql = "INSERT INTO tasks SET
            task =  '". $datum[$i] ."',
            submitted = CURDATE(),
            complete_by = '". $date[$i] ."'";
            //             ^^^^^^^^^^^^^^^^^
            // WOW THIS IS A HIDEOUS SELECTOR
        $s = $pdo->prepare($sql);
        $s->bindValue(':formText', $_POST['formText']);
        $s->execute();
      }
      $status = 'Tasks Added';
    }
    catch (PDOException $e) {
      $status = '<span class="alert-danger">Error adding task</span>';
      echo $e;
    }
  }
?>
