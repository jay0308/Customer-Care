	<?php include '../header.php'; ?> 
	
	
	<?php 
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$output = "UPDATE product SET product_status = '2' WHERE product_id = '$id'";
		//echo "$output";exit();
		$res = mysqli_query($conn,$output);
		if($res)
		{
			echo "<script>window.location='product.php';</script>";
		}
			
	}
	mysqli_close($conn);
	
	?>