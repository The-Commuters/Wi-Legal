<?php 
	//Collects everything from the database lawyerusers, can be cut down when 

if (isset($_POST['search_button'])) {
	$searchbox = $_POST['search'];
	$sql = "SELECT * FROM lawyerusers WHERE first_name like '%$searchbox%' OR last_name like '%$searchbox%'";
	$queryLu = mysqli_query($con, $sql);
	if (isset($_POST['field'])) {
		$field = $_POST['field'];
		if ($field = 'Contract Law') {
			
		} elseif ($field = 'Company Law') {
			# code...
		} elseif ($field = 'Financial Law') {
			# code...
		} elseif ($field = 'Consumer Law') {
			# code...
		} elseif ($field = 'Intellectual Law') {
			# code...
		} elseif ($field = 'Investement Law') {
			# code...
		} elseif ($field = 'Land Law') {
			# code...
		} elseif ($field = 'Civil Law') {
			# code...
		} elseif ($field = 'Criminal Law') {
			# code...
		} elseif ($field = 'Divorce Law') {
			# code...
		}
	}
	

} else {
	$sql = "SELECT * FROM lawyerusers";
	$queryLu = mysqli_query($con, $sql);
}

?>