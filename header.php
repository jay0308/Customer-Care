<?php  
$baseurl = "http://localhost/customer-care/admin/";
$baseurl1 = "http://localhost/customer-care/";

include 'config/connection.php';
	$searchq='';
	if(isset($_POST['search-company']) && $_POST['search-company']!='')
	{
		$searchq = $_POST['search-company']; 		
		
	}  
	if (isset($_POST['search-product']) && $_POST['search-product']!='') {
		# code...
		$searchq.= "~".$_POST['search-product'];
	}
	if (isset($_POST['search-location']) && $_POST['search-location']!='') {
		# code...
		$searchq.= "~".$_POST['search-location'];
	}
	
	if(isset($_POST['search-company']) && $_POST['search-company']!='')
	{
		echo "<script>window.location='pagination-search.php?search=$searchq';</script>";
	}  
	
?>


<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0">
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<title>Customer Support</title>
<link rel="stylesheet" href="assets/css/w3.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="stylesheet" type="text/css" href="assets/css/style2.css">
<link rel="stylesheet" type="text/css" href="assets/css/style3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 
 
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>


</head>
	

<body>
    <!--header start-->
	<div class="w3-container w3-border-bottom" style="border-bottom-color: #FFFFFF">
		
		<a href="<?php echo $baseurl1; ?>"><img src="assets/css/logo.png" alt="Lead edge consultancy" style="width:100px; height: 80px; "></a>
	</div> <!--header end-->