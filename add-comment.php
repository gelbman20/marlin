<?php
  
  $name = $_POST[ 'name' ];
  $message = $_POST[ 'message' ];
  
  if ( empty( $name ) && empty( $message ) ) {
    header( "Location: index.php" );
    exit();
  }
  
  $driver = 'mysql';
  $host = 'localhost';
  $db_name = 'marlin';
  $db_user = 'root';
  $db_password = '';
  $charset = 'utf8';
  $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
  
  $dsn = "$driver:host=$host;dbname=$db_name;charset=$charset";
  
  $pdo = new PDO($dsn, $db_user, $db_password, $options);
  
  $pdo->query("INSERT INTO `comments` (`id`, `userID`, `name`, `message`) VALUES (NULL, '0', '$name', '$message')");
  
  header( "Location: index.php" );
  exit();

