<!-- Profile page for logged in lawyers, can be found profile.php if user -->

<!-- MAIN -->
<main class="marg-container">
	<div class="profile center-marg med-marg-top">

		<div class="banner-container full-w card med-marg-bot">
			<div class="banner full-w">
				<div class="banner-background"><img src="img/placeholders/placeholder_large_slim.jpg" class="img-fix" alt="#"></div>
				<div class="banner-profile"><img src="<?php echo $profile_pic; ?>" class="img-fix" alt="#"></div>
				<h1 class="banner-name white-txt tablet-show fade-right-2s"><?php echo $first_name . " " . $last_name  ?></h1>
				<?php if ($reviews > 0) { ?>
				<div class="banner-rating card">
					<div class="center-flex">
						<span class="bread-txt black-txt"><?php echo number_format($scoresum[0]/$reviews, 1); ?></span><i class="fas fa-star fa-2x"></i>
					</div>
				</div>
				<?php } ?>
			</div>
			<div class="banner-bar full-w">
				<a href="cases.php" class="banner-bar-item">
					<i class="fas fa-envelope fa-2x"></i>
				</a>
			</div>
		</div>

		<div class="profile-item full-w med-marg-bot">
			<div class="profile-item-title full-w card">
				<h2 class="white-txt">About</h2>
			</div>
			<div class="profile-item-info full-w card">
				<form action="userprofile.php" method="POST">
					<textarea class="bread-txt full-w" name="m_bio" placeholder="<?php echo $bio; ?>" rows="6" required><?php echo $bio; ?></textarea>
					<button type="submit" name="bio_button">Update Bio</button>
				</form>

				<div class="info-row margin-bottom">
					<span>
						<?php 	if ($firm != NULL) { echo '<i class="far fa-building"></i>' . " " . $firm;} 
						else { echo '<i class="fas fa-street-view"></i>' . " " . "Freelance"; } ?>
					</span> 
					<span>
						<i class="fas fa-map-marker"></i> <?php echo $city ?>
					</span> 
					<span>
						<a href="../src/model/session_handler/logout_handler.php">Logout</a>
					</span>
				</div>

				<?php 
				$sqlMf = "SELECT * FROM mainfields WHERE lsp_id='$lsp_id'";
				$queryMf = mysqli_query($con, $sqlMf);
				$row = mysqli_fetch_row($queryMf);
				?>

				<div class="field-row small-margin-bottom">
					<?php
					echo '<span class="tag inactive-tag">' . $mainfield . '</span>';
					for ($var = 1 ; $var <= 9; $var++) { 
						if (in_array($var, $row)) {
							$sqlMf = "SELECT field_name FROM fieldnames WHERE field_number='$var'";
							$queryMf = mysqli_query($con, $sqlMf);
							$name = mysqli_fetch_assoc($queryMf);
							$fieldName = $name["field_name"];
							if ($fieldName != $mainfield) {
								echo '<span class="tag inactive-tag">' . $fieldName . '</span>'; 
							}
						}
					}?>	 
				</div>
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

		<!-- This is the function that lists all reviews. -->
		<?php
		if (mysqli_num_rows($lspallreviews) > 0) {
			while($row = mysqli_fetch_assoc($lspallreviews)) {
				/* Collects all the reviews and information about the ones who reviewd the lsp */
				include '../src/model/form_handlers/reviewlist_handler.php';	
				?>

				<!-- This is where the reivew-box that will be shown is made. -->
				<div class="list-item card margin-bottom full-w">
					<div class="list-item profile-item-review full-w small-marg-bot card">
						<a href="#" class="list-item-avatar center-flex pc-show">
							<!-- This is the image of the user that the review belongs to. -->
							<div class=".img-cutter">
								<img src="<?php echo $reviewpic; ?>" alt="#">
							</div>
						</a>
						<a class="lsp-name"><?php echo $reviewfname . " " . $reviewlname  ?></a>
						<p class="bread-txt full-w black-txt"><?php echo '<br>' . $reviewtext; ?></p>

						<!--This is the number of stars that the reviewee gave this lawyer. -->
						<?php 
						for ($i=1; $i <= $reviewscore; $i++) { 
							echo '<i class="fas fa-star" style="font-size:4em"></i>';
						} 
						for ($i=$reviewscore; $i<=4; $i++) { 
							echo '<i class="far fa-star" style="font-size:4em"></i>';
						}
						?>
					</div>
				</div>
				<?php }} ?>

			</div>
		</main>

