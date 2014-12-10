<?php
try {
  // local credentials
  $pdo = new PDO('mysql:host=localhost;dbname=erroljokes', 'errol', 'test');

  // studentweb credentials 
  //$pdo = new PDO('mysql:host=localhost;dbname=silvere', 'silvere', 'test');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->exec('SET NAMES "utf8"');

  $status = "Connection Established";
} catch (PDOException $e) {
  $status = "Your connection goofed";
}
