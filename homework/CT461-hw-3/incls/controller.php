<?
  // strip magic quotes
  require 'magic-quotes.php';

  require "connect.php";

  if (isset($_POST['item'])) {
    $thing=$_POST["item"];
    $rating=$_POST["rating"];

    try {
      $sql = 
         "INSERT INTO ratings SET
          item ='" . $thing . "',
          rating = '". $rating ."'";
      $s = $pdo->prepare($sql);
      $s->execute();
      $status = 'yep';
      echo $status;
    }
    catch (PDOException $e) {
      $status = 'Error adding item';
      echo $status;
      echo $e;
    }
  }



  if (isset($_POST['delete'])) {
    try {
      $sql = 'DELETE FROM ratings WHERE id = :id';
      $s =$pdo->prepare($sql);
      $s->bindValue(':id', $_POST['id']);
      $s->execute();
    }
    catch (PDOException $e) {   
      $status = 'Error deleting';
    }
  }







  try {

    $sql = 'SELECT id,item,rating FROM ratings';
    $result = $pdo->query($sql);


    while ($row = $result->fetch()) {
      $items[] = array(
        'id' => $row['id'], 
        'text' => $row['item'], 
        'rating' => $row['rating']
      );
    }
  }
  catch (PDOException $e) {
    $status = 'Error fetching items';
  }

?>
