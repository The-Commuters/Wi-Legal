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
				</div>
				<div class="banner-bar full-w">
					<a href="#" class="banner-bar-item"><i class="fas fa-envelope fa-2x"></i></a>
				</div>
			</div>

			<div class="profile-item full-w med-marg-bot">
				<div class="profile-item-title full-w card">
					<h2 class="white-txt">Book</h2>
				</div>
				<div class="profile-item-info full-w card"></div>
			</div>

			<div class="profile-item full-w med-marg-bot">
				<div class="profile-item-title full-w card">
					<h2 class="white-txt">About</h2>
				</div>
				<div class="profile-item-info full-w card"></div>
			</div>

			<div class="profile-item full-w med-marg-bot">
				<div class="profile-item-title full-w small-marg-bot card">
					<h2 class="white-txt">Reviews</h2>
				</div>
				<div class="profile-item-review full-w small-marg-bot card"></div>
				<div class="profile-item-review full-w small-marg-bot card"></div>
				<div class="profile-item-review full-w small-marg-bot card"></div>
			</div>

		</div>
	</main>

	<!-- FOOTER -->
	<?php include '../src/utils/template/components/footer.php'; ?>
</body>
</html>