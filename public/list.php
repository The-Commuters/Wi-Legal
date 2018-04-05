<?php  
/*Config gives a connection to the database between the website*/
require '../config/config.php';
/*Gets $user that you can use on the website to collect data from the database*/
include '../src/model/userinfo_handler/userinfo_handler.php';
/*Userlist handler that sets up the list on this site.*/
include '../src/model/form_handlers/userlist_handler.php';
/* Retrieving php code from login_handler.php */
include '../src/model/form_handlers/login_handler.php';
/* $loggedinuser will tell the rest of the site what user is connected */
include '../src/model/userinfo_handler/userinfo_handler.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" >
<!-- HEAD -->
<?php $page_title = 'Lawyers';include "../src/utils/template/components/head.php";?>  

<body>

	<!-- HEADER -->
	<?php $current_page = 'list'; include '../src/utils/template/components/header.php'; ?>

	<main>
		<?php
		if (mysqli_num_rows($queryLu) > 0) {
	  		// output data of each row
			while($row = mysqli_fetch_assoc($queryLu)) {	
	    		//Gets the variables from the current user you want to show.
				$first_name = $row["first_name"];
				$last_name = $row["last_name"];
				$username = $row["username"];
				$lsp_id = $row["lsp_id"];
				$profile_pic = $row["profile_picture"]; 
				$city = $row["city"]; 
				$firm = $row["lsp_firm"];
				$mainfield = $row["mainfield"];
				?>
				<div class="list-item card margin-bottom full-w">

					<a href="<?php echo $username; ?>" class="list-item-avatar center-flex">
						<img src="<?php echo $profile_pic; ?>" alt="#">
					</a>

					<div class="list-item-main full-w">

						<div class="title-row margin-bottom">
							<a href="<?php echo $username; ?>" class="lsp-name"><?php echo $first_name . " " . $last_name  ?></a>
							<a href="<?php echo $username; ?>" class="show-pc visit-button">Visit page</a>
						</div>

						<div class="info-row margin-bottom">
							<span>
								<?php 	if ($firm != NULL) { echo '<i class="far fa-building"></i>' . " " . $firm;} 
								else { echo '<i class="fas fa-street-view"></i>' . " " . "Freelance"; } ?>
							</span> 
							<span><i class="fas fa-map-marker"></i> <?php echo $city ?></span> 
						</div>

						<?php 
						$sqlMf = "SELECT * FROM mainfields WHERE lsp_id='$lsp_id'";
						$queryMf = mysqli_query($con, $sqlMf);
						$row = mysqli_fetch_row($queryMf);
						?>

						<div class="field-row small-margin-bottom">
							<?php
							echo '<span class="tag inactive-tag">' . $mainfield . '</span>';
							for ($var = 1 ; $var <= 9; $var++) { 
								if (in_array($var, $row)) {
									$sqlMf = "SELECT field_name FROM fieldnames WHERE field_number='$var'";
									$queryMf = mysqli_query($con, $sqlMf);
									$name = mysqli_fetch_assoc($queryMf);
									$fieldName = $name["field_name"];
									if ($fieldName != $mainfield) {
										echo '<span class="tag inactive-tag">' . $fieldName . '</span>'; 
									}
								}
							}?>	 
							<!-- <span class="tag active-tag">Criminal Law</span> -->
						</div>

					</div>

				</div>
			<?php }
		} ?>
	</main>

</body>
</html>