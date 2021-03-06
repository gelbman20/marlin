<?php
include_once "functions.php";
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
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">Register</div>

            <div class="card-body">

              <?php if ( $_SESSION[ 'user_is_exits' ] ) : ?>
                <div class="alert alert-danger" role="alert">
                  <?= $_SESSION['user_is_exits'] ?>
                </div>
                  <?php unset( $_SESSION[ 'user_is_exits' ] ); ?>
              <?php endif; ?>
  
              <?php if ( $_SESSION[ 'password-indent' ] ) : ?>
                <div class="alert alert-danger" role="alert">
                  <?= $_SESSION['password-indent'] ?>
                </div>
                <?php unset( $_SESSION[ 'password-indent' ] ); ?>
              <?php endif; ?>

              <form method="POST" action="forms/form-register.php">

                <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                  <div class="col-md-6">
                    <input id="name" type="text" class="<?php echo (isset($_SESSION['register-name-validation'])) ? 'is-invalid' : ''?> form-control @error('name') @enderror" name="name">
                    <span class="invalid-feedback" role="alert">
                      <strong><?= $_SESSION[ 'register-name-validation' ] ?></strong>
                    </span>
                    <?php unset( $_SESSION[ 'register-name-validation' ] ); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                  <div class="col-md-6">
                    <input id="email" type="text" class="<?php echo (isset($_SESSION['register-email-validation'])) ? 'is-invalid' : ''?> form-control" name="email">
                    <span class="invalid-feedback" role="alert">
                      <strong><?= $_SESSION[ 'register-email-validation' ] ?></strong>
                    </span>
                    <?php unset( $_SESSION[ 'register-email-validation' ] ); ?>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                  <div class="col-md-6">
                    <input id="password" type="password" class="<?php echo (isset($_SESSION['register-password-validation'])) ? 'is-invalid' : ''?> form-control " name="password"
                           autocomplete="new-password">
                    <span class="invalid-feedback" role="alert">
                      <strong><?= $_SESSION[ 'register-password-validation' ] ?></strong>
                    </span>
                    <?php unset( $_SESSION[ 'register-password-validation' ] ); ?>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                  <div class="col-md-6">
                    <input id="password-confirm" type="password" class="<?php echo (isset($_SESSION['register-password-confirmation-validation'])) ? 'is-invalid' : ''?> form-control" name="password_confirmation"
                           autocomplete="new-password">
                    <span class="invalid-feedback" role="alert">
                      <strong><?= $_SESSION[ 'register-password-confirmation-validation' ] ?></strong>
                    </span>
                    <?php unset( $_SESSION[ 'register-password-confirmation-validation' ] ); ?>
                  </div>
                </div>

                <div class="form-group row mb-0">
                  <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                      Register
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>
</body>
</html>
