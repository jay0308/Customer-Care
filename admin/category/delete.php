	<?php include '../header.php'; ?> 
	
	
	<?php 
	   if(isset($_GET['id']))
	   {
		  $id = $_GET['id'];
		  $output = "UPDATE category SET cat_status = '2' WHERE cat_id = '$id'";
		  //echo "$output";exit();
		  $res = mysqli_query($conn,$output);
        if($res)
		{
            echo "<script>window.location='category.php';</script>";
		}
			
	   }
	   mysqli_close($conn);
	
	?>