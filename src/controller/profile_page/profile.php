<!--Home for other lawyers.-->

<?php  
	//Connection to the database
	require '../../../config/config.php';
	include '../../model/userinfo_handler/userinfo_handler.php';
	include '../../model/form_handlers/profile_handler.php';
?>

<html>
<head>
	<title>Welcome to WiLegal</title>
</head>
<body>

Dette er profilsiden<br>
Som du kan se er brukernavnet i søkeboksen ovenfor<br>
Nå kan man legge ting til på denne siden for brukeren det gjelder<br>
Man skal komme hit etter at man trykker på brukernavnet til en advokat i lista<br>
Og her kan man finne kontaktinformasjon og annen info om brukeren 
<br>
<?php
$profile_pic = $other_user['username'];
echo $profile_pic;

$rand = rand(1, 14);
$profile_pic = "../../../public/img/profile/default/" . $rand . ".png" ;

?>


</body>
</html>