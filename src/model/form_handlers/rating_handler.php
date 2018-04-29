<?php 
/* Rating handler bring information about the ratings, 
and sends information when someone rates them. */

/* Get count of reviews that the lawyer has gotten. */
$rating_details = mysqli_query($con, "SELECT COUNT(*) FROM ratings WHERE lsp_id='$lsp_id'");
$ratings_info = mysqli_fetch_array($rating_details);
$reviews = $ratings_info[0];

/* Collects all reviews that the lawyer has. */
$lspallreviews = mysqli_query($con, "SELECT * FROM ratings WHERE lsp_id='$lsp_id'");
$row = mysqli_fetch_assoc($lspallreviews);

$sumofscore = mysqli_query($con, "SELECT SUM(score) FROM ratings WHERE lsp_id='$lsp_id'");
$scoresum = mysqli_fetch_array($sumofscore);


/* Gets the number that is used to decide if the user have posted a review before. */
if (isset($user)) {
	if ($user['usertype'] == 0) {
		$user_id = $user['user_id'];	
		$personal_reviews = mysqli_query($con, "SELECT COUNT(*) FROM ratings WHERE user_id='$user_id' AND lsp_id='$lsp_id'");
		$userreviews = mysqli_fetch_array($personal_reviews);	

		/* Reviews of lsp in all and if the user have reviewed the lsp. */
		$userreview = $userreviews[0];

		/* This will happen if the a user click the button to rate */
		if(isset($_POST['rate_button'])){ 
			$review = $_POST['review'];
			$rating = $_POST['rating']; 

			$query = mysqli_query($con, "DELETE FROM ratings WHERE lsp_id='$lsp_id' AND user_id='$user_id'");
			$query = mysqli_query($con, "INSERT INTO ratings VALUES ('', '$lsp_id', '$user_id', '$review', '$rating')");
		}
	}
}

?>