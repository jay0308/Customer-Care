	<?php include '../header.php'; ?> 

	<?php 
	   $sql = "SELECT *FROM posts";
	   //echo "$sql"; exit();
	   $retvel = mysqli_query($conn,$sql);
	
	   $row = "";
	
	?>
		<div id="page-wrapper">
            <a href="<?php echo $baseurl;?>">Home</a> / Posts 
            <div class="row">
                <div class="col-lg-12">
				<a href="addposts.php" id = "btn">Add</a>
                <h1 class="page-header">Posts</h1>
					
					
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
                                        <th>Title</th>
                                        <th>Sub Title</th>
                                        <th>Post Type</th>
                                        <th>Related By</th>
                                        <th>Brief Description</th>
                                        <th colspan="2">Content</th>
                                    </tr>
                                </thead>
																
                                <tbody>
								<?php 
								    $i = 1;
								
								    while($row = mysqli_fetch_assoc($retvel)){ 
								    
								
								?>
                                <tr>									
                                    <td><?php echo $i;?></td>
								    <td><?php echo $row['title']?></td>
                                    <td><?php echo $row['sub_title']?></td>
                                    <td><?php echo $row['post_type']?></td>
                                    <td><?php echo $row['related_by']?></td>
                                    <td><?php echo $row['brief_description']?></td>
                                    <td><?php echo $row['content']?></td>
                                    <td class="center">
                                    <a href="editposts.php?id=<?php echo $row['post_id'];?>" class ="edit_delete_category">Edit</a>
                                    <a href="delete.php?id=<?php echo $row['post_id']; ?>" class="edit_delete_category" onclick="return confirm(' Are you sure you want to delete !!')">Delete</a>
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

        <style type="text/css">
            td{
                max-width: 150px;
            }
        </style>

   <?php include '../footer.php'; ?>
