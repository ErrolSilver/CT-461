<?php 
  $pageTitle = 'Search Listings';
  if (!defined('ROOT')) {
    define('ROOT', dirname(__FILE__));
  }
  include_once ROOT . '../../../incls/helpers.inc.php';
  include_once ROOT . '../../../incls/header.html.php';
?>

<h1><?php htmlout($pageTitle); ?></h1>
<p><a href="?add">Add new listing</a></p>
<form action="" method="get">
  <p>View computers satisfying the following criteria:</p>
  <div>
    <label for="seller">By seller:</label>
    <select name="seller" id="seller">
      <option value="">Any seller</option>
      <?php foreach ($sellers as $seller): ?>
        <option value="<?php htmlout($seller['id']); ?>"><?php
            htmlout($seller['name']); ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div>
    <label for="type">By type:</label>
    <select name="type" id="type">
      <option value="">Any type</option>
      <?php foreach ($categories as $type): ?>
        <option value="<?php htmlout($type['id']); ?>"><?php
            htmlout($type['name']); ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div>
    <label for="text">Containing text:</label>
    <input type="text" name="text" id="text">
  </div>
  <div>
    <input type="hidden" name="action" value="search">
    <input type="submit" value="Search">
  </div>
</form>
<p><a href="..">Return to JMS home</a></p>

<?php
  include_once ROOT . '../../../incls/footer.html.php';
?>
