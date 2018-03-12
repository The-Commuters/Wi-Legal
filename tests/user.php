<?php
/*This is where all the classes are put, you can use them to call on information and put it in other pages*/

class User {
	private $user;
	private $con;

	public function __construct($con, $user){
		$this->con = $con;
		/*this 'IF' decides what table of users that we search, 0 for users, 1 for lawyers*/
		if ($_SESSION['usertype'] == 0) {
			$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$user'");
		} elseif($_SESSION['usertype'] == 1) {
			$user_details_query = mysqli_query($con, "SELECT * FROM lawyerusers WHERE username='$user'");
		} else {
			$user_details_query = mysqli_query($con, "SELECT * FROM firms WHERE username='$user'");
		}
		$this->user = mysqli_fetch_array($user_details_query);
	}

	/*Get the username*/
	public function getUsername() {
		return $this->user['username'];
	}

	/*Get the first and last names of logged in user*/
	public function getFirstAndLastName() {
		$username = $this->user['username'];
		/*this 'IF' decides what table of users that we search, 0 for users, 1 for lawyers*/
		if ($_SESSION['usertype'] == 0) {
			$query = mysqli_query($this->con, "SELECT first_name, last_name FROM users WHERE username='$username'");
		} else {
			$query = mysqli_query($this->con, "SELECT first_name, last_name FROM lawyerusers WHERE username='$username'");
		}
		$row = mysqli_fetch_array($query);
		return $row['first_name'] . " " . $row['last_name'];
	}

		/*Get the first and last names of logged in user*/
	public function getFirstAndLastName() {
		$username = $this->user['username'];
		/*this 'IF' decides what table of users that we search, 0 for users, 1 for lawyers*/
		if ($_SESSION['usertype'] == 0) {
			$query = mysqli_query($this->con, "SELECT first_name, last_name FROM users WHERE username='$username'");
		} else {
			$query = mysqli_query($this->con, "SELECT first_name, last_name FROM lawyerusers WHERE username='$username'");
		}
		$row = mysqli_fetch_array($query);
		return $row['first_name'] . " " . $row['last_name'];
	}



}

?>