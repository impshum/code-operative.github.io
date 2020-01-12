<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require('assets/php/controls.php');

if (isset($_POST['submit'])) {
    $logins = array('impshum' => 'slappa');

    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (isset($logins[$username]) && $logins[$username] == $password) {
        $_SESSION['user_data']['username'] = $logins[$username];
        header("location:dash.php");
        exit;
    } else {
        $msg = "ERROR";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Code-Operative</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

</head>

<body>

  <?php
  include('assets/partials/navbar.php');
	include('assets/partials/hero.php');
  ?>

	<section class="section">
	  <div class="container">
	    <div class="columns is-centered">
	      <div class="column is-6">
	        <form id="contact" action="" method="post">
						<div class="field">
	            <div class="control">
	              <input class="input" name="username" type="text" placeholder="Username" required autofocus>
	            </div>
	          </div>
						<div class="field">
	            <div class="control">
	              <input class="input" name="password" type="password" placeholder="Password" required>
	            </div>
	          </div>
	          <div class="field">
	            <div class="control">
	              <input type="submit" name="submit" class="button is-fullwidth"></input>
	            </div>
	          </div>
	        </form>
          <br>
          <div class="has-text-centered has-text-danger">
            <?php
            if (isset($msg)) {
                echo $msg;
            }
            ?>
          </div>
	      </div>
	    </div>
	  </div>
	</section>

  <?php
  include('assets/partials/footer.php');
  ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
  <script src="assets/js/scripts.js"></script>
</body>

</html>
