<?php
if (isset($_POST['signup-submit'])) {

  require 'dbh.inc.php';

  $username = $_POST['uid'];
  $email = $_POST['mail'];
  $password = $_POST['pwd'];
  $passwordrepeat = $_POST['pwd-repeat'];
  $pattern = "/^[a-zA-Z0-9]*$/";

  //check if fields were populated
  if (empty($username) || empty($email) || empty($password) || empty($passwordrepeat)) {
    header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
    exit();
  }
  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match($pattern, $username)) {
    header("Location: ../signup.php?error=invalidmailuid");
    exit();
  }
  //check if valid email
  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signup.php?error=invalidmail&uid=".$username);
    exit();
  }
  //check if valid username
  elseif (!preg_match($pattern, $username)) {
    header("Location: ../signup.php?error=invaliduid&mail=".$email);
    exit();
  }
  //check if password verification matches original entry
  elseif ($password !== $passwordrepeat) {
    header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
    exit();
  }
}
