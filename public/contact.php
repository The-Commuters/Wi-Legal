<?Php
/* This is the page containing the contact form. */

/* Connects to database and retrieves time */
require '../config/config.php';
/* Retrieving php code from login_handler.php */
include '../src/model/form_handlers/login_handler.php';
/* $loggedinuser will tell the rest of the site what user is connected */
include '../src/model/userinfo_handler/userinfo_handler.php';
/* Handler that will send the contact message to the database. */
include '../src/model/form_handlers/contact_handler.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" >

	<!-- HEAD -->
	<?php $page_title = 'Wilegal'; include '../src/utils/template/components/head.php'; ?>

<body>
	<!-- HEADER -->
	<?php $current_page = 'contact'; include '../src/utils/template/components/header.php';?>

	<!-- MAIN -->
	<main>
		<div class="contact center-marg med-marg-top big-marg-bot">
			<h1 class="blue-txt marg-container">Please contact us with the form below</h1>

			<div class="contact-title card center-text white-txt marg-container fade-right-2s">
					<h2>Contact form</h2>
				</div>

			<div class="contact-form bread-txt faded-black-txt marg-container fade-right-2s">
				<form action="contact.php" method="POST">

					<div class="input-wrapper-split">
						<div class="input-container">
							<div>First name</div>
							<input type="text" name="fname" class="bread-txt full-w" required>
						</div>

						<div class="input-container">
							<div>Last name</div>
							<input type="text" name="lname" class="bread-txt full-w" required>
						</div>
					</div>

					<div class="input-wrapper-full full-w">
						<div class="input-container full-w">
							<div>E-mail</div>
							<input type="email" name="email" class="bread-txt full-w" required>
						</div>
					</div>

					<div class="input-wrapper-split">
						<div class="input-container">
							<div>Username</div>
							<input type="text" name="uname" class="bread-txt full-w" required>
						</div>

						<div class="input-container">
							<div>Phone number</div>
							<input type="tel" name="tel" class="bread-txt full-w" required>
						</div>
					</div>

					<div class="input-wrapper-full full-w">
						<div class="input-container full-w">
							<div>What is your inquery about?</div>
							<select name="reqtype" class="full-w bread-txt" required>
								<option value="Choose an option">Choose an option</option>
								<option value="Report a bug">Report a bug</option>
								<option value="Report a lawyer">Report a lawyer</option>
								<option value="Report a user">Report a user</option>
								<option value="Stolen account">Stolen account</option>
							</select>
						</div>
					</div>

					<div class="input-wrapper-full full-w">
						<div class="input-container full-w">
							<div>Message</div>
							<textarea class="bread-txt full-w" name="message" placeholder="Max 1000 characters." rows="4" required></textarea>
						</div>
					</div>

					<div class="input-wrapper-split">
						<div class="input-container">
							<div>Aditional file</div>
							<input type="file" class="bread-txt full-w">
						</div>

						<div class="input-container">
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