<?php
  include_once "../functions.php";
  include_once "../database.php";
  
  $name = $_POST[ 'name' ];
  $message = $_POST[ 'message' ];
  $date = date('Y-m-d H:i:s');
  
  if ( empty( $name ) && empty( $message ) ) {
    header( "Location: ../index.php" );
    exit();
  }
  
  
  $pdo = createConnection();
  
  $pdo->query("INSERT INTO `comments` (`id`, `userID`, `name`, `date`, `message`) VALUES (NULL, '0', '$name', '$date', '$message')");
  
  if(!isset($_SESSION['message-success'])) {
    $_SESSION['message-success'] = true;
  }
  
  header( "Location: ../index.php" );
  exit();

