	<?php include'../header.php';?>
	<?php 
		$id ="";
		$result = "";
		
		
	if(isset ($_GET['id']))
	{
		$id 		= $_GET['id'];
		$query 		= "SELECT * FROM company WHERE company_id = '$id'";
		//print_r ($query); exit();
		$run 	= 	mysqli_query($conn,$query);
		$result =	mysqli_fetch_assoc($run);
		//echo "<pre>";print_r($result); exit;
       // echo "<pre>";print_r($result['company_sub_cat_id']);exit;
        //$com = explode(',',$result['company_sub_cat_id']);
        //echo "<pre>";print_r($com);exit;
        //$comcount = count($com);
		
		$catquery 	= "SELECT * FROM sub_category WHERE sub_cat_status != '2'";
		$catqueryresult = mysqli_query($conn,$catquery);
		//print_r($re);exit();
		
		
		
		
	}
	if(isset($_POST['submit']))
	{
   // echo "<pre>"; print_r($_POST); exit;
        
    
   
	$id 		= 	$_POST['id'];
    $name		= 	$_POST['edit_name'];
    $tollfreeNo = 	$_POST['tollfree'];
	$city 		=	$_POST['city'];
	$country	=	$_POST['country'];
	$email		= 	$_POST['emailid'];
    $status		= 	$_POST['edit_status'];
	$subcatid   = implode(',',$_POST['cat']);
        // echo "<pre>"; print_r($subcatid);exit;
    //update query
   $sql = "UPDATE company SET company_name = '$name', company_country= '$country', company_sub_cat_id = '$subcatid', company_status = '$status', company_address ='$city',company_email_id ='$email', company_tollfree_no ='$tollfreeNo' WHERE company_id = '$id'";
        
   echo "<script>window.location='company.php';</script>"; 
        
   // print_r($sql);exit;
    $run =  mysqli_query($conn,$sql);
    $output = "SELECT *FROM company WHERE company_id = '$id'";
    $showdata = mysqli_query($conn,$output);
    $result = mysqli_fetch_assoc($showdata);    
	}
	mysqli_close($conn);
 

	?>


	<div id="page-wrapper">
        <a href="<?php echo $baseurl; ?>">Home</a> / <a href="<?php echo $baseurl; ?>company/company.php">Company Details</a> / Edit Company Details 
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Company Name</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                       <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="" method="post">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" type="text" name="edit_name" value="<?php echo $result['company_name'] ?>">
											</div>
											<div class="form-group">
                                            <label> Select SubCategory</label>
                                            <select class="form-control" name="cat[]" multiple>
											<?php while($row = mysqli_fetch_assoc($catqueryresult)){ ?>
                                               <option value="<?php echo $row['sub_cat_id'];?>" <?php if($row['sub_cat_id']==$result['company_sub_cat_id']){echo "selected";}?>><?php echo $row['sub_cat_name'];?></option>
											 <?php }?>
											</select>
                                        </div>
										<div class="form-group">
                                            <label>Tollfree No</label>
                                            <input class="form-control" type="text" name="tollfree" value="<?php echo $result['company_tollfree_no'];?>">
											</div>
											<div class="form-group">
                                            <label>Country</label>
                                            <input class="form-control" type="text" name="country" value="<?php echo $result['company_country'];?>">
											</div>
											<div class="form-group">
                                            <label>City</label>
                                            <input class="form-control" type="text" name="city" value="<?php echo $result['company_address'];?>";>
											</div>
											<div class="form-group">
                                            <label>Email Id</label>
                                            <input class="form-control" type="text" name="emailid" value="<?php echo $result['company_email_id'];?>">
											</div>
											
                                        
										<div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="edit_status">
                                                <option value="1" <?php if($result['company_status']=='1'){ echo "selected"; }?>>Active</option>
                                                <option value="0" <?php if($result['company_status']=='0'){ echo "selected"; }?>>De Active</option>
                                                
                                            </select>
                                        </div>
										
                                    
										<input type ="hidden" name="id" value="<?php echo $result['company_id'];?>">
                                      
                                        <input type="submit" value="Update" class="btn btn-default" name="submit" style="margin-top:20px;">
                                        <input type="reset" class="btn btn-default"  value="Reset" name="reset"style="margin-top:20px;">
                                    </form>
                                </div> <!--.col-lg-6 (nested)-->
                               
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
		
		<?php include'../footer.php'; ?>

   