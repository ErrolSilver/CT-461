<?php

if (!defined('ROOT')) {
	
		define('ROOT', dirname(__FILE__));
}


include_once ROOT .
    '../../../incls/magicquotes.inc.php';

if (isset($_GET['add']))
{
  $pageTitle = 'New type';
  $action = 'addform';
  $name = '';
  $id = '';
  $button = 'Add type';

  include 'form.html.php';
  exit();
}

if (isset($_GET['addform']))
{
  include ROOT . '../../../incls/db.inc.php';

  try
  {
    $sql = 'INSERT INTO type SET
        name = :name';
    $s = $pdo->prepare($sql);
    $s->bindValue(':name', $_POST['name']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error adding submitted type.';
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
    $sql = 'SELECT id, name FROM type WHERE id = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error fetching type details.';
    include 'error.html.php';
    exit();
  }

  $row = $s->fetch();

  $pageTitle = 'Edit type';
  $action = 'editform';
  $name = $row['name'];
  $id = $row['id'];
  $button = 'Update type';

  include 'form.html.php';
  exit();
}

if (isset($_GET['editform']))
{
  include ROOT . '../../../incls/db.inc.php';

  try
  {
    $sql = 'UPDATE type SET
        name = :name
        WHERE id = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->bindValue(':name', $_POST['name']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error updating submitted type.';
    include 'error.html.php';
    exit();
  }

  header('Location: .');
  exit();
}

if (isset($_POST['action']) and $_POST['action'] == 'Delete')
{
  include ROOT . '../../../incls/db.inc.php';

  // Delete computer associations with this type
  try
  {
    $sql = 'DELETE FROM computertype WHERE typeid = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error removing computers from type.';
    include 'error.html.php';
    exit();
  }

  // Delete the type
  try
  {
    $sql = 'DELETE FROM type WHERE id = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error deleting type.';
    include 'error.html.php';
    exit();
  }

  header('Location: .');
  exit();
}

// Display type list
include ROOT . '../../../incls/db.inc.php';

try
{
  $result = $pdo->query('SELECT id, name FROM type');
}
catch (PDOException $e)
{
  $error = 'Error fetching categories from database!';
  include 'error.html.php';
  exit();
}

foreach ($result as $row)
{
  $categories[] = array('id' => $row['id'], 'name' => $row['name']);
}

include 'categories.html.php';
