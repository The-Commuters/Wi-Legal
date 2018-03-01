<!--Dette er konfigurasjonssiden som burde være koblet til hver nettside
For nå inneholder det tidsonen og feilmelding hvis det ikke er noen tilkobling
til databasen-->

<?php 
	
	ob_start();  

	/*Starter her en session som lagrer variabler med navn $_SESSION 
	som kommer til å være aktive så lenge bruker er logget inn.*/
	session_start(); 

	/*Tidssone.*/
	$timezone = date_default_timezone_set("Europe/London");

	/*Er den koblet til databasen?(Dtabasen er localhost?.*/
	$con = mysqli_connect("localhost", "root", "", "wilegal"); 

	/*Feilmelding: mysqli_connect_errno() Kommer med feilmeldingen fra siste tilkoblingsfeil*/
	if(mysqli_connect_errno()) {	
		/*Kommer denne med en feilmelding.*/
		echo "Failed to connect: " . mysqli_connect_errno(); 
	}
	
?>