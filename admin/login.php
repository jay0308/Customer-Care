<?php
    session_start();
    if(!empty($_SESSION['id'])){
       echo "<script>window.location='index.php';</script>"; 
    }
    $baseurl = "http://demo.leadingedgeserv.com/customercare/admin/"; 
	include '../config/connection.php';
    $message = "";
    if(isset($_POST['submit'])){ 
        $sql = "SELECT * FROM admin WHERE admin_email='".$_POST['email']."' and admin_password='".md5($_POST['password'])."' and admin_status='1'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        if(!empty($row)){
            $_SESSION['id'] = $row['admin_id'];
            echo "<script>window.location='index.php';</script>";
        }else{
            $message = "Invalid login details.";
        }
    }
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

         <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <span style="color:red;"><?php echo $message; ?></span>
                    <div class="panel-body">
                        <form role="form" action="" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" required>
                                </div>
                                <input type="submit" value="Login" name="submit" class="btn btn-lg btn-success btn-block">
                               
                                <!-- Change this to a button or input when using this as a form -->
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

  
    </div>
    </body>
</html>