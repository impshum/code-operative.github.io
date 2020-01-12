<?php
require('assets/php/controls.php');

if (!isset($_SESSION['user_data']['username'])) {
    header("location:login.php");
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
  include('assets/partials/hero.php');
  ?>
	<section class='section'>
		<div class='container'>
			<div class='columns is-multiline'>

				<div class='column is-6 dash'>
					<?php
          dash_list($uber_parsedown, 'sections');
          dash_list($uber_parsedown, 'clients');
           ?>
				</div>
				<div class='column is-6 dash'>
					<?php
          dash_list($uber_parsedown, 'community');
          dash_list($uber_parsedown, 'members');
           ?>
				</div>

			</div>
		</div>
	</section>

	<section id="edit-modal" class="hero is-fullheight is-light">
	  <div class="hero-body">
	    <div class="container">
				<div class='columns is-centered'>

					<div class='column is-6 dash'>

						<input id="p_id" class="input is-hidden" name="p_id" type="text">
						<input id="p_type" class="input is-hidden" name="p_type" type="text">

						<div id="edit-title-parent" class="field is-horizontal">
						  <div class="field-label is-normal">
						    <label class="label">Title</label>
						  </div>
						  <div class="field-body">
						    <div class="field">
						      <p class="control">
						        <input id="edit-title" class="input" name="title" type="text" placeholder="Title">
						      </p>
						    </div>
						  </div>
						</div>

						<div id="edit-name-parent" class="field is-horizontal">
						  <div class="field-label is-normal">
						    <label class="label">Name</label>
						  </div>
						  <div class="field-body">
						    <div class="field">
						      <p class="control">
						        <input id="edit-name" class="input" name="name" type="text" placeholder="Name">
						      </p>
						    </div>
						  </div>
						</div>

						<div id="edit-icon-parent" class="field is-horizontal">
						  <div class="field-label is-normal">
						    <label class="label">Icon</label>
						  </div>
						  <div class="field-body">
						    <div class="field">
						      <p class="control">
						        <input id="edit-icon" class="input" name="icon" type="text" placeholder="Font Awesome icon">
						      </p>
						    </div>
						  </div>
						</div>

						<div id="edit-image-parent" class="field is-horizontal">
						  <div class="field-label is-normal">
						    <label class="label">Image</label>
						  </div>
						  <div class="field-body">
						    <div class="field">
						      <p class="control">
						        <input id="edit-image" class="input" name="image" type="text" placeholder="Image url">
						      </p>
						    </div>
						  </div>
						</div>

						<div id="edit-url-parent" class="field is-horizontal">
							<div class="field-label is-normal">
								<label class="label">Url</label>
							</div>
							<div class="field-body">
								<div class="field">
									<p class="control">
										<input id="edit-url" class="input" name="url" type="text" placeholder="Url">
									</p>
								</div>
							</div>
						</div>

						<textarea id="edit-area"></textarea>

						<div class="buttons">
						  <button class="button toggle-modal">Close</button>
						  <button id="save" class="button">Save</button>
						</div>
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
		element: $('#edit-area')[0],
		onToggleFullScreen: function(){
			$('.navbar').toggle();
		},
		autosave: true,
		autofocus: true
	});

	$('.toggle-modal').on('click', function(){
		$('#edit-modal').toggleClass('show-modal');
	});

	$('.edit').on('click', function(){
		var p_id = $(this).data('p_id');
		var p_type = $(this).data('p_type');
		$.ajax({
			type: 'POST',
			data: {
				'mode': 'edit',
				'p_id': p_id,
				'p_type': p_type
			},
			url: 'assets/php/dash.php',
			success: function(data) {
				console.log(data);
				if (data) {
					var items = JSON.parse(data);
					var markdown = items.md_markdown;
					var title = items.md_meta.title;
					var name = items.md_meta.name;
					var url = items.md_meta.url;
					var icon = items.md_meta.icon;
					var image = items.md_meta.image;

					$('.is-horizontal').hide();

					$('#p_id').val(p_id);
					$('#p_type').val(p_type);

					if (title) {
						$('#edit-title').val(title);
						$('#edit-title-parent').show();
					}

					if (name) {
						$('#edit-name').val(name);
						$('#edit-name-parent').show();
					}

					if (url) {
						$('#edit-url').val(url);
						$('#edit-url-parent').show();
					}

					if (icon) {
						$('#edit-icon').val(icon);
						$('#edit-icon-parent').show();
					}

					if (image) {
						$('#edit-image').val(image);
						$('#edit-image-parent').show();
					}

					easyMDE.value(markdown);

					if (!$('#edit-modal').hasClass('show-modal')) {
						$('#edit-modal').addClass('show-modal');
					}

				}
			},
			error: function(error) {
				console.log(error);
			}
		});
	});

	$('#save').on('click', function(){
		var p_id = $('#p_id').val();
		var p_type = $('#p_type').val();
		var title = $('#edit-title').val();
		var name = $('#edit-name').val();
		var url = $('#edit-url').val();
		var icon = $('#edit-icon').val();
		var image = $('#edit-image').val();
		var content = easyMDE.value();
		$.ajax({
			type: 'POST',
			data: {
				'mode': 'save',
				'p_id': p_id,
				'p_type': p_type,
				'title': title,
				'name': name,
				'url': url,
				'icon': icon,
				'image': image,
				'content': content,
			},
			url: 'assets/php/dash.php',
			success: function(data) {
				if (data) {
					notify('Saved', 'black', 5000);
				}
			},
			error: function(error) {
				console.log(error);
			}
		});
	});

	</script>
</body>

</html>
