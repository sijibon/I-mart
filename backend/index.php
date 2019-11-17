<?php
require_once 'config/config.php';
session_start();
session_unset();
?>

<?php
if (isset($_POST['submit'])) {
	$email=$_POST['email'];
	$pass=$_POST['password'];

	if (!empty($email) && !empty($pass)) 
	{
			$select_data="SELECT * FROM `admin_login` WHERE `user`='$email' && `password`='$pass'";
			$result=$conn->query($select_data);
			$fetch=$result->fetch_array();
			if ($email == $fetch[1] && $pass == $fetch[2]) 
			{
				$update="UPDATE `admin_login` SET `active_status`='1' WHERE `user`='$email'";
				$result=$conn->query($update);
				$_SESSION['email']=$email;
				header('location:home.php');
			}
			else{
				echo "<script>alert('log in first')</script>";
			}

	}
	else{
		echo "<script>alert('Filld required')</script>";
	}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Page</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>
<div style="margin-top: 50px;"></div>
<h3 class=" h1 text-center font-weight-bold text-primary">Login Form</h3>
<div class="row justify-content-center">
 		<div class="col-md-5">
 			<div class="card">
			  <div class="card-header">Login </div>
			  <div class="card-body" style="background-color: #FAFAFA;">
			    
				<form method="POST" >
						  <div class="form-group">
						    <label for="Username">Email</label>
						    <input type="text" name="email" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Username">
	
						    <br>
						     <label for="passwword">Password</label>
						    <input type="password" name="password" class="form-control" id="passwword" aria-describedby="emailHelp" placeholder="Passwword">
						  </div> 
						  <button type="submit" name="submit" class="btn btn-primary">Login</button>
				</form>
			</div>
 		</div>

 <div style="margin-top: 50px;"></div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	
</body>
</html>