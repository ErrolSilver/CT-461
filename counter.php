<? include 'incls/header.php' ?>
  <?
  $count = 1;
    while ($count <= 1000) {
      echo "<div class='col-sm-1'>$count</div>";
      ++$count;
    }
    
    for ($count = 1; $count <= 100; ++$count) {
      echo "<div class='col-sm-1'>$count</div>";
    }
  ?>
<? include 'incls/footer.php' ?>
