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

	<!-- HEAD -->
	<?php $page_title = 'Wilegal'; include '../src/utils/template/components/head.php'; ?>

<body>
	<!-- HEADER -->
	<?php $current_page = 'index'; include '../src/utils/template/components/header.php';?>

	<!-- PARALLAX ENABLER -->
	<div class="parallax">

		<main>

			<!-- HERO IMAGE -->
			<section class="back-layer parallax-group">

				<div class="center-flex parallax-layer parallax-layer-base"></div>

				<div class="parallax-layer parallax-layer-back">
					<img src="img/placeholders/placeholder_large.jpg" alt="Test" class="full-w img-fix">
				</div>

			</section>

			<section class="base-layer parallax-group">

				<div class="center-flex parallax-layer parallax-layer-base white-bcg">
					<h2 class="center-text blue-txt"></h2>
					<p class="bread-txt">Wi-Legal.com is an interactive online platform that makes it faster and easier to find and hire the best Lawyers in any city / court in Vietnam, because you deserve access to first-rate, professional legal advice from the best Lawyers out there. We are on a mission to make the legal experience remarkable by making legal services high quality, cost-effective and on-demand for every need.

					We are not a law firm, do not provide any legal services, legal advice or "Lawyer referral services" and do not provide or participate in any legal representation.</p>
				</div>

			</section>

			<section class="deep-back-layer parallax-group">

				<div class="center-flex parallax-layer parallax-layer-base"></div>

				<div class="parallax-layer parallax-layer-deep-back">
					<img src="img/placeholders/placeholder_large.jpg" alt="Test" class="full-w img-fix">
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
					<img src="img/placeholders/placeholder_large.jpg" alt="Test" class="full-w img-fix">
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
		<?php include '../src/utils/template/components/footer.php'; ?>

	</div>

</body>
	</html>