<?php
/*Gets the url path for the profile page it is on now, then cuts of /wilegal/
and gives you the username for the user, then collects all information in the
database and saves it in $other_user.*/

$link = $_SERVER['REQUEST_URI'];
/*add more to the int if not all of the username is shown.*/
$username = substr($link, 38);

$user_detals_query = mysqli_query($con, "SELECT * FROM lawyerusers WHERE username='$username'");
$other_user = mysqli_fetch_array($user_detals_query);
?>