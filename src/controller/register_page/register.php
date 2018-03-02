
<!-- This is the actual registration page where users are created,
It contains two pages where you can log in already
users and one who registers new users .-->

<!-- Required files to load for page to work -->
<?Php
/* Connects to database and retrieves time */
require '../../../config/config.php';
/* Retrieving php code from register_handler.php */
require '../../model/form_handlers/register_handler.php';
?>

<Html>
<Head>
	<title> Welcome to WiLegal! </title>
<link rel="stylesheet" type="text/css" href="../../../public/css/style.css">                
</head>
<body>
	<p>Registrering for kunder</p>
	<!--The form for registering a new user-->
	<form action="register.php" method="POST">

		<!--firstname input-box-->
		<input type="text" name="r_firstname" placeholder="First Name" value="<?php 
		if(isset($_SESSION['r_firstname'])) {
			echo $_SESSION['r_firstname'];
		} 
		?>" required>
		<br>
		<!--If there is an error message in $ error_array about the first name, print it here-->
		<?php if(in_array("Your first name must be between 2 and 25 characters<br>", $error_array)) 
		echo "Your first name must be between 2 and 25 characters<br>"; ?>
		
		<!--lastname input-box-->
		<input type="text" name="r_lastname" placeholder="Last Name" value="<?php 
		if(isset($_SESSION['r_lastname'])) {
			echo $_SESSION['r_lastname'];
		} 
		?>" required>
		<br>
		<!--If there is an error message in $ error_array about the Last Name, print it here-->
		<?php if(in_array("Your last name must be between 2 and 25 characters<br>", $error_array)) 
		echo "Your last name must be between 2 and 25 characters<br>"; ?>

		<!--Email input-box-->
		<input type="email" name="r_email" placeholder="Email" value="<?php 
		if(isset($_SESSION['r_email'])) {
			echo $_SESSION['r_email'];
		} 
		?>" required>
		<br>
		<!--If there is an error message in $ error_array about the email, print it here, but just one of them.-->
		<?php if(in_array("Email already in use<br>", $error_array)) echo "Email already in use<br>"; 
		else if(in_array("Invalid email format<br>", $error_array)) echo "Invalid email format<br>"; ?>

		<!--password input-box-->
		<input type="password" name="r_password" placeholder="Password" required>
		<br>

		<!--password check input-box-->
		<input type="password" name="r_password_check" placeholder="Confirm Password" required>
		<br>
		<!--If there is an error message in $ error_array about the password, print it here, but just one of them.-->
		<?php if(in_array("Your passwords do not match<br>", $error_array)) echo "Your passwords do not match<br>"; 
		else if(in_array("Your password can only contain english characters or numbers<br>", 
			$error_array)) echo "Your password can only contain english characters or numbers<br>";
			else if(in_array("Your password must be betwen 5 and 30 characters<br>", $error_array)) 
				echo "Your password must be betwen 5 and 30 characters<br>"; ?>

			<!--The input for the phone number-->
			<input type="tel" name="r_phone_number" placeholder="Phone Number" required>
			<br>

			<!--Register-button, starts register_handler.php-->
			<input type="submit" name="register_button" value="Register">
			<br>

			<!--Message that tells you that your user are ready to use.-->
			<?php if(in_array("You're all set! Go ahead and login!<br>", $error_array)) 
			echo "You're all set! Go ahead and login!<br>"; ?>

		</form>

		<p>Registrering for advokater</p>
		<!--The form for registering a new LSP user-->
		<form action="register.php" method="POST" enctype="multipart/form-data">

			<!--firstname-->
			<input type="text" name="r_firstname" placeholder="First Name" value="<?php 
			if(isset($_SESSION['r_firstname'])) {
				echo $_SESSION['r_firstname'];
			} 
			?>" required>
			<br>
			<?php if(in_array("Your first name must be between 2 and 25 characters<br>", $error_array)) 
			echo "Your first name must be between 2 and 25 characters<br>"; ?>

			<!--lastname-->		
			<input type="text" name="r_lastname" placeholder="Last Name" value="<?php 
			if(isset($_SESSION['r_lastname'])) {
				echo $_SESSION['r_lastname'];
			} 
			?>" required>
			<br>
			<?php if(in_array("Your last name must be between 2 and 25 characters<br>", $error_array)) 
			echo "Your last name must be between 2 and 25 characters<br>"; ?>

			<!--Username that the user want-->
			<input type="text" name="r_username" placeholder="User name" value="<?php 
			if(isset($_SESSION['r_username'])) {
				echo $_SESSION['r_username'];
			} 
			?>" required>
			<br>
			<?php if(in_array("This must be between 3 and 25 characters<br>", $error_array)) 
			echo "This must be between 3 and 25 characters<br>";
			elseif (in_array("The username is already taken.<br>", $error_array)) 
				echo "The username is already taken.<br>";?>

			<!--email that the user owns-->
			<input type="email" name="r_email" placeholder="Email" value="<?php 
			if(isset($_SESSION['r_email'])) {
				echo $_SESSION['r_email'];
			} 
			?>" required>
			<br>
			<?php if(in_array("Email already in use<br>", $error_array)) echo "Email already in use<br>"; 
			else if(in_array("Invalid email format<br>", $error_array)) echo "Invalid email format<br>"; ?>

			<!--check of the password-->
			<input type="password" name="r_password" placeholder="Password" required>
			<br>

			<!--password that the user want-->
			<input type="password" name="r_password_check" placeholder="Confirm Password" required>
			<br>
			<?php if(in_array("Your passwords do not match<br>", $error_array)) echo "Your passwords do not match<br>"; 
			else if(in_array("Your password can only contain english characters or numbers<br>", 
				$error_array)) echo "Your password can only contain english characters or numbers<br>";
			else if(in_array("Your password must be betwen 5 and 30 characters<br>", $error_array)) 
					echo "Your password must be betwen 5 and 30 characters<br>"; ?>

			<!--The input for the phone number-->
			<input type="tel" name="r_phone_number" placeholder="Phone Number" value="<?php 
			if(isset($_SESSION['r_phone_number'])) {
				echo $_SESSION['r_phone_number'];
			} 
			?>" required>
			<br>

			<!--The input for the firm they are working for, optional(no required)-->
			<input type="text" name="r_firm" placeholder="Firm(Optional)" value="<?php 
			if(isset($_SESSION['r_firm'])) {
				echo $_SESSION['r_firm'];
			} 
			?>">
			<br>

			<input type="text" name="r_city" placeholder="City of employment" value="<?php 
			if(isset($_SESSION['r_city'])) {
				echo $_SESSION['r_city'];
			} 
			?>">
			<br>

				<!--Id upload/Passport/Drivers lisence-->
				Upload your ID here:<br>
				<input type="file" name="fileToUpload">
				<?php if(in_array("Your file is not an image<br>", $error_array)) echo "Your file is not an image<br>"; 
				else if(in_array("Your file is to big<br>", $error_array)) echo "Your file is to big<br>";
				else if(in_array("Sorry, only JPG, JPEG, PNG & GIF files are allowed.", $error_array)) 
					echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				?>
				<br>

				<!--Lawyer certification/proof of being a LSP-->
				Upload your Certification here:<br>
				<input type="file" name="fileToUpload2">
				<?php if(in_array("Your file is not an image<br>", $error_array)) echo "Your file is not an image<br>"; 
				else if(in_array("Your file is to big<br>", $error_array)) echo "Your file is to big<br>";
				else if(in_array("Sorry, only JPG, JPEG, PNG & GIF files are allowed.", $error_array)) 
					echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				?><br>

				<!--Choose the main area of expertise in law.-->
				<!--Temporary, jquery 'chosen' singular list-->
				Choose your main field in law:<br>
				<select name="r_mainField" required>
					<option value="none">Choose One</option>
					<option value="Contract Law">Contract Law</option>
					<option value="Company Law">Company Law</option>
					<option value="Banking and Financial Law">Banking and Financial Law</option>
					<option value="Consumer Protection Law">Consumer Protection Law</option>
					<option value="Intellectual Property Law">Intellectual Property Law</option>
					<option value="Investement Law">Investement Law</option>
					<option value="Land Law">Land Law</option>
					<option value="Civil Law">Civil Law</option>
					<option value="Criminal Law">Criminal Law</option>
					<option value="Marriage and Divorce Law">Marriage and Divorce Law</option>
				</select>
				<br>


				<!--List of other areas in law that you ar competent in.-->
				<!--Temporary, jquery 'chosen' multiple list-->
				Choose what other fields that you are competent in:<br>
				<input type="checkbox" name="r_ContractLaw" value="Contract Law">Contract Law<br>
				<input type="checkbox" name="r_CompanyLaw" value="Company Law">Company Law<br>
				<input type="checkbox" name="r_BankingandFinancialLaw" value="Banking and Financial Law">Banking and Financial Law<br>
				<input type="checkbox" name="r_ConsumerProtectionLaw" value="Consumer Protection Law">Consumer Protection Law<br>
				<input type="checkbox" name="r_IntellectualPropertyLaw" value="Intellectual Property Law">Intellectual Property Law<br>
				<input type="checkbox" name="r_InvestementLaw" value="Investement Law">Investement Law<br>
				<input type="checkbox" name="r_LandLaw" value="Land Law">Land Law<br>
				<input type="checkbox" name="r_CivilLaw" value="Civil Law">Civil Law<br>
				<input type="checkbox" name="r_CriminalLaw" value="Criminal Law">Criminal Law<br>
				<input type="checkbox" name="r_MarriageAndDivorceLaw" value="Marriage and Divorce Law">Marriage and Divorce Law<br>


				<br>
				<input type="submit" name="registerlawyer_button" value="Register">
				<br>

				<?php if(in_array("<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>", $error_array)) 
				echo "<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br><br>"; ?>

			</form>

			<p>Registrering for Firmaer</p>
			<!--The form for registering a new user-->
			<form action="register.php" method="POST" enctype="multipart/form-data">

				<!--firmname input-box-->
				<input type="text" name="r_firmname" placeholder="Firm Name" required>
				<br>

				<!--Email input-box-->
				<input type="email" name="r_email" placeholder="Email" required>
				<br>

				<!--password input-box-->
				<input type="password" name="r_password" placeholder="Password" required>
				<br>

				<!--password check input-box-->
				<input type="password" name="r_password_check" placeholder="Confirm Password" required>
				<br>
				<!--If there is an error message in $ error_array about the password, print it here, but just one of them.-->
				<?php if(in_array("Your passwords do not match<br>", $error_array)) echo "Your passwords do not match<br>"; 
				else if(in_array("Your password can only contain english characters or numbers<br>", 
					$error_array)) echo "Your password can only contain english characters or numbers<br>";
					else if(in_array("Your password must be betwen 5 and 30 characters<br>", $error_array)) 
						echo "Your password must be betwen 5 and 30 characters<br>"; ?>

					Upload Proof of existence? here:<br>
					<input type="file" name="fileToUpload" id="fileToUpload">
					<?php if(in_array("Your file is not an image<br>", $error_array)) echo "Your file is not an image<br>"; 
					else if(in_array("Your file is to big<br>", $error_array)) echo "Your file is to big<br>";
					else if(in_array("Sorry, only JPG, JPEG, PNG & GIF files are allowed.", $error_array)) 
						echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
					?>
					<br>

					<!--Lawyer certification/proof of being a LSP-->
					Upload Buisness certificate here:<br>
					<input type="file" name="fileToUpload2" id="fileToUpload2">
					<br>
					<?php if(in_array("Your file is not an image<br>", $error_array)) echo "Your file is not an image<br>"; 
					else if(in_array("Your file is to big<br>", $error_array)) echo "Your file is to big<br>";
					else if(in_array("Sorry, only JPG, JPEG, PNG & GIF files are allowed.", $error_array)) 
						echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
					?>

					<!--Register-button, starts register_handler.php-->
					<input type="submit" name="registerfirm_button" value="Register">
					<br>

					<!--Message that tells you that your user are ready to use.-->
					<?php if(in_array("You're all set! Go ahead and login!<br>", $error_array)) 
					echo "You're all set! Go ahead and login!<br>"; ?>

				</form>
			</body>
			</html>