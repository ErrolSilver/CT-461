<? include '../incls/header.php' ?>
  <?
    if (!isset($_REQUEST['firstname'])) {
      include 'form.html.php';
    } else {
      $firstname = $_REQUEST['firstname'];
      $lastname = $_REQUEST['lastname'];
      if ($firstname == 'Errol' && $lastname == 'Silver') {
        $output = 'You are tall';
      } else {
        $output = 'Welcome, '.
          htmlspecialchars($firstname, ENT_QUOTES, UTF-8) . ' ' .
          htmlspecialchars($lastname, ENT_QUOTES, UTF-8);
      }
      include 'welcome.html.php';
    }
  ?>
<? include '../incls/footer.php' ?>
