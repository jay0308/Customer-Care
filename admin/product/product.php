	<?php include '../header.php'; ?> 

	<?php 
	  // $sql = "SELECT *FROM product WHERE product_status != '2'";
        $query  = "SELECT product.product_status,product.company_id, product.product_id, company.company_name,product.product_name FROM company INNER JOIN product ON company.company_id = product.company_id where product.product_status!='2' ";
	   //echo "$sql"; exit();
	   $retvel = mysqli_query($conn,$query);
        //$output = mysqli_query($conn,$sql);
	   
	   $row = "";
    
	
	?>
		<div id="page-wrapper">
            <a href="<?php echo $baseurl;?>">Home</a> / Product Details 
            <div class="row">
                <div class="col-lg-12">
				<a href="add_product.php" id = "btn">Add</a>
                    <h1 class="page-header">Products</h1>
					
					
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
                                        <th>Product Name</th>
                                        <th>Company Name</th>
										<th>Status</th>
                                        <th>Action</th>
									</tr>
                                </thead>
																
                                <tbody>
				                <?php 
								    $i = 1;
								
								while($row = mysqli_fetch_assoc($retvel)){ 
                                    if($row['product_status']==1)
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
								<td><?php echo $row['product_name'];?></td>
                                <td><?php echo $row['company_name']?></td>
                                <td class="center"><?php echo $status;?></td>
                                <td class="center">
                                <a href="edit_product.php?id=<?php echo $row['product_id'];?>" class ="edit_delete_category">Edit</a>
                                <a href="delete_product.php?id=<?php echo $row['product_id']; ?>" class="edit_delete_category" onclick="return confirm(' Are you sure you want to delete !!')">Delete</a>
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
