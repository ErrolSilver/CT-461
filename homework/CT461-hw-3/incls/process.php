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
      $status = '<span class="alert-danger">Error adding item</span>';
      echo $status;
      echo $e;
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
    $status = '<span class="alert-danger">Error fetching items</span>';
  }

?>
