<?php include'../header.php';?>
<?php  if(isset ($_POST['submit']))
{
	$name 	= 	$_POST['name'];
	$slug 	= 	$_POST['slug'];
	$status = 	$_POST['status'];
	$create_date = date("Y-m-d H:i:s");
	
	$sql = "INSERT INTO category(cat_name,cat_slug,cat_status,cat_create_date) VALUES('$name','$slug','$status','$create_date')";
	//echo"$sql"; exit();
	  mysqli_query($conn,$sql);
	  mysqli_close($conn);	
	  echo "<script>window.location='category.php';</script>"; 
}
?>

	<div id="page-wrapper">
        <a href="<?php echo $baseurl; ?>">Home</a> / <a href="<?php echo $baseurl; ?>category/category.php">Details</a> / Add Product Details 
            <div class="row">
                <div class="col-lg-12">
                <h1 class="page-header">Add Category</h1>
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
                                            <label>Slug</label>
                                            <input class="form-control" type = "text" name="slug">
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

   