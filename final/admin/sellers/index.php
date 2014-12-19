<?php

if (!defined('ROOT')) {
	define('ROOT', dirname(__FILE__));
}


include_once ROOT .
    '../../../incls/magicquotes.inc.php';


//Checking to see if this is an seller add

if (isset($_GET['add']))
{
  $pageTitle = 'New seller';
  $action = 'addform';
  $name = '';
  $email = '';
  $id = '';
  $button = 'Add seller';

  include 'form.html.php';
  exit();
}

if (isset($_GET['addform']))
{
  include ROOT . '../../../incls/db.inc.php';

  try
  {
    $sql = 'INSERT INTO seller SET
        name = :name,
        email = :email';
    $s = $pdo->prepare($sql);
    $s->bindValue(':name', $_POST['name']);
    $s->bindValue(':email', $_POST['email']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error adding submitted seller.';
    include 'error.html.php';
    exit();
  }

  header('Location: .');
  exit();
}

if (isset($_POST['action']) and $_POST['action'] == 'Edit')
{
  include ROOT . '../../../incls/db.inc.php';

  try
  {
    $sql = 'SELECT id, name, email FROM seller WHERE id = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error fetching seller details.';
    include 'error.html.php';
    exit();
  }

  $row = $s->fetch();

  $pageTitle = 'Edit seller';
  $action = 'editform';
  $name = $row['name'];
  $email = $row['email'];
  $id = $row['id'];
  $button = 'Update seller';

  include 'form.html.php';
  exit();
}

if (isset($_GET['editform']))
{
  include ROOT . '../../../incls/db.inc.php';

  try
  {
    $sql = 'UPDATE seller SET
        name = :name,
        email = :email
        WHERE id = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->bindValue(':name', $_POST['name']);
    $s->bindValue(':email', $_POST['email']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error updating submitted seller.';
    include 'error.html.php';
    exit();
  }

  header('Location: .');
  exit();
}

if (isset($_POST['action']) and $_POST['action'] == 'Delete')
{
  include ROOT . '../../../incls/db.inc.php';

  // Get computers belonging to seller
  try
  {
    $sql = 'SELECT id FROM computer WHERE sellerid = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error getting list of computers to delete.';
    include 'error.html.php';
    exit();
  }

  $result = $s->fetchAll();

  // Delete computer type entries
  try
  {
    $sql = 'DELETE FROM computertype WHERE computerid = :id';
    $s = $pdo->prepare($sql);

    // For each computer
    foreach ($result as $row)
    {
      $computerid = $row['id'];
      $s->bindValue(':id', $computerid);
      $s->execute();
    }
  }
  catch (PDOException $e)
  {
    $error = 'Error deleting type entries for computer.';
    include 'error.html.php';
    exit();
  }

  // Delete computers belonging to seller
  try
  {
    $sql = 'DELETE FROM computer WHERE sellerid = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error deleting computers for seller.';
    include 'error.html.php';
    exit();
  }

  // Delete the seller
  try
  {
    $sql = 'DELETE FROM seller WHERE id = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error deleting seller.';
    include 'error.html.php';
    exit();
  }

  header('Location: .');
  exit();
}

// Display seller list
include ROOT . '../../../incls/db.inc.php';

try
{
  $result = $pdo->query('SELECT id, name FROM seller');
}
catch (PDOException $e)
{
  $error = 'Error fetching sellers from the database!';
  include 'error.html.php';
  exit();
}

foreach ($result as $row)
{
  $sellers[] = array('id' => $row['id'], 'name' => $row['name']);
}

include 'sellers.html.php';
