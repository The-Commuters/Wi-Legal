<!-- Profile page for lawyer if user is lawyer -->

<!-- Profile page for logged in lawyers, can be found profile.php if user -->

<!-- MAIN -->
<main class="marg-container">
	<div class="profile center-marg med-marg-top">

		<div class="banner-container full-w card med-marg-bot">
			<div class="banner full-w">
				<div class="banner-background"><img src="img/placeholders/placeholder_large_slim.jpg" class="img-fix" alt="#"></div>
				<div class="banner-profile"><img src="<?php echo $profile_pic; ?>" class="img-fix" alt="#"></div>
				<h1 class="banner-name white-txt tablet-show fade-right-2s"><?php echo $first_name . " " . $last_name  ?></h1>
			</div>
			<div class="banner-bar full-w">
			</div>
		</div>
	</div>

	<a href="../src/model/session_handler/logout_handler.php">Logout</a>
</main>