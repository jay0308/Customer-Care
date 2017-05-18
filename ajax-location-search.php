<?php

	include "config/connection.php";
	
	if (isset($_POST['query'])) {
		$output='';
		$query="SELECT * FROM details WHERE location LIKE '%".$_POST['query']."%'";
		$result  = mysqli_query($conn,$query);
		$output='<ul class = "list-unstyled">';
		if (mysqli_num_rows($result)>0) {
			# code...
			while ($row = mysqli_fetch_array($result)) {
				# code...
				$output .='<li>'.$row["location"].'</li>';
			}
		}
		else{
			$output = '<li>product Not Found</li>';
		}
		$output.='</ul>';
		echo $output;
	}

?>	