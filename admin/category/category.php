	<?php include '../header.php'; ?> 

	<?php 
	   $sql = "SELECT *FROM category WHERE cat_status != '2'";
	   //echo "$sql"; exit();
	   $retvel = mysqli_query($conn,$sql);
	
	   $row = "";
	
	?>
		<div id="page-wrapper">
            <a href="<?php echo $baseurl;?>">Home</a> / Category Details 
            <div class="row">
                <div class="col-lg-12">
				<a href="addcategory.php" id = "btn">Add</a>
                <h1 class="page-header">Categories</h1>
					
					
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
																
                                <tbody>
								<?php 
								    $i = 1;
								
								    while($row = mysqli_fetch_assoc($retvel)){ 
								    if($row['cat_status'] ==1)
								    {
									   $status = "Active";
								    }
								    else
								    {
									   $status = "De Active";
								    }
								
								?>
                                <tr>									
                                    <td><?php echo $i;?></td>
								    <td><?php echo $row['cat_name']?></td>
                                    <td><?php echo $row['cat_slug']?></td>
                                    <td class="center"><?php echo $status;?></td>
                                    <td class="center">
                                    <a href="editcategory.php?id=<?php echo $row['cat_id'];?>" class ="edit_delete_category">Edit</a>
                                    <a href="delete.php?id=<?php echo $row['cat_id']; ?>" class="edit_delete_category" onclick="return confirm(' Are you sure you want to delete !!')">Delete</a>
                                    </td>
                                    </tr>
								<?php  $i++;} ?>
            
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            
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

   <?php include '../footer.php'; ?>
