<?php
  session_start();

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>PHP Sample login</title>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">
          <img src="img/logo_test.png" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Portfolio</a></li>
            <li class="nav-item"><a class="nav-link" href="#">About</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
          </ul>
            <form class="form-inline my-2 my-lg-0" action="includes/login.inc.php" method="post">
              <input class="form-control mr-sm-2" type="text" name="mailuid" placeholder="Username/Email">
              <input class="form-control mr-sm-2" type="password" name="pwd" placeholder="Password">
              <button class="btn btn-secondary my-2 my-sm-0" type="submit" name="login-submit">Login</button>
            </form>
            <a class="nav-link signup-link" href="signup.php">Signup</a>
            <form class="form-inline my-2 my-lg-0" action="includes/logout.inc.php" method="post">
              <button class="btn btn-secondary my-2 my-sm-0" type="submit" name="logout-submit">Logout</button>
            </form>
        </div>
      </nav>
    </header>
  </body>
</html>
