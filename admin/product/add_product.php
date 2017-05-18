<?php include'../header.php';?>
<?php  if(isset ($_POST['submit']))
{
	$name 	= 		$_POST['productName'];
	$status = 		$_POST['status'];
	$cat 	= 		$_POST['cat'];
	$create_date = 	date("Y-m-d H:i:s");
	
		$sql = "INSERT INTO product(company_id,product_name,product_status,product_create_date) VALUES('$cat','$name','$status','$create_date')";
		 //print_r($sql); exit();
		 mysqli_query($conn,$sql);
		echo "<script>window.location='product.php';</script>"; 
	  	
}
	$query = "SELECT * FROM company WHERE company_status = '1'";
		//echo $query; exit();
		$result = mysqli_query($conn,$query);
		mysqli_close($conn);
?>

	<div id="page-wrapper">
         <a href="<?php echo $baseurl; ?>">Home</a> / <a href="<?php echo $baseurl; ?>product/product.php">Details</a> / Add Product Details 
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Product</h1>
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
                                            <label>Product Name</label>
                                            <input class="form-control" type="text" name="productName">
											</div>
											<div class="form-group">
                                            <label> Select Company</label>
                                            <select class="form-control" name="cat">
											<?php while($row = mysqli_fetch_assoc($result)){ ?>
                                               <option value="<?php echo $row['company_id'];?>"><?php echo $row['company_name'];?></option>
											<?php }?>
											</select>
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

   