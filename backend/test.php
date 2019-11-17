if (isset($_POST['submit'])) {
	$brandName=$_POST['brand_name'];
	$catName=$_POST['cat_name'];
	$productId=$_POST['pro_id'];
	$proName=$_POST['pro_name'];
	$productCode=$_POST['pro_code'];
	$productDetails=$_POST['pro_details'];
	$productInfo=$_POST['pro_info'];
	$image=($_FILES['image']['tmp_name']);

	if (!empty($brandName) && !empty($catName) !empty($productId) !empty($proName) !empty($productCode) !empty($productDetails) !empty($productInfo)){
		$insertPro="INSERT INTO `add_product`(`brand_name`, `cat_name`, `pro_id`, `pro_code`, `pro_details`, `pro_info`) VALUES ('$brandName','$catName','$productId','$proName','$productCode','$productDetails','$productInfo')";

		$result=$conn->query($insertPro);
		if ($result==true) 
		{
			if ($conn->affected_rows>0) {
				for ($i=0; $i <$image ; $i++) { 
					$image_location="img/product_img/$productId."[$i]".jpg";
				    move_uploaded_file($image[$i], $image_location);
				}

				
				echo "<script>alert('data insert success')</script>";
			}
			else{
				echo "<script>alert('data not insert')</script>";
			}
		}else{
		 echo "<script>alert('query error')</script>";	
		}



	}else{
		echo "<script>alert('please all filled reqired')</script>";
	}
}
