<?php 
  if (!defined('ROOT')) {
    define('ROOT', dirname(__FILE__));
  }

  include_once ROOT . '../../incls/helpers.inc.php';
  include_once ROOT . '../../incls/header.html.php';
?>

  <h1>Listing Management System</h1>
  <ul>
    <li><a href="computers/">Manage Listings</a></li>
    <li><a href="sellers/">Manage Sellers</a></li>
    <li><a href="categories/">Manage Computer Brands</a></li>
  </ul>

<?php 
  include_once ROOT . '../../incls/footer.html.php';
?>
