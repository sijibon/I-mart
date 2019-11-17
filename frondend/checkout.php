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
			<script src="js/respond.min.js"></script>
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
						<li><a href="register.php"><button class="btn btn-warning">Registaion</button></a></li>		
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
									<li><a href="">Fashion</a>
								<ul>									
									<li><a href="">Men Item</a></li>
									<li><a href="">Woman Item</a></li>
									<li><a href="">Men Shoes</a></li>
									<li><a href="">Woman Shoes</a></li>	
								</ul>

									</li>
									<li><a href="">Leptop</a>
										<ul>									
											<li><a href="">Asus</a></li>
											<li><a href="">HP</a></li>
											<li><a href="">Dell</a></li>
											<li><a href="">MAC Book</a></li>
											<li><a href="">Lenevo</a></li>
											<li><a href="">Walton</a></li>
										</ul>

									</li>
									<li><a href="">Mobile</a>
										<ul>									
											<li><a href="">Xiaomi</a></li>
											<li><a href="">Sumsung</a></li>
											<li><a href="">Huawei</a></li>
											<li><a href="">Sympony</a></li>
											<li><a href="">Lenevo</a></li>
											<li><a href="">Walton</a></li>
										</ul>
										
									</li>
									<li><a href="">Cemera</a>
										<ul>									
											<li><a href="">Cannon</a></li>
											<li><a href="">Nikon</a></li>
											<li><a href="">Fujifilm</a></li>
											<li><a href="">Casio</a></li>
											<li><a href="">Epson</a></li>
										</ul>
									</li>
									<li><a href="">Headphone</a></li>
									<li><a href="">charger</a></li>
								</ul>
							</li>							
							<li><a href="">About Us</a></li>
							<li><a href="">Service</a></li>
							<li><a href="">Contract</a></li>
						</ul>
					</nav>
				</div>
			</section>				
			<section class="header_text sub">
				<h4><span>Check Out</span></h4>
			</section>	
			<section class="main-content">
				<div class="card card-body">
					<form action="" method="post">
						
					</form>
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
    </body>
</html>