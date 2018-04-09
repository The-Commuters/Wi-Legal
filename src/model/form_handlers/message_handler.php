<!--Handler for the message form on the profile-page.-->

<?php
/*If the send button is pressed this happens, the message get stored in the database.*/
if(isset($_POST['message_button'])){ 

	$title = $_POST['m_title'];
	$message = $_POST['m_message'];
	$date = date("Y-m-d"); 

	if ($user['usertype'] == 0) {
		$sender = $user['id'];
	} elseif ($user['usertype'] == 1) {
		$sender = $user['lsp_id'];
	} 

	if ($title != '' && $message != '') {
		$query = mysqli_query($con, "INSERT INTO messages VALUES ('', '$title', '$message', '$sender', '$lsp_id', '$date')");
	}
}

?>

