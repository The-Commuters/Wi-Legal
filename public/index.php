<!-- Required files to load for page to work -->
<?Php
/* Connects to database and retrieves time */
require '../config/config.php';
/* Retrieving php code from login_handler.php */
include '../src/model/form_handlers/login_handler.php';
/* $loggedinuser will tell the rest of the site what user is connected */
include '../src/model/userinfo_handler/userinfo_handler.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" >
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Wi Legal</title>
	<meta name="description" content="Description of the page less than 150 characters">
	<link rel="icon" type="image/png" href="img/favicon/favicon.png">
	<link rel="canonical" href="http://example.com/index.html">

	<!-- CSS files -->
	<link rel="stylesheet" href="css/style.css">

	<!-- JavaScript files -->
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/core.js" async></script>
</head>

<body>
	<!-- HEADER -->
	<?php
		include '../src/utils/template/components/header.php';
	?>

	<!-- PARALLAX ENABLER -->
	<div class="parallax">

		<main>

			<!-- HERO IMAGE -->

			<section class="back-layer parallax-group">

				<div class="center-flex parallax-layer parallax-layer-base"></div>

				<div class="parallax-layer parallax-layer-back">
					<img src="img/placeholders/placeholder_large.png" alt="Test" class="full-w img-fix">
				</div>

			</section>

			<section class="base-layer parallax-group">

				<div class="center-flex parallax-layer parallax-layer-base white-bcg">
					<h2 class="center-text blue-txt">Noe</h2>
					<p class="bread-txt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vitae felis mi. Sed aliquam tellus a augue ultrices, vitae viverra est cursus. Etiam lobortis sollicitudin pharetra. Nullam facilisis facilisis erat in ultricies. Phasellus erat augue, porttitor vitae semper at, commodo a libero. Donec dictum lacus ac nibh dictum, ac commodo augue auctor. Fusce consequat ex ac sapien finibus ullamcorper. Donec tincidunt sapien erat, sit amet euismod risus mollis elementum. Ut ultrices augue quis ipsum imperdiet, eget euismod metus luctus. Ut posuere tristique augue, et pellentesque dui pulvinar non. Fusce eu purus lectus.</p>
				</div>

			</section>

			<section class="deep-back-layer parallax-group">

				<div class="center-flex parallax-layer parallax-layer-base"></div>

				<div class="parallax-layer parallax-layer-deep-back">
					<img src="img/placeholders/placeholder_large.png" alt="Test" class="full-w img-fix">
				</div>

			</section>

			<section class="base-layer parallax-group">

				<div class="center-flex parallax-layer parallax-layer-base white-bcg">
					<h2 class="center-text blue-txt">Noe</h2>
					<p class="bread-txt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vitae felis mi. Sed aliquam tellus a augue ultrices, vitae viverra est cursus. Etiam lobortis sollicitudin pharetra. Nullam facilisis facilisis erat in ultricies. Phasellus erat augue, porttitor vitae semper at, commodo a libero. Donec dictum lacus ac nibh dictum, ac commodo augue auctor. Fusce consequat ex ac sapien finibus ullamcorper. Donec tincidunt sapien erat, sit amet euismod risus mollis elementum. Ut ultrices augue quis ipsum imperdiet, eget euismod metus luctus. Ut posuere tristique augue, et pellentesque dui pulvinar non. Fusce eu purus lectus.</p>
				</div>

			</section>

			<section class="back-layer parallax-group">

				<div class="center-flex parallax-layer parallax-layer-base"></div>

				<div class="parallax-layer parallax-layer-back">
					<img src="img/placeholders/placeholder_large.png" alt="Test" class="full-w img-fix">
				</div>

			</section>

			<section class="base-layer parallax-group">

				<div class="center-flex parallax-layer parallax-layer-base white-bcg">
					<h2 class="center-text blue-txt">Noe</h2>
					<p class="bread-txt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vitae felis mi. Sed aliquam tellus a augue ultrices, vitae viverra est cursus. Etiam lobortis sollicitudin pharetra. Nullam facilisis facilisis erat in ultricies. Phasellus erat augue, porttitor vitae semper at, commodo a libero. Donec dictum lacus ac nibh dictum, ac commodo augue auctor. Fusce consequat ex ac sapien finibus ullamcorper. Donec tincidunt sapien erat, sit amet euismod risus mollis elementum. Ut ultrices augue quis ipsum imperdiet, eget euismod metus luctus. Ut posuere tristique augue, et pellentesque dui pulvinar non. Fusce eu purus lectus.</p>
				</div>

			</section>

		</main>


		<!-- FOOTER -->
		<footer class="full-w">

			<div class="parallax-footer">
				<div class="copyright parallax-layer parallax-layer-base">
					<!-- COPYRIGHT -->
					<div class="note-txt black-txt"><a href="#" class="blue-txt">Copyright</a> of WI-Legal (legal shit)</div>
				</div>
			</div>

		</footer>

	</div>

</body>
	</html>