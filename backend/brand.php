<?php
session_start();
$email=$_SESSION['email'];
require_once 'config/config.php';

 	$nameErr=false;
if (isset($_POST['submit'])) {
	$name= $_POST['brand_name'];
	if (!empty($name)) {
		$brandInsert="INSERT INTO `brand`(`name`) VALUES ('$name')";

		$result=$conn->query ($brandInsert);
		if ($result) {
			if ($conn->affected_rows > 0) {
				echo "<script>alert ('Add Brand')</script>";
			}
		}
	}else{
		$nameErr=true;
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add Category Page</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/sweetalert.css">
	<link rel="stylesheet" href="css/sweetalert.min.css">
	<script src="js/sweetalert.min.js"></script>


</head>
<body>
 <div style="margin-top: 10px;"></div>
<h3 class=" h2 text-center font-weight-bold text-primary">Add Brand</h3>
<hr>
 <div class="container">
 	<div class="row justify-content-center">
 		<div class="col-md-8">
 			<div class="card">
			  <div class="card-header">Brand</div>
			  <div class="card-body"style="background-color: #FAFAFA;">
			    
					<form method="POST" >
						  <div class="form-group">
						    <label for="exampleInputEmail1">Brand Name</label>
						    <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Brand Name">

						   <?php
						  if ( $nameErr == true) {
						   
						   	?>
						    <span class="text-danger">Filled Required</span>
						    <?php
								}
						    ?>
						  
						  </div>
						  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
					</form>
			  
			</div>
 		</div>
 	</div>
 	

 </div>
  <div style="margin-top: 50px;"></div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	
</body>
</html>