<!--Home for other lawyers.-->

<?php  
/* Connection to the database. */
require '../config/config.php';
/*Retrives the info of the user*/
include '../src/model/userinfo_handler/userinfo_handler.php';
/* Cuts down link to be able to find who the page is about*/
include '../src/model/form_handlers/profile_handler.php';
/* Retrieving php code from login_handler.php */
include '../src/model/form_handlers/login_handler.php';
/*Uses this in next include, had to put it here*/
include '../src/model/form_handlers/message_handler.php';
/* Collects all reviews for the lawyer in question */
include '../src/model/form_handlers/rating_handler.php';		

?>

<!DOCTYPE html>
<html lang="en" dir="ltr" >
<!-- HEAD -->
<?php $page_title = 'Wilegal'; include '../src/utils/template/components/head.php'; ?>

<body>
	<!-- HEADER -->
	<?php $current_page = 'profile'; include '../src/utils/template/components/header.php'; ?>

	<!-- MAIN -->
	<main class="marg-container">
		<div class="profile center-marg med-marg-top">

			<div class="banner-container full-w card med-marg-bot">
				<div class="banner full-w">
					<div class="banner-background"><img src="img/placeholders/placeholder_large_slim.jpg" class="img-fix" alt="#"></div>
					<div class="banner-profile"><img src="img/profile/default/1.png" class="img-fix" alt="#"></div>
					<h1 class="banner-name white-txt tablet-show fade-right-2s">Name Namerson</h1>
					<div class="banner-rating card">
						<div class="center-flex">
							<span class="bread-txt black-txt">4.0</span><i class="fas fa-star fa-2x"></i>
						</div>
					</div>
				</div>
				<div class="banner-bar full-w">
					<a href="#" class="banner-bar-item"><i class="fas fa-envelope fa-2x"></i></a>
				</div>
			</div>

			<div class="profile-item full-w med-marg-bot">
				<div class="profile-item-title full-w card">
					<h2 class="white-txt">About</h2>
				</div>
				<div class="profile-item-info full-w card">
					<!-- Vises for userprofile -->
					<textarea class="bread-txt full-w" name="message" placeholder="Max 1000 characters." rows="6" required></textarea>
					<!-- Vises for profile -->
					<p class="bread-txt full-w black-txt"></p>
				</div>
			</div>

			<div class="profile-item full-w med-marg-bot">
				<div class="profile-item-title full-w card">
					<h2 class="white-txt">Schedule</h2>
				</div>
				<div class="profile-item-info full-w card">

					<div class="full-w">
						<div class="schedule">
							<div class="schedule-item bread-txt">
								<span class="white-txt full-w center-text">Monday</span>
								<p>17:00 - 18:00</p>
							</div>
							<div class="schedule-item bread-txt">
								<span class="white-txt full-w center-text">Tuesday</span>
								<p>17:00 - 18:00</p>
							</div>
							<div class="schedule-item bread-txt">
								<span class="white-txt full-w center-text">Wednesday</span>
								<p>17:00 - 18:00</p>
							</div>
							<div class="schedule-item bread-txt">
								<span class="white-txt full-w center-text">Thursday</span>
								<p>17:00 - 18:00</p>
							</div>
							<div class="schedule-item bread-txt">
								<span class="white-txt full-w center-text">Friday</span>
								<p>17:00 - 18:00</p>
							</div>
							<div class="schedule-item bread-txt">
								<span class="white-txt full-w center-text">Saturday</span>
								<p>17:00 - 18:00</p>
							</div>
							<div class="schedule-item bread-txt">
								<span class="white-txt full-w center-text">Sunday</span>
								<p>17:00 - 18:00</p>
							</div>
						</div>
					</div>

				</div>
			</div>

			<div class="profile-item full-w med-marg-bot">
				<div class="profile-item-title full-w small-marg-bot card">
					<h2 class="white-txt">Reviews</h2>
				</div>
				<div class="list-item profile-item-review full-w small-marg-bot card">
					<a href="#" class="list-item-avatar center-flex pc-show">
						<div class=".img-cutter">
							<img src="img/profile/default/1.png" alt="#">
						</div>
					</a>

					<div class="list-item-main full-w">
						<div class="title-row margin-bottom">
							<a href="Name namerson" class="lsp-name">Name Namerson</a>
							<!-- Vises for reviewer -->
							<div><!-- vis en metode for å gi stjerner her --></div>
							<!-- Vises for profile -->
							<div><!-- vis hvor mange stjerner som ble gitt her --></div>
						</div>
						<div class="info-row margin-bottom">
							<!-- Vises for reviewer -->
							<textarea class="bread-txt black-txt full-w" name="#" id="#" rows="6" placeholder="Write a review please"></textarea>
							<!-- Vises for profile -->
							<p class="bread-txt full-w black-txt"></p>
						</div>
					</div>
				</div>
			</div>

		</div>
	</main>

	<!-- FOOTER -->
	<?php include '../src/utils/template/components/footer.php'; ?>
</body>
</html>