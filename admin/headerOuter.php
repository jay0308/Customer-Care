<?php 
    session_start();
    if(empty($_SESSION['id'])){
       echo "<script>window.location='login.php';</script>"; 
    }
	$baseurl = "http://localhost/customer-care/admin/"; 
	include '../config/connection.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Customer Care</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $baseurl; ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo $baseurl; ?>vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!--w3.css for only footer use-->
    <link rel="stylesheet" type="text/css" href="<?php  echo $baseurl;?>/dist/css/w3.css">

    <!-- Custom CSS -->
    <link href="<?php echo $baseurl; ?>dist/css/sb-admin-2.css" rel="stylesheet">
	<!-- table button style CSS-->
	<link href="<?php echo $baseurl; ?>dist/css/tablebuttonstyle.css" rel="stylesheet">
	

    <!-- Morris Charts CSS -->
    <link href="<?php echo $baseurl; ?>vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo $baseurl; ?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Customer Care Admin</a>
            </div>
            
 <a href="<?php echo $baseurl; ?>logout.php" style="float:right;margin:15px;">Logout</a>
            <!-- /.navbar-header -->

            
            

            <?php include 'leftsidenav.php'; ?>
        </nav>