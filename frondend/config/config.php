<?php
	$conn = new mysqli("localhost","root","","e_com");

	if($conn->error){
		die("Error to".$conn->error);
	}else{
		//echo "okk";
	}
?>