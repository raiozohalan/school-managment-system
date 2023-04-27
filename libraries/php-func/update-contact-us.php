<?php
	include("connection.php");
	
	$err = 0;
	$msg = "";
	$emailTxt = "";
	$facebook = "";
	$twitter = "";
	if(!empty($_POST["email"])){
		$email = $_POST["email"];

		// Remove all illegal characters from email
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);

		// Validate e-mail
		if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
			$emailTxt = $email;
		} else {
			$emailTxt = "";
			$err+=1;
			$msg = "<i class='fa fa-warning'></i> $email is not a valid email address<br>";
		}
	}else{
		$emailTxt = "";
	}
	
	if(!empty($_POST["facebook"])){
		$urlfacebook = $_POST["facebook"];

		// Remove all illegal characters from a url
		$urlfacebook = filter_var($urlfacebook, FILTER_SANITIZE_URL);

		// Validate url
		if (!filter_var($urlfacebook, FILTER_VALIDATE_URL) === false) {
			$facebook = $urlfacebook;
		}elseif (!filter_var($urlfacebook, FILTER_VALIDATE_URL, FILTER_FLAG_SCHEME_REQUIRED ) === false){
			$facebook = $urlfacebook;
		}elseif (!filter_var($urlfacebook, FILTER_VALIDATE_URL, FILTER_FLAG_HOST_REQUIRED ) === false){
			$facebook = $urlfacebook;
		}elseif (!filter_var($urlfacebook, FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED ) === false){ 
			$facebook = $urlfacebook;
		} else {
			$facebook = "";
			$err+=1;
			$msg.= "<i class='fa fa-warning'></i> ".$_POST["facebook"]." is not a valid URL<br>";
		}
	}else{
		$facebook = "";
	}
	if(!empty($_POST["twitter"])){
		$urltwitter = $_POST["twitter"];

		if (!filter_var($urltwitter, FILTER_VALIDATE_URL, FILTER_FLAG_QUERY_REQUIRED) === false){
			$twitter = $urltwitter;
		}elseif (!filter_var($urltwitter, FILTER_VALIDATE_URL, FILTER_FLAG_SCHEME_REQUIRED ) === false){
			$twitter = $urltwitter;
		}elseif (!filter_var($urltwitter, FILTER_VALIDATE_URL, FILTER_FLAG_HOST_REQUIRED ) === false){
			$twitter = $urltwitter;
		}elseif (!filter_var($urltwitter, FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED ) === false){
			$twitter = $urltwitter;
		} else {
			$twitter = "";
			$err+=1;
			$msg.= "<i class='fa fa-warning'></i> ".$_POST["twitter"]." is not a valid URL<br>";
		}
	}else{
		$twitter = "";
	}
	
	if($err == 0){
		try{
			$query = $con->prepare("update tbl_contact_us set intro=:intro,address=:address,tel_number=:tel_number,mob_number=:mob_number,email=:email,facebook=:facebook,twitter=:twitter where tbl_id='1'");
			$query->bindParam(':intro',$introTxt);
			$query->bindParam(':address',$addressTxt);
			$query->bindParam(':tel_number',$tel_numberTxt);
			$query->bindParam(':mob_number',$mob_numberTxt);
			$query->bindParam(':email',$emailTxt);
			$query->bindParam(':facebook',$facebookTxt);
			$query->bindParam(':twitter',$twitterTxt);
			
			$introTxt = $_POST["intro"];
			$addressTxt = $_POST["address"];
			$tel_numberTxt = $_POST["tel_number"];
			$mob_numberTxt = $_POST["mob_number"];
			$emailTxt = $email;
			$facebookTxt = $facebook;
			$twitterTxt = $twitter;
			$query->execute();
			?>
			<script>
				window.location.assign('contact-us.php?msg=<p class="w3-col s12 m12 l12 w3-padding-medium w3-green w3-margin-0"><i class="fa fa-warning"></i> Your contact information is successfully updated</p>');
			</script>
			
			<?php
		}catch(PDOException $e){
			?>
			<p class="w3-col s12 m12 l12 w3-padding-medium w3-red"><i class="fa fa-warning"></i> <?=$e->getMessage();?></p>
			<?php
		}
	}else{
		?>
		<p class="w3-col s12 m12 l12 w3-padding-medium w3-red"> <?=$msg;?></p>
		<?php
	}
?>