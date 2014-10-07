<? include 'incls/header.php'; 

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
 
  

  if (isset($_POST['formText'])) {

    // Split input into array
    $data = $_POST['formText'];
    $datum = explode(",", $data);

    // If form is posted, add input into table
    try {
      for ($i = 0; $i < count($datum); $i++) { 
        $sql = "INSERT INTO tasks SET
            task =  '". $datum[$i] ."',
            submitted = CURDATE()";
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
  
  try {

    // Pull task list from DB for use in third column
    $sql = 'SELECT task FROM tasks';
    $result = $pdo->query($sql);

    while ($row = $result->fetch()) {
      $tasks[] = $row['task'];
    }
  }
  catch (PDOException $e) {
    $status = '<span class="alert-danger">Error fetching tasks</span>';
  }

  include 'incls/content.php';
  include 'incls/footer.php';
?>
