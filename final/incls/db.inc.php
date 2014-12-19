<?php
try {
  // local credentials
  $pdo = new PDO('mysql:host=localhost;dbname=finale', 'errol', 'test');


  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->exec('SET NAMES "utf8"');

  $status = "Connection Established";
} catch (PDOException $e) {
  $status = "Your connection goofed";
}
