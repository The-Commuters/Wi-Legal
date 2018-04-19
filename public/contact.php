<!-- Required files to load for page to work -->

<?Php
/* Connects to database and retrieves time */
require '../config/config.php';
/* Retrieving php code from login_handler.php */
include '../src/model/form_handlers/login_handler.php';
/* $loggedinuser will tell the rest of the site what user is connected */
include '../src/model/userinfo_handler/userinfo_handler.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" >

	<!-- HEAD -->
	<?php $page_title = 'Wilegal'; include '../src/utils/template/components/head.php'; ?>

<body>
	<!-- HEADER -->
	<?php $current_page = 'contact'; include '../src/utils/template/components/header.php';?>

	<main>
		<!-- PARALLAX ENABLER -->
		<div class="parallax">

			<main>

				<section class="contaktText">
					<h3>
						Company <a href="#">facebook</a> page. 
					</h3>
				</section>
				

				
				<section class="contaktText">
					<h3>Send us a <a href="mailto: test@noveare.com">mail.</a></h3>
				</section>

				<h3 class="contaktDirect">Or send us a direct message!</h3>
				<form class="contaktForm">
					<div class="contact-base">		
						<div class="contaktForm">
							<label class="contaktLabel">Name</label>
							<input class="contaktInput" type="text" name="
							contactName">
						</div>
						<div class="contaktForm">	
							<label class="contaktLabel">Email</label>
							<input class="contaktInput" type="email" name="contaktMail">
						</div>
					</div>
					<div class="contaktForm">
						<label class="contaktLabel">Describe your subject</label>
						<textarea class="contaktMessage"></textarea>
						<input class="contaktButton" type="submit" name="contaktDone">
					</div>
				</form>

			</main>


			<!-- FOOTER -->
			<?php include '../src/utils/template/components/footer.php'; ?>

		</div>
	</main>
</body>
	</html>