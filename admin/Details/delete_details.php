	<?php include '../header.php'; ?> 
	
	
	<?php 
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$output = "UPDATE details SET status = '2' WHERE details_id = '$id'";
		//echo "$output";exit();
		$res = mysqli_query($conn,$output);
		if($res)
		{
			echo "<script>window.location='details.php';</script>";
		}
			
	}
	mysqli_close($conn);
	
	?>