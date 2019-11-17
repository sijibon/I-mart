<?php
require_once 'config/config.php';
session_start();
$name=$_GET['name'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>new projects</title>
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
						<input style="color: black;" type="text" class=" input-block-level search-query" Placeholder="Search...">
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
						<li><a href="register.php"><button class="btn btn-warning">Login</button></a></li>
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
						<nav id="menu" class="pull-right ">
						<ul>															
							<li><a href="index.php">Home </a></li>			
							<li><a href="">Categories</a>
								<ul>
								<?php
					  
								$query="SELECT * FROM `category`";
								$result=$conn->query($query);
								while ($fetch=$result->fetch_array()) {

								?>									
									<li><a href="show_product.php?name=<?php print $fetch[1]?>"><?php print $fetch[1]?></a></li>
							    <?php
							    	}
							    ?>
								</ul>
							</li>							
							<li><a href="">About Us</a></li>
							<li><a href="">Service</a></li>
							<li><a href="contact.php">Contract</a></li>
						</ul>
					</nav>
				</div>
			</section>
			<!-- <section  class="homepage-slider" id="home-slider">
				<div class="flexslider">
					<ul class="slides">
						
						<li>
							<img src="themes/images/carousel/coupleF.webp" alt="" />
							<div class="intro">
								<h1>Mid season sale</h1>
								<p><span>Up to 50% Off</span></p>
								<p><span>On selected items online and in stores</span></p>
							</div>
						</li>
							<li>
							<img src="themes/images/carousel/image1.jpg" alt="" />
							<div class="intro">
								<h1>Mid season sale</h1>
								<p><span>Up to 50% Off</span></p>
								<p><span>On selected items online and in stores</span></p>
							</div>
						</li>
						<li>
							<img src="themes/images/carousel/sumsungs.png" alt="" />
							<div class="intro">
								<h1>Mid season sale</h1>
								<p><span>Up to 50% Off</span></p>
								<p><span>On selected items online and in stores</span></p>
							</div>
						</li>
					</ul>
				</div>			
			</section> -->
			<!-- <section class="header_text d-flex">
				We stand for top quality Products. Our genuine Products always optimized Marketing throght. 
				<br/>Our Online Business Experiance was 5 years.
			</section> -->
			<section class="main-content">
				<div class="row">
					<div class="span12">													
						<div class="row">
							<div class="span12">
								<h4 class="title">
									<span class="pull-left"><span class="text"><span class="line">Feature <strong>Products</strong></span></span></span>
									<span class="pull-right">
										<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
									</span>
								</h4>
								<div id="myCarousel" class="myCarousel carousel slide">
									<div class="carousel-inner">
										<div class="active item">
											<ul class="thumbnails">	

												<?php
												$query="SELECT * FROM `add_product` WHERE `cat_name` = '$name'";
												$result=$conn->query($query);
												while ($fetch_result=$result->fetch_array()) 
													{
														$pro_id= $fetch_result[2];
														$pro_image=$pro_id."(0)";
											    ?>

												<li class="span3">
										<div class="product-box" style="height: 450px; width: 250px;">
														<span class="sale_tag"></span>
														<p><a href="product_detail.php">
															<img style="height: 300px;" src="../backend/img/product_img/<?php echo $pro_image;?>.jpg" alt="" /></a></p>
														<a href="" class="title"><?php print $fetch_result[3]?></a><br/>
														<a href="products.php" class="category"><?php print $fetch_result[1]?></a><br>
														<strike>$80.50</strike>
														<p class="price">$<?php print $fetch_result[5]?></p>
														<!-- <div class="row"> -->
															<div class="col-md-6">
																<a href="product_detail.php?pro_id=<?php print $fetch_result[2]?>"><button class="btn btn-primary" name="details" value="">Details</button></a>
																
															</div>
															<div class="col-md-6">
																<button class="btn btn-warning" name="details">Add to cart</button>
															</div>
														<!-- </div> -->
														
													</div>
												</li>
												<?php
													}

												?>
												<!-- <li class="span3">
											<div class="product-box" style="height: 450px; width: 250px;">
														<span class="sale_tag"></span>
														<p><a href="product_detail.html"><img style="height: 300px;" src="themes/images/products/suit.jpg" alt="" /></a></p>
														<a href="product_detail.html" class="title">Raymonq Collection</a><br/>
												<a href="products.html" class="category">Men Suit</a><br>
														<strike>$80.50</strike>
														<p class="price">$70.25</p>
													</div>
												</li> -->
											<!-- 	<li class="span3">
											<div class="product-box" style="height: 450px; width: 250px;">
														<p><a href="product_detail.html">
													<img style="height: 300px;" src="themes/images/products/threeP1.jpg" alt="" /></a></p>
														<a href="product_detail.html" class="title">Ladies Dress</a><br/>
														<a href="products.html" class="category">Best Quality</a><br>
														<strike>$20.50</strike>
														<p class="price">$18.25</p>
													</div>
												</li> -->
												<!-- <li class="span3">
													<div class="product-box" style="height: 450px; width: 250px;">
														<p><a href="product_detail.html">
															<img style="height: 300px;" src="themes/images/products/t-shirt1.webp" alt="" /></a></p>
														<a href="product_detail.html" class="title">T-shirt</a><br/>
														<a href="products.html" class="category">World class </a><br>
														<strike>$40.50</strike>
														<p class="price">$31.45</p>
													</div>
												</li> -->
											</ul>
											
										</div>
										<div class="item">
											<ul class="thumbnails">
												<li class="span3">
											<div class="product-box" style="height: 450px; width: 250px;">
														<p><a href="product_detail.html">
														<img style="height: 300px;"src="themes/images/products/cemera1.jpg" alt="" /></a></p>
														<a href="product_detail.html" class="title">New Collection</a><br/>
														<a href="products.html" class="category">Cannon Cemera</a><br>
														<strike>$2200.50</strike>
														<p class="price">$2230.70</p>
													</div>
												</li>
												<li class="span3">
											<div class="product-box" style="height: 450px; width: 250px;">
														<p><a href="product_detail.html">
														<img style="height: 300px;"src="themes/images/products/hp1.jpg" alt="" /></a></p>
														<a href="product_detail.html" class="title">HP ProBook</a><br/>
														<a href="products.html" class="category">Best Quality</a><br>
														<strike>$750.50</strike>
														<p class="price">$800.69</p>
													</div>
												</li>
												<li class="span3">
											<div class="product-box" style="height: 450px; width: 250px;">
														<p><a href="product_detail.html">
													<img style="height: 300px;" src="themes/images/products/xiaomi7.webp" alt="" /></a></p>
														<a href="product_detail.html" class="title">Xiaomi Redmi Note7</a><br/>
														<a href="products.html" class="category">Smart Phone</a><br>
														<strike>$190.50</strike>
														<p class="price">$200.69</p>
													</div>
												</li>
												<li class="span3">
											<div class="product-box" style="height: 450px; width: 250px;">
														<p><a href="product_detail.html">
													<img style="height: 300px;" src="themes/images/products/whiteShoues1.jpeg" alt="" /></a></p>
														<a href="product_detail.html" class="title">adidas shoes</a><br/>
														<a href="products.html" class="category">Brand Quality</a><br>
														<strike>$130.50</strike>
														<p class="price">$120.69</p>
													</div>
												</li>																																	
											</ul>
										</div>
									</div>							
								</div>
							</div>						
						</div>
					</div>
				</div>
			</section>
			<section id="footer-bar">
				<div class="row">
					<div class="span3">
						<h4>Navigation</h4>
						<ul class="nav">
							<li><a href="index.php">Homepage</a></li>  
							<li><a href="about.html">About Us</a></li>
							<li><a href="contact.php">Contac Us</a></li>
							<li><a href="cart.php">Your Cart</a></li>
							<li><a href="register.php">Login</a></li>							
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
						<a href="index.php" class=""  style="font-size: 40px; padding-bottom: 5px; text-decoration-line: none; color:#F87B05; "><b>i-Mart</b></a>
						<p>I-Mart,This site is new for E-Commerce Business.But we are best try to our service provide the customer.</p>
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
				<span>Feni Computer Institute(Boys Hostel)</span>
			</section>
		</div>
		<script src="themes/js/common.js"></script>
		<script src="themes/js/jquery.flexslider-min.js"></script>
		<script type="text/javascript">
			$(function() {
				$(document).ready(function() {
					$('.flexslider').flexslider({
						animation: "fade",
						slideshowSpeed: 4000,
						animationSpeed: 600,
						controlNav: false,
						directionNav: true,
						controlsContainer: ".flex-container" // the container that holds the flexslider
					});
				});
			});
		</script>
    </body>
</html>