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
			<?php 

			echo $bio;

			?>
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
					<p>Send a message to: </p>
					<!--The form for registering a new user-->
					<form action="<?php echo $username; ?>" method="POST">

						<!--Ttle input-box-->
						<input type="text" name="m_title" placeholder="Title" required>
						<br>

						<!--Message input-box-->
						<input type="text" name="m_message" placeholder="Message" required>
						<br>

						<!--Message-button, starts register_handler.php-->
						<input type="submit" name="message_button" value="Send Message">
						<br>
					</form>
					<?php
				}
			}

			?>
		</div>	

		<div class="list-item card margin-bottom full-w">
			<h4>Rating:</h4>
			<form action="<?php echo $username; ?>" method="POST">

				<div class="tag-item">
					<input type="radio" name="rating" value="1" required><span>1 star</span>
					<input type="radio" name="rating" value="2" required><span>2 star</span>
					<input type="radio" name="rating" value="3" required><span>3 star</span>
					<input type="radio" name="rating" value="4" required><span>4 star</span>
					<input type="radio" name="rating" value="5" required><span>5 star</span>
				</div>

				<!--Message-button, starts register_handler.php-->
				<input type="submit" name="rate_button" value="Rate this lawyer">
				<?php 	
					if (isset($ratings) && isset($score)) {
					$rating = $score/$ratings;
					echo '<br>' . 'Rating: ' . $rating;

					}

				?>
			</form>
		</div>

	</main>	







