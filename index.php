<?php
require('assets/php/controls.php');
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
  get_sections($uber_parsedown);
  ?>

  <section class="hero is-medium is-light spread">
    <div class="hero-body">
      <div class="container has-text-centered">
        <a href="contact.php" class="button has-text-weight-semibold is-large is-black join">Join Code-Operative</a>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <h1 class="title"><i class="fas fa-sm fa-user-friends"></i>&nbsp;Clients</h1>
      <div class="clients-logos">
        <?php get_clients($uber_parsedown); ?>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <h1 class="title"><i class="fas fa-sm fa-users"></i>&nbsp;Community</h1>
      <div class="columns is-multiline">
        <?php get_community($uber_parsedown); ?>
      </div>
    </div>
  </section>

  <?php include('assets/partials/footer.php'); ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
  <script src="assets/js/scripts.js"></script>
</body>

</html>
