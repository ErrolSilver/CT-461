<?php 
  $pageTitle = 'Listings Error';
  if (!defined('ROOT')) {
    define('ROOT', dirname(__FILE__));
  }
  include_once ROOT . '../../../incls/helpers.inc.php';
  include_once ROOT . '../../../incls/header.html.php';
?>

<p>
  <?php echo $error; ?>
</p>

<?php
  include_once ROOT . '../../../incls/footer.html.php';
?>
