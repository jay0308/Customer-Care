	<?php include'../header.php';?>
	<?php 
	   $id ="";
	   $result = "";
	if(isset ($_GET['id']))
	{
	   $id = $_GET['id'];
	   $query = "SELECT * FROM category WHERE cat_id = '$id'";
	   //print_r ($query); exit();
	   $run = mysqli_query($conn,$query);
	   $result = mysqli_fetch_assoc($run);
	   //echo "<pre>";print_r($result); exit;
	
	}
	if(isset($_POST['submit']))
	{
        //echo "<pre>"; print_r($_POST); exit;    
        $name= $_POST['edit_name'];
         //update query
        $sql = "UPDATE post_type SET post_type_name = '$name' WHERE post_type_id = '$id'";
        echo "<script>window.location='post-type.php';</script>"; 
        $run =  mysqli_query($conn,$sql);
        $output = "SELECT *FROM post_type WHERE post_type_id = '$id'";
        $showdata = mysqli_query($conn,$output);
        $result = mysqli_fetch_assoc($showdata);    
	}
	mysqli_close($conn);
 

	?>


	<div id="page-wrapper">
        <a href="<?php echo $baseurl; ?>">Home</a> / <a href="<?php echo $baseurl; ?>Post Type/post-type.php">Details</a> / Edit Post Type 
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Post TYpe</h1>
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
                                    <input class="form-control" type="text" name="edit_name" value="<?php echo $result['cat_name'] ?>">
								</div>
                                   
								<input type ="hidden" name="id" value="<?php echo $result['post_type_id'];?>">
                                      
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

   