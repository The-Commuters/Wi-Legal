<?php 
	//Collects everything from the database lawyerusers, can be cut down when 

if (isset($_POST['search_button'])) {
	$searchbox = $_POST['search'];
	$sql = "SELECT * FROM lawyerusers WHERE first_name like '%$searchbox%' OR last_name like '%$searchbox%'";
	$queryLu = mysqli_query($con, $sql);
} else {
	$sql = "SELECT * FROM lawyerusers";
	$queryLu = mysqli_query($con, $sql);
}

?>