	<?php include '../header.php'; ?> 
	
	
	<?php 
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$output = "UPDATE sub_category SET sub_cat_status = '2' WHERE sub_cat_id = '$id'";
		//echo "$output";exit();
		$res = mysqli_query($conn,$output);
		if($res)
		{
			echo "<script>window.location='sub_category.php';</script>";
		}
			
	}
	mysqli_close($conn);
	
	?>