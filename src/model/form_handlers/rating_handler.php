<?php 

	/*Get info*/
	$rating_details = mysqli_query($con, "SELECT * FROM ratings WHERE lsp_id='$lsp_id'");
	$ratings_info = mysqli_fetch_array($rating_details);

	$score = $ratings_info['score'];
	$ratings = $ratings_info['numbers_of_ratings'];

/* This will happen if the a user click the button to rate */
if(isset($_POST['rate_button'])){ 
	$rating = $_POST['rating']; 
	$score += $rating;
	$ratings++;
	

	$userid = $user['id'];
	$query = mysqli_query($con, "DELETE FROM ratings WHERE lsp_id='$lsp_id'");
	$query = mysqli_query($con, "INSERT INTO ratings VALUES ('$lsp_id', '$score', '$ratings')");
	//$query = mysqli_query($con, "UPDATE ratings SET lsp_id='$lsp_id', score='$score', numbers_of_ratings='$ratings' WHERE lsp_id='$lsp_id'");




}

?>