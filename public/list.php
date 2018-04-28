<!-- This is the homepage for the website, on this site users will be able to 
see a list of lawyers that they can search in after different  -->

<?php  
/* Config gives a connection from the database to the website*/
require '../config/config.php';
/* Gets $user that you can use on the website to collect data from the database*/
include '../src/model/userinfo_handler/userinfo_handler.php';
/* Userlist handler that sets up the list on this site.*/
include '../src/model/form_handlers/userlist_handler.php';
/* Retrieving php code from login_handler.php */
include '../src/model/form_handlers/login_handler.php';	
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" >
<!-- HEAD -->
<?php $page_title = 'Lawyers';include "../src/utils/template/components/head.php";?>  

<body>

	<!-- HEADER -->
	<?php $current_page = 'list'; include '../src/utils/template/components/header.php'; ?>

	<main class="small-marg-bot">

		<div class="">
			<div class="hero med-marg-bot">
				<img src="img/placeholders/placeholder_large_blurry.jpg" alt="Test" class="full-w pc-show">
				<div class="cta center-abs pc-show">
					<p class="big-txt white-txt med-marg-bot">Get trusted advices after clicks <i class="fas fa-mouse-pointer blue-txt"></i></p> 
					<a href="#list" class="cta-button center-text card bread-txt">Find a lawyer</a>
				</div>
			</div>

			<div class="lawyer-listing container center-marg">

				<div id="list"></div>
			
			<div class="search container med-marg-bot">
				<form action="list.php" class="full-w full-h card" method="POST">
					<div class="search-input full-w small-marg-bot">
						
						<input type="text" name="search" class="bread-txt faded-black-txt" placeholder="Search by name">
						<button id="search-button" type="submit" name="search_button" class="faded-black-txt"><i class="fas fa-search fa-lg"></i>
						<!--<i class="fas fa-search fa-2x"></i>-->
						
					</div>

					<!-- Kan bare kjøre en for loop her -->
					<div class="search-options">
						<div class="full-w faded-black-txt small-marg-bot"><input type="radio" name="field" value="1"><span class="nav-txt">Contract Law</span></div>
						<div class="full-w faded-black-txt small-marg-bot"><input type="radio" name="field" value="2"><span class="nav-txt">Company Law</span></div>
						<div class="full-w faded-black-txt small-marg-bot"><input type="radio" name="field" value="3"><span class="nav-txt">Financial Law</span></div>
						<div class="full-w faded-black-txt small-marg-bot"><input type="radio" name="field" value="4"><span class="nav-txt">Consumer Law</span></div>
						<div class="full-w faded-black-txt small-marg-bot"><input type="radio" name="field" value="5"><span class="nav-txt">Intellectual Law</span></div>
						<div class="full-w faded-black-txt small-marg-bot"><input type="radio" name="field" value="6"><span class="nav-txt">Investement Law</span></div>
						<div class="full-w faded-black-txt small-marg-bot"><input type="radio" name="field" value="7"><span class="nav-txt">Land Law</span></div>
						<div class="full-w faded-black-txt small-marg-bot"><input type="radio" name="field" value="8"><span class="nav-txt">Civil Law</span></div>
						<div class="full-w faded-black-txt small-marg-bot"><input type="radio" name="field" value="9"><span class="nav-txt">Criminal Law</span></div>
						<div class="full-w faded-black-txt small-marg-bot"><input type="radio" name="field" value="10"><span class="nav-txt">Divorce Law</span></div>
					</div>

				</form>
			</div>

			<div class="list container">
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
					/* Needs this to place the stars where they should be. */
					include '../src/model/form_handlers/rating_handler.php';
					?>
					<div class="list-item card margin-bottom full-w">

						<a href="<?php echo $username; ?>" class="list-item-avatar center-flex">
							<div class=".img-cutter">
								<img src="<?php echo $profile_pic; ?>" alt="#">
							</div>
						</a>

						<div class="list-item-main full-w">

							<div class="title-row margin-bottom">
								<a href="<?php echo $username; ?>" class="lsp-name"><?php echo $first_name . " " . $last_name  ?></a>
								
								<?php if ($reviews > 0) { ?>
								
								<div class="profile-rating tablet-show">
									<div class="center-flex">
										<span class="bread-txt black-txt"><?php echo number_format($scoresum[0]/$reviews, 1); ?></span><i class="fas fa-star fa-2x"></i>
									</div>
								</div>
								
								<?php } ?>
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
							$rowMf = mysqli_fetch_row($queryMf);
							?>

							<div class="field-row small-margin-bottom">
								<?php
								echo '<span class="tag inactive-tag">' . $mainfield . '</span>';
								for ($var = 1 ; $var <= 10; $var++) { 
									if (in_array($var, $rowMf)) {
										$sql = "SELECT field_name FROM fieldnames WHERE field_number='$var'";
										$queryFn = mysqli_query($con, $sql);
										$name = mysqli_fetch_assoc($queryFn);
										$fieldName = $name["field_name"];
										if ($fieldName != $mainfield) {
											echo '<span class="tag inactive-tag">' . $fieldName . '</span>'; 
										}
									}
								}?>	 
							</div>

						</div>

				</div>
			<?php }
			} ?>
			</div>

			</div>

		</div>
	</main>

	<!-- FOOTER -->
    <?php include '../src/utils/template/components/footer.php';?>
    

</body>
</html>