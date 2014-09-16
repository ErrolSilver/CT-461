<? include 'incls/header.php' ?>
  <?
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    echo 'Howdy, ' . htmlspecialchars($firstname, ENT_QUOTES, 'UTF-8') . ' ' . 
    htmlspecialchars($lastname, ENT_QUOTES, 'UTF-8');
  ?>
<? include 'incls/footer.php' ?>
