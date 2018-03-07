<?php  
/*Config gives a connection to the database between the website*/
require '../../../config/config.php';
/*Gets $user that you can use on the website to collect data from the database*/
include '../../model/userinfo_handler/userinfo_handler.php';
/*Userlist handler that sets up the list on this site.*/
include '../../model/form_handlers/userlist_handler.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>List of Lawyers</title>
	<link rel="stylesheet" type="text/css" href="../../../public/css/style.css">                
	<link rel="stylesheet" type="text/css" href="../../../public/css/stylelist.css">                
</head>
<body>

		<!-- HEADER -->
	<?php //include '../../utils/template/components/header.php'; ?>

	<div>
		<?php
		if (mysqli_num_rows($queryLu) > 0) {
	  // output data of each row
			while($row = mysqli_fetch_assoc($queryLu)) {	
	    //Gets the variables from the current user you want to show.
				$first_name = $row["first_name"];
				$last_name = $row["last_name"];
				$username = $row["username"];
				$profile_pic = $row["profile_picture"]; 
				$city = $row["city"]; ?>

				<a class="list-container" href="<?php echo "../profile_page/" . $username; ?>">

					<div class="list-image full-h center-flex" >
						<div class="img-cutter">
							<!--<img src="<?php echo $profile_pic; ?>" alt="profile pic" class="center-abs full-w">		-->		<!-- profile image -->
						</div>
					</div>

					<div class="list-info full-h text">

						<div>
							<h3 class="list-name"> <?php echo $first_name . ' ' . $last_name; ?> </h3>
							<p class="list-loc"> <?php echo $city; ?> </p>
							<p class="list-cost">100 kr</p>
						</div>

						<?php 
						$sqlMf = "SELECT * FROM lawyerusers WHERE username='$username'";
						$queryMf = mysqli_query($con, $sqlMf);
						$row = mysqli_fetch_assoc($queryMf);
						?>

						<div>
							<?php
							foreach($row as $key => $value) {
								if ($value !== 'No' && $value !== $username) {
									?>
									<div class="list-exp">
										<?php echo $row['lsp_id']; ?>  
									</div>	
									<?php }} ?>			
								</div>

							</div>

						</a>    
						<?php 
					}
				} 
				?>
			</div>


		</body>
		</html>