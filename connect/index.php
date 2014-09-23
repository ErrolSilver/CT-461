<?
  try {
    $pdo = new PDO('mysql:host = localhost;dbname=erroljokes', 'errol', 'test');
    //$pdo->setAttributes(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');
  } catch (PDOException $e) {
    $output = "Unable to connect to database server." . 
    $e->getMessage();
    include 'output.html.php';
    exit();
  }

  $output = 'Database connection made.';
  include 'output.html.php';
?>
