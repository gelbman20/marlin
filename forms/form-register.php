<?php
include_once "../functions.php";
include_once "../database.php";

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirmation = $_POST['password_confirmation'];
$password_hash = password_hash($password, PASSWORD_DEFAULT);

$pdo = createConnection();

foreach ($pdo->query("SELECT * FROM `users` WHERE `email` = '$email'") as $row) {
    if(!empty($row)) {

        if(!isset($_SESSION['user_is_exits'])) {
            $_SESSION['user_is_exits'] = true;
        }

        header( "Location: ../register.php" );
        exit();
    }
}


$pdo->query("INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES (NULL, '$name', '$email', '$password_hash')");
if(!isset($_SESSION['user_is_added'])) {
    $_SESSION['user_is_added'] = true;
}
header( "Location: ../index.php" );
exit();