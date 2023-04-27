<?php
	function head($title,$path){ 
		?>
		<html>
			<head>
				<title>Integrated Academy | Pototan | <?=$title;?></title>
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<?php
					if($path == "home")
					{
						?>
						<link rel="stylesheet" href="libraries/stylesheet/font-awesome.min.css">
						<link rel="icon" href="images/logo.png" type="image/x-icon">
						<link rel="stylesheet" href="libraries/stylesheet/style.css">
						<link rel="stylesheet" href="libraries/stylesheet/w3-theme-blue-grey.css">
						<script src="libraries/jquery/jquery.min1.js"></script>
						<script src="libraries/js/raizoh-functions.js"></script>
						<?php
					}else{
						?> 
						<link rel="stylesheet" href="../libraries/stylesheet/font-awesome.min.css">
						<link rel="icon" href="../images/logo.png" type="image/x-icon">
						<link rel="stylesheet" href="../libraries/stylesheet/style.css">
						<link rel="stylesheet" href="../libraries/stylesheet/w3-theme-blue-grey.css"> 
						<script src="../libraries/jquery/jquery.min1.js"></script>
						<script src="../libraries/js/raizoh-functions.js"></script>
						<?php
					}
				?>
			</head>
			<body class="w3-padding-0 w3-theme">
			<?php
				if($path == "home")
					{
			?>
			<div id="login-form" class="w3-modal w3-animate-zoom w3-padding-0" style="background:rgba(0,0,0,0.90)"> 
				<div class="w3-modal-content w3-card-8 w3-animate-zoom w3-round w3-border w3-border-white" style="max-width:600px;margin-top:200px;overflow:hidden;">
  
					<div class="w3-margin-0 w3-padding-0 w3-display-container">
					  <img src="images/banner.png" alt="Avatar" style="width:100%;height:auto;" class="w3-margin-0 w3-padding-0">
					</div>
					<h4 class="w3-col s12 m12 l12 w3-theme w3-margin-0 w3-padding-medium">Log In</h4>
					<div id="loginResponseCon"></div>
					<form class="w3-container w3-padding-top" action="libraries/php-func/verify-login.php" method="POST" id="loginForm"><br><br>
					  <div class="w3-section w3-margin-0">
						<label><b>Username</b></label>
						<input class="w3-input w3-border w3-margin-bottom w3-padding-large w3-round" type="username" placeholder="Enter Username" name="username" required>

						<label><b>Password</b></label>
						<input class="w3-input w3-border w3-padding-large w3-round" type="password" placeholder="Enter Password" name="password" required>

						<button class="w3-btn w3-padding-xlarge w3-green w3-section w3-round" type="submit" name="submit" onclick="send('loginForm','libraries/php-func/verify-login.php','loginResponseCon')"><i class="fa fa-sign-in"></i> Login</button> 
						<button class="w3-btn w3-padding-xlarge w3-grey w3-section w3-round" type="button" onclick="$('#login-form').hide();"><i class="fa fa-close"></i> Cancel</button> 
					  </div>
					</form> 
				  </div>
			</div>
	<?php
		}else{
			?>
			<div id="view-student" class="w3-modal w3-animate-zoom w3-padding-0" style="background:rgba(0,0,0,0.90);z-index:1000;">
				<div class="w3-col s12 m12 l12 w3-margin-right w3-top">
					<button class="w3-right w3-btn w3-padding-medium w3-theme w3-hover-white w3-margin-right" onclick="$('#view-student').fadeOut();"><i class="fa fa-close"></i> Close</button>
				</div>
				<div id="view-student-profile"></div>
			</div>
			<?php
		}
		if(!empty($_GET["msg"])){
			?>
			<div id="messageModal" class="w3-modal w3-animate-zoom w3-padding-0" style="background:rgba(0,0,0,0.90);display:block;"> 
				<div class="w3-modal-content w3-card-8 w3-animate-zoom w3-round w3-border w3-border-white w3-padding-0" style="max-width:600px;margin-top:200px;overflow:hidden;">
					<div class="w3-padding-medium w3-theme w3-col s12 m12 l12">
						<h3>Message</h3>
					</div>
					<div class="w3-padding-medium w3-white w3-col s12 m12 l12">
						<p><?=$_GET["msg"];?></p>
						<button class="w3-btn w3-padding-medium w3-grey w3-section w3-round" type="button" onclick="$('#messageModal').hide();"><i class="fa fa-close"></i> Close</button> 
					</div>
				</div>
			</div>
			<?php
		}
		?>
		
			<div id="img-preview" class="w3-modal w3-center w3-animate-zoom w3-padding-0" style="background:rgba(0,0,0,0.90);z-index:999;">
				<button class="w3-display-topright w3-btn w3-padding-medium w3-theme w3-hover-white" onclick="$('#img-preview').fadeOut();"><i class="fa fa-close"></i> Close</button>
				<img src="" id="img-view" class="w3-card-4" style="margin-top:30px;margin-bottom:auto;margin-left:auto;margin-right:auto;height:auto;min-height:auto;max-height:95%;width:auto;min-width:auto;max-width:98%;">
			</div>
			
			<script>
				$('#img-preview').click(function(){$('#img-preview').fadeOut();});
				function viewImage(src){
					$('#img-preview').show();
					$('#img-view').attr("src",src); 
				}
			</script>
		<?php
	}
	function footer($path){
		if($path == "home"){
			include("libraries/php-func/connection.php");
		}else{
			include("../libraries/php-func/connection.php");
		}
		$query_cont = $con->query("select * from tbl_contact_us where tbl_id='1'");
		$row_cont = $query_cont->fetch();
		?>
		</body>
		<div class="w3-col s12 m12 l12 w3-center w3-theme w3-padding-large w3-container">
			<b>You could Visit us on </b>
			<div class="w3-clear"></div>
			<a href="<?=$row_cont["facebook"];?>" class="w3-btn w3-round w3-margin-medium w3-xlarge w3-hover-white"><i class="fa fa-facebook"></i></a>
			<a href="<?=$row_cont["twitter"];?>" class="w3-btn w3-round w3-margin-medium w3-xlarge w3-hover-white"><i class="fa fa-twitter "></i></a> 
		</div>
		<footer class="w3-col s12 m12 l12 w3-padding-small w3-white w3-center">
			<b>Copyright 2018</b>
		</footer>
		</html>
		<?php
	}
?>