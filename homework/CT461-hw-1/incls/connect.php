<?
  try {

    // Establish connection
    $pdo = new PDO('mysql:host=localhost;dbname=to_do', 'errol', 'test');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');
    $status = "Database Connection Made";
  }
  catch (PDOException $e) {
    $status = '<span class="alert-danger">Unable to connect to the database server.</span>';
  }
?>
