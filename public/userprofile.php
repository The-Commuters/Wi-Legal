<?Php
/* Connects to database and retrieves time */
require '../config/config.php';
/* Retrieving php code from login_handler.php */
include '../src/model/form_handlers/login_handler.php';
/* $loggedinuser will tell the rest of the site what user is connected */
include '../src/model/userinfo_handler/userinfo_handler.php';
/* Collects all reviews for the lawyer in question */	

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<!-- HEAD -->
<?php $page_title = 'Wilegal'; include '../src/utils/template/components/head.php'; ?>  

<body>
	<!-- HEADER -->
	<?php $current_page = 'userprofile'; include '../src/utils/template/components/header.php'; ?>

	<?php 
	/* Pulls here out all the information from the user, that will go to the profile page.*/
	$usertype = $user['usertype'];
	$first_name = $user["first_name"];
	$last_name = $user["last_name"];
	$username = $user["username"];
	$profile_pic = $user["profile_picture"]; 

	/* Decides here what kind of user that the logged in account is and collects the template/component for the profile-page*/
	if ($user['usertype'] == 0) {
		/* if the clicked user is of usertype users */
		include '../src/utils/template/components/userprofile_components/users.php';
	} elseif ($user['usertype'] == 1) {
		/* Pulls the information that only lawyers have in the database. */
		$lsp_id = $user["lsp_id"];
		$city = $user["city"];
		$firm = $user["lsp_firm"];
		$mainfield = $user["mainfield"];

		/* If the lawyer wants to change hos bio, it will be done here. */
		include '../src/model/form_handlers/bio_handler.php';
		/* Include rating handler to get the reviews on the side, only for lawyers */
		include '../src/model/form_handlers/rating_handler.php';

		/* Getting the latest bio that the user have made.*/
		$query = mysqli_query($con, "SELECT bio FROM lspbios WHERE lsp_id = '$lsp_id'");
		$bioarray = mysqli_fetch_array($query);
		/* $bio will be shown as a placeholder in the lawyers own profile */
		$bio = $bioarray[0];


		/* if the clicked user is of usertype lawyers. */
		include '../src/utils/template/components/userprofile_components/lawyers.php';
	} elseif ($user['usertype'] == 2) {
		/* if the clicked user is of usertype firms */
		include '../src/utils/template/components/userprofile_components/firms.php';
	} elseif ($user['usertype'] == 3) {
		/* if the clicked user is of usertype admins */
		include '../src/utils/template/components/userprofile_components/admins.php';
	}
	?>


	<!-- FOOTER -->
	<?php include '../src/utils/template/components/footer.php'; ?>
</body>
</html>