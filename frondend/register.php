<?php
require_once 'config/config.php';
session_start();
$_SESSION['loggedin'] = true;
$session_id=session_id();
?>
<!-- user regisration -->
<?php
if (isset($_POST['create'])) 
{
	$username=$_POST['username'];
	$nmbr=$_POST['number'];
	$email=$_POST['email'];
	$pass=$_POST['password'];
     
    $insert="INSERT INTO `user`(`id`, `username`, `phone`, `email`, `password`) VALUES ('','$username','$nmbr','$email',$pass)";
    $result=$conn->query($insert);
    if ($result ==true) 
    {
    	if ($conn->affected_rows >0) {
    		echo "register";
    	}
    	else{
    		echo "not register";
    	}
    }

}

?>

<!-- user login -->
<?php
if (isset($_POST['login'])) 
{
	$useremail=$_POST['email'];
	$pass=$_POST['pass'];
	$query="SELECT * FROM `user` WHERE `email` = '$useremail' && `password`='$pass'";
	$result=$conn->query($query);
	$fetch=$result->fetch_array();
	if ($useremail==$fetch[3] && $pass==$fetch[4]) 
	{
		$_SESSION['email']=$email;
		$_SESSION['loggedin'] = true;
	    header('location:index.php');
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
						<li><a href=""><button class="btn btn-warning">Registaion</button></a></li>		
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="wrapper" class="container">
			<section class="navbar main-menu">
				<div class="navbar-inner main-menu">				
					<a href="index.php" class="logo pull-left"><img src="themes/images//logo.png" class="site_logo" alt=""></a>
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
			<section class="header_text sub">
				<h4><span>Login or Regsiter</span></h4>
			</section>			
			<section class="main-content">				
				<div class="row">
					<div class="span5">					
						<h4 class="title"><span class="text"><strong>Login</strong> Form</span></h4>
						<form action="" method="post">
							<input type="hidden" name="next" value="/">
							<fieldset>
								<div class="control-group">
									<label class="control-label">Email</label>
									<div class="controls">
										<input type="text" placeholder="Enter your email" id="username" class="input-xlarge" name="email">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Password</label>
									<div class="controls">
										<input type="password" placeholder="Enter your password" id="password" class="input-xlarge" name="pass">
									</div>
								</div>
								<div class="control-group">
									<button type="submit" class="btn btn-success" name="login">Login</button>
									<hr>
									<p class="reset">Recover your <a tabindex="4" href="#" title="Recover your username or password">username or password</a></p>
								</div>
							</fieldset>
						</form>				
					</div>
					<div class="span7">					
						<h4 class="title"><span class="text"><strong>Register</strong> Form</span></h4>
						<form action="" method="post" class="form-stacked">
							<fieldset>
								<div class="control-group">
									<label class="control-label">Username</label>
									<div class="controls">
										<input type="text" placeholder="Enter your username" class="input-xlarge" name="username">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Phone :</label>
									<div class="controls">
										<input type="number" placeholder="Enter your number" class="input-xlarge" name="number">
									</div>
									<label class="control-label">Email address:</label>
									<div class="controls">
										<input type="text" placeholder="Enter your email" class="input-xlarge" name="email">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Password:</label>
									<div class="controls">
										<input type="password" placeholder="Enter your password" class="input-xlarge" name="password">
									</div>
								</div>							                            
								<div class="control-group">
									<p>Now that we know who you are. I'm not a mistake! In a comic, you know how you can tell who the arch-villain's going to be?</p>
								</div>
								<hr>
								
									<button type="submit" name="create" class="btn btn-success">Create Account</button>
								
							</fieldset>
						</form>					
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