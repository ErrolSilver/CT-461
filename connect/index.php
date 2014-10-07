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

  try {
    $sql = 'SELECT joketext FROM joke WHERE joketext LIKE "%chicken%"'; 
    $result = $pdo->query($sql);
  } catch (PDOException $e) {
    $error = 'Error retreiving joke: ' . $e->getMessage();
    include 'error.html.php';
    exit();
  }

  while ($row = $result->fetch()) {
    $jokes[] = $row['joketext'];
  }
  include 'jokes.html.php';

  //$output = 'Database connection made.';
  //include 'output.html.php';
?>
