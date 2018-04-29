<?php 
/* Used for search button on the lawyerlist. */

if (isset($_POST['search_button'])) {
	$searchbox = $_POST['search'];
	$sql = "SELECT * FROM lawyerusers WHERE first_name like '%$searchbox%' OR last_name like '%$searchbox%'";
	$queryLu = mysqli_query($con, $sql);
	if (isset($_POST['field'])) {
		$field = $_POST['field'];
		if ($field == 1) {
			$sql = "SELECT * FROM lawyerusers INNER JOIN mainfields ON lawyerusers.lsp_id = mainfields.lsp_id WHERE (first_name like '%$searchbox%' OR last_name like '%$searchbox%') AND (contractlaw = '1' OR mainfield = 'Contract Law')";
			$queryLu = mysqli_query($con, $sql);
		} elseif ($field == 2) {
			$sql = "SELECT * FROM lawyerusers INNER JOIN mainfields ON lawyerusers.lsp_id = mainfields.lsp_id WHERE (first_name like '%$searchbox%' OR last_name like '%$searchbox%') AND (companylaw = '2' OR mainfield = 'Company Law')";
			$queryLu = mysqli_query($con, $sql);
		} elseif ($field == 3) {
			$sql = "SELECT * FROM lawyerusers INNER JOIN mainfields ON lawyerusers.lsp_id = mainfields.lsp_id WHERE (first_name like '%$searchbox%' OR last_name like '%$searchbox%') AND (financiallaw = '3' OR mainfield = 'Banking and Financial Law')";
			$queryLu = mysqli_query($con, $sql);
		} elseif ($field == 4) {
			$sql = "SELECT * FROM lawyerusers INNER JOIN mainfields ON lawyerusers.lsp_id = mainfields.lsp_id WHERE (first_name like '%$searchbox%' OR last_name like '%$searchbox%') AND (consumerlaw = '4' OR mainfield = 'Consumer Protection Law')";
			$queryLu = mysqli_query($con, $sql);
		} elseif ($field == 5) {
			$sql = "SELECT * FROM lawyerusers INNER JOIN mainfields ON lawyerusers.lsp_id = mainfields.lsp_id WHERE (first_name like '%$searchbox%' OR last_name like '%$searchbox%') AND (intellectuallaw = '5' OR mainfield = 'Intellectual Property Law')";
			$queryLu = mysqli_query($con, $sql);
		} elseif ($field == 6) {
			$sql = "SELECT * FROM lawyerusers INNER JOIN mainfields ON lawyerusers.lsp_id = mainfields.lsp_id WHERE (first_name like '%$searchbox%' OR last_name like '%$searchbox%') AND (investementlaw = '6' OR mainfield = 'Investement Law')";
			$queryLu = mysqli_query($con, $sql);
		} elseif ($field == 7) {
			$sql = "SELECT * FROM lawyerusers INNER JOIN mainfields ON lawyerusers.lsp_id = mainfields.lsp_id WHERE (first_name like '%$searchbox%' OR last_name like '%$searchbox%') AND (landlaw = '7' OR mainfield = 'Land Law')";
			$queryLu = mysqli_query($con, $sql);
		} elseif ($field == 8) {
			$sql = "SELECT * FROM lawyerusers INNER JOIN mainfields ON lawyerusers.lsp_id = mainfields.lsp_id WHERE (first_name like '%$searchbox%' OR last_name like '%$searchbox%') AND (civillaw = '8' OR mainfield = 'Civil Law')";
			$queryLu = mysqli_query($con, $sql);
		} elseif ($field == 9) {
			$sql = "SELECT * FROM lawyerusers INNER JOIN mainfields ON lawyerusers.lsp_id = mainfields.lsp_id WHERE (first_name like '%$searchbox%' OR last_name like '%$searchbox%') AND (criminallaw = '9' OR mainfield = 'Criminal Law')";
			$queryLu = mysqli_query($con, $sql);
		} elseif ($field == 10) {
			$sql = "SELECT * FROM lawyerusers INNER JOIN mainfields ON lawyerusers.lsp_id = mainfields.lsp_id WHERE (first_name like '%$searchbox%' OR last_name like '%$searchbox%') AND (divorcelaw = '10' OR mainfield = 'Marriage and Divorce Law')";
			$queryLu = mysqli_query($con, $sql);
		} else {

		}
	}
} else {
	$sql = "SELECT * FROM lawyerusers";
	$queryLu = mysqli_query($con, $sql);
}

?>