<? include '../incls/header.php' ?>
  <a href="?addjoke">Add your own joke</a>
  <? 
    echo "<ul>";
    foreach ($jokes as $joke):
  ?>

  <li>
    <? echo htmlspecialchars($joke, ENT_QUOTES, 'UTF-8'); ?>
  </li>

  <? 
    endforeach; 
    echo("</ul>")
  ?>
<? include '../incls/footer.php' ?>
