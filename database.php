<?php
  
  function createConnection() {
    $driver = 'mysql';
    $host = 'localhost';
    $db_name = 'marlin';
    $db_user = 'root';
    $db_password = '';
    $charset = 'utf8';
    $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
  
    $dsn = "$driver:host=$host;dbname=$db_name;charset=$charset";
  
    return new PDO($dsn, $db_user, $db_password, $options);
  };