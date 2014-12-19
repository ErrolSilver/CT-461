<?php

if (!defined('ROOT')) {
	
		define('ROOT', dirname(__FILE__));
}


include_once ROOT .
    '../../../incls/magicquotes.inc.php';

if (isset($_GET['add']))
{
  $pageTitle = 'New computer';
  $action = 'addform';
  $text = '';
  $sellerid = '';
  $id = '';
  $button = 'Add computer';

  include ROOT . '../../../incls/db.inc.php';

  // Build the list of sellers
  try
  {
    $result = $pdo->query('SELECT id, name FROM seller');
  }
  catch (PDOException $e)
  {
    $error = 'Error fetching list of sellers.';
    include 'error.html.php';
    exit();
  }

  foreach ($result as $row)
  {
    $sellers[] = array('id' => $row['id'], 'name' => $row['name']);
  }

  // Build the list of categories
  try
  {
    $result = $pdo->query('SELECT id, name FROM type');
  }
  catch (PDOException $e)
  {
    $error = 'Error fetching list of categories.';
    include 'error.html.php';
    exit();
  }

  foreach ($result as $row)
  {
    $categories[] = array(
        'id' => $row['id'],
        'name' => $row['name'],
        'selected' => FALSE);
  }

  include 'form.html.php';
  exit();
}

if (isset($_GET['addform']))
{
  include ROOT . '../../../incls/db.inc.php';

  if ($_POST['seller'] == '')
  {
    $error = 'You must choose an seller for this computer.
        Click &lsquo;back&rsquo; and try again.';
    include 'error.html.php';
    exit();
  }

  try
  {
    $sql = 'INSERT INTO computer SET
        details = :details,
        listingDate = CURDATE(),
        sellerid = :sellerid';
    $s = $pdo->prepare($sql);
    $s->bindValue(':details', $_POST['text']);
    $s->bindValue(':sellerid', $_POST['seller']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error adding submitted computer.';
    include 'error.html.php';
    exit();
  }

  $computerid = $pdo->lastInsertId();

  if (isset($_POST['categories']))
  {
    try
    {
      $sql = 'INSERT INTO computertype SET
          computerid = :computerid,
          typeid = :typeid';
      $s = $pdo->prepare($sql);

      foreach ($_POST['categories'] as $typeid)
      {
        $s->bindValue(':computerid', $computerid);
        $s->bindValue(':typeid', $typeid);
        $s->execute();
      }
    }
    catch (PDOException $e)
    {
      $error = 'Error inserting computer into selected categories.';
      include 'error.html.php';
      exit();
    }
  }

  header('Location: .');
  exit();
}

if (isset($_POST['action']) and $_POST['action'] == 'Edit')
{
  include ROOT . '../../../incls/db.inc.php';

  try
  {
    $sql = 'SELECT id, details, sellerid FROM computer WHERE id = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error fetching computer details.';
    include 'error.html.php';
    exit();
  }
  $row = $s->fetch();

  $pageTitle = 'Edit computer';
  $action = 'editform';
  $text = $row['details'];
  $sellerid = $row['sellerid'];
  $id = $row['id'];
  $button = 'Update computer';

  // Build the list of sellers
  try
  {
    $result = $pdo->query('SELECT id, name FROM seller');
  }
  catch (PDOException $e)
  {
    $error = 'Error fetching list of sellers.';
    include 'error.html.php';
    exit();
  }

  foreach ($result as $row)
  {
    $sellers[] = array('id' => $row['id'], 'name' => $row['name']);
  }

  // Get list of categories containing this computer
  try
  {
    $sql = 'SELECT typeid FROM computertype WHERE computerid = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $id);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error fetching list of selected categories.';
    include 'error.html.php';
    exit();
  }

  foreach ($s as $row)
  {
    $selectedCategories[] = $row['typeid'];
  }

  // Build the list of all categories
  try
  {
    $result = $pdo->query('SELECT id, name FROM type');
  }
  catch (PDOException $e)
  {
    $error = 'Error fetching list of categories.';
    include 'error.html.php';
    exit();
  }

  foreach ($result as $row)
  {
    $categories[] = array(
        'id' => $row['id'],
        'name' => $row['name'],
        'selected' => in_array($row['id'], $selectedCategories));
  }

  include 'form.html.php';
  exit();
}

if (isset($_GET['editform']))
{
  include ROOT . '../../../incls/db.inc.php';

  if ($_POST['seller'] == '')
  {
    $error = 'You must choose an seller for this computer.
        Click &lsquo;back&rsquo; and try again.';
    include 'error.html.php';
    exit();
  }

  try
  {
    $sql = 'UPDATE computer SET
        details = :details,
        sellerid = :sellerid
        WHERE id = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->bindValue(':details', $_POST['text']);
    $s->bindValue(':sellerid', $_POST['seller']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error updating submitted computer.';
    include 'error.html.php';
    exit();
  }

  try
  {
    $sql = 'DELETE FROM computertype WHERE computerid = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error removing obsolete computer type entries.';
    include 'error.html.php';
    exit();
  }

  if (isset($_POST['categories']))
  {
    try
    {
      $sql = 'INSERT INTO computertype SET
          computerid = :computerid,
          typeid = :typeid';
      $s = $pdo->prepare($sql);

      foreach ($_POST['categories'] as $typeid)
      {
        $s->bindValue(':computerid', $_POST['id']);
        $s->bindValue(':typeid', $typeid);
        $s->execute();
      }
    }
    catch (PDOException $e)
    {
      $error = 'Error inserting computer into selected categories.';
      include 'error.html.php';
      exit();
    }
  }

  header('Location: .');
  exit();
}

if (isset($_POST['action']) and $_POST['action'] == 'Delete')
{
  include ROOT . '../../../incls/db.inc.php';

  // Delete type assignments for this computer
  try
  {
    $sql = 'DELETE FROM computertype WHERE computerid = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error removing computer from categories.';
    include 'error.html.php';
    exit();
  }

  // Delete the computer
  try
  {
    $sql = 'DELETE FROM computer WHERE id = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error deleting computer.';
    include 'error.html.php';
    exit();
  }

  header('Location: .');
  exit();
}

if (isset($_GET['action']) and $_GET['action'] == 'search')
{
  include ROOT . '../../../incls/db.inc.php';

  // The basic SELECT statement
  $select = 'SELECT id, details';
  $from   = ' FROM computer';
  $where  = ' WHERE TRUE';

  $placeholders = array();

  if ($_GET['seller'] != '') // An seller is selected
  {
    $where .= " AND sellerid = :sellerid";
    $placeholders[':sellerid'] = $_GET['seller'];
  }

  if ($_GET['type'] != '') // A type is selected
  {
    $from  .= ' INNER JOIN computertype ON id = computerid';
    $where .= " AND typeid = :typeid";
    $placeholders[':typeid'] = $_GET['type'];
  }

  if ($_GET['text'] != '') // Some search text was specified
  {
    $where .= " AND details LIKE :details";
    $placeholders[':details'] = '%' . $_GET['text'] . '%';
  }

  try
  {
    $sql = $select . $from . $where;
    $s = $pdo->prepare($sql);
    $s->execute($placeholders);
  }
  catch (PDOException $e)
  {
    $error = 'Error fetching computers.';
    include 'error.html.php';
    exit();
  }

  foreach ($s as $row)
  {
    $computers[] = array('id' => $row['id'], 'text' => $row['details']);
  }

  include 'computers.html.php';
  exit();
}

// Display search form
include ROOT . '../../../incls/db.inc.php';

try
{
  $result = $pdo->query('SELECT id, name FROM seller');
}
catch (PDOException $e)
{
  $error = 'Error fetching sellers from database!';
  include 'error.html.php';
  exit();
}

foreach ($result as $row)
{
  $sellers[] = array('id' => $row['id'], 'name' => $row['name']);
}

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

include 'searchform.html.php';
