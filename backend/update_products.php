<?php
require_once 'config/config.php';
session_start();
$email=$_SESSION['email'];
error_reporting(0);


?>
<?php
if (isset($_POST['del'])) {
	$del=$_POST['del'];

	
	$delete="DELETE FROM `add_product` WHERE `pro_id` = $del";
	$result= $conn->query($delete);
	if ($result ==true) {
			echo "<script>alert('product deleted')</script>";
	}else{
		echo "<script>alert('product not updated')</script>";
	}
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Update products</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
	    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/w/dt/dt-1.10.18/datatables.min.css"/>
	</head>
	<body>
		<div style="margin-top: 10px;"></div>
		<h3 class=" h2 text-center font-weight-bold text-success">Update Products</h3>
		<div class="container">
			<table class="table table-hover" id="dataTable">
				<thead class="bg-secondary text-light">
					<tr style="text-align: center;">
						<th>Id</th>
						<th>Pruducts Name</th>
						<th>Products Code</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Image</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
						<?php
							$query="SELECT * FROM `add_product`";
							$result=$conn->query($query);
							while ($fetch_result=$result->fetch_array())
								{
									$pro_id= $fetch_result[2];
							        $pro_image=$pro_id."(0)";							
						?>
						<tr  style="text-align: center;">
							<td><?php print $fetch_result[2]?></td>
							<td><?php print $fetch_result[3]?></td>
							<td><?php print $fetch_result[4]?></td>
							<td><?php print $fetch_result[5]?></td>
							<td><?php print $fetch_result[6]?></td>
							<td>
								<img src="img/product_img/<?php echo $pro_image;?>.jpg" alt="" style="height:50px; width: 60px;">
							</td>
							
							<td>
								<form action="" method="post">
								<a href="home.php?page=edit&&pro_id=<?php print $fetch_result[2]?>"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" > Edit</button></a>
								<button class="btn btn-danger" name="del" value="<?php print $fetch_result[2]?>">Delete</button>
								</form>
						</td>
					<!-- 	</form> -->
						</tr>
						
						<?php
							}
						?>
						
						
						
					</tbody>
				
			</table>
		</div>
		<div style="margin-top: 50px;"></div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/w/dt/dt-1.10.18/datatables.min.js"></script>
		<script>
			$(document).ready(function() {
            $('#dataTable').DataTable();
} );
		</script>
	</body>
</html>