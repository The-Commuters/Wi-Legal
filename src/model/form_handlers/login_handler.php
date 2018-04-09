<!--Dette er php-kode som omhandler login formen på register.php,
Den kan og brukes hvis man senere skal ha en login et annet sted på 
nettstedet.-->

<?php  

$error_array = array(); 
/*Hvis noen presser login-knappen.*/
if(isset($_POST['login_button'])) {

	/*Fjerner all tegn som ikke skal være i eposten.*/
	$email = filter_var($_POST['l_email'], FILTER_SANITIZE_EMAIL); 

	/*Lagrer Epost i $_SESSION.*/
	$_SESSION['l_email'] = $email;

	/*Henter inn passordet til $passord.*/
	$password = md5($_POST['l_password']); 

	/*Sjekker her databasene etter en bruker med skrevet inn passord og epost
	For de tre brukertypene users, lawyerusers og firms*/
	$check_database_query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$password'");
	$check_database_query2 = mysqli_query($con, "SELECT * FROM lawyerusers WHERE email='$email' AND password='$password'");
	$check_database_query3 = mysqli_query($con, "SELECT * FROM firms WHERE email='$email' AND password='$password'");

	/*How many rows that there has been in the different databases.*/
	$check_login_query = mysqli_num_rows($check_database_query); 
	$check_login_query2 = mysqli_num_rows($check_database_query2); 
	$check_login_query3 = mysqli_num_rows($check_database_query3); 

	/*Dette skjer så hvis det er en bruker med dette passord og epost på databasen*/
	if($check_login_query != 0 || $check_login_query2 != 0 || $check_login_query3 != 0) {

		/*Hvis brukeren ligger i lawyerusers, gjør dette.*/
		if ($check_login_query2 != 0) {
			$check_database_query = $check_database_query2;
		}
		elseif ($check_login_query3 != 0) {
			$check_database_query = $check_database_query3;
		}


		/*Henter her ut hele rekken med informasjon om brukeren fra rett databas.*/
		$row = mysqli_fetch_array($check_database_query);

		/*Henter her ut brukernavnet fra rekken som ble hentet ut.*/
		$username = $row['username'];
		$usertype = $row['usertype']; 

		/*Legger her inn brukernavnet i $_SESSION['username'], noe som vil si at den personen er logget 
		inn og kan så brukes til å gi personen rettigheter til diverse nettsteder*/
		$_SESSION['username'] = $username;
		
		/*Puts usertype in session uses it in user.php and info.php*/
		$_SESSION['usertype'] = $usertype;

		/*Dette er siden man blir sendt til etter at man logger inn*/
		header("Location: list.php"); 
		exit();
	}
	else { 
		
		/*Og dette kommer da hvis den ikke finner en bruker med det passordet og eposten.*/
		array_push($error_array, "Email or password was incorrect<br>");
	}

}

?>