<?php
  $pageTitle = "Add Computer Brand";
  if (!defined('ROOT')) {
    define('ROOT', dirname(__FILE__));
  }
  include_once ROOT . '../../../incls/helpers.inc.php';
  include_once ROOT . '../../../incls/header.html.php';
?>  
<h1><?php htmlout($pageTitle); ?></h1>
<form action="?<?php htmlout($action); ?>" method="post">
  <div>
    <label for="name">Name: <input type="text" name="name"
        id="name" value="<?php htmlout($name); ?>"></label>
  </div>
  <div>
    <input type="hidden" name="id" value="<?php
        htmlout($id); ?>">
    <input type="submit" value="<?php htmlout($button); ?>">
  </div>
</form>

<?php
  include_once ROOT . '../../../incls/footer.html.php';
?>
