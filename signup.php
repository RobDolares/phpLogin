<?php
  require 'header.php';
 ?>


    <main>
      <div class="wrapper-main">
        <section class="section-default">
          <h1>Signup</h1>
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
