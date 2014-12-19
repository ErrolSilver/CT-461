<?php
if (!defined('ROOT')) {
	define('ROOT', dirname(__FILE__));
}

include_once ROOT . '/incls/magicquotes.inc.php';
include ROOT . '/incls/db.inc.php';

try {
  $sql = 'SELECT computer.id, details, name, email
      FROM computer INNER JOIN seller
        ON sellerid = seller.id';
  $result = $pdo->query($sql);
}

catch (PDOException $e) {
  $error = 'Error fetching computers: ' . $e->getMessage();
  include 'error.html.php';
  exit();
}

foreach ($result as $row) {
  $computers[] = array(
    'id' => $row['id'],
    'text' => $row['details'],
    'name' => $row['name'],
    'email' => $row['email']
  );
}

include 'default.html.php';

