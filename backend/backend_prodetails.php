<?php
require_once 'config/config.php';
session_start();
$pro_id=$_GET['pro_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
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
		
		<div class="container" style="margin-top:100px;">
			<div class="row">
				<?php
							
								$query="SELECT * FROM `add_product` WHERE `pro_id` = '$pro_id'";
								$result=$conn->query($query);
								while ($fetch_result=$result->fetch_array())
								{
								$pro_id= $fetch_result[2];
								$pro_image=$pro_id."(0)";
								$pro_image1=$pro_id."(1)";
								$pro_image2=$pro_id."(2)";
								$pro_image3=$pro_id."(3)";
				?>
				<div class="col-md-1"></div>
				<div class="col-md-5">
					<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img src="img/product_img/<?php echo $pro_image;?>.jpg" class="d-block w-100" alt="..." style="height: 300px; width: 200px;">
							</div>
							<div class="carousel-item ">
								<img src="img/product_img/<?php echo $pro_image1;?>.jpg" class="d-block w-100" alt="..." style="height: 300px; width: 200px;">
							</div>
							<div class="carousel-item ">
								<img src="img/product_img/<?php echo $pro_image2;?>.jpg" class="d-block w-100" alt="..." style="height: 300px; width: 200px;">
							</div>
							<div class="carousel-item">
								<img src="img/product_img/<?php echo $pro_image3;?>.jpg" class="d-block w-100" alt="..." style="height: 300px; width: 200px;">
							</div>
						</div>
						<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
				<div class="col-md-5">
					<strong>Brand:</strong> <span><?php print $fetch_result[0]?></span><br>
					<strong>Product Name:</strong> <span><?php print $fetch_result[3]?></span><br>
					<strong>Product Code:</strong> <span><?php print $fetch_result[4]?></span><br>
					<strong>Product Price:</strong> <span>$<?php print $fetch_result[5]?></span><br>
					<strong>Product Quantity</strong> <span><?php print $fetch_result[6]?></span><br>
					<strong>Availability:</strong> <span>Stock</span><br>
				</div>
				<div class="col-md-1"></div>
			</div>
			<?php
				}
			?>

			 <a href="home.php?&&page=details_pro" class="previous">&laquo; Previous</a>
		</div>
	</body>
</html>