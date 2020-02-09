<?php
include_once "../functions.php";
include_once "../database.php";

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirmation = $_POST['password_confirmation'];
$password_hash = password_hash($password, PASSWORD_DEFAULT);

if (empty($name)) {
  if(!isset($_SESSION['register-name-validation'])) {
    $_SESSION['register-name-validation'] = 'Поле должно быть заполнено';
  }
}

if (empty($email)) {
  if(!isset($_SESSION['register-email-validation'])) {
    $_SESSION['register-email-validation'] = 'Поле должно быть заполнено';
  }
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  if(!isset($_SESSION['register-email-validation'])) {
    $_SESSION['register-email-validation'] = "E-mail адрес '$email' указан неверно";
  }
}

if (empty($password)) {
  if(!isset($_SESSION['register-password-validation'])) {
    $_SESSION['register-password-validation'] = 'Поле должно быть заполнено';
  }
}

if (empty($password_confirmation)) {
  if(!isset($_SESSION['register-password-confirmation-validation'])) {
    $_SESSION['register-password-confirmation-validation'] = 'Поле должно быть заполнено';
  }
}

if (mb_strlen(strval($password)) < 6 || mb_strlen(strval($password_confirmation)) < 6) {
  if(!isset($_SESSION['register-password-validation'])) {
    $_SESSION['register-password-validation'] = 'Длина пароля должна быть больше 6 символов';
  }
  if(!isset($_SESSION['register-password-confirmation-validation'])) {
    $_SESSION['register-password-confirmation-validation'] = 'Длина пароля должна быть больше 6 символов';
  }
}

if($password !== $password_confirmation) {
  if(!isset($_SESSION['password-indent'])) {
    $_SESSION['password-indent'] = 'Порали не совпадают';
  }
}

if(empty($name) || empty($email) || empty($password) || empty($password_confirmation) || !filter_var($email, FILTER_VALIDATE_EMAIL) || $password !== $password_confirmation || mb_strlen($password) < 6 || mb_strlen($password_confirmation) < 6) {
  header( "Location: ../register.php" );
  exit();
}

$pdo = createConnection();

foreach ($pdo->query("SELECT * FROM `users` WHERE `email` = '$email'") as $row) {
    if(!empty($row)) {

        if(!isset($_SESSION['user_is_exits'])) {
            $_SESSION['user_is_exits'] = 'Такой пользователь уже есть!';
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