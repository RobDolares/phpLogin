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
  //check database to see if username exists already
  else {

    $sql = "SELECT uidUsers FROM users WHERE uidUsers=? ";
    $stmt = mysqli_stmt_init($conn);
    // check if $stmt can be run in database($sql)
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../signup.php?error=sqlerror");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);
      if ($resultCheck > 0) {
        header("Location: ../signup.php?error=usertaken&mail=".$email);
        exit();
      }
      else {
        $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../signup.php?error=sqlerror");
          exit();
        }
        else {
          $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

          mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
          mysqli_stmt_execute($stmt);

          header("Location: ../signup.php?signup=success");
        }
      }
    }
  }
  // Close database connection
  mysqli_stmt_close($stmt);
  mysqli_close($conn);

}
// Send user back to signup if this is accessed without clicking submit
else {
  header("Location: ../signup.php");
}
