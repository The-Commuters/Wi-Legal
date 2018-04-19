<!--Home for other lawyers.-->

<?php  
/* Connection to the database. */
require '../config/config.php';
/*Retrives the info of the user*/
include '../src/model/userinfo_handler/userinfo_handler.php';
/* Cuts down link to be able to find who the page is about*/
include '../src/model/form_handlers/profile_handler.php';
/* Retrieving php code from login_handler.php */
include '../src/model/form_handlers/login_handler.php';
/*Uses this in next include, had to put it here*/
$lsp_id = $other_user["lsp_id"];
include '../src/model/form_handlers/message_handler.php';

include '../src/model/form_handlers/rating_handler.php';		

?>

<!DOCTYPE html>
<html lang="en" dir="ltr" >
<!-- HEAD -->
<?php $page_title = 'Wilegal'; include '../src/utils/template/components/head.php'; ?>

<body>


		<!-- HEADER -->
		<?php $current_page = 'profile'; include '../src/utils/template/components/header.php'; ?>

		<?php 
		/* Pulls here out all the information from the user, that will go to the profile page.*/
		$first_name = $other_user["first_name"];
		$last_name = $other_user["last_name"];
		$username = $other_user["username"];
		$profile_pic = $other_user["profile_picture"]; 
		$city = $other_user["city"]; 
		$firm = $other_user["lsp_firm"];
		$mainfield = $other_user["mainfield"];


		/* Decides what kind of user that the logged in account is and collects the template/component for the profile-page*/
		if ($other_user['usertype'] == 1) {
			/* if the klicked user is of usertype lawyers. */

			/* Collect here the newest bio from the lawyer. */
			$query = mysqli_query($con, "SELECT bio FROM userbio WHERE lsp_id = '$lsp_id' ORDER BY bio_id DESC");
			$bioarray = mysqli_fetch_array($query);
			/* $bio will be shown as a text in the lawyers profile */
			$bio = $bioarray[0];

			include '../src/utils/template/components/profile_components/lawyers.php';
		} elseif ($other_user['usertype'] == 2) {
			/* if the klicked user is of usertype firms. */
			include '../src/utils/template/components/profile_components/firms.php';
		}
		?>


	<!-- FOOTER -->
	<?php include '../src/utils/template/components/footer.php'; ?>
</body>
</html>