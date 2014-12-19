<?php 
  $pageTitle = 'Add Listing';
  if (!defined('ROOT')) {
    define('ROOT', dirname(__FILE__));
  }
  include_once ROOT . '../../../incls/helpers.inc.php';
  include_once ROOT . '../../../incls/header.html.php';
?>

<h1><?php htmlout($pageTitle); ?></h1>
<form action="?<?php htmlout($action); ?>" method="post">
  <div>
    <label for="text">Type your listing details here:</label>
    <textarea id="text" name="text" rows="3" cols="40"><?php
        htmlout($text); ?></textarea>
  </div>
  <div>
    <label for="seller">seller:</label>
    <select name="seller" id="seller">
      <option value="">Select one</option>
      <?php foreach ($sellers as $seller): ?>
        <option value="<?php htmlout($seller['id']); ?>"<?php
            if ($seller['id'] == $sellerid)
            {
              echo ' selected';
            }
            ?>><?php htmlout($seller['name']); ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <fieldset>
    <legend>Categories:</legend>
    <?php foreach ($categories as $type): ?>
      <div><label for="type<?php htmlout($type['id']);
          ?>"><input type="checkbox" name="categories[]"
          id="type<?php htmlout($type['id']); ?>"
          value="<?php htmlout($type['id']); ?>"<?php
          if ($type['selected'])
          {
            echo ' checked';
          }
          ?>><?php htmlout($type['name']); ?></label></div>
    <?php endforeach; ?>
  </fieldset>
  <div>
    <input type="hidden" name="id" value="<?php
        htmlout($id); ?>">
    <input type="submit" value="<?php htmlout($button); ?>">
  </div>
</form>

<?php
  include_once ROOT . '../../../incls/footer.html.php';
?>
