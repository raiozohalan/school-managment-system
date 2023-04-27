<?php
	include("connection.php");
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
				<img src="<?php if(file_exists("../../".$row["picture"]) && !empty($row["picture"])){echo $row["picture"];}else{echo"images/img-error.png";}?>" width="100%" height="auto" class="news-img w3-card-2 w3-hover-shadow w3-hover-opacity w3-btn w3-margin-0" onclick="viewImage('<?php if(file_exists("../../".$row["picture"]) && !empty($row["picture"])){echo $row["picture"];}else{echo"images/img-error.png";}?>');">  
				<?php if(file_exists("../../".$row["picture"]) && !empty($row["picture"])){}else{ ?>
				<div class="w3-display-bottommiddle w3-padding-large" style="background:rgba(0,0,0,0.70);color:red;">
					<b>Image doesn't exists</b>
				</div>
				<?php }?>
			</div>
			<div class="w3-clear"></div>
				<div class="w3-padding-small w3-justify">
					<p class="news-content">
					<b class="w3-col s12 m12 l12 w3-padding-0 w3-margin-0 w3-text-theme"><?=$row["title"];?></b> 
					<?=$row["content"];?></p>
					<div class="w3-padding-top w3-padding-bottom w3-col s12 m12 l12">
						<div class="w3-right w3-text-grey w3-padding-small"><i class="fa fa-calendar"></i>  <?=date("F d, Y",strtotime($row["date_posted"]));?> | <?php
							if($row["type"] == "News"){
								echo '<i class="fa fa-bullhorn "></i> '.$row["type"];
							}else{
								echo '<i class="fa fa-flag "></i> '.$row["type"];
							}
						?></div>
						
						<button type="button" onclick="loadModalContent('viewPost','libraries/php-func/view-post-home.php?id=<?=$row["tbl_id"];?>','viewPost');" class="w3-btn w3-col s4 m4 l4 w3-theme w3-hover-theme-dark w3-left">Read More</button>
					</div>
				</div>
		</div> 
		</div> 
					<?php
						}
					?>