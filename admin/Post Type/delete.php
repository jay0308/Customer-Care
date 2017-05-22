	<?php include '../header.php'; ?> 
	
	
	<?php 
	   if(isset($_GET['id']))
	   {
		  $id = $_GET['id'];
		  $output = "DELETE FROM post_type WHERE post_type_id = '$id'";
		  //echo "$output";exit();
		  $res = mysqli_query($conn,$output);
        if($res)
		{
            echo "<script>window.location='post-type.php';</script>";
		}
		else{
			echo "Error Occured";
			
	   }
	   mysqli_close($conn);
		}
	
	?>