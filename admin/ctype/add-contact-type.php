<?php include'../header.php';?>
<?php  if(isset ($_POST['submit']))
{
	$contactKey 	= 	$_POST['contactKey'];
    $contactValue   =   $_POST['contactValue'];
    $status     = 		$_POST['status'];
	$detailsId 	= 		$_POST['details'];
	$create_date = 	date("Y-m-d H:i:s");
	
		$sql = "INSERT INTO contact_type(details_id,contact_key,contact_value,contact_status,contact_status_date) VALUES('$detailsId','$contactKey','$contactValue','$status','$create_date')";
		 //print_r($sql); exit();
		 mysqli_query($conn,$sql);
	  	echo "<script>window.location='contact-type.php';</script>"; 
}
	$query = "SELECT * FROM details WHERE status = '1'";
		//echo $query; exit();
		$result = mysqli_query($conn,$query);
		mysqli_close($conn);
?>

	<div id="page-wrapper">
        <a href="<?php echo $baseurl; ?>">Home</a> / <a href="<?php echo $baseurl;?>ctype/contact-type.php">Contact Details</a> / Add Contact Details 
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Contact</h1>
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
                                            <label>Contact key</label>
                                            <input class="form-control" type="text" name="contactKey">
											</div>
											<div class="form-group">
                                            <label>Select company details</label>
                                            <select class="form-control" name="details">
											<?php while($row = mysqli_fetch_assoc($result)){ ?>
                                               <option value="<?php echo $row['details_id'];?>"><?php echo $row['company_name'].'-'.$row['product_name'];?> (<?php echo $row['location'];?>)</option>
											<?php }?>
											</select>
                                        </div>
											
											<div class="form-group">
                                            <label>Contact Value</label>
                                            <input class="form-control" type="text" name="contactValue">
											</div>
										
										
                                        
										<div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="1">Active</option>
                                                <option value="0">DeActive</option>
                                                
                                            </select>
                                        </div>
                                      
                                        <input type="submit" value="Submit Button" class="btn btn-default" name="submit" style="margin-top:20px;">
                                        <input type="reset" class="btn btn-default"  value="Reset Button" name="reset"style="margin-top:20px;">
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

   