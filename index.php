<!-- Required files to load for page to work -->
<?Php
/* Connects to database and retrieves time */
require 'config/config.php';
/* Retrieving php code from login_handler.php */
require 'includes/form_handlers/login_handler.php';
/* $loggedinuser will tell the rest of the site what user is connected */
include 'info.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" >
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Wi Legal</title>
	<meta name="description" content="Description of the page less than 150 characters">
	<link rel="icon" type="image/png" href="favicon.png">
	<link rel="canonical" href="http://example.com/index.html">

	<!-- CSS files -->
	<link rel="stylesheet" href="css/style.css">

	<!-- JavaScript files -->
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/temp.js" async></script>
</head>

<body>


	<!-- HEADER -->
	<header>

		<!-- LOGO -->
		<a href="index.html" class=" logo-container center-flex">
			<h1 class="full-w full-h center-flex"><span class="blue-txt">WI</span></h1>
		</a>

		<!-- NAVIGATION -->
		<nav class="full-h full-w">

			<a href="index.html" class="nav-item full-w full-h center-flex active">
				<i class="pc-hide fas fa-home fa-fw fa-2x"></i>
				<span class="pc-show nav-txt">Home</span>
			</a>

			<a href="#" class="nav-item full-w full-h center-flex">
				<i class="pc-hide fas fa-list fa-fw fa-2x"></i>
				<span class="pc-show nav-txt">Lawyers</span>
			</a>

			<a href="#" class="nav-item full-w full-h center-flex">
				<i class="pc-hide fas fa-info fa-fw fa-2x"></i>
				<span class="pc-show nav-txt">About</span>
			</a>

			<a href="#" class="nav-item full-w full-h center-flex">
				<i class="pc-hide fas fa-comment fa-fw fa-2x"></i>
				<span class="pc-show nav-txt">Contact</span>
			</a>

		</nav>

		<!-- DETTE ER FRA HVOR DU KAN KLIPPE UT DANIEL -->

		<!-- LOGOUT.PHP -->
		<?php if (isset($user)) { ?>  <a href="logout.php">Logout</a>  <?php } else { ?>

		<!-- LOGIN -->
		<div href="#" class="login-container">
			<div class="full-w full-h center-flex">

				<span class="pc-show nav-txt">Login</span>
				<i class="pc-hide fas fa-sign-in-alt fa-fw fa-2x"></i>

				<div class="login-drop">
					<div class="login-box-container">
						<div class="login-box full-w full-h">
							
							<!-- Login quit -->
							<div class="login-quit">
								<i class="fas fa-times fa-2x"></i>
							</div>

							<!-- Form title -->
							<h2 class="login-title blue-txt">Login</h2>

							<!-- LOGIN FORM.PHP -->
							<form action="index.php" method="POST" class="login-form center-abs">

								<!--Email input-box-->
								<input class="small-marg-bot full-w" type="email" 
								name="l_email" placeholder="Email Address" value="<?php
								/*If there is an email in $ _SESSION, show it as value in the input box*/
								if(isset($_SESSION['l_email'])) {echo $_SESSION['l_email'];} ?>" required>

								<br>

								<!--password input-boks-->
								<input class="med-marg-bot full-w" type="password" 
								name="l_password" placeholder="Password">

								<br>

								<!--The button that initiates login_handler.php and logs uses into the website-->
								<input type="submit" name="login_button" value="Login">
								<!--If there is an error message in $ error_array about the password, type it here-->
								<?php if(in_array("Email or password was incorrect<br>", $error_array)) {
								echo  "Email or password was incorrect<br>";} ?>
								<!-- FIX SÅNN AT DEN IKKE RELOADER UTEN RIKTIG PASSORD OG BRUKERNAVN -->

								<br>

								<!-- The links for creation of account and retrival of password -->
								<div class="login-links">
									<a href="register.php" class="img-fix small-marg-bot note-txt blue-txt">New User?</a>
									<a href="#" class="note-txt blue-txt">Forgot password?</a>
								</div>

							</form>
						</div>
					</div>
				</div>

			</div>
		</div>

		<!-- LOGIN END.PHP -->
		<?php } ?>
		<!-- DETTE ER TIL HVOR DU KAN KLIPPE UT DANIEL -->

		</header>

		<!-- PARALLAX ENABLER -->
		<div class="parallax">

			<main>

				<!-- HERO IMAGE -->

				<section class="back-layer parallax-group">

					<div class="center-flex parallax-layer parallax-layer-base"></div>

					<div class="parallax-layer parallax-layer-back">
						<img src="assets/img/Placeholder.png" alt="Test" class="full-w img-fix">
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
						<img src="assets/img/Placeholder.png" alt="Test" class="full-w img-fix">
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
						<img src="assets/img/Placeholder.png" alt="Test" class="full-w img-fix">
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