<?php include'../header.php';?>
<?php 
	   $msg="";
	if(isset ($_POST['submit']))
	{
		
		$name 	= 		$_POST['name'];
		$slug 	= 		$_POST['slug'];
		$cat  	= 		$_POST['cat'];
		$status = 		$_POST['status'];
		$create_date = 	date("Y-m-d H:i:s");
	
		$sql = "INSERT INTO sub_category(cat_id,sub_cat_name,sub_cat_slug,sub_cat_status,sub_cat_create_date) VALUES('$cat','$name','$slug','$status','$create_date')";
		//echo"$sql"; exit();
		$output = mysqli_query($conn,$sql);
		if($output==TRUE )
		{
			$msg = "insert record successfully";
		}
		 echo "<script>window.location='sub_category.php';</script>"; 
	}
		    $query = "SELECT * FROM category WHERE cat_status != '2'";
		    //echo $query; exit();
		    $result = mysqli_query($conn,$query);
		    mysqli_close($conn);
		 
?>

	<div id="page-wrapper">
        <a href="<?php echo $baseurl; ?>">Home</a> / <a href="<?php echo $baseurl; ?>sub_category/sub_category.php">Details</a> / Add SubCategory  
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Sub Category</h1>
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
                                    <select class="form-control" name="cat">
				        <?php while($row = mysqli_fetch_assoc($result)){ ?>
                        <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></option>
				        <?php }?>
								 </select>
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
							<div><?php echo $msg;?></div>
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

   