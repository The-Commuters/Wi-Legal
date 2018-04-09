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
	<?php $current_page = 'index'; include '../src/utils/template/components/header.php';?>

	<main>

		


	</main>


		<!-- FOOTER -->
		<?php include '../src/utils/template/components/footer.php'; ?>

	</div>

</body>
	</html>