	<?php include'../header.php';?>
	<?php 
		$id ="";
		$result = "";
		
		
	if(isset ($_GET['id']))
	{
		$id 		= $_GET['id'];
		$query 		= "SELECT * FROM contact_type WHERE contact_type_id = '$id'";
		//print_r ($query); exit();
		$run 	= 	mysqli_query($conn,$query);
		$result =	mysqli_fetch_assoc($run);
		//echo "<pre>";print_r($result); exit;
       // echo "<pre>";print_r($result['company_sub_cat_id']);exit;
        //$com = explode(',',$result['company_sub_cat_id']);
        //echo "<pre>";print_r($com);exit;
        //$comcount = count($com);
		
		$catquery 	= "SELECT * FROM details WHERE status != '2'";
		$catqueryresult = mysqli_query($conn,$catquery);
		//print_r($re);exit();
		
		
		
		
	}
	if(isset($_POST['submit']))
	{
   // echo "<pre>"; print_r($_POST); exit;
        
    
   
	$id 		 = 	$_POST['id'];
    $contactKey     =   $_POST['contactKey'];
    $contactValue   =   $_POST['contactValue'];
    $contactdetails =    $_POST['companydetails'];
    
    $status		= 	$_POST['status'];
	
        // echo "<pre>"; print_r($subcatid);exit;
    //update query
   $sql = "UPDATE contact_type SET contact_key = '$contactKey', contact_value= ' $contactValue', contact_status = '$status', details_id = '$contactdetails' WHERE contact_type_id = '$id'";
        
   echo "<script>window.location='contact-type.php';</script>"; 
        
   // print_r($sql);exit;
    $run =  mysqli_query($conn,$sql);
    $output = "SELECT *FROM company WHERE company_id = '$id'";
    $showdata = mysqli_query($conn,$output);
    $result = mysqli_fetch_assoc($showdata);    
	}
	mysqli_close($conn);
 

	?>


	<div id="page-wrapper">
        <a href="<?php echo $baseurl;?>">Home</a> / <a href="<?php echo $baseurl;?>ctype/contact-type.php">Edit Contact Type Details</a>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Contact Type</h1>
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
                                            <label>Contact Key</label>
                                            <input class="form-control" type="text" name="contactKey" value="<?php echo $result['contact_key'] ?>">
											</div>
											<div class="form-group">
                                            <label>Company Details</label>
                                            <select class="form-control" name="companydetails">
											<?php while($row = mysqli_fetch_assoc($catqueryresult)){ ?>
                                               <option value="<?php echo $row['details_id'];?>" <?php if($row['details_id']==$result['details_id']){echo "selected";}?>><?php echo $row['company_name'].'-'.$row['product_name'];?> (<?php echo $row['location']; ?>)</option>
											 <?php }?>
											</select>
                                        </div>
										
											
											
											<div class="form-group">
                                            <label>Contact Value</label>
                                            <input class="form-control" type="text" name="contactValue" value="<?php echo $result['contact_value'];?>">
											</div>
											
                                        
										<div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="1" <?php if($result['contact_status']=='1'){ echo "selected"; }?>>Active</option>
                                                <option value="0" <?php if($result['contact_status']=='0'){ echo "selected"; }?>>De Active</option>
                                                
                                            </select>
                                        </div>
										
                                    
										<input type ="hidden" name="id" value="<?php echo $result['contact_type_id'];?>">
                                      
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

   