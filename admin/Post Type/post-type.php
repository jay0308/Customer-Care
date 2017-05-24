	<?php include '../header.php'; ?> 

	<?php 
	   $sql = "SELECT *FROM post_type";
	   //echo "$sql"; exit();
	   $retvel = mysqli_query($conn,$sql);
	
	   $row = "";
	
	?>
		<div id="page-wrapper">
            <a href="<?php echo $baseurl;?>">Home</a> / Post Type Details 
            <div class="row">
                <div class="col-lg-12">
				<a href="addposttype.php" id = "btn">Add</a>
                <h1 class="page-header">Post Types</h1>
					
					
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
                                        <th colspan="2">Post Type</th>
                                    </tr>
                                </thead>
																
                                <tbody>
								<?php 
								    $i = 1;
								
								    while($row = mysqli_fetch_assoc($retvel)){ 
								    
								
								?>
                                <tr>									
                                    <td><?php echo $i;?></td>
								    <td><?php echo $row['post_type_name']?></td>
                                    <td class="center">
                                    <a href="editposttype.php?id=<?php echo $row['post_type_id'];?>" class ="edit_delete_category">Edit</a>
                                    <a href="delete.php?id=<?php echo $row['post_type_id']; ?>" class="edit_delete_category" onclick="return confirm(' Are you sure you want to delete !!')">Delete</a>
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
