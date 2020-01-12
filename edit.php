<?php
require('assets/php/controls.php');

if (!isset($_SESSION['user_data']['username'])) {
    header("location:./");
    exit;
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
	<link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
</head>

<body>

  <?php
  include('assets/partials/navbar.php');
	//include('assets/partials/hero.php');
  ?>
	<section class='section'>
		<div class='container'>
			<div class='columns is-centered'>

				<div class='column is-6 dash'>
          <div class='content'>
						<h1 class='title load-me'><i class='fas fa-xs fa-pen'></i>&nbsp;Edit</h1>
						<textarea id="my-text-area"></textarea>
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
	<script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>
  <script src="assets/js/scripts.js"></script>
	<script>

	var easyMDE = new EasyMDE({
		element: $('#my-text-area')[0],
		onToggleFullScreen: function(){
			$('.navbar').toggle();
		}
	});

	</script>
</body>

</html>
