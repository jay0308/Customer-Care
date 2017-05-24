<?php include'../header.php';?>
<?php  if(isset ($_POST['submit']))
{
	$name 	= 	$_POST['name'];
	
	$sql = "INSERT INTO post_type(post_type_id,post_type_name) VALUES(null,'$name')";
	//echo"$sql"; exit();
	  mysqli_query($conn,$sql);
	  mysqli_close($conn);	
	  echo "<script>window.location='post-type.php';</script>"; 
}
?>

	<div id="page-wrapper">
        <a href="<?php echo $baseurl; ?>">Home</a> / <a href="<?php echo $baseurl; ?>Post Type/post-type.php">Details</a> / Add Post Type Details 
            <div class="row">
                <div class="col-lg-12">
                <h1 class="page-header">Add Post Type</h1>
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

   