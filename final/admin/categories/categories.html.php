<?php
  $pageTitle = "Manage Computer Brands";
  if (!defined('ROOT')) {
    define('ROOT', dirname(__FILE__));
  }
  include_once ROOT . '../../../incls/helpers.inc.php';
  include_once ROOT . '../../../incls/header.html.php';
?>

<h1><?php htmlout($pageTitle); ?></h1>
<p><a href="?add">Add new brand</a></p>
<ul>
  <?php foreach ($categories as $type): ?>
    <li>
      <form action="" method="post">
        <div>
          <?php htmlout($type['name']); ?>
          <input type="hidden" name="id" value="<?php
              echo $type['id']; ?>">
          <input type="submit" name="action" value="Edit">
          <input type="submit" name="action" value="Delete">
        </div>
      </form>
    </li>
  <?php endforeach; ?>
</ul>
<p><a href="..">Return to JMS home</a></p>

<?php
  include_once ROOT . '../../../incls/footer.html.php';
?>
