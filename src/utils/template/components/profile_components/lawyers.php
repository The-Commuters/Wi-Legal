<!-- Component Profile page for other lawyers, is placed inside
	of profile if the user that have been clicked on is a lawyer -->

	<main>

		<div class="list-item card margin-bottom full-w">

			<a href="<?php echo $username; ?>" class="list-item-avatar center-flex">
				<img src="<?php echo $profile_pic; ?>" alt="#">
			</a>

			<div class="list-item-main full-w">

				<div class="title-row margin-bottom">
					<a href="<?php echo $username; ?>" class="lsp-name"><?php echo $first_name . " " . $last_name  ?></a>
				</div>

				<div class="info-row margin-bottom">
					<span>
						<?php 	if ($firm != NULL) { echo '<i class="far fa-building"></i>' . " " . $firm;} 
						else { echo '<i class="fas fa-street-view"></i>' . " " . "Freelance"; } ?>
					</span> 
					<span><i class="fas fa-map-marker"></i> <?php echo $city ?></span> 
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

		<!-- Personal Bio -->
		<div class="list-item card margin-bottom full-w">
			<?php echo $bio; ?>
		</div>


		<div class="list-item card margin-bottom full-w">
			<h4>about</h4><br>
			tlf<br>
			name<br>
			firm<br>
			city<br>
			etc...
		</div>		

		<div class="list-item card margin-bottom full-w">
			<h4>Booking</h4><br>
			Schedule<br>
			Booking<br>
			Price
		</div>	

		<!--Message BOX, Only visible for users-->
		<div class="list-item card margin-bottom full-w">
			<?php 
			if (isset($user)) {
				if ($user['usertype'] == 0) {
					?> 
					<!--The form for registering a new user-->
					<form action="<?php echo $username; ?>" method="POST">
						<!--Title input-box-->
						<input type="text" name="m_title" placeholder="Title" required>
						<br>

						<!--Message input-box-->
						<input type="text" name="m_message" placeholder="Message" required>
						<br>

						<!--Message-button, starts register_handler.php-->
						<input type="submit" name="message_button" value="Send Message">
					</form>
			<?php } } ?>
		</div>	

		<!--This is the place where users can review lawyers
		 	This will only show if any usertype is logged in-->
		<?php if (isset($user)) {?>
			<!--This will only be shown if the logged in user is a normal user, not lsp, firm or admin-->
			<?php if ($user['usertype'] == 0) {?>

			<!-- This is the rating-box that will be shown to the user. -->
			<div class="list-item card margin-bottom full-w">
				<?php if ($userreview == 0) { ?>
					<form action="<?php echo $username; ?>" method="POST">
						<div class="tag-item">
							<input type="radio" name="rating" value="1" required><span>1 star</span>
							<input type="radio" name="rating" value="2" required><span>2 star</span>
							<input type="radio" name="rating" value="3" required><span>3 star</span>
							<input type="radio" name="rating" value="4" required><span>4 star</span>
							<input type="radio" name="rating" value="5" required><span>5 star</span>
						</div>

						<input type="text" name="review" placeholder="Write a short review" width="40" height="20"><br>
						<input type="submit" name="rate_button" value="Rate this lawyer">
					</form>

				<?php } ?>
			</div>
		<?php } } ?>

		<!-- The collected rating information of this lawyer, with the title for the review section. 
			 Will not be shown if there is no reviews.-->
		<?php if ($reviews != 0): ?>
		<div class="list-item card margin-bottom full-w">
			<h4>Full review</h4><br>
			<!-- This is the averge score. -->
			<?php echo 'Full Score: ' . $scoresum[0]/$reviews; ?>
		</div>	
		<?php endif ?>

		<!--This is where the reviews will be shown. -->
		<?php
		if (mysqli_num_rows($lspallreviews) > 0) {
			while($row = mysqli_fetch_assoc($lspallreviews)) {
				/* Collects here information about the current review */	
				$reviewtext = $row['review'];
				$reviewscore = $row['score'];
				$reviewuserid = $row['user_id'];

				/* Collect here information about the person who sent in the review. */
				$queryreviewsender = mysqli_query($con, "SELECT first_name, last_name, profile_picture FROM users WHERE user_id = '$reviewuserid'");
				$sender = mysqli_fetch_array($queryreviewsender);
				$reviewfname = $sender['first_name'];
				$reviewlname = $sender['last_name'];
				$reviewpic = $sender['profile_picture'];
				?>

				<!-- This is where the reivew-box that will be shown is made. -->
				<div class="list-item card margin-bottom full-w">

					<!-- This is the image of the user that the review belongs to. -->
					<a class="list-item-avatar center-flex">
						<img src="<?php echo $reviewpic; ?>" alt="#">
					</a>

					<?php echo $reviewfname . ' ' . $reviewlname . '<br>' . 'Score: ' .$reviewscore . '<br>' . $reviewtext; ?>

					<!--This is the number of stars that the reviewee gave this lawyer. -->
					<?php
					for ($i=1; $i <= $reviewscore; $i++) { 
						echo '<i class="far fa-star" style="font-size:4em"></i>';
					}
					?>
					
				</div>
			<?php }} ?>
		</main>	
