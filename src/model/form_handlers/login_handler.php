<?php  
/* This is the php code that concerns the login form of register.php,
It can and will be used if you have a login somewhere else
websit */

$error_array = array(); 
/*If someone presses the login button.*/
if(isset($_POST['login_button'])) {

	/*Removes all characters.*/
	$email = filter_var($_POST['l_email'], FILTER_SANITIZE_EMAIL); 

	/*saves Epost in $_SESSION.*/
	$_SESSION['l_email'] = $email;

	/*gets password to $passord.*/
	$password = md5($_POST['l_password']); 

	/* Checks the databases for a user with password and email
	   For the three user types users, lawyerusers and companies*/
	$check_database_query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$password'");
	$check_database_query2 = mysqli_query($con, "SELECT * FROM lawyerusers WHERE email='$email' AND password='$password'");
	$check_database_query3 = mysqli_query($con, "SELECT * FROM firms WHERE email='$email' AND password='$password'");

	/*How many rows that there has been in the different databases.*/
	$check_login_query = mysqli_num_rows($check_database_query); 
	$check_login_query2 = mysqli_num_rows($check_database_query2); 
	$check_login_query3 = mysqli_num_rows($check_database_query3); 

	/* This happens if there is a user with this password and email  
	    on the database*/
	if($check_login_query != 0 || $check_login_query2 != 0 || $check_login_query3 != 0) {

		/*If the user is a lawyer do this.*/
		if ($check_login_query2 != 0) {
			$check_database_query = $check_database_query2;
		}
		elseif ($check_login_query3 != 0) {
			$check_database_query = $check_database_query3;
		}


		/*Collect here out the information about the user.*/
		$row = mysqli_fetch_array($check_database_query);

		/*Henter her ut brukernavnet fra rekken som ble hentet ut.*/
		$username = $row['username'];
		$usertype = $row['usertype']; 

		/*Entering the username in $ _SESSION ['username'], which means that person is logged in.
		in and can then be used to give the person rights to various websites*/
		$_SESSION['username'] = $username;
		$_SESSION['usertype'] = $usertype;

		/*This is the site they will go to when they log in*/
		header("Location: index.php"); 
		exit();
	}
	else { 
		
		/* And this will happen if it does not find a user with that password and email.*/
		array_push($error_array, "Email or password was incorrect<br>");
	}

}

?>