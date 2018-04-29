<!-- Personal profile page for user if user is logged in -->

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
				<a href="../src/model/session_handler/logout_handler.php" class="banner-bar-item">
					<i class="fas fa-sign-out-alt fa-2x"></i>
				</a>
			</div>
		</div>
	</div>
</main>