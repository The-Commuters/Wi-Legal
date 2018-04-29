<?Php
/* This is the page where messages is showed, only lawyers will have acces to this page. */

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
	/*Collects every message from the datababase for the logged in user. */
	$lsp_id = $user['lsp_id']; 
	$sql = "SELECT * FROM messages WHERE lsp_id = '$lsp_id'";
	$query = mysqli_query($con, $sql);
	?>

	<main class="marg-container">

		<?php
		/*  Output of messages, collects data from the different senders and 
			posts their information(tel, mail) Together with the messages. */
		if (mysqli_num_rows($query) > 0) {
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
					<div class="profile-item full-w med-marg-bot">
						<div class="profile-item-title full-w card">
							<h2 class="white-txt"><?php echo $name; ?></h2>
						</div>
						<div class="profile-item-info full-w card">
							
							<div class="about-info bread-txt black-txt">
								<h2><?php echo $title; ?></h2>
							<div><?php echo $message; ?></div>
							<br>
							<div><p>Contact me at:</p></div>
							<div><?php echo 'Phone Number: ' . $phone_number; ?></div>
							<div><?php echo 'Contact Email: ' . $email; ?></div>
							</div>
						</div>
						<?php }} ?>
					</div>
				

			</main>

			<!-- FOOTER -->
			<?php include '../src/utils/template/components/footer.php'; ?>

		</body>
		</html>