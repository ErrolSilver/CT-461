<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="css/bootstrap.css" rel="stylesheet">
	<!--<link href="css/bootstrap-theme.css" rel="stylesheet">-->
	<link href="css/theme.css" rel="stylesheet">
	<link href="css/shame.css" rel="stylesheet">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
  <div class="container">
    <?php 
    // Variables
      $name = "Errol";
      $age =21;
    ?>
    <p>Hello, my name is <? print $name; ?>.</p>
    <p>I am <? print $age + 10; ?></p>

    <? 
    if ($name == "Fred") {
      print "<p>Your name is Fred</p>";
    } else {
      print "<p>Your name isn't Fred</p>";
    }

    for ($i = 0; $i <= 100; $i++) { 
      if ($i % 15 == 0) {
        print "FizzBuzz<br>";
      }
      else if ($i % 3 == 0) {
        print "Fizz<br>";
      }
      else if ($i % 5 == 0) {
        print "Buzz<br>";
      }
      else {
        print ($i . "<br>");
      }
    }
    ?>
  </div> <!-- /container -->

	<script src="js/jquery.1.10.2.min.js"></script> <!-- compiled without jquery animate -->
	<script src="js/jquery.velocity.min.js"></script> <!-- jquery animate replacement -->
	<script src="js/bootstrap.js"></script>
	<script src="js/rem.js"></script>
	<script src="js/theme.js"></script>
</body>
</html>
