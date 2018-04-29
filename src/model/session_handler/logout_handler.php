<?php 
/* This is the page that logs users out and sends them to register.php
Logut buttons can be created by linking them to this page */

	session_start();
	session_destroy();
	header("Location: ../../../public/index.php");
	exit;
?>