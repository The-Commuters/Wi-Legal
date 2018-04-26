<?Php
/*This is the page where lawyers can read their messages that users have sent them*/

/* Connects to database and retrieves time */
require '../config/config.php';
/* Retrieving php code from login_handler.php */
include '../src/model/form_handlers/login_handler.php';
/* $loggedinuser will tell the rest of the site what user is connected */
include '../src/model/userinfo_handler/userinfo_handler.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<!-- HEAD -->
<?php $page_title = 'Wilegal'; include '../src/utils/template/components/head.php'; ?>              

<body>

	<!-- HEADER -->
	<?php $current_page = 'userprofile'; include '../src/utils/template/components/header.php'; ?>

	<?php 
	$lsp_id = $user['lsp_id']; 
	//Collects everything from the database lawyerusers, can be cut down when 
	$sql = "SELECT * FROM messages WHERE lsp_id = '$lsp_id'";
	$query = mysqli_query($con, $sql);
	?>

	<main class="marg-container">

		<?php
		if (mysqli_num_rows($query) > 0) {
			/* Output of messages, collects data from the  */
			while($row = mysqli_fetch_assoc($query)) {	
				$sender_id = $row['user_id'];
				$message = $row['text'];
				$message_id = $row['message_id'];
				$title = $row['title'];


				$sql = "SELECT first_name, last_name, email, phone_number FROM users WHERE user_id = '$sender_id'";
				$querylu = mysqli_query($con, $sql);
				$sender = mysqli_fetch_array($querylu);
				$first_name = $sender['first_name'];
				$last_name = $sender['last_name'];
				$phone_number = $sender['phone_number'];
				$email = $sender['email'];
				$name = $first_name . ' ' . $last_name;

				?>
				
				<div class="profile center-marg med-marg-top">
					<div class="banner-container full-w card med-marg-bot">
					<div class="profile-item full-w med-marg-bot">
						<div class="profile-item-title full-w card">
							<h2 class="white-txt"><?php echo $name; ?></h2>
							<h2 class="white-txt"><?php echo $title; ?></h2>
						</div>
						<div class="profile-item-info full-w card">
							<?php echo $message; ?><br>
							<?php echo $phone_number; ?><br>
							<?php echo $email; ?>

							<form action="cases.php" method="POST">
								<input type="submit" id="<?php echo $message_id; ?>"  name="slett" value="Delete">
							</form>

						</div>
						<?php }} ?>
					</div>
				</div>


			</main>

			<!-- FOOTER -->
			<?php include '../src/utils/template/components/footer.php'; ?>

		</body>
		</html>