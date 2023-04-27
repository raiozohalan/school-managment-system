<?php
	include("../libraries/php-func/main-func.php");
	include("../libraries/php-func/connection.php");
	head("Faculty Login","");
	session_start();
	if(!empty($_SESSION["faculty_id"]) && !empty($_SESSION["username"])){
		?>
		<script>window.location.assign("students.php");</script>
		<?php
	}
?>
	<div class="w3-col s12 m12 l12 w3-container w3-theme w3-padding-64" style="height:100%;">
		<div class="w3-col s12 m4 l4 w3-container"></div>
		<div class="w3-col s12 m4 l4 w3-container w3-padding-0">
			<h3 class="w3-center w3-border-bottom w3-border-theme-dark w3-padding-bottom "><b>Faculty Login</b></h3>
			<div id="loginResponseCon"></div>
			<form class="w3-container w3-padding-small w3-margin-top" action="../libraries/php-func/verify-faculty-login.php" method="POST" id="loginForm"> 
				<label><b>Username</b></label>
				<input class="w3-input w3-border w3-border-white w3-theme-dark w3-margin-bottom w3-padding-large w3-round" type="username" placeholder="Enter Username" name="username" required autofocus>

				<label><b>Password</b></label>
				<input class="w3-input w3-border w3-border-white w3-theme-dark w3-padding-large w3-round" type="password" placeholder="Enter Password" name="password" required>

				<button class="w3-btn w3-padding-large w3-green w3-section w3-round" type="submit" name="submit" onclick="send('loginForm','../libraries/php-func/verify-faculty-login.php','loginResponseCon')"><i class="fa fa-sign-in"></i> Login</button> 
			</form>
			<p class="w3-center w3-col s12 m12 l12 w3-border-top w3-border-theme-dark w3-margin-0 w3-padding-top">Integrated Academy</p>
			<p class="w3-center w3-col s12 m12 l12 w3-margin-0">Copyright 2018</p>
		</div>  
	</div>  