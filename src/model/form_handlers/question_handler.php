<?php
/*The question handler picks up the free questions and sends them to the database.*/

if (isset($_POST['contact_button'])) {

	$user_id = $user['user_id'];
	$message = $_POST['message'];
	$date = date("Y-m-d"); 
	$query = mysqli_query($con, "INSERT INTO questions VALUES ('', '$user_id', '0', '$message', '$date')");

	header("Location: index.php");

}
?>