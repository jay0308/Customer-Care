<?php include'../header.php';?>
<?php  if(isset ($_POST['submit']))
{
	//echo "<pre>";print_r($_POST);exit;
   
	$status         = 	$_POST['status'];
    $companylist 	= 	$_POST['companylist'];
    $productlist    =   $_POST['productlist'];
    $location       =   $_POST['location'];
    $subcatname     =   $_POST['subcategorylist'];
	$create_date    = 	date("Y-m-d H:i:s");
	
		$sql = "INSERT INTO details(company_name,product_name,sub_cat_name,location,status,create_date) VALUES('$companylist','$productlist','$subcatname','$location','$status','$create_date')";
         //echo $sql;exit;
		 //print_r($sql); exit();
		 mysqli_query($conn,$sql);
    echo "<script>window.location='details.php';</script>";
	  	
}

	$query              = "SELECT * FROM company WHERE company_status != '2'";
    $queryProduct       = "SELECT * FROM product WHERE product_status != '2'";
    $querysubcatname    = "SELECT * from sub_category where sub_cat_status !='2'";
    
        $subcatresult   = mysqli_query($conn,$querysubcatname);

        $productResult  =  mysqli_query($conn,$queryProduct);
    
		
		$result = mysqli_query($conn,$query);

		mysqli_close($conn);
?>

	<div id="page-wrapper">
        <a href="<?php echo $baseurl; ?>">Home</a> / <a href="<?php echo $baseurl; ?>details/details.php">Details</a> / Add Product Details 
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Product Details</h1>
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
                                            <label> Select Company</label>
                                            <select class="form-control" name="companylist">
											<?php while($row = mysqli_fetch_assoc($result)){ ?>
                                               <option value="<?php echo $row['company_name'];?>"><?php echo $row['company_name'];?></option>
											<?php }?>
											</select>
                                        </div>
                                         <div class="form-group">
                                            <label> Select Product</label>
                                            <select class="form-control" name="productlist">
											<?php while($row = mysqli_fetch_assoc($productResult)){ ?>
                                               <option value="<?php echo $row['product_name'];?>"><?php echo $row['product_name'];?></option>
											<?php }?>
											</select>
                                        </div>
                                        <div class="form-group">
                                            <label> Select Sub Category</label>
                                            <select class="form-control" name="subcategorylist">
											<?php while($row = mysqli_fetch_assoc($subcatresult)){ ?>
                                               <option value="<?php echo $row['sub_cat_name'];?>"><?php echo $row['sub_cat_name'];?></option>
											<?php }?>
											</select>
                                        </div>
                                      
                                        
                                     <div class="form-group">
                                            <label>Location</label>
                                            <input class="form-control" type="text" name="location">
											</div>
                                        
								    <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="1">Active</option>
                                                <option value="0">DeActive</option>
                                                
                                            </select>
                                        </div>
                                      
                                        <input type="submit" value="Submit Button" class="btn btn-default" name="submit" style="margin-top:20px;">
                                        <input type="reset" class="btn btn-default"  value="Reset Button" name="reset"style="margin-top:20px;">
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

   