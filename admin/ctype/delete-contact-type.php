	<?php include '../header.php'; ?> 
	
	
	<?php 
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$output = "UPDATE contact_type SET contact_status = '2' WHERE contact_type_id = '$id'";
		//echo "$output";exit();
		$res = mysqli_query($conn,$output);
		if($res)
		{
			echo "<script>window.location='contact-type.php';</script>";
		}
			
	}
	mysqli_close($conn);
	
	?>