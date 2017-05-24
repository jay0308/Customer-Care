	<?php include '../header.php'; ?> 

	<?php 
	   $sql = "SELECT *FROM service_center";
	   //echo "$sql"; exit();
	   $retvel = mysqli_query($conn,$sql);
	
	   $row = "";
	
	?>
		<div id="page-wrapper">
            <a href="<?php echo $baseurl;?>">Home</a> / Serice Centers 
            <div class="row">
                <div class="col-lg-12">
				<a href="addservicecenter.php" id = "btn">Add</a>
                <h1 class="page-header">Service Center details</h1>
					
					
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
                                        <th>State</th>
                                        <th>Full Address</th>
                                        <th>Contact</th>
                                        <th colspan="2">Open Time</th>
                                    </tr>
                                </thead>
																
                                <tbody>
								<?php 
								    $i = 1;
								
								    while($row = mysqli_fetch_assoc($retvel)){ 
								    
								
								?>
                                <tr>									
                                    <td><?php echo $i;?></td>
								    <td><?php echo $row['state']?></td>
                                    <td><?php echo $row['full_address']?></td>
                                    <td><?php echo $row['contact']?></td>
                                    <td><?php echo $row['open_time']?></td>
                                    <td class="center">
                                    <a href="editservicecenter.php?id=<?php echo $row['s_c_id'];?>" class ="edit_delete_category">Edit</a>
                                    <a href="delete.php?id=<?php echo $row['s_c_id']; ?>" class="edit_delete_category" onclick="return confirm(' Are you sure you want to delete !!')">Delete</a>
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
