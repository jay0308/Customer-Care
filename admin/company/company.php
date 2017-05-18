	<?php include '../header.php'; ?> 

	<?php 
	   $sql = "SELECT *FROM company WHERE company_status != '2'";
	   //echo "$sql"; exit();
	   $retvel = mysqli_query($conn,$sql);
	   
	   $row = "";
    
	
	?>
		<div id="page-wrapper">
            <a href="<?php echo $baseurl;?>">Home</a> / Company Details 
            <div class="row">
                <div class="col-lg-12">
				<a href="add_company.php" id = "btn">Add</a>
                    <h1 class="page-header">Company</h1>
					
					
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
										<th>Tollfree No</th>
										<th>Email id</th>
								        <th>Status</th>
                                        <th>Action</th>
									</tr>
                                </thead>
																
                                <tbody>
				                <?php 
								    $i = 1;
								
								while($row = mysqli_fetch_assoc($retvel)){ 
                                    if($row['company_status']==1)
                                    {
                                        $status = "Active";
                                    }
                                    else
                                    {
                                        $status = "DeActive";
                                    }
								
								
								?>
                            <tr>									
                                <td><?php echo $i;?></td>
								<td><?php echo $row['company_name'];?></td>
                                <td><?php echo $row['company_tollfree_no'];?></td>
								<td><?php echo $row['company_email_id'];?></td>
                                <td class="center"><?php echo $status;?></td>
                                <td class="center">
                                <a href="edit_company.php?id=<?php echo $row['company_id'];?>" class ="edit_delete_category">Edit</a>
                                <a href="delete_company.php?id=<?php echo $row['company_id']; ?>" class="edit_delete_category" onclick="return confirm(' Are you sure you want to delete !!')">Delete</a>
                                </td>
                                </tr>
								<?php  $i++; } ?>
            
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
