	<?php include '../header.php'; ?> 
	
	
	<?php 
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$output = "UPDATE company SET company_status = '2' WHERE company_id = '$id'";
		//echo "$output";exit();
		$res = mysqli_query($conn,$output);
		if($res)
		{
			echo "<script>window.location='company.php';</script>";
		}
			
	}
	mysqli_close($conn);
	
	?>