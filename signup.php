<?php
  require 'header.php';
 ?>


    <main>
      <div class="wrapper-main">
        <section class="section-default">
          <h1>Signup</h1>
          <?php

          if (isset($_GET['error'])) {
            switch ($_GET['error']) {
              case 'emptyfields':
                echo '<p class="signuperror">Please fill in all fields</p>';
                break;

              case 'invalidmailuid':
                echo '<p class="signuperror">Invalid e-mail and username</p>';
                break;

              case 'invalidmail':
                echo '<p class="signuperror">Invalid e-mail</p>';
                break;

              case 'invaliduid':
                echo '<p class="signuperror">Invalid username</p>';
                break;

              case 'passwordcheck':
                echo '<p class="signuperror">Passwords did not match</p>';
                break;

              case 'usertaken':
                echo '<p class="signuperror">Username not available</p>';
                break;

              default:
                // code...
                break;
            }

            if (isset($_GET['signup']) === 'success') {
              echo '<p class="signupsuccess">Signup successful</p>';
            }
          }

           ?>
          <form action="includes/signup.inc.php" method="post">
            <div class="form-group" id="signup-form">
              <input class="form-control" type="text" name="uid" placeholder="Username">
              <input class="form-control" type="text" name="mail" placeholder="E-mail">
              <input class="form-control" type="password" name="pwd" placeholder="Password">
              <input class="form-control" type="password" name="pwd-repeat" placeholder="Re-enter password">
              <button class="btn btn-secondary" type="submit" name="signup-submit">Signup</button>
            </div>
          </form>
        </section>
      </div>
    </main>


<?php
require 'footer.php';
?>
