<!--Home for other lawyers.-->

<?php  
	//Connection to the database
	require '../config/config.php';
	include '../src/model/userinfo_handler/userinfo_handler.php';
	include '../src/model/form_handlers/profile_handler.php';
	/* Retrieving php code from login_handler.php */
	include '../src/model/form_handlers/login_handler.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" >
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Wi Legal</title>
	<meta name="description" content="Description of the page less than 150 characters">
	<link rel="icon" type="image/png" href="img/favicon/favicon.png">
	<link rel="canonical" href="http://example.com/index.html">

	<!-- CSS files -->
	<link rel="stylesheet" type="text/css" href="css/style.css">                
	<link rel="stylesheet" type="text/css" href="css/stylelist.css">  

	<!-- JavaScript files -->
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/core.js" async></script>              
</head>
<body>

	<!-- HEADER -->
	<?php $page_current = 'profile'; include '../src/utils/template/components/header.php'; ?>

Dette er profilsiden<br>
Som du kan se er brukernavnet i søkeboksen ovenfor<br>
Nå kan man legge ting til på denne siden for brukeren det gjelder<br>
Man skal komme hit etter at man trykker på brukernavnet til en advokat i lista<br>
Og her kan man finne kontaktinformasjon og annen info om brukeren 
<br>
<img src="<?php 
$profile_pic = $other_user['profile_picture'];
echo $profile_pic; ?>">

</body>
</html>