<?php

	include "config/connection.php";
	
	if (isset($_POST['query'])) {
		$output='';
		$query="SELECT * FROM sub_category WHERE sub_cat_name LIKE '%".$_POST['query']."%'";
		$result  = mysqli_query($conn,$query);
		$output='<ul class = "list-unstyled">';
		if (mysqli_num_rows($result)>0) {
			# code...
			while ($row = mysqli_fetch_array($result)) {
				# code...
				$output .='<li>'.$row["sub_cat_name"].'</li>';
			}
		}
		else{
			$output .= '<li>product Not Found</li>';
		}
		$output.='</ul>';
		echo $output;
	}

?>	