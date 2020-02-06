<?php
  include_once "functions.php";
  include_once "database.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Comments</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="css/app.css" rel="stylesheet">
</head>
<body>
<div id="app">
  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        Project
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">

        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
          <!-- Authentication Links -->
          <li class="nav-item">
            <a class="nav-link" href="login.html">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="py-4">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header"><h3>Комментарии</h3></div>

            <div class="card-body">
              <?php if ( $_SESSION[ 'message-success' ] ) : ?>
                <div class="alert alert-success" role="alert">
                  Комментарий успешно добавлен
                </div>
                <?php unset( $_SESSION[ 'message-success' ] ); ?>
              <?php endif; ?>
              
              <?php
                $pdo = createConnection();
              ?>
              
              <?php foreach ( $pdo->query( "SELECT * FROM `comments` ORDER BY id DESC" ) as $user ) { ?>
                <div class="media">
                  
                  <?php
                    if ( !isset( $user[ "image" ] ) ) {
                      $user[ "image" ] = 'img/no-user.jpg';
                    }
                    
                    $date = $user[ "date" ];
                    $re = '/\d{2}(-\d{2}){2}/m';
                    preg_match_all($re, $date, $matches, PREG_SET_ORDER, 0);
                    $date = $matches[0][0];
                    
                    $re = '/-/';
                    $date = preg_replace($re, "/", $date);
                  ?>

                  <img src="<?= $user[ "image" ] ?>" class="mr-3" alt="..." width="64" height="64">
                  <div class="media-body">
                    <h5 class="mt-0"><?= $user[ "name" ] ?></h5>
                    <span><small><?= $date ?></small></span>
                    <p><?= $user[ "message" ] ?></p>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>

        <div class="col-md-12" style="margin-top: 20px;">
          <div class="card">
            <div class="card-header"><h3>Оставить комментарий</h3></div>

            <div class="card-body">
              <form class="form-comment" action="forms/add-comment.php" method="post">
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Имя</label>
                  <input name="name" class="form-control form-comment-name" id="exampleFormControlTextarea1"/>
                  <span class="invalid-feedback" role="alert">
                    <strong>Ошибка валидации</strong>
                  </span>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Сообщение</label>
                  <textarea name="message" class="form-control form-comment-message" id="exampleFormControlTextarea1" rows="3"></textarea>
                  <span class="invalid-feedback" role="alert">
                    <strong>Ошибка валидации</strong>
                  </span>
                </div>
                <button type="submit" class="btn btn-success">Отправить</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>
<script src="js/script.js"></script>
</body>
</html>
