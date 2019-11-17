<?php
require_once 'config/config.php';
session_start();
?>
<?php
if (isset($_POST['submit'])) 
{
	$brand=$_POST['brand'];
	$cat=$_POST['cat_name'];
	$pro_id=$_POST['pro_id'];                                                    
	$pro_name=$_POST['pro_name'];
	$pro_code=$_POST['pro_code'];
	$price=$_POST['pro_price'];
	$pro_quantity=$_POST['pro_quantity'];
	$pro_details=$_POST['pro_details'];
	$pro_info=$_POST['pro_info'];
	$img_name='image';
    $image_count=($_FILES[$img_name]['tmp_name']);

	$insert="INSERT INTO `add_product`(`brand_name`, `cat_name`, `pro_id`, `pro_name`, `pro_code`, `pro_price`, `pro_quantity`, `pro_details`, `pro_info`) VALUES ('$brand','$cat','$pro_id','$pro_name','$pro_code','$price','$pro_quantity','$pro_details','$pro_info')";

	$Insert_result=$conn->query($insert);
	if ($Insert_result == true) {
	    if ($conn->affected_rows >0) {

	    for ($i=0;$i<count($image_count); $i++) 
        { 
          $image_name=$pro_id."($i)";
          $image_location="img/product_img/$image_name.jpg";
          move_uploaded_file($image_count[$i],$image_location);
        }
	    	echo  "<script>alert ('Data Add')</script>";
	    }
	    else{
	    	 "<script>alert ('Data Not Insert')</script>";
	    }
	}
	else{
		 "<script>alert ('query error')</script>";
	}
}


?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Add Product</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
		<div class="container" style="width: 100%">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
				<div class="card ">
					<h3 class=" h2 text-center font-weight-bold text-primary">Add Product</h3>
					<hr>
					<form action="" method="post" enctype="multipart/form-data">
				  <div class="card-body"style="background-color: #FAFAFA;">
						<label for="">Brand Name</label>
						<select name="brand"  id="" class="form-control">
							<option value="hidden">Chose a brand</option>
							<?php  
								$query="SELECT * FROM `brand`";
								$result=$conn->query($query);
								while ($fetch=$result->fetch_array()) {
									
								
							?>
							<option><?php print $fetch[1]?></option>
							<?php
								}
							?>
						</select>
						<label for="">Cat Name</label>
						<select name="cat_name" id="" class="form-control">
							<option value="hidden">Chose a catagory</option>
							<?php
					  
								$query="SELECT * FROM `category`";
								$result=$conn->query($query);
								while ($fetch=$result->fetch_array()) {

								?>
								<option><?php print $fetch[1]?></option>
								<?php
								 }
								?>
						</select>
						<label for="">product Id</label>
						<input type="number" class="form-control" name="pro_id">
						<label for="">product Name</label>
						<input type="text" class="form-control" name="pro_name">
						<label for="">Product Code</label>
						<input type="text" class="form-control" name="pro_code">
						<label for="">Product Price</label>
						<input type="number" class="form-control" name="pro_price">
						<label for="">Product Quantity</label>
						<input type="number" class="form-control" name="pro_quantity">
						<label for="">Product Details</label><br>
						<textarea name="pro_details" id="" cols="50" rows="7"></textarea><br>
						<label for="">Product Information</label><br>
						<textarea name="pro_info" id="" cols="50" rows="7"></textarea><br>
						<label for="">Product Image</label><br>
						<input type="file" class="form-control" name="image[]">
						<input type="file" class="form-control" name="image[]">
						<input type="file" class="form-control" name="image[]">
						<input type="file" class="form-control" name="image[]">
						<button type="submit" name="submit" class="btn btn-primary">Add Product</button>
					</div>
				</form>
				</div>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
	</body>
</html>