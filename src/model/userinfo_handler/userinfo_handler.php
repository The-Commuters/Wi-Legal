<!--Here i have placed things that all the pages needs.-->

<?php 

/*Retrieving all information from the user account, loggedInUser will be the username,
It and the user can then be used to retrieve information. If there is a header that should be
on all sides, this can be placed there.*/
if (isset($_SESSION['username'])) {
	$loggedInUser = $_SESSION['username'];

	if ($_SESSION['usertype'] == 0) {
		$user_detals_query = mysqli_query($con, "SELECT * FROM users WHERE username='$loggedInUser'");
	} elseif ($_SESSION['usertype'] == 1) {
		$user_detals_query = mysqli_query($con, "SELECT * FROM lawyerusers WHERE username='$loggedInUser'");
	} elseif ($_SESSION['usertype'] == 2) {
		$user_detals_query = mysqli_query($con, "SELECT * FROM firms WHERE username='$loggedInUser'");
	}
	$user = mysqli_fetch_array($user_detals_query);
	/* Pulls here ut the picture for the userprofile*/
	$profile_pic = $user['profile_picture'];
}
else {


}
/*Important to know that all the information now lies in $user*/


?>