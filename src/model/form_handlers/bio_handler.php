<?php 

/* This will happen if the logged in lawyer presses the button to change his bio */
if(isset($_POST['bio_button'])){ 
	/* Deletes here what the old bio from the database. */
	$query = mysqli_query($con, "DELETE FROM lspbios WHERE lsp_id='$lsp_id'");

	$date = date("Y-m-d"); /* Date that the bio was last changed. */
	$input_bio = $_POST['m_bio']; /* What is in the 'input bio' textbox. */
	$query = mysqli_query($con, "INSERT INTO lspbios VALUES ('$lsp_id', '$input_bio', '$date')");
}

?>