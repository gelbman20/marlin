<?php
  
  include_once "database.php";
  
  $name = $_POST[ 'name' ];
  $message = $_POST[ 'message' ];
  $date = date('Y-m-d H:i:s');
  
  if ( empty( $name ) && empty( $message ) ) {
    header( "Location: index.php" );
    exit();
  }
  
  
  $pdo = createConnection();
  
  $pdo->query("INSERT INTO `comments` (`id`, `userID`, `name`, `date`, `message`) VALUES (NULL, '0', '$name', '$date', '$message')");
  
  header( "Location: index.php" );
  exit();

