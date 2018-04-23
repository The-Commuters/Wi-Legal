<!--Dette er en side med php-kode som omhandler register.php hvor
	nye brukere kan registrere seg eller logge inn på nettstedet, 
	alle feilmeldinger innenfor registrering blir og lagret her-->

<?php

/*Kommer til å holde alle feilmeldingene som kommer opp, vil lagre flere feilmeldinger
og kommer til å vise dem frem på register.php hvis noe er feil med brukerinformasjonen.*/
$error_array = array(); 

/*Hvis registrering-knappen på register.php blir presset skjer dette(Resten av siden)*/
if(isset($_POST['register_button'])){ 

	/*Strip_tags fjerner alle html tags som kan interfere med koden, det blir altså ikke mulig å bruke
	tegn som disse '<>!.,^*+', dette er et sikkerhetstiltak som er med på å forhindre tukling med koden */
	$firstname = strip_tags($_POST['r_firstname']); //Her blir fornavet satt opp.
	$lastname = strip_tags($_POST['r_lastname']);  //Her blir etternavnet satt opp.
	$email = strip_tags($_POST['r_email']); //Her blir eposten satt opp.
	$password = strip_tags($_POST['r_password']); //Her blir Passordet satt opp
	$password_check = strip_tags($_POST['r_password_check']);
	$phone_number = strip_tags($_POST['r_phone_number']); // The phone number to the lawyer


	/*Her fjerner man alle mellomrom og bytter dem ut med ingenrom, slik at alt blir et ord.*/
	$firstname = str_replace(' ', '', $firstname); 
	$lastname = str_replace(' ', '', $lastname);
	$email = str_replace(' ', '', $email);
	$phone_number = str_replace(' ', '', $phone_number);

	/*Gjør all input om til ord med stor forbokstav og fjerner alle andre store bokstaver*/
	$firstname = ucfirst(strtolower($firstname)); 
	$lastname = ucfirst(strtolower($lastname)); 
	//$email = ucfirst(strtolower($email)); 

	/*Navn og Epost blir lagret i $_SESSION, slik at man ikke trenger 
	å skrive dem inn igjen hvis man skriver inn feil passord*/
	$_SESSION['r_firstname'] = $firstname; 
	$_SESSION['r_lastname'] = $lastname;
	$_SESSION['r_email'] = $email; 
	$_SESSION['r_phone_number'] = $phone_number;

	/*Tar å legger ned dagens dato på en variabel, vil bli lagret i databasen.*/
	$date = date("Y-m-d"); 

	/*Fra her er det bare mange feilmeldinger innenfor innlogging eller registrering av bruker.*/
	/*-----------------------------------------------------------------------------------------*/

	/*Sjekker her om epostene følger riktig format(Dio@Brando.en),
	Og om den ligger inne i databasen*/
	if(filter_var($email, FILTER_VALIDATE_EMAIL)) { 

		$email = filter_var($email, FILTER_VALIDATE_EMAIL); 

		/*Sjekker her om Eposten allerede er inne i databasen.*/
		$e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$email'"); 

		/*Teller hvor mange ganger eposten ligger inne i databasen(enten 1 eller 0)*/
		$num_rows = mysqli_num_rows($e_check); 

		/*Feilmelding: Eposten er inne i databasen.*/
		if($num_rows > 0) {  

			array_push($error_array, "Email already in use<br>");  
		}
	}
	/*Feilmelding: Ikke gyldig Epost-format.*/
	else {

		array_push($error_array, "Invalid email format<br>"); 
	}

	/*Feilmelding: Hvis fornavnet ikke er i korrekt størrelse*/
	if(strlen($firstname) > 25 || strlen($firstname) < 2) { 

		array_push($error_array, "This must be between 2 and 25 characters<br>");
	}

	/*Feilmelding:  etternavnet ikke er i korrekt størrelse*/
	if(strlen($lastname) > 25 || strlen($lastname) < 1) {  

		array_push($error_array,  "This must be between 1 and 25 characters<br>");
	}

	/*Feilmelding: Hvis passordene ikke er like.*/
	if($password != $password_check) { 

		array_push($error_array,  "Your passwords do not match<br>");
	}

	/*Feilmelding: Hvis passordene inneholder annet enn tall og bokstaver.*/
	if(preg_match('/[^A-Za-z0-9]/', $password)) {  

		array_push($error_array, "Your password can only contain english characters or numbers<br>");
	}
	
	/*Feilmelding: Hvis passordet ikke er mellom 5 og 30 characterer lang.*/
	if(strlen($password > 30 || strlen($password) < 5)) {  

		array_push($error_array, "Your password must be betwen 5 and 30 characters<br>");
	}


	/*Hvis det ikke er noen feilmeldinger i $error_array, skjer så dette.*/
	/*-------------------------------------------------------------------*/

	if(empty($error_array)) { 
		/*Passordet blir kryptert.*/
		$password = md5($password); 

		/*Her lager man et brukernavn av fornavnet og etternavnet, det ender opp med å være fornavn_etternavn*/
		$username = strtolower($firstname . "_" . $lastname);
		$check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");


		/*Denne variablen skal brukes når man lager et brukernavn på neste linje.*/
		$i = 0; 
	 	$temp_username = $username; 

	 	/*Hvis 'fornavn_etternavn' ligger i databasen, blir brukernavnet 'fornavn_etternavn_x' 
		der 'x' er hvor mange 'fornavn_etternavn' som ligger i databasen*/
		while(mysqli_num_rows($check_username_query) != 0){
			/*setter midlertidig brukernavn til å bli lik brukernavnet som har blitt laget.*/
		    $temp_username = $username; 
		    $i++;
		    /*setter her opp det nye brukernavnet.*/

		    $temp_username = $username."_".$i; 
		    $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$temp_username'");
		}
		
		/*Setter så opp brukernavnet til å være det som while-løkken slapp igjennom*/
		$username = $temp_username;


		/*Setter opp et profilbilde til kontoen.*/
		$rand = rand(1, 12);
		$profile_pic = "img/profile/default/" . $rand . ".png" ;

		/*Her blir all informasjonen lagret i databasen, denne linjen er viktig i det at den legger informasjonen inn i databasen '1' på slutten er er brukertype.*/
		$query = mysqli_query($con, "INSERT INTO users VALUES ('', '$firstname', '$lastname', '$username', '$email', '$password', '$date', '$profile_pic', '$phone_number' , 0)");

		/*Her viser man en beskjed som sier at ma er registrert*/
		array_push($error_array, "You're all set! Go ahead and login!<br>"); 

		/*Her renskes $_SESSION når man har registrert en bruker, og alle input-boksene blir tomme.*/
		$_SESSION['r_firstname'] = "";
		$_SESSION['r_lastname'] = "";
		$_SESSION['r_email'] = "";
		$_SESSION['r_phone_number'] = "";

	}

}

/*Hvis 'registerlawyer' registrering-knappen på register.php blir presset skjer dette(Resten av siden)*/
if(isset($_POST['registerlawyer_button'])){ 

	/*Strip_tags fjerner alle html tags som kan interfere med koden, det blir altså ikke mulig å bruke
	tegn som disse '<>!.,^*+', dette er et sikkerhetstiltak som er med på å forhindre tukling med koden */
	$firstname = strip_tags($_POST['r_firstname']); //Her blir fornavet satt opp.
	$lastname = strip_tags($_POST['r_lastname']);  //Her blir etternavnet satt opp.
	$email = strip_tags($_POST['r_email']); //Her blir eposten satt opp.
	$username = strip_tags($_POST['r_username']); //Her blir eposten satt opp.
	$password = strip_tags($_POST['r_password']); //Her blir Passordet satt opp
	$password_check = strip_tags($_POST['r_password_check']);
	$phone_number = strip_tags($_POST['r_phone_number']); // The phone number to the lawyer
	$workplace = strip_tags($_POST['r_firm']); // The phone number to the lawyer
	$city = strip_tags($_POST['r_city']);  //The city that the person works in.

	/*Her fjerner man alle mellomrom og bytter dem ut med ingenrom, slik at alt blir et ord.*/
	$lastname = str_replace(' ', '', $lastname);
	$username = str_replace(' ', '', $username);
	$email = str_replace(' ', '', $email);
	$phone_number = str_replace(' ', '', $phone_number);

	/*Gjør all input om til ord med stor forbokstav og fjerner alle andre store bokstaver*/
	$firstname = ucfirst(strtolower($firstname)); 
	$lastname = ucfirst(strtolower($lastname)); 
	$username = ucfirst(strtolower($username)); 
	$email = ucfirst(strtolower($email)); 
	$city = ucfirst(strtolower($city));

 /*The checkbox input part where the lawyer will pick their area of expertise*/
	
	/*Sets up all the variables that is needed in the area of expertise part*/
	/*Temporary, jquery 'chosen' makes this somewhat redundant, need to check later*/
	$cb1 = '-'; $cb2 = '-'; $cb3 = '-'; $cb4 = '-'; $cb5 = '-'; 
	$cb6 = '-'; $cb7 = '-'; $cb8 = '-'; $cb9 = '-'; $cb10 = '-';
	$mainField = 'None';

	$mainField = $_POST['r_mainField'];
	
	if(isset($_POST['r_ContractLaw'])) {
		$cb1 = 1;
	}

	if(isset($_POST['r_CompanyLaw'])) {
		$cb2 = 2;
	}

	if(isset($_POST['r_BankingandFinancialLaw'])) {
		$cb3 = 3;
	}

	if(isset($_POST['r_ConsumerProtectionLaw'])) {
		$cb4 = 4;
	}

	if(isset($_POST['r_IntellectualPropertyLaw'])) {
		$cb5 = 5;
	}

	if(isset($_POST['r_InvestementLaw'])) {
		$cb6 = 6;
	}

	if(isset($_POST['r_LandLaw'])) {
		$cb7 = 7;
	}

	if(isset($_POST['r_CivilLaw'])) {
		$cb8 = 8;
	}

	if(isset($_POST['r_CriminalLaw'])) {
		$cb9 = 9;
	}

	if(isset($_POST['r_MarriageAndDivorceLaw'])) {
		$cb10 = 10;
	}

 /*End checkbox input*/

	/*Navn og Epost blir lagret i $_SESSION, slik at man ikke trenger 
	å skrive dem inn igjen hvis man skriver inn feil passord*/
	$_SESSION['r_firstname'] = $firstname; 
	$_SESSION['r_lastname'] = $lastname;
	$_SESSION['r_username'] = $username;
	$_SESSION['r_email'] = $email; 
	$_SESSION['r_phone_number'] = $phone_number;
	$_SESSION['r_firm'] = $workplace;
	$_SESSION['r_city'] = $city;

	/*Tar å legger ned dagens dato på en variabel, vil bli lagret i databasen.*/
	$date = date("Y-m-d"); 

	/*Fra her er det bare mange feilmeldinger innenfor innlogging eller registrering av bruker.*/
	/*-----------------------------------------------------------------------------------------*/

	/*Sjekker her om epostene følger riktig format(Dio@Brando.en),
	Og om den ligger inne i databasen*/
	if(filter_var($email, FILTER_VALIDATE_EMAIL)) { 

		$email = filter_var($email, FILTER_VALIDATE_EMAIL); 

		/*Sjekker her om Eposten allerede er inne i databasen.*/
		$e_check = mysqli_query($con, "SELECT email FROM lawyerusers WHERE email='$email'"); 

		/*Teller hvor mange ganger eposten ligger inne i databasen(enten 1 eller 0)*/
		$e_num_rows = mysqli_num_rows($e_check); 

		/*Feilmelding: Eposten er inne i databasen.*/
		if($e_num_rows > 0) {  

			array_push($error_array, "Email already in use<br>");  
		}
	}
	/*Feilmelding: Ikke gyldig Epost-format.*/
	else {

		array_push($error_array, "Invalid email format<br>"); 
	}


	//Username check if it is used from before.
	$u_check = mysqli_query($con, "SELECT username FROM lawyerusers WHERE username='$username'");
	$u_num_rows = mysqli_num_rows($u_check);

	if ($u_num_rows > 0) {

		array_push($error_array, "The username is already taken.<br>");
	}

	/*Feilmelding: Hvis fornavnet ikke er i korrekt størrelse*/
	if(strlen($firstname) > 25) { 

		array_push($error_array, "Must be lower than 25 characters<br>");
	}

	/*Feilmelding:  etternavnet ikke er i korrekt størrelse*/
	if(strlen($lastname) > 25 || strlen($lastname) < 1) {  

		array_push($error_array,  "This must be between 1 and 25 characters<br>");
	}

	/*Feilmelding: Hvis the username ikke er i korrekt størrelse*/
	if(strlen($username) > 25 || strlen($username) < 4) { 

		array_push($error_array, "This must be between 4 and 25 characters<br>");
	}

	/*Feilmelding: Hvis passordene ikke er like.*/
	if($password != $password_check) { 

		array_push($error_array,  "Your passwords do not match<br>");
	}

	/*Feilmelding: Hvis passordene inneholder annet enn tall og bokstaver.*/
	if(preg_match('/[^A-Za-z0-9]/', $password)) {  

		array_push($error_array, "Your password can only contain english characters or numbers<br>");
	}
	
	/*Feilmelding: Hvis passordet ikke er mellom 5 og 30 characterer lang.*/
	if(strlen($password > 30 || strlen($password) < 5)) {  

		array_push($error_array, "Your password must be betwen 5 and 30 characters<br>");
	}


	/*Hvis det ikke er noen feilmeldinger i $error_array, skjer så dette.*/
	/*-------------------------------------------------------------------*/
	if(empty($error_array)) { 
		/*Passordet blir kryptert.*/
		$password = md5($password); 



		/*Setter opp et profilbilde til kontoen.*/
		$rand = rand(1, 12);
		$profile_pic = "img/profile/default/" . $rand . ".png" ;


		/*_________________________________Fileupload ID____________________________________________________________________*/
		mkdir("../src/utils/confirmation/lsp_confirmation/" . $username);
		$targetdir = "../src/utils/confirmation/lsp_confirmation/" . $username . "/";
		$target_file_id = $targetdir . basename($_FILES["fileToUpload"]["name"]);
		$upload = 1;
		$imageFileType = strtolower(pathinfo($target_file_id,PATHINFO_EXTENSION));

		/* This line checks the file size */
		if ($_FILES["fileToUpload"]["size"] > 500000) {
		    array_push($error_array, "Your file is to big<br>");
		    $upload = 0;
		}

		/* Allow only certain file formats */
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "pdf" ) {
			array_push($error_array, "Sorry, only JPG, JPEG, PNG & PDF files are allowed.");
		    $upload = 0;
		}

		/* If the files get uploaded to the userfolder correctly */
		if ($upload != 0) {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file_id)) {
		    } else {
		        echo "Sorry, there was an error uploading your file.";
			}
		} 


		/*_________________________________Fileupload Cert____________________________________________________________________*/
		$targetdir = "../src/utils/confirmation/lsp_confirmation/" . $username . "/";
		$target_file_cert = $targetdir . basename($_FILES["fileToUpload2"]["name"]);
		$upload = 1;
		$imageFileType = strtolower(pathinfo($target_file_cert,PATHINFO_EXTENSION));

		/* This line checks the file size */
		if ($_FILES["fileToUpload2"]["size"] > 500000) {
		    array_push($error_array, "Your file is to big<br>");
		    $upload = 0;
		}
		/* Allow only certain file formats */
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "pdf" ) {
			array_push($error_array, "Sorry, only JPG, JPEG, PNG & PDF files are allowed.");
		    $upload = 0;
		}

		/* If the files get uploaded to the userfolder correctly */
		if ($upload != 0) {
			if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file_cert)) {
		    } else {
		        echo "Sorry, there was an error uploading your file.";
			}
		}
		/*____________________________________________________________________________________________________________________*/

		/*Her blir all informasjonen lagret i databasen, denne linjen er viktig i det at den legger informasjonen inn i databasen, '1' på slutten er er brukertype Lsp.*/
		$query = mysqli_query($con, "INSERT INTO lawyerusers VALUES ('', '$firstname', '$lastname', '$username', '$email', '$password', '$city', '$date', '$profile_pic', '$target_file_id', '$target_file_cert', '$phone_number' , '$workplace', '$mainField', 0, 1)");

		/*Collects the row of the user that was just made and gets the lsp_id*/
		$sqlMf = "SELECT * FROM lawyerusers WHERE username='$username'";
		$queryMf = mysqli_query($con, $sqlMf);
		$row = mysqli_fetch_assoc($queryMf);
		$lsp_id = $row['lsp_id'];

		$query = mysqli_query($con, "INSERT INTO mainfields VALUES ('$lsp_id','$cb1', '$cb2', '$cb3', '$cb4', '$cb5', '$cb6', '$cb7', '$cb8', '$cb9', '$cb10')");

			
		/*Her viser man en beskjed som sier at ma er registrert*/
		array_push($error_array, "<span>You're all set! Go ahead and login!</span><br>"); 

		/*Her renskes $_SESSION når man har registrert en bruker, og alle input-boksene blir tomme.*/
		$_SESSION['r_firstname'] = "";
		$_SESSION['r_lastname'] = "";
		$_SESSION['r_email'] = "";
		$_SESSION['r_phone_number'] = "";
		$_SESSION['r_username'] = "";
		$_SESSION['r_firm'] = "";
		$_SESSION['r_city'] = "";
	}

}

/*Hvis 'registerfirm' registrering-knappen på register.php blir presset skjer dette(Resten av siden)*/
if(isset($_POST['registerfirm_button'])){ 

	/*Strip_tags fjerner alle html tags som kan interfere med koden, det blir altså ikke mulig å bruke
	tegn som disse '<>!.,^*+', dette er et sikkerhetstiltak som er med på å forhindre tukling med koden */
	$firmname = strip_tags($_POST['r_firmname']); //Her blir fornavet satt opp.
	$email = strip_tags($_POST['r_email']); //Her blir eposten satt opp.
	$password = strip_tags($_POST['r_password']); //Her blir Passordet satt opp
	$password_check = strip_tags($_POST['r_password_check']);


	/*Her fjerner man alle mellomrom og bytter dem ut med ingenrom, slik at alt blir et ord.*/
	$email = str_replace(' ', '', $email);

	/*Gjør all input om til ord med stor forbokstav og fjerner alle andre store bokstaver*/
	$email = ucfirst(strtolower($email)); 

	/*Tar å legger ned dagens dato på en variabel, vil bli lagret i databasen.*/
	$date = date("Y-m-d"); 

	$_SESSION['r_firmname'] = $firmname; 
	$_SESSION['r_email'] = $email; 


	/*Fra her er det bare mange feilmeldinger innenfor innlogging eller registrering av bruker.*/
	/*-----------------------------------------------------------------------------------------*/

	/*Sjekker her om epostene følger riktig format(Dio@Brando.en),
	Og om den ligger inne i databasen*/
	if(filter_var($email, FILTER_VALIDATE_EMAIL)) { 

		$email = filter_var($email, FILTER_VALIDATE_EMAIL); 

		/*Sjekker her om Eposten allerede er inne i databasen.*/
		$e_check = mysqli_query($con, "SELECT email FROM firms WHERE email='$email'"); 

		/*Teller hvor mange ganger eposten ligger inne i databasen(enten 1 eller 0)*/
		$num_rows = mysqli_num_rows($e_check); 

		/*Feilmelding: Eposten er inne i databasen.*/
		if($num_rows > 0) {  

			array_push($error_array, "Email already in use<br>");  
		}
	}
	/*Feilmelding: Ikke gyldig Epost-format.*/
	else {

		array_push($error_array, "Invalid email format<br>"); 
	}

	/*Feilmelding: Hvis passordene ikke er like.*/
	if($password != $password_check) { 

		array_push($error_array,  "Your passwords do not match<br>");
	}

	/*Feilmelding: Hvis passordene inneholder annet enn tall og bokstaver.*/
	if(preg_match('/[^A-Za-z0-9]/', $password)) {  

		array_push($error_array, "Your password can only contain english characters or numbers<br>");
	}
	
	/*Feilmelding: Hvis passordet ikke er mellom 5 og 30 characterer lang.*/
	if(strlen($password > 30 || strlen($password) < 5)) {  

		array_push($error_array, "Your password must be betwen 5 and 30 characters<br>");
	}


	/*Hvis det ikke er noen feilmeldinger i $error_array, skjer så dette.*/
	/*-------------------------------------------------------------------*/
	if(empty($error_array)) { 
		/*Passordet blir kryptert.*/
		$password = md5($password); 

		/*Setter opp et profilbilde til kontoen.*/
		$profile_pic = "link til hvor profilbildet ligger";


		/*_________________________________Fileupload ID____________________________________________________________________*/
		mkdir("../src/utils/confirmation/firm_confirmation/" . $firmname);
		$targetdir = "../src/utils/confirmation/firm_confirmation/" . $firmname . "/";
		$target_file_id = $targetdir . basename($_FILES["fileToUpload"]["name"]);
		$upload = 1;
		$imageFileType = strtolower(pathinfo($target_file_id,PATHINFO_EXTENSION));

		/* This line checks the file size */
		if ($_FILES["fileToUpload"]["size"] > 500000) {
		    array_push($error_array, "Your file is to big<br>");
		    $upload = 0;
		}

		/* Allow only certain file formats */
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "pdf" ) {
			array_push($error_array, "Sorry, only JPG, JPEG, PNG & PDF files are allowed.");
		    $upload = 0;
		}

		/* If the files get uploaded to the userfolder correctly */
		if ($upload != 0) {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file_id)) {
		    } else {
		        echo "Sorry, there was an error uploading your file.";
			}
		}

		/*_________________________________Fileupload Cert____________________________________________________________________*/
		$targetdir = "../src/utils/confirmation/firm_confirmation/" . $firmname . "/";
		$target_file_cert = $targetdir . basename($_FILES["fileToUpload2"]["name"]);
		$upload = 1;
		$imageFileType = strtolower(pathinfo($target_file_cert,PATHINFO_EXTENSION));

		/* This line checks the file size */
		if ($_FILES["fileToUpload2"]["size"] > 500000) {
		    array_push($error_array, "Your file is to big<br>");
		    $upload = 0;
		}
		/* Allow only certain file formats */
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "pdf" ) {
			array_push($error_array, "Sorry, only JPG, JPEG, PNG & PDF files are allowed.");
		    $upload = 0;
		}

		/* If the files get uploaded to the userfolder correctly */
		if ($upload != 0) {
			if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file_cert)) {
		    } else {
		        echo "Sorry, there was an error uploading your file.";
			}
		}
		/*____________________________________________________________________________________________________________________*/


		/*Her blir all informasjonen lagret i databasen, denne linjen er viktig i det at den legger informasjonen inn i databasen, '1' på slutten er er brukertype Lsp.*/
		$query = mysqli_query($con, "INSERT INTO firms VALUES ('', '$firmname', '$email', '$password', '$date', '$target_file_id', '$target_file_cert','$profile_pic', 2)");

		/*Her viser man en beskjed som sier at ma er registrert*/
		array_push($error_array, "<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>"); 

		/*Her renskes $_SESSION når man har registrert en bruker, og alle input-boksene blir tomme.*/
		$_SESSION['r_firmname'] = "";
		$_SESSION['r_email'] = "";
	}

}


?>