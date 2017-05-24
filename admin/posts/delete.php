	<?php include '../header.php'; ?> 
	
	
	<?php 
	   if(isset($_GET['id']))
	   {
		  $id = $_GET['id'];
		  $output = "DELETE FROM posts WHERE post_id = '$id'";
		  //echo "$output";exit();
		  $res = mysqli_query($conn,$output);
        if($res)
		{
            echo "<script>window.location='posts.php';</script>";
		}
		else{
			echo "Error Occured";
			
	   }
	   mysqli_close($conn);
		}
	
	?>