	<?php include'../header.php';?>
	<?php 
		$id ="";
		$result = "";
		
		
	if(isset ($_GET['id']))
	{
		$id 		= $_GET['id'];
		$query 		= "SELECT * FROM product WHERE product_id = '$id'";
		//print_r ($query); exit();
		$run 	= 	mysqli_query($conn,$query);
		$result =	mysqli_fetch_assoc($run);
		//echo "<pre>";print_r($result); exit;
		
		$catquery 	= "SELECT * FROM company WHERE company_status != '2'";
		$catqueryresult = mysqli_query($conn,$catquery);
		//print_r($re);exit();
		
		
		
		
	}
	if(isset($_POST['submit']))
	{
    //echo "<pre>"; print_r($_POST); exit;    
	$id             = 	$_POST['id'];
    $productName    = 	$_POST['edit_name'];
    $status		    = 	$_POST['edit_status'];
	$cat 		    =	$_POST['cat'];
    //update query
   $sql = "UPDATE product SET product_name = '$productName', company_id='$cat', product_status = '$status' WHERE product_id = '$id'";
    //print_r($sql);exit;
    $run =  mysqli_query($conn,$sql);
	echo "<script>window.location='product.php';</script>"; 	
    $output = "SELECT *FROM product WHERE product_id = '$id'";
    $showdata = mysqli_query($conn,$output);
    $result = mysqli_fetch_assoc($showdata);    
	}
	mysqli_close($conn);
 

	?>


	<div id="page-wrapper">
         <a href="<?php echo $baseurl; ?>">Home</a> / <a href="<?php echo $baseurl; ?>product/product.php">Details</a> / Edit Product Details 
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Product Name</h1>
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
                                            <label>Product Name</label>
                                            <input class="form-control" type="text" name="edit_name" value="<?php echo $result['product_name'] ?>">
											</div>
											<div class="form-group">
                                            <label> Select Company</label>
                                            <select class="form-control" name="cat">
											<?php while($row = mysqli_fetch_assoc($catqueryresult)){ ?>
                                               <option value="<?php echo $row['company_id'];?>" <?php if($row['company_id']==$result['company_id']){echo "selected";}?>><?php echo $row['company_name'];?></option>
											 <?php }?>
											</select>
                                        </div>
											
                                        
										<div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="edit_status">
                                                <option value="1" <?php if($result['product_status']=='1'){ echo "selected"; }?>>Active</option>
                                                <option value="0" <?php if($result['product_status']=='0'){ echo "selected"; }?>>De Active</option>
                                                
                                            </select>
                                        </div>
										
                                    
										<input type ="hidden" name="id" value="<?php echo $result['product_id'];?>">
                                      
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

   