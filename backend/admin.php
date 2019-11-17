<?php
require_once 'config/config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Admin data</title>
	</head>
	<body>
		<table class="table table-hover table-striped table-bordered">
			<tr style="text-align: center;" class="table-primary">
				<th>#Id</th>
				<th>Name</th>
				<th>Email</th>
				<th>Active status</th>
				<th>Action</th>
			</tr>
			<?php
              $select_data="SELECT * FROM `admin_login`";
			  $result=$conn->query($select_data);
			  while ($fetch=$result->fetch_array()) {

			?>
			<tr style="text-align: center;">
				<td><?php print $fetch[0]?></td>
				<td><?php print $fetch[4]?></td>
				<td><?php print $fetch[1]?></td>
			
				<td style="padding-left: 50px;">
					<?php
					if ($fetch[3] ==1) {
						
						
				?>
				<div class="status ml-5" style="height: 8px; width: 8px; background: green; border-radius: 100%;"></div>
				<?php

					}
					else{
				?>
				<div class="status ml-5" style="height: 8px; width: 8px; background: red; border-radius: 100%;"></div>
				
				</td>
				<?php
				 }
				?>
			<td></td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>