	<?php include'../header.php';?>
	<?php 
		$id ="";
		$result = "";
		
		
	if(isset ($_GET['id']))
	{
		$id 		= $_GET['id'];
		$query 		= "SELECT * FROM details WHERE details_id = '$id'";
		//print_r ($query); exit();
		$run 	= 	mysqli_query($conn,$query);
        $result =   mysqli_fetch_assoc($run);
		
		//echo "<pre>";print_r($result); exit;
		
		$catquery 	= "SELECT * FROM company WHERE company_status != '2'";
		$catqueryresult = mysqli_query($conn,$catquery);
        $detailsquery   =   "SELECT * FROM product WHERE product_status !='2' ";
        $detailsResult  =   mysqli_query($conn,$detailsquery);
        $subcatquery    =   "select * from sub_category where sub_cat_status !='2'";
        $subcatresult   =   mysqli_query($conn,$subcatquery);
        
}
	
    if(isset($_POST['submit']))
	{
    //echo "<pre>"; print_r($_POST); exit;    
	$id             = 	$_POST['id'];
    $companyName    = 	$_POST['companylist'];
    $status		    = 	$_POST['edit_status'];
	$productName	=	$_POST['productlist'];
    $subcatname     =   $_POST['subcategorylist'];
    $location       =   $_POST['location'];
    
    
    //update query
   $sql = "UPDATE details SET company_name = '$companyName', product_name='$productName',     location = '$location', sub_cat_name = '$subcatname', status = '$status' WHERE details_id = '$id'";
    //print_r($sql);exit;
    $run =  mysqli_query($conn,$sql);
	echo "<script>window.location='details.php';</script>"; 
    $output = "SELECT *FROM details WHERE details_id = '$id'";
    $showdata = mysqli_query($conn,$output);
    $result = mysqli_fetch_assoc($showdata);    
	}
	mysqli_close($conn);
 

	?>


	<div id="page-wrapper">
        <a href="<?php echo $baseurl; ?>">Home</a> / <a href="<?php echo $baseurl; ?>details/details.php">Details</a> / Edit Product Details 
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Product Details</h1>
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
                                            <label>Company Name</label>
                                            <select class="form-control" name="companylist">
											<?php while($rowcompany = mysqli_fetch_assoc($catqueryresult)){ ?>
                                               <option value="<?php echo $rowcompany['company_name'];?>" 
                                                <?php if($rowcompany['company_name']==$result['company_name']) { echo "selected";}?>><?php echo $rowcompany['company_name'];?></option>
											<?php }?>
											</select>
                                        </div>
											<div class="form-group">
                                            <label>Product Name</label>
                                            <select class="form-control" name="productlist">
											<?php while($rowproduct = mysqli_fetch_assoc($detailsResult)){ ?>
                                               <option value="<?php echo $rowproduct['product_name'];?>" <?php if($rowproduct['product_name']==$result['product_name']){echo "selected";}?>><?php echo $rowproduct['product_name'];?></option>
											 <?php }?>
											</select>
                                        </div>
                                         <div class="form-group">
                                            <label> Select Sub Category</label>
                                            <select class="form-control" name="subcategorylist">
											<?php while($rowsubcat = mysqli_fetch_assoc($subcatresult)){ ?>
                                               <option value="<?php echo $rowsubcat['sub_cat_name']?>"<?php if($rowsubcat['sub_cat_name']==$result['sub_cat_name']){echo "selected";} ?>><?php echo $rowsubcat['sub_cat_name'];?></option>
											<?php }?>
											</select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Location</label>
                                            <input class="form-control" type="text" name="location" value=" <?php echo $result['location'];?>">
											</div>
                                        
                                        
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="edit_status">
                                                <option value="1" <?php if($result['status']=='1'){ echo "selected"; }?>>Active</option>
                                                <option value="0" <?php if($result['status']=='0'){ echo "selected"; }?>>De Active</option>
                                                
                                            </select>
                                        </div>
										
                                    
										<input type ="hidden" name="id" value="<?php echo $result['details_id'];?>">
                                      
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

   