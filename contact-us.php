<?php
	include("libraries/php-func/main-func.php");
	include("libraries/php-func/connection.php");
	head("CONTACT US","home");
?>
	<div class="w3-col s12 m12 l12 w3-container w3-theme">
		<div class="w3-col s12 m1 l1 w3-container"></div>
		<div class="w3-col s12 m10 l0 w3-container w3-padding-0">
			<img src="images/banner.png" width="100%">
			
			<div class="w3-clear w3-container w3-col s12 m12 l12"></div>
			<div class="w3-col s12 m12 l12 w3-margin-top">
				<a href="javascript:void:0;" class="w3-btn w3-round w3-padding-medium w3-right " style="margin-left:5px;background:#88c149;" onclick="$('#login-form').fadeIn()"><i class="fa fa-sign-in"></i> Login</a>
				<a href="register.php" class="w3-btn w3-round w3-padding-medium w3-right" style="background:#dd5600;"><i class="fa fa-list-alt"></i> Register</a>
			</div>
			<div class="w3-padding-small w3-white w3-round w3-col s12 m12 l12 w3-center w3-margin-top" >
				<a href="index.php" class="w3-btn w3-white w3-padding-medium w3-hover-theme w3-text-theme"><i class="fa fa-home w3-xlarge"></i> <b>HOME</b></a>
				<a href="gallery.php" class="w3-btn w3-white w3-padding-medium w3-hover-theme w3-text-theme"><i class="fa fa-image w3-xlarge"></i> <b>GALLERY</b></a>
				<a href="about-us.php" class="w3-btn w3-white w3-padding-medium w3-hover-theme w3-text-theme"><i class="fa fa-info-circle w3-xlarge"></i> <b>ABOUT US</b></a>
				<a href="contact-us.php" class="w3-btn w3-theme w3-padding-medium w3-hover-theme w3-text-white"><i class="fa fa-phone-square w3-xlarge"></i> <b>CONTACT US</b></a>
				<a href="news-and-events.php" class="w3-btn w3-white w3-padding-medium w3-hover-theme w3-text-theme"><i class="fa fa-flag w3-xlarge"></i> <b>NEWS & EVENTS</b></a>
			</div>
			
			<div class="w3-padding-medium w3-col s12 m12 l12 w3-white w3-round w3-margin-top">
				<?php
					$query = $con->query("select * from tbl_contact_us limit 1");
					$row = $query->fetch();
				?>
				<div class="w3-col s6 m6 l6 w3-margin-top w3-padding-right">
					<p class="w3-padding-small w3-col s12 m12 l12"><?=$row["intro"];?></p>
				</div>
				<div class="w3-col s6 m6 l6 w3-container w3-margin-top w3-margin-bottom w3-display-container" >
					<p class="w3-padding-medium w3-border-theme-dark w3-light-grey w3-col s12 m12 l12 w3-code" style="margin:0px;margin-bottom:5px;"><i class="fa fa-phone-square w3-xlarge"></i> <b>Phone:</b> <?=$row["tel_number"];?></p>
					<p class="w3-padding-medium w3-border-theme-dark w3-light-grey w3-col s12 m12 l12 w3-code" style="margin:0px;margin-bottom:5px;"><i class="fa fa-mobile-phone w3-xlarge"></i> <b>Mobile:</b> <?=$row["mob_number"];?></p>
					<p class="w3-padding-medium w3-border-theme-dark w3-light-grey w3-col s12 m12 l12 w3-code" style="margin:0px;margin-bottom:5px;"><i class="fa fa-envelope w3-xlarge"></i> <b>Email:</b> <?=$row["email"];?></p>
					<p class="w3-padding-medium w3-border-theme-dark w3-light-grey w3-col s12 m12 l12 w3-code" style="margin:0px;margin-bottom:5px;"><i class="fa fa-facebook-square w3-xlarge"></i> <b>Facebook:</b> <a href="<?=$row["facebook"];?>" class="w3-hover-text-blue"><?=$row["facebook"];?></a></p>
					<p class="w3-padding-medium w3-border-theme-dark w3-light-grey w3-col s12 m12 l12 w3-code" style="margin:0px;margin-bottom:5px;"><i class="fa fa-twitter-square w3-xlarge"></i> <b>Twitter:</b> <a href="<?=$row["twitter"];?>" class="w3-hover-text-blue"><?=$row["twitter"];?></a></p>
					<p class="w3-padding-medium w3-border-theme-dark w3-light-grey w3-col s12 m12 l12 w3-code" style="margin:0px;margin-bottom:5px;"><i class="fa fa-map-marker w3-xlarge"></i> <b>Address:</b> <?=$row["address"];?></p>
				</div>
			</div>
			
		</div>
	</div> 
<?php
	footer("home");
?>