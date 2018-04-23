<?php 

if (isset($_POST['contact_button'])) {

	$firstname = strip_tags($_POST['fname']);
	$lastname = strip_tags($_POST['lname']);
	$email = strip_tags($_POST['email']);
	$username = strip_tags($_POST['uname']);
	$tel = strip_tags($_POST['tel']);
	$reqtype = $_POST['reqtype'];
	$message = $_POST['message'];
	$date = date("Y-m-d"); 

	
	$query = mysqli_query($con, "INSERT INTO contact VALUES ('', '$firstname', '$lastname', '$username', '$email', '$tel', '$reqtype', '$message', '$date')");


}

?>