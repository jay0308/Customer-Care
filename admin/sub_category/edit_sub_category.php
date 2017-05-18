	<?php include'../header.php';?>
	<?php 
		$id ="";
		$result = "";
		
		
	if(isset ($_GET['id']))
	{
		$id 		= $_GET['id'];
		$query 		= "SELECT * FROM sub_category WHERE sub_cat_id = '$id'";
		//print_r ($query); exit();
		$run 	= 	mysqli_query($conn,$query);
		$result =	mysqli_fetch_assoc($run);
		//echo "<pre>";print_r($result); exit;
		
		$cat_query 	= "SELECT * FROM category WHERE cat_status != '2'";
		$cat_query_result = mysqli_query($conn,$cat_query);
		//print_r($re);exit();
		
		
		
		
	}
	if(isset($_POST['submit']))
	{
    //echo "<pre>"; print_r($_POST); exit;    
		$id 	= 	$_POST['id'];
		$cat	= 	$_POST['cat'];
		$name	= 	$_POST['edit_name'];
		$slug 	= 	$_POST['edit_slug'];
		$status = 	$_POST['edit_status'];
    //update query
    $sql = "UPDATE sub_category SET sub_cat_name = '$name', sub_cat_slug = '$slug', sub_cat_status = '$status' WHERE sub_cat_id = '$id'";
    $run =  mysqli_query($conn,$sql);
	echo "<script>window.location='sub_category.php';</script>"; 
		
    $output = "SELECT *FROM sub_category WHERE sub_cat_id = '$id'";
    $showdata = mysqli_query($conn,$output);
    $result = mysqli_fetch_assoc($showdata);    
	}
	mysqli_close($conn);
 
	?>


	<div id="page-wrapper">
        <a href="<?php echo $baseurl; ?>">Home</a> / <a href="<?php echo $baseurl; ?>sub_category/sub_category.php">Details</a> / Edit SubCategory 
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Sub Category</h1>
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
                                        <input class="form-control" type="text" name="edit_name" value="<?php echo $result['sub_cat_name'] ?>">
								    </div>
								<div class="form-group">
                                    <label> Select Category</label>
                                    <select class="form-control" name="cat">
				<?php while($row = mysqli_fetch_assoc($cat_query_result)){ ?>
                                <option value="<?php echo $row['cat_id'];?>"<?php if($row['cat_id']==$result['cat_id']){echo "selected";}?>><?php echo $row['cat_name'];?></option>
								<?php }?>
								</select>
                                </div>
											
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input class="form-control" type ="text" name="edit_slug" value="<?php echo $result['sub_cat_slug']?>">
                                </div>
								<div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="edit_status">
                                    <option value="1"<?php if($result['sub_cat_status']=='1'){ echo "selected"; }?>>Active</option>
                                    <option value="0" <?php if($result['sub_cat_status']=='0'){ echo "selected"; }?>>De Active</option>
                                        
                                    </select>
                                </div>
                                    
								<input type ="hidden" name="id" value="<?php echo $result['sub_cat_id'];?>">
                                      
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

   