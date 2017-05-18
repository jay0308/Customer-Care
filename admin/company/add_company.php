<?php include'../header.php';?>
<?php  if(isset ($_POST['submit']))
{
	$name 	= 		$_POST['name'];
	$tollfreeNo = 	$_POST['tollfree'];
	$city 		=	$_POST['city'];
	$country	=	$_POST['country'];
	$email = 		$_POST['emailid'];
	$status = 		$_POST['status'];
	$cat 	= 		$_POST['cat'];
	$create_date = 	date("Y-m-d H:i:s");
	
		$sql = "INSERT INTO company(company_name,company_sub_cat_id,company_country,company_address,company_tollfree_no,company_email_id,company_status,company_create_date) VALUES('$name','$cat','$country','$city','$tollfreeNo','$email','$status','$create_date')";
		mysqli_query($conn,$sql);
		echo "<script>window.location='company.php';</script>"; 
}
	$query = "SELECT * FROM sub_category WHERE sub_cat_status != '2'";
		//echo $query; exit();
		$result = mysqli_query($conn,$query);
		mysqli_close($conn);
?>

	<div id="page-wrapper">
        <a href="<?php echo $baseurl;?>">Home</a> / <a href="<?php echo $baseurl;?>company/company.php">Add Contact Type Details</a>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Company</h1>
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
                                            <input class="form-control" type="text" name="name">
											</div>
											<div class="form-group">
                                            <label> Select Category</label>
                                            <select class="form-control" name="cat" multiple>
											<?php while($row = mysqli_fetch_assoc($result)){ ?>
                                               <option value="<?php echo $row['sub_cat_id'];?>"><?php echo $row['sub_cat_name'];?></option>
											<?php }?>
											</select>
                                        </div>
											<div class="form-group">
                                            <label>Tollfree No</label>
                                            <input class="form-control" type="text" name="tollfree">
											</div>
											<div class="form-group">
                                            <label>Country</label>
                                            <input class="form-control" type="text" name="country">
											</div>
											<div class="form-group">
                                            <label>City</label>
                                            <input class="form-control" type="text" name="city">
											</div>
										
										<div class="form-group">
                                            <label>Email Id</label>
                                            <input class="form-control" type="text" name="emailid">
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

   