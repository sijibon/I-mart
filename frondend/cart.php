<?php
require_once 'config/config.php';
session_start();
$session_id=session_id();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Bootstrap E-commerce Templates</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
		<!-- bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="themes/css/bootstrappage.css" rel="stylesheet"/>
		
		<!-- global styles -->
		<link href="themes/css/flexslider.css" rel="stylesheet"/>
		<link href="themes/css/main.css" rel="stylesheet"/>
		<!-- scripts -->
		<script src="themes/js/jquery-1.7.2.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script src="themes/js/superfish.js"></script>
		<script src="themes/js/jquery.scrolltotop.js"></script>
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<script src="themes/js/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div id="top-bar" class="container">
			<div class="row">
				<div class="span4">
					<form method="POST" class="search_form">
						<input type="text" class=" input-block-level search-query" Placeholder="Search...">
					</form>
				</div>
				<div class="span8">
					<div class="account pull-right">
						<ul class="user-menu">
							<?php
							$count=0;
							$query="SELECT * FROM `cart` WHERE `session` ='$session_id'";
							$result=$conn->query($query);
							while ($fetch=$result->fetch_array()) {
							$count++;
							}
							?>
							<li><a href="cart.php"><button class="btn btn-warning">Add Card <span class="badge badge-danger"><?php print $count?></span></button></a></li>
							<li><a href=""><button class="btn btn-warning">Login</button></a></li>
							<li><a href=""><button class="btn btn-warning">Registaion</button></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="wrapper" class="container">
			<section class="navbar main-menu">
				<div class="navbar-inner main-menu">
					<a href="index.php" class=""  style="font-size: 40px; padding-bottom: 5px; list-style: none;"><b>i-Mart</b></a>
					<nav id="menu" class="pull-right">
						<ul>
							<li><a href="index.php">Home </a></li>
							<li><a href="">Categories</a>
							<ul>
								<?php
								
								$query="SELECT * FROM `category`";
								$result=$conn->query($query);
								while ($fetch=$result->fetch_array()) {
								?>
								<li><a href="show_product.php?name=<?php print $fetch[1]?>"><?php print
								$fetch[1]?></a></li>
								<?php
									}
								?>
							</ul>
						</li>
						<li><a href="">About Us</a></li>
						<li><a href="">Service</a></li>
						<li><a href="">Contract</a></li>
					</ul>
				</nav>
			</div>
		</section>
		<section class="main-content">
			<div class="row">
				<div class="span12">
					<h4 class="title"><span class="text"><strong>Your</strong> Cart</span></h4>
					<table class="table table-striped text-center">
						
						<tr >
							<th style="text-align: center;">Product Id</th>
							<th style="text-align: center;">Image</th>
							<th style="text-align: center;">Product Name</th>
							<th style="text-align: center;">Quantity</th>
							<th style="text-align: center;">Unit Price</th>
							<th style="text-align: center;">Total</th>
							<th style="text-align: center;">Action</th>
						</tr>
						
						<?php
						$query="SELECT * FROM `cart`";
						$result=$conn->query($query);
						while ($fetch=$result->fetch_array()) {
						?>
						
						
						<tr>
							<td style="text-align: center;"><?php print $fetch[1]?></td>
							<td style="text-align: center;"><img src="" alt=""></td>
							<td style="text-align: center;"><?php print $fetch[2]?></td>
							<td style="text-align: center;">
								<input type="text" class="form-control" value="<?php print $fetch[3]?>"></td>
								<td style="text-align: center;"><?php print $fetch[4]?></td>
								<td style="text-align: center;"><?php print $fetch[5]?></td>
								<td style="text-align: center;">
									<a href="" class="btn btn-primary">Update</a>
									<a href="" class="btn btn-danger">Delete</a>
								</td>
							</tr>
							<?php
							}
							?>
							
						</table>
						<hr>
						<?php
						$total_price=0;
						$query="SELECT * FROM `cart` WHERE `session` ='$session_id'";
						$result=$conn->query($query);
						while ($fetch=$result->fetch_array()) {
							$total_price=$total_price+$fetch[5];
						}
						?>
						<p class="cart-total right">
							<strong>Total</strong>:<?php  print $total_price?><br>
						</p>
						<hr/>
						<div class="button" style="float: right;">
							<a href="index.php" class="btn btn-primary">Continue Shopping</a>
							<a href="checkout.php" class="btn btn-warning">Checkout</a>
						</div>
						
					</div>
					
				</div>
			</section>
			<section id="footer-bar">
				<div class="row">
					<div class="span3">
						<h4>Navigation</h4>
						<ul class="nav">
							<li><a href="./index.html">Homepage</a></li>
							<li><a href="./about.html">About Us</a></li>
							<li><a href="./contact.html">Contac Us</a></li>
							<li><a href="./cart.html">Your Cart</a></li>
							<li><a href="./register.html">Login</a></li>
						</ul>
					</div>
					<div class="span4">
						<h4>My Account</h4>
						<ul class="nav">
							<li><a href="#">My Account</a></li>
							<li><a href="#">Order History</a></li>
							<li><a href="#">Wish List</a></li>
							<li><a href="#">Newsletter</a></li>
						</ul>
					</div>
					<div class="span5">
						<p class="logo"><img src="themes/images/logo.png" class="site_logo" alt=""></p>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. the  Lorem Ipsum has been the industry's standard dummy text ever since the you.</p>
						<br/>
						<span class="social_icons">
							<a class="facebook" href="#">Facebook</a>
							<a class="twitter" href="#">Twitter</a>
							<a class="skype" href="#">Skype</a>
							<a class="vimeo" href="#">Vimeo</a>
						</span>
					</div>
				</div>
			</section>
			<section id="copyright">
				<span>Copyright 2013 bootstrappage template  All right reserved.</span>
			</section>
		</div>
		<script src="themes/js/common.js"></script>
		<script>
			$(document).ready(function() {
				$('#checkout').click(function (e) {
					document.location.href = "checkout.html";
				})
			});
		</script>
	</body>
</html>