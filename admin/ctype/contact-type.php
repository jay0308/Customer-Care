	<?php include '../header.php'; ?> 

	<?php 
	   $sql = "SELECT details.product_name, details.company_name, contact_type.contact_type_id,contact_type.contact_key,contact_type.contact_value,contact_type.contact_status FROM details INNER JOIN contact_type ON contact_type.details_id = details.details_id WHERE contact_type.contact_status=1";
            
	   $retvel = mysqli_query($conn,$sql);
	   
	   $row = "";
    
	
	?>
		<div id="page-wrapper">
            <a href="<?php echo $baseurl; ?>">Home</a> / Contact Type Details
            <div class="row">
                <div class="col-lg-12">
				<a href="add-contact-type.php" id = "btn">Add</a>
                    <h1 class="page-header">Contact Type List</h1>
					
					
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
                                        <th>Company - Product</th>
                                        <th>Contact Key</th>
										<th>Contact Value</th>
                                        
										<th>Status</th>
                                        <th>Action</th>
									</tr>
                                </thead>
																
                                <tbody>
				                <?php 
								    $i = 1;
								
								while($row = mysqli_fetch_assoc($retvel)){ 
                                    if($row['contact_status']==1)
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
								
                                <td><?php echo $row['company_name'].'-'.$row['product_name'];?></td>
                                <td><?php echo $row['contact_key'];?></td>
                                <td><?php echo $row['contact_value'];?></td>
                                
								
                                <td class="center"><?php echo $status;?></td>
                                <td class="center">
                                <a href="edit-contact-type.php?id=<?php echo $row['contact_type_id'];?>" class ="edit_delete_category">Edit</a>
                                <a href="delete-contact-type.php?id=<?php echo $row['contact_type_id']; ?>" class="edit_delete_category" onclick="return confirm(' Are you sure you want to delete !!')">Delete</a>
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
