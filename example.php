<? include 'incls/header.php' ?>
  <? 
    // echo date('l, F jS Y.');
    // $secondVar = 234;
    // $variable = 10 * $secondVar;
    // $variable = 'Errol';
    // $name = 'Silver';
    // echo $variable . ' ' . $name;

    $thisArray = array('left', 37, '4');
    echo $thisArray[1];
    $thisArray[] = 'right';

    /*$birthdays['Joe'] = '1986-12-07';
    $birthdays['Errol'] = '1992-11-09';
    $birthdays['Tom'] = '1992-06-03'; */

    $birthdays = array('Joe' => '1986-12-07', 'Errol' => '1992-11-09', 'Tom' => '1992-06-03', 'Scott' => $thisArray[1]);
    echo '<br>' . 'The Birthday is: ' . $birthdays['Scott'];
  ?>
<? include 'incls/footer.php' ?>
