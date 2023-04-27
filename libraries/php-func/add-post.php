<?php
	include("connection.php");
	$msg = "";
	$query_select  = $con->query("select count(tbl_id)as rowCount from tbl_news_and_events where title='".$_POST["title"]."'");
	$row_select = $query_select->fetch();
	if($row_select["rowCount"] == 0){
		try{
			
			$dir = "../../images/news-and-events-pictures/";
			if(!empty($_FILES["picture"]["name"])){
				$file = $dir.basename($_FILES["picture"]["name"]);
				$file_type =getImageSize($_FILES["picture"]["tmp_name"]);
				if($file_type["mime"] =="image/png" || $file_type["mime"] =="image/jpeg" || $file_type["mime"] =="image/jpg" || $file_type["mime"] == "image/swf" || $file_type["mime"] =="image/bmp" ){
					$queryFirst = "insert into tbl_news_and_events(title,content,type)values('".$_POST["title"]."','".$_POST["content"]."','".$_POST["type"]."')";
					$con->exec($queryFirst);
					$tbl_id = $con->lastInsertId();
					if(move_uploaded_file($_FILES["picture"]["tmp_name"],$file)){
						if(rename($file,$dir.$tbl_id.".".pathinfo($_FILES["picture"]["name"],PATHINFO_EXTENSION))){ 
							$picture = "picture='images/news-and-events-pictures/".$tbl_id.".".pathinfo($_FILES["picture"]["name"],PATHINFO_EXTENSION)."'";
						}else{ 
							$msg = '<p class="w3-red w3-padding-medium w3-margin-0"><i class="fa fa-circle"></i> Error while renaming your picture</p>';
						}
					}else{ 
						$msg = '<p class="w3-red w3-padding-medium w3-margin-0"><i class="fa fa-circle"></i> Error while uploading your picture please try again</p>';
					}
				}else{ 
					$msg = '<p class="w3-red w3-padding-medium w3-margin-0"><i class="fa fa-circle"></i> Invalid image format, system will accept only JPG,JPEG,PNG,BMP and SWF formats</p>';
				} 
			}else{
				$picture = "";
			}
			if(!empty($picture)){
				$query = "update tbl_news_and_events set $picture where tbl_id='".$tbl_id."'";
				$con->exec($query);
			}
			if(empty($msg)){
			?> 
			<script>
				window.location.assign('add-post.php?msg=<p class="w3-green w3-padding-medium w3-margin-0"><i class="fa fa-check"></i> Success adding new post</p>');
			</script>
			<?php
			}
		}catch(PDOException $e){
			$msg = '<p class="w3-red w3-padding-medium w3-margin-0"><i class="fa fa-warning"></i>'.$e->getMessage().'</p>'; 
		}
	}else{
		$msg = '<p class="w3-red w3-padding-medium w3-margin-0"><i class="fa fa-warning"></i> Title is already in use</p>'; 
	}
	echo $msg;
?>