<?php
require_once 'config/config.php';
session_start();
// $value=$_GET['value'];
// error_reporting(0);
$session_id=session_id();
 $pro_id=$_GET['pro_id'];
 error_reporting(0);

?>
<?php
$query="SELECT * FROM `add_product` WHERE `pro_id` = '$pro_id'";
$result=$conn->query($query);
while ($fetch_result=$result->fetch_array()) {
	  $id=$fetch_result[2];
	  $pro_name=$fetch_result[3];
	  $price=$fetch_result[5];

	  if (isset($_POST['cart'])) {
	      $quantity=$_POST['quantity'];
	      $total_price=$quantity*$price;
	      $insert="INSERT INTO `cart`(`session`, `pro_id`, `pro_name`, `pro_quantity`, `pro_price`, `total_price`) VALUES ('$session_id','$id','$pro_name','$quantity','$price','$total_price')";
	      $result=$conn->query($insert);
	      if ($result ==true) {
	      		if ($conn->affected_rows>0) {
	      			echo "<script>alert('data insert')</script>";
	      		}
	      		else{
	      			echo "<script>alert('data not insert')</script>";
	      		}
	          }
	      else{
	      	echo "<script>alert('query error')</script>";
	      }
	  }
}


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
		<link href="themes/css/main.css" rel="stylesheet"/>
		<link href="themes/css/jquery.fancybox.css" rel="stylesheet"/>
				
		<!-- scripts -->
		<script src="themes/js/jquery-1.7.2.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>				
		<script src="themes/js/superfish.js"></script>	
		<script src="themes/js/jquery.scrolltotop.js"></script>
		<script src="themes/js/jquery.fancybox.js"></script>
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
									<li><a href="show_product.php?name=<?php print $fetch[1]?>"><?php print $fetch[1]?></a></li>
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
			<section class="header_text sub">
				<h4><span>Product Detail</span></h4>
			</section>
			<section class="main-content">				
				<div class="row">						
					<div class="span9">
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
							<div class="span4">
								<a href="" class="thumbnail" data-fancybox-group="group1" title="Description 1"><img alt="" src="../backend/img/product_img/<?php echo $pro_image;?>.jpg"></a>												
								<ul class="thumbnails small">								
									<li class="span1">
										<a href="" class="thumbnail" data-fancybox-group="group1" title="Description 2"><img src="../backend/img/product_img/<?php echo $pro_image1;?>.jpg" alt=""></a>
									</li>								
									<li class="span1">
										<a href="" class="thumbnail" data-fancybox-group="group1" title="Description 3"><img src="../backend/img/product_img/<?php echo $pro_image2;?>.jpg" alt=""></a>
									</li>													
									<li class="span1">
										<a href="" class="thumbnail" data-fancybox-group="group1" title="Description 4"><img src="../backend/img/product_img/<?php echo $pro_image3;?>.jpg" alt=""></a>
									</li>
									<!-- <li class="span1">
										<a href="themes/images/ladies/5.jpg" class="thumbnail" data-fancybox-group="group1" title="Description 5"><img src="asus1.jpg" alt=""></a>
									</li -->
								</ul>
							</div>
							<div class="span5">
								<address>
									<strong>Brand:</strong> <span><?php print $fetch_result[0]?></span><br>
									<strong>Product Code:</strong> <span><?php print $fetch_result[4]?></span><br>
									<strong>Product Price:</strong> <span>$<?php print $fetch_result[5]?></span><br>
									<strong>Product Quantity</strong> <span><?php print $fetch_result[6]?></span><br>
									<strong>Availability:</strong> <span>Stock</span><br>								
								</address>									
								<!-- <h4><strong><?php print $fetch_result[5]?></strong></h4> -->
							</div>
							<?php
								}
							?>
							<div class="span5">
								<form class="form-inline" method="post">
									<label>Qty:</label>
									<input type="text" class="span1" placeholder="" name="quantity">
									<button class="btn btn-inverse" type="submit" name="cart">Add to cart</button>
								</form>
							</div>							
						</div>
						<div class="row">
							<div class="span9">
								<ul class="nav nav-tabs" id="myTab">
									<li class="active"><a href="#home">Description</a></li>
									<li class=""><a href="#profile">Additional Information</a></li>
								</ul>							 
								<div class="tab-content">
									<div class="tab-pane active" id="home">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem</div>
									<div class="tab-pane" id="profile">
										<table class="table table-striped shop_attributes">	
											<tbody>
												<tr class="">
													<th>Size</th>
													<td>Large, Medium, Small, X-Large</td>
												</tr>		
												<tr class="alt">
													<th>Colour</th>
													<td>Orange, Yellow</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>							
							</div>						
							<div class="span9">	
								<br>
								<h4 class="title">
									<span class="pull-left"><span class="text"><strong>Related</strong> Products</span></span>
									<span class="pull-right">
										<a class="left button" href="#myCarousel-1" data-slide="prev"></a><a class="right button" href="#myCarousel-1" data-slide="next"></a>
									</span>
								</h4>
								<div id="myCarousel-1" class="carousel slide">
									<div class="carousel-inner">
										<div class="active item">
											<ul class="thumbnails listing-products">
												<li class="span3">
													<div class="product-box">
														<span class="sale_tag"></span>												
														<a href="product_detail.html"><img alt="" src="themes/images/ladies/6.jpg"></a><br/>
														<a href="product_detail.html" class="title">Wuam ultrices rutrum</a><br/>
														<a href="#" class="category">Suspendisse aliquet</a>
														<p class="price">$341</p>
													</div>
												</li>
												<li class="span3">
													<div class="product-box">
														<span class="sale_tag"></span>												
														<a href="product_detail.html"><img alt="" src="themes/images/ladies/5.jpg"></a><br/>
														<a href="product_detail.html" class="title">Fusce id molestie massa</a><br/>
														<a href="#" class="category">Phasellus consequat</a>
														<p class="price">$341</p>
													</div>
												</li>       
												<li class="span3">
													<div class="product-box">												
														<a href="product_detail.html"><img alt="" src="themes/images/ladies/4.jpg"></a><br/>
														<a href="product_detail.html" class="title">Praesent tempor sem</a><br/>
														<a href="#" class="category">Erat gravida</a>
														<p class="price">$28</p>
													</div>
												</li>												
											</ul>
										</div>
										<div class="item">
											<ul class="thumbnails listing-products">
												<li class="span3">
													<div class="product-box">
														<span class="sale_tag"></span>												
														<a href="product_detail.html"><img alt="" src="themes/images/ladies/1.jpg"></a><br/>
														<a href="product_detail.html" class="title">Fusce id molestie massa</a><br/>
														<a href="#" class="category">Phasellus consequat</a>
														<p class="price">$341</p>
													</div>
												</li>       
												<li class="span3">
													<div class="product-box">												
														<a href="product_detail.html"><img alt="" src="themes/images/ladies/2.jpg"></a><br/>
														<a href="product_detail.html">Praesent tempor sem</a><br/>
														<a href="#" class="category">Erat gravida</a>
														<p class="price">$28</p>
													</div>
												</li>
												<li class="span3">
													<div class="product-box">
														<span class="sale_tag"></span>												
														<a href="product_detail.html"><img alt="" src="themes/images/ladies/3.jpg"></a><br/>
														<a href="product_detail.html" class="title">Wuam ultrices rutrum</a><br/>
														<a href="#" class="category">Suspendisse aliquet</a>
														<p class="price">$341</p>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="span3 col">
						<div class="block">
							<h4 class="title">
								<span class="pull-left"><span class="text">Randomize</span></span>
								<span class="pull-right">
									<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
								</span>
							</h4>
							<div id="myCarousel" class="carousel slide">
								<div class="carousel-inner">
									<div class="active item">
										<ul class="thumbnails listing-products">
											<li class="span3">
												<div class="product-box">
													<span class="sale_tag"></span>												
													<a href="product_detail.html"><img alt="" src="themes/images/ladies/7.jpg"></a><br/>
													<a href="product_detail.html" class="title">Fusce id molestie massa</a><br/>
													<a href="#" class="category">Suspendisse aliquet</a>
													<p class="price">$261</p>
												</div>
											</li>
										</ul>
									</div>
									<div class="item">
										<ul class="thumbnails listing-products">
											<li class="span3">
												<div class="product-box">												
													<a href="product_detail.html"><img alt="" src="themes/images/ladies/8.jpg"></a><br/>
													<a href="product_detail.html" class="title">Tempor sem sodales</a><br/>
													<a href="#" class="category">Urna nec lectus mollis</a>
													<p class="price">$134</p>
												</div>
											</li>
										</ul>
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
			$(function () {
				$('#myTab a:first').tab('show');
				$('#myTab a').click(function (e) {
					e.preventDefault();
					$(this).tab('show');
				})
			})
			$(document).ready(function() {
				$('.thumbnail').fancybox({
					openEffect  : 'none',
					closeEffect : 'none'
				});
				
				$('#myCarousel-2').carousel({
                    interval: 2500
                });								
			});
		</script>
    </body>
</html>