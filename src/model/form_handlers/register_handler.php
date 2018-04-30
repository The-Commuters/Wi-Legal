<?php
/* This is a page with the php code that deals with register.php where
New users can register or log in to the site,
All error messages within registration will be stored here */


/* Will keep all the error messages that appear, will save more error messages
and will display them on register.php if something is wrong with the user information.*/
$error_array = array(); 

/*If the registration button on register.php gets squeezed this happens (the rest of the page)*/
if(isset($_POST['register_button'])){ 

	/* Is used to keep the forms open after submittiong a new userregistering. */
	$toggle = 'user';

	/* Strip_tags removes all html tags that may interfere with the code, so it will not be possible to use
	characters like these '<>!, ^ * +', this is a security measure that helps prevent tampering with the code */
	$firstname = strip_tags($_POST['r_firstname']); //Here is the firstname collected.
	$lastname = strip_tags($_POST['r_lastname']);  //Here is the lastname collected.
	$email = strip_tags($_POST['r_email']); //Here is the email collected.
	$password = strip_tags($_POST['r_password']); //Here is the password collected.
	$password_check = strip_tags($_POST['r_password_check']);
	$phone_number = strip_tags($_POST['r_phone_number']); //Here is the phone number collected.


	/*Here you remove all spaces and replace them with a single room so everything becomes a word.*/
	$firstname = str_replace(' ', '', $firstname); 
	$lastname = str_replace(' ', '', $lastname);
	$email = str_replace(' ', '', $email);
	$phone_number = str_replace(' ', '', $phone_number);

	/*Revert all input to words with big capital letters and remove all other capital letters*/
	$firstname = ucfirst(strtolower($firstname)); 
	$lastname = ucfirst(strtolower($lastname)); 
	
	/* Name and Email are stored in $ _SESSION, so you do not need to
	to re-enter them if you enter incorrect passwords*/
	$_SESSION['r_firstname'] = $firstname; 
	$_SESSION['r_lastname'] = $lastname;
	$_SESSION['r_email'] = $email; 
	$_SESSION['r_phone_number'] = $phone_number;

	/* Taking down today's date on a variable will be stored in the database.*/
	$date = date("Y-m-d"); 

	/*From here there are only a lot of error messages within login or user registration.*/
	/*-----------------------------------------------------------------------------------------*/

	/* Checks here if the emails follow the correct format (Dio@Brando.en),
	And if it is inside the database*/
	if(filter_var($email, FILTER_VALIDATE_EMAIL)) { 

		$email = filter_var($email, FILTER_VALIDATE_EMAIL); 

		/*Checks here if Eposten is already in the database.*/
		$e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$email'"); 

		/*Count how many times the email is in the database (either 1 or 0)*/
		$num_rows = mysqli_num_rows($e_check); 

		/*Error message: The email is in the database.*/
		if($num_rows > 0) {  

			array_push($error_array, "Email already in use");  
		}
	}
	/*Error message: Not valid Email format.*/
	else {

		array_push($error_array, "Invalid email format"); 
	}

	/*Error Message: If the first name is not in the correct size*/
	if(strlen($firstname) > 25 || strlen($firstname) < 2) { 

		array_push($error_array, "This must be between 2 and 25 characters");
	}

	/*Error message: Last name not in correct size*/
	if(strlen($lastname) > 25 || strlen($lastname) < 1) {  

		array_push($error_array,  "This must be between 1 and 25 characters");
	}

	/*Error message: If the passwords are not the same*/
	if($password != $password_check) { 

		array_push($error_array,  "Your passwords do not match");
	}

	/*Error message: If the passwords contain other than numbers and letters.*/
	if(preg_match('/[^A-Za-z0-9]/', $password)) {  

		array_push($error_array, "Your password can only contain english characters or numbers");
	}
	
	/*Error message: If the password is not between 5 and 30 characters long.*/
	if(strlen($password > 30 || strlen($password) < 5)) {  

		array_push($error_array, "Your password must be betwen 5 and 30 characters");
	}


	/*If there are no error messages in $ error_array, this will happen.*/
	/*-------------------------------------------------------------------*/

	if(empty($error_array)) { 
		/*The password will be encrypted.*/
		$password = md5($password); 

		/*Here you create a username of the first name and last name, it ends up being the first_name_name*/
		$username = strtolower($firstname . "_" . $lastname);
		$check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");


		/*This variable should be used when creating a username on the next line.*/
		$i = 0; 
	 	$temp_username = $username; 

	 	/*If 'first_name_name' is in the database, the username will be 'first_name_name_x' The 'x' is how many 'first_name_name' located in the database*/
		while(mysqli_num_rows($check_username_query) != 0){
			/*setter midlertidig brukernavn til å bli lik brukernavnet som har blitt laget.*/
		    $temp_username = $username; 
		    $i++;
		    /*sets temporary username to match the username that has been created.*/

		    $temp_username = $username."_".$i; 
		    $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$temp_username'");
		}
		
		/*Then sets up the username to be what the while loop slipped through*/
		$username = $temp_username;


		/*Sets a profile image to the account.*/
		$rand = rand(1, 12);
		$profile_pic = "img/profile/default/" . $rand . ".png" ;

		/*Here, all the information is stored in the database, this line is important in that it adds the information into the database '1' at the end is the user type.*/
		$query = mysqli_query($con, "INSERT INTO users VALUES ('', '$firstname', '$lastname', '$username', '$email', '$password', '$date', '$profile_pic', '$phone_number' , 0)");

		/*Here's a message saying that mom is registered.*/
		array_push($error_array, "<span>You're all set! Go ahead and login!</span>"); 

		/*Here you will be renamed $ _SESSION once you have registered a user and all the input boxes will be empty.*/
		$_SESSION['r_firstname'] = "";
		$_SESSION['r_lastname'] = "";
		$_SESSION['r_email'] = "";
		$_SESSION['r_phone_number'] = "";

	}

}

/*If the 'registerlawyer' registration button on register.php is pressed this happens (the rest of the page)*/
if(isset($_POST['registerlawyer_button'])){ 

	$toggle = 'lawyer';

	$firstname = strip_tags($_POST['r_firstname']); 
	$lastname = strip_tags($_POST['r_lastname']);  
	$email = strip_tags($_POST['r_email']); 
	$username = strip_tags($_POST['r_username']); 
	$password = strip_tags($_POST['r_password']); 
	$password_check = strip_tags($_POST['r_password_check']);
	$phone_number = strip_tags($_POST['r_phone_number']); // The phone number to the lawyer
	$workplace = strip_tags($_POST['r_firm']); // The phone number to the lawyer
	$city = strip_tags($_POST['r_city']);  //The city that the person works in.


	$lastname = str_replace(' ', '', $lastname);
	$username = str_replace(' ', '', $username);
	$email = str_replace(' ', '', $email);
	$phone_number = str_replace(' ', '', $phone_number);

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

	$_SESSION['r_firstname'] = $firstname; 
	$_SESSION['r_lastname'] = $lastname;
	$_SESSION['r_username'] = $username;
	$_SESSION['r_email'] = $email; 
	$_SESSION['r_phone_number'] = $phone_number;
	$_SESSION['r_firm'] = $workplace;
	$_SESSION['r_city'] = $city;

	$date = date("Y-m-d"); 

	/*-----------------------------------------------------------------------------------------*/


	if(filter_var($email, FILTER_VALIDATE_EMAIL)) { 

		$email = filter_var($email, FILTER_VALIDATE_EMAIL); 

		$e_check = mysqli_query($con, "SELECT email FROM lawyerusers WHERE email='$email'"); 

		$e_num_rows = mysqli_num_rows($e_check); 

		if($e_num_rows > 0) {  

			array_push($error_array, "Email already in use");  
		}
	}
	else {

		array_push($error_array, "Invalid email format"); 
	}


	//Username check if it is used from before.
	$u_check = mysqli_query($con, "SELECT username FROM lawyerusers WHERE username='$username'");
	$u_num_rows = mysqli_num_rows($u_check);

	if ($u_num_rows > 0) {

		array_push($error_array, "The username is already taken.");
	}

	if(strlen($firstname) > 25) { 

		array_push($error_array, "Must be lower than 25 characters");
	}

	if(strlen($lastname) > 25 || strlen($lastname) < 1) {  

		array_push($error_array,  "This must be between 1 and 25 characters");
	}

	if(strlen($username) > 25 || strlen($username) < 4) { 

		array_push($error_array, "This must be between 4 and 25 characters");
	}

	if($password != $password_check) { 

		array_push($error_array,  "Your passwords do not match");
	}

	if(preg_match('/[^A-Za-z0-9]/', $password)) {  

		array_push($error_array, "Your password can only contain english characters or numbers");
	}
	
	if(strlen($password > 30 || strlen($password) < 5)) {  

		array_push($error_array, "Your password must be betwen 5 and 30 characters");
	}

	/*-------------------------------------------------------------------*/
	if(empty($error_array)) { 
		$password = md5($password); 

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
		    array_push($error_array, "Your file is to big");
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
		    array_push($error_array, "Your file is to big");
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

		/*Here, all information is stored in the database, this line is important in that it adds the information into the database, '1' at the end is user type Lsp.*/
		$query = mysqli_query($con, "INSERT INTO lawyerusers VALUES ('', '$firstname', '$lastname', '$username', '$email', '$password', '$city', '$date', '$profile_pic', '$target_file_id', '$target_file_cert', '$phone_number' , '$workplace', '$mainField', 0, 1)");

		/*Collects the row of the user that was just made and gets the lsp_id*/
		$sqlMf = "SELECT * FROM lawyerusers WHERE username='$username'";
		$queryMf = mysqli_query($con, $sqlMf);
		$row = mysqli_fetch_assoc($queryMf);
		$lsp_id = $row['lsp_id'];

		$query = mysqli_query($con, "INSERT INTO mainfields VALUES ('$lsp_id','$cb1', '$cb2', '$cb3', '$cb4', '$cb5', '$cb6', '$cb7', '$cb8', '$cb9', '$cb10')");

			
		array_push($error_array, "<span>You're all set! Go ahead and login!</span>"); 

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

	$toggle = 'firm';
	$firmname = strip_tags($_POST['r_firmname']);
	$email = strip_tags($_POST['r_email']); 
	$password = strip_tags($_POST['r_password']); 
	$password_check = strip_tags($_POST['r_password_check']);

	$email = str_replace(' ', '', $email);

	$email = ucfirst(strtolower($email)); 

	$date = date("Y-m-d"); 

	$_SESSION['r_firmname'] = $firmname; 
	$_SESSION['r_email'] = $email; 


	/*-----------------------------------------------------------------------------------------*/

	if(filter_var($email, FILTER_VALIDATE_EMAIL)) { 

		$email = filter_var($email, FILTER_VALIDATE_EMAIL); 

		$e_check = mysqli_query($con, "SELECT email FROM firms WHERE email='$email'"); 

		$num_rows = mysqli_num_rows($e_check); 

		if($num_rows > 0) {  

			array_push($error_array, "Email already in use");  
		}
	}
	else {

		array_push($error_array, "Invalid email format"); 
	}

	if($password != $password_check) { 

		array_push($error_array,  "Your passwords do not match");
	}

	if(preg_match('/[^A-Za-z0-9]/', $password)) {  

		array_push($error_array, "Your password can only contain english characters or numbers");
	}
	
	if(strlen($password > 30 || strlen($password) < 5)) {  

		array_push($error_array, "Your password must be between 5 and 30 characters");
	}


	/*-------------------------------------------------------------------*/
	if(empty($error_array)) { 
		$password = md5($password); 

		$profile_pic = "link til hvor profilbildet ligger";


		/*_________________________________Fileupload ID____________________________________________________________________*/
		mkdir("../src/utils/confirmation/firm_confirmation/" . $firmname);
		$targetdir = "../src/utils/confirmation/firm_confirmation/" . $firmname . "/";
		$target_file_id = $targetdir . basename($_FILES["fileToUpload"]["name"]);
		$upload = 1;
		$imageFileType = strtolower(pathinfo($target_file_id,PATHINFO_EXTENSION));

		if ($_FILES["fileToUpload"]["size"] > 500000) {
		    array_push($error_array, "Your file is to big");
		    $upload = 0;
		}

		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "pdf" ) {
			array_push($error_array, "Sorry, only JPG, JPEG, PNG & PDF files are allowed.");
		    $upload = 0;
		}

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
		    array_push($error_array, "Your file is to big");
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


		$query = mysqli_query($con, "INSERT INTO firms VALUES ('', '$firmname', '$email', '$password', '$date', '$target_file_id', '$target_file_cert','$profile_pic', 2)");

		array_push($error_array, "<span>You're all set! Go ahead and login!</span>");  

		$_SESSION['r_firmname'] = "";
		$_SESSION['r_email'] = "";
	}

}


?>