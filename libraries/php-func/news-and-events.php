<?php
	include("connection.php");
	session_start();
	$search = "";
	$limit = "";
	if(!empty($_POST["limit"])){
		$limit = $_POST["limit"];
	}else{
		$limit = 25;
	}
	
	if(!empty($_POST["type"])){
		$search = "where type='".$_POST["type"]."'";
	}else{
		$search = "";
	}
	if(!empty($_POST["type"]) && !empty($_POST["search"])){
		$search.="and title like '".$_POST["search"]."%'";
	}elseif(empty($_POST["type"]) && !empty($_POST["search"])){
		$search = "where title like '".$_POST["search"]."%'";
	}
	$query = $con->query("select * from tbl_news_and_events $search order by  date_posted DESC limit $limit");
	while($row = $query->fetch()){
		?>
		<div class="w3-col s12 m6 l6 w3-padding-small"> 
			<div class="w3-col s12 m12 l12 w3-white news-container"> 
				<div class="w3-black w3-display-container w3-center">
					<img src="../<?php if(file_exists("../../".$row["picture"]) && !empty($row["picture"])){echo $row["picture"];}else{echo"images/img-error.png";}?>" width="100%" height="auto" class="news-img w3-card-2 w3-hover-shadow w3-hover-opacity w3-btn w3-margin-0" onclick="viewImage('../<?php if(file_exists("../../".$row["picture"]) && !empty($row["picture"])){echo $row["picture"];}else{echo"images/img-error.png";}?>');">  
					<?php if(file_exists("../../".$row["picture"]) && !empty($row["picture"])){}else{ ?>
					<div class="w3-display-bottommiddle w3-padding-large" style="background:rgba(0,0,0,0.70);color:red;">
						<b>Image doesn't exists</b>
					</div>
					<?php }?>
				</div>
				<div class="w3-clear"></div>
				<div class="w3-padding-medium w3-justify">
					<p class="news-content">
					<b class="w3-col s12 m12 l12 w3-padding-0 w3-margin-0 w3-text-theme"><?=$row["title"];?></b> 
					<?=$row["content"];?></p> 
					<?php
						if(empty($_SESSION["admin_id"])){
					?>
					<button  class="w3-btn w3-theme w3-hover-theme-dark w3-left" onclick="loadModalContent('viewPost','../libraries/php-func/view-post.php?id=<?=$row["tbl_id"];?>','viewPost');"><i class="fa fa-expand"></i> Read More</button>
					<?php } ?>
					<div class="w3-right w3-padding-small w3-text-grey">
					<i class="fa fa-calendar"></i>  <?=date("F d, Y",strtotime($row["date_posted"]));?> | <?php
						if($row["type"] == "News"){
							echo '<i class="fa fa-bullhorn "></i> '.$row["type"];
						}else{
							echo '<i class="fa fa-flag "></i> '.$row["type"];
						}
					?></div> 
				</div>
				<div class="w3-col s12 m12 l12 w3-padding-0 w3-dark-grey">
					
					<?php
						if(!empty($_SESSION["admin_id"])){
							?>
							<button  class="w3-btn w3-col s4 m4 l4 w3-border w3-border-grey w3-transparent w3-hover-theme-dark w3-left" onclick="loadModalContent('viewPost','../libraries/php-func/view-post.php?id=<?=$row["tbl_id"];?>','viewPost');"><i class="fa fa-expand"></i> Read More</button>
							<button  class="w3-btn w3-col s4 m4 l4 w3-border w3-border-grey w3-transparent w3-hover-green w3-left" onclick="loadModalContent('viewPost','../libraries/php-func/edit-post.php?tbl_id=<?=$row["tbl_id"];?>','viewPost')"><i class="fa fa-edit"></i> Edit</button>
							<button  class="w3-btn w3-col s4 m4 l4 w3-border w3-border-grey w3-transparent w3-hover-red w3-left" onclick="loadModalContent('viewPost','../libraries/php-func/confirm-delete-post.php?tbl_id=<?=$row["tbl_id"];?>','viewPost')"><i class="fa fa-trash"></i> Delete</button>
							<?php
						}
					?>
				</div>
				<br>
				<br>
			</div> 
		</div> 
	<?php
		}
	?>