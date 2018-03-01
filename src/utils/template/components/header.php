	<!-- HEADER -->
	<header>

		<!-- LOGO -->
		<a href="index.php" class=" logo-container center-flex">
			<h1 class="full-w full-h center-flex"><span class="blue-txt">WI</span></h1>
		</a>

		<!-- NAVIGATION -->
		<nav class="full-h full-w">

			<a href="index.php" class="nav-item full-w full-h center-flex active">
				<i class="pc-hide fas fa-home fa-fw fa-2x"></i>
				<span class="pc-show nav-txt">Home</span>
			</a>

			<a href="userlist.php" class="nav-item full-w full-h center-flex">
				<i class="pc-hide fas fa-list fa-fw fa-2x"></i>
				<span class="pc-show nav-txt">Lawyers</span>
			</a>

			<a href="#" class="nav-item full-w full-h center-flex">
				<i class="pc-hide fas fa-info fa-fw fa-2x"></i>
				<span class="pc-show nav-txt">About</span>
			</a>

			<a href="#" class="nav-item full-w full-h center-flex">
				<i class="pc-hide fas fa-comment fa-fw fa-2x"></i>
				<span class="pc-show nav-txt">Contact</span>
			</a>

		</nav>

		<!-- LOGOUT.PHP -->
		<?php if (isset($user)) { ?>  <a href="logout.php">Logout</a>  <?php } else { ?>

		<!-- LOGIN -->
		<div href="#" class="login-container">
			<div class="full-w full-h center-flex">

				<span class="pc-show nav-txt">Login</span>
				<i class="pc-hide fas fa-sign-in-alt fa-fw fa-2x"></i>

				<div class="login-drop">
					<div class="login-box-container">
						<div class="login-box full-w full-h">
							
							<!-- Login quit -->
							<div class="login-quit">
								<i class="fas fa-times fa-2x"></i>
							</div>

							<!-- Form title -->
							<h2 class="login-title blue-txt">Login</h2>

							<!-- LOGIN FORM.PHP -->
							<form action="index.php" onsubmit="return submitform()" method="POST" class="login-form center-abs">

								<!--Email input-box-->
								<input class="small-marg-bot full-w" type="email" 
								name="l_email" placeholder="Email Address" value="<?php
								/*If there is an email in $ _SESSION, show it as value in the input box*/
								if(isset($_SESSION['l_email'])) {echo $_SESSION['l_email'];} ?>" required>

								<br>

								<!--password input-boks-->
								<input class="med-marg-bot full-w" id="pass" type="password" 
								name="l_password" placeholder="Password">

								<br>

								<!--The button that initiates login_handler.php and logs uses into the website-->
								<input type="submit" name="login_button" value="Login">
								<!--If there is an error message in $ error_array about the password, type it here-->
								<?php if(in_array("Email or password was incorrect<br>", $error_array)) {
								echo  "Email or password was incorrect<br>";} ?>
								<!-- FIX SÅNN AT DEN IKKE RELOADER UTEN RIKTIG PASSORD OG BRUKERNAVN -->

								<br>

								<!-- The links for creation of account and retrival of password -->
								<div class="login-links">
									<a href="register.php" class="img-fix small-marg-bot note-txt blue-txt">New User?</a>
									<a href="#" class="note-txt blue-txt">Forgot password?</a>
								</div>

							</form>
							<script type="text/javascript">
								function submitform()
								{	
									var element = document.getElementById('pass').value;
									if (element == '') {
										alert('You need to fill in the password!')
										return false;
									}
									return true;								
								}
							</script>
						</div>
					</div>
				</div>

			</div>
		</div>

		<!-- LOGIN END.PHP -->
		<?php } ?>

		</header>