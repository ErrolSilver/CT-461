<?php 
  if (!defined('ROOT')) {
    define('ROOT', dirname(__FILE__));
  }

  include_once ROOT . '../../incls/helpers.inc.php';
  include_once ROOT . '../../incls/header.html.php';
?>

  <h1>Listing Management System</h1>
  <ul>
    <li><a href="jokes/">Manage Listings</a></li>
    <li><a href="authors/">Manage Sellers</a></li>
    <li><a href="categories/">Manage Computer Brands</a></li>
  </ul>

<?php 
  include_once ROOT . '../../incls/footer.html.php';
?>
