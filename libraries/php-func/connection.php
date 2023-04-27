<?php
	try{
		$con = NEW PDO("mysql:host=localhost;dbname=ia_database","root","");
		$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $a){
		echo "Error in connecting server".$a->getMessage();
	}
?>