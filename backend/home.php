<?php
require_once 'config/config.php';
session_start();
error_reporting(0);

?>
<?php
$email=$_SESSION['email'];
if (isset($_POST['logout'])) {
	$update="UPDATE `admin_login` SET `active_status`='0' WHERE `user`='$email'";
	$result=$conn->query($update);
	header('location:index.php');
	session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Admin Home Page</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<nav class="navbar navbar-dark bg-dark " style="border-bottom:2px solid red; position: fixed; z-index: 999; width: 100%;" >
			<a class="navbar-brand" href="#">
				<span class=" font-weight-bold text-danger h1 ml-5">i-</span>
				<span class="font-weight-bold text-light h3">Mart</span>
			</a>
			<form class="form-inline" method="post">
				<input class="form-control ml-5" type="search" placeholder="Search..." aria-label="Search">
				<button class="btn btn-outline-success mr-5" type="submit">Search</button>
				<?php
					$email=$_SESSION['email'];
					$select_data="SELECT * FROM
					`admin_login` WHERE `user`='$email'";
					$result=$conn->query($select_data);
					while ($fetch=$result->fetch_array()) {

						
				?>
				<?php
					if ($fetch[3] ==1) {
						
						
				?>
				<div class="status ml-5" style="height: 8px; width: 8px; background: #2AF805; border-radius: 100%;"></div>
				<?php

					}
				?>
				
				<h3 class="mx-5 text-light"><?php print $fetch[4] ?></h3>

				<?php
					}
				?>
				<button class="btn btn-outline-primary fa fa-user btn-lg"name="logout">Logout</button>
			</form>
		</nav><br><br><br>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-2 list-group" style="position: fixed; float: left;">
					<a href="home.php?&&page=welcome" class="list-group-item list-group-item-action">Home</a>
					<a href="home.php?&&page=brand" class="list-group-item list-group-item-action">Brand</a>
					<a href="home.php?&&page=cat" class="list-group-item list-group-item-action">Category</a>
					<a href="home.php?&&page=product" class="list-group-item list-group-item-action">Add product</a>
					<a href="home.php?&&page=update_pro" class="list-group-item list-group-item-action">Update product</a>
					<a href="home.php?&&page=details_pro" class="list-group-item list-group-item-action">Details Products</a>
					<a href="home.php?&&page=admin" class="list-group-item list-group-item-action">Admin</a>
					<a href="#" class="list-group-item list-group-item-action">Customer Details</a>
					<a href="#" class="list-group-item list-group-item-action">Sell Details</a>
				</div>
				<div class="col-sm-10" style="margin-left: 200px;">
					<?php
						switch ($_GET['page'])
						{
						case 'product':
							include "add_product.php";
							break;
						case 'cat':
							include "category.php";
							break;
						case 'brand':
							include 'brand.php';
							break;
						case 'update_pro':
							include 'update_products.php';
							break;
						case 'details_pro':
							include 'products_details.php';
							break;
						case 'admin':
							include 'admin.php';
								break;	
							case 'welcome':
								include 'welcome.php';
								break;
							case 'edit':
								include 'edit-product.php';
								break;
						 case 'detail':
						 	include 'backend_prodetails.php';
						 	break;
							default ;
							include 'welcome.php';
						}
						?>
						
				</div>
			</div>
		</div>
		
	</body>
</html>