<!-- Required files to load for page to work -->
<?Php
/* Connects to database and retrieves time */
require '../config/config.php';
/* Retrieving php code from login_handler.php */
include '../src/model/form_handlers/login_handler.php';
/* $loggedinuser will tell the rest of the site what user is connected */
include '../src/model/userinfo_handler/userinfo_handler.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" >

<!-- HEAD -->
<?php $page_title = 'Wilegal'; include '../src/utils/template/components/head.php'; ?>

<body>
	<!-- HEADER -->
	<?php $current_page = 'about'; include '../src/utils/template/components/header.php';?>

	<main>

		<div class="about center-marg container">

			<h1 class="med-marg-top blue-txt marg-container">About Wi-Legal</h1>

			<div class="about-wrapper marg-container big-marg-bot fade-right-2s">
				<div class="about-title center-text blue-txt">
					<h2>OUR VISION</h2>
				</div>
				<div class="about-info bread-txt black-txt">
					<div>We are making the platform to become the best partner to both LSPs and clients who live or invest in Vietnam. Customers could get the trusted advices and stable relationship with LSPs through our platform.</div>
					<br>
					<div>The LSPs could develop their customer network and approach them in the new way, not just in person. We believe that all of us have the benefit with this platform.</div> 
				</div>
			</div>
			<div class="about-wrapper marg-container big-marg-bot fade-right-3s">
				<div class="about-title center-text blue-txt">
					<h2>OUR MISSION</h2>
				</div>
				<div class="about-info bread-txt black-txt">
					<div>- Providing an effective way in connecting LSPs and customers. We reduce the cost and time by eliminating traditional meetings and documenting processes.</div>
					<br>
					<div>- AI technology in matching cases. We adopt latest AI technology in recommending the best matched LSPs to customer`s cases.</div>
					<br>
					<div>- Socializing legal service to everyone. We focus on the demand of initial advices and small-scale cases that clients do not want to spend time to meet LSPs in person.</div>
				</div>
			</div>
			<div class="about-wrapper marg-container big-marg-bot fade-right-4s">
				<div class="about-title center-text blue-txt ">
					<h2>ABOUT US</h2>
				</div>
				<div class="about-info bread-txt black-txt">
					<div>We shorten the distance from legal service providers (LSPs) with the clients.</div>
					<br>
					<div>WiLegal is the first law-tech start-up business in Vietnam using Artificial Intelligence (AI) technology in legal services. Legal system is created to protect our legitimate rights and interest. LSPs are professionals who give the advice to people. WiLegal is the virtual broker that connects the LSPs and the customers; you can find and hire lawyers or law firms in Vietnam through our platform.</div>
					<br>
					<div>At WiLegal, we would like to make various legal services quick, reliable, and affordable for customers and provide the modern means to approach potential customers for LSPs.</div>
				</div>
			</div>

		</div>

		
	</main>


	<!-- FOOTER -->
	<?php include '../src/utils/template/components/footer.php';?>


</body>
</html>