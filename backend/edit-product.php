<?php
require_once 'config/config.php';
session_start();
$email=$_SESSION['email'];
error_reporting(0);
$pro_id=$_GET['pro_id'];


?>
<?php
if (isset($_POST['update'])) {

	$code=$_POST['code'];
	$price=$_POST['price'];
	$quantity=$_POST['quantity'];
	if (!empty($code) && !empty($price) && !empty($quantity)) 
	{
		$update="UPDATE `add_product` SET`pro_code`='$code',`pro_price`='$price',`pro_quantity`='$quantity' WHERE `pro_id`='$pro_id'";
	$result=$conn->query($update);
	if ($result==true) {
		echo "<script>alert('product updated')</script>";
	}
	}
	else{
		echo "<script>alert('fillup field')</script>";
	}
	
	
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Product</title>
</head>
<style>
	a {
  text-decoration: none;
  display: inline-block;
  padding: 8px 16px;
}

a:hover {
  background-color: #ddd;
  color: black;
}

.previous {
  background-color: #f1f1f1;
  color: black;
}

.next {
  background-color: #4CAF50;
  color: white;
}

.round {
  border-radius: 50%;
}
</style>
<body>
	<div style="margin-top: 10px;"></div>
<h3 class=" h2 text-center font-weight-bold text-primary">Update Product</h3>
<hr>
 <div class="container">
 	<div class="row justify-content-center">
 		<div class="col-md-8">
 			<div class="card">
			  <div class="card-header">Brand</div>
			  <div class="card-body"style="background-color: #FAFAFA;">
			    
					<form method="POST" >
						  <div class="form-group">
						    <label for="exampleInputEmail1">Product Code</label>
						    <input type="text" name="code" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
						    <label for="exampleInputEmail1">Product price</label>
						    <input type="text" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
						    <label for="exampleInputEmail1">Product Quantity</label>
						    <input type="text" name="quantity" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >

						  
						  </div>
						  <button type="submit" name="update" class="btn btn-primary">Update</button>
					</form>
			  
			</div>
 		</div>
 	</div>
 	

 </div>
 <a href="home.php?&&page=update_pro" class="previous">&laquo; Previous</a>
  <div style="margin-top: 50px;"></div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	
</body>
</html>