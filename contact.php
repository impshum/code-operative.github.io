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
          <div class="content">
            <h1 class="title"><i class="far fa-sm fa-comments"></i>&nbsp;Contact</h1>
            <p>To discuss requirements, or seek a consultation, please get in touch by filling out the form below.</p>
          </div>
          <form id="contact">
            <div class="field">
              <div class="control">
                <input class="input" type="text" placeholder="Name" required>
              </div>
            </div>
            <div class="field">
              <div class="control">
                <input class="input" type="email" placeholder="Email address" required>
              </div>
            </div>
            <div class="field">
              <div class="control">
                <textarea class="textarea" placeholder="Your message" required></textarea>
              </div>
            </div>
            <div class="field">
              <div class="control">
                <input type="submit" class="button is-fullwidth"></input>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <?php include('assets/partials/footer.php'); ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
  <script src="assets/js/scripts.js"></script>
</body>

</html>
