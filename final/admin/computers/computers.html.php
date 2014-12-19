<?php 
  $pageTitle = 'Manage';
  if (!defined('ROOT')) {
    define('ROOT', dirname(__FILE__));
  }
  include_once ROOT . '../../../incls/helpers.inc.php';
  include_once ROOT . '../../../incls/header.html.php';
?>

<h1>Search Results</h1>
<?php if (isset($computers)): ?>
  <table>
    <tr><th>computer Text</th><th>Options</th></tr>
    <?php foreach ($computers as $computer): ?>
    <tr>
      <td><?php htmlout($computer['text']); ?></td>
      <td>
        <form action="?" method="post">
          <div>
            <input type="hidden" name="id" value="<?php
                htmlout($computer['id']); ?>">
            <input type="submit" name="action" value="Edit">
            <input type="submit" name="action" value="Delete">
          </div>
        </form>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
<?php endif; ?>
<p><a href="?">New search</a></p>
<p><a href="..">Return to JMS home</a></p>

<?php
  include_once ROOT . '../../../incls/footer.html.php';
?>
