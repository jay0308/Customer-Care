	<?php include '../header.php'; ?> 

	<?php 
	   $sql = "SELECT *FROM details WHERE status != '2'";
       
	   $retvel = mysqli_query($conn,$sql);
        //$output = mysqli_query($conn,$sql);
	   
	   $row = "";
    
	
	?>
		<div id="page-wrapper">
            <a href="<?php echo $baseurl;?>">Home</a> / Product Details 
            
            <div class="row">
                <div class="col-lg-12">
				<a href="add_details.php" id = "btn">Add</a>
                    <h1 class="page-header">Product Details</h1>
					
					
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
                                        <th>Company Name</th>
                                        <th>Product Name</th>
                                        <th>SubCat Name</th>
                                        <th>Location</th>
										<th>Status</th>
                                        <th>Action</th>
									</tr>
                                </thead>
																
                                <tbody>
				                <?php 
								    $i = 1;
								
								while($row = mysqli_fetch_assoc($retvel)){ 
                                    if($row['status']==1)
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
                                <td><?php echo $row['product_name'];?></td>
                                <td><?php echo $row['sub_cat_name'];?></td>
                                <td><?php echo $row['location'];?></td>
                                <td class="center"><?php echo $status;?></td>
                                <td class="center">
                                <a href="edit_details.php?id=<?php echo $row['details_id'];?>" class ="edit_delete_category">Edit</a>
                                <a href="delete_details.php?id=<?php echo $row['details_id']; ?>" class="edit_delete_category" onclick="return confirm(' Are you sure you want to delete !!')">Delete</a>
                                <?php if($row['top_most']==0) { ?>
                                    <span id="row_<?php echo $row['details_id'];?>"><a href="javascript:void(0)" onclick="mark_topmost(<?php echo $row['details_id'];?>)">MarkTopmost</a></span>
                                    <?php }else { ?>
                                    <span id="row_<?php echo $row['details_id'];?>"><a href="javascript:void(0)" onclick="unmark_topmost(<?php echo $row['details_id'];?>)">UnmarkTopmost</a></span>
                                    <?php } ?>
                                </td>
                                </tr>
								<?php  $i++; } ?>
            
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                           <script>
                               function mark_topmost(id)
                               {
                                    var function_name = 'mark_topmost';
                                    $.ajax({
                                    url: "ajax.php",
                                    type: "post",
                                    data: {id:id,fnct_name:function_name} ,
                                    success: function (response) {
                                        $("#row_"+id).html('<a onclick="unmark_topmost('+id+')" href="javascript:void(0)">UnmarkTopmost</a>');
                                    },
                                    error: function(jqXHR, textStatus, errorThrown) {
                                    console.log(textStatus, errorThrown);
                                    }


                                    });
                               }
                               function unmark_topmost(id)
                               {
                                    var function_name = 'unmark_topmost';
                                    $.ajax({
                                    url: "ajax.php",
                                    type: "post",
                                    data: {id:id,fnct_name:function_name} ,
                                    success: function (response) { 
                                        $("#row_"+id).html('<a onclick="mark_topmost('+id+')" href="javascript:void(0)">MarkTopmost</a>');
                                    },
                                    error: function(jqXHR, textStatus, errorThrown) {
                                    console.log(textStatus, errorThrown);
                                    }


                                    });
                               }
                            
                            
                            </script> 
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
