<?Php
/* This is the page containing the free question form. */

/* Connects to database and retrieves time */
require '../config/config.php';
/* Retrieving php code from login_handler.php */
include '../src/model/form_handlers/login_handler.php';
/* $loggedinuser will tell the rest of the site what user is connected */
include '../src/model/userinfo_handler/userinfo_handler.php';
/* Retrieving php code from login_handler.php */
include '../src/model/form_handlers/question_handler.php';	
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" >

	<!-- HEAD -->
	<?php $page_title = 'Wilegal'; include '../src/utils/template/components/head.php'; ?>

<body>
	<!-- HEADER -->
	<?php $current_page = ''; include '../src/utils/template/components/header.php';?>

	<!-- MAIN -->
	<main>
		<div class="contact center-marg med-marg-top big-marg-bot">
			<h1 class="blue-txt marg-container">Write in your free question below</h1>

			<div class="contact-title card center-text white-txt marg-container fade-right-2s">
					<h2>Free Question</h2>
				</div>

			<div class="contact-form bread-txt faded-black-txt marg-container fade-right-2s">
				<form action="question.php" method="POST">

					<div class="input-wrapper-full full-w">
						<div class="input-container full-w">
							<div>Message</div>
							<textarea class="bread-txt full-w" name="message" placeholder="Max 1000 characters." rows="4" required></textarea>
						</div>
					</div>

					<div class="input-wrapper-full flex-end">
						<div class="input-container flex-end">
							<input type="submit" name="contact_button" class="bread-txt full-w">
						</div>
					</div>

				</form>
			</div>
		</div>
	</main>

	<!-- FOOTER -->
	<?php include '../src/utils/template/components/footer.php'; ?>
</body>
</html>