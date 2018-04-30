<?php
/* Collects information about a person who sent a review,
   it is needed for on the lawyerlist */

/* Collects here information about the current review */	
$reviewtext = $row['review'];
$reviewscore = $row['score'];
$reviewuserid = $row['user_id'];

/* Collect here information about the person who sent in the review. */
$queryreviewsender = mysqli_query($con, "SELECT first_name, last_name, profile_picture FROM users WHERE user_id = '$reviewuserid'");
$sender = mysqli_fetch_array($queryreviewsender);
$reviewfname = $sender['first_name'];
$reviewlname = $sender['last_name'];
$reviewpic = $sender['profile_picture'];
?>