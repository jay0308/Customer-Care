<?php include'../header.php';?>
<?php  if(isset ($_POST['submit']))
{
	  $of_company 	= 	$_POST['of_company'];
    $of_product = $_POST['of_product'];
    $state = $_POST['state'];
    $full_address =$_POST['full_address'];
    $contact = $_POST['contact'];
    $open_time = $_POST['open_time'];
	
	$sql = "INSERT INTO service_center(s_c_id,company_id,product_id,state,full_address,contact,open_time) VALUES(null,'$of_company','$of_product'
    ,'$state','$full_address','$contact','$open_time')";
	//echo"$sql"; exit();
	 mysqli_query($conn,$sql);
	 mysqli_close($conn);	
	echo "<script>window.location='servicecenter.php';</script>"; 
}
?>

	<div id="page-wrapper">
        <a href="<?php echo $baseurl; ?>">Home</a> / <a href="<?php echo $baseurl; ?>service_center/service_center.php">Details</a> / Add Service Center Details 
            <div class="row">
                <div class="col-lg-12">
                <h1 class="page-header">Add Service Center details</h1>
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
                                            <label>Of Company</label>
                                            <select name="of_company" class="form-control">
                                                <option> - Select Company - </option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Of Product</label>
                                            <select name="of_product" class="form-control">
                                                <option> - Select Product - </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>State</label>
                                            <input required="" class="form-control" type="text" name="state">
									                     	</div>

                                        <div class="form-group">
                                            <label>Full Address</label>
                                            <input required="" class="form-control" type="text" name="full_address">
                                        </div>
                                        <div class="form-group">
                                            <label>Contact</label>
                                            <input required="" class="form-control" type="text" name="contact">
                                        </div>
                                      
                                         <div class="form-group">
                                            <label>Open Time</label>
                                            <input required="" class="form-control" type="text" name="open_time">
                                        </div>
                                         <div class="form-group">
                                         
                                      
                                        <input required="" type="submit" value="Submit Button" class="btn btn-default" name="submit" style="margin-top:20px;">
                                        <input required="" type="reset" class="btn btn-default"  value="Reset Button" name="reset"style="margin-top:20px;">
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

        <?php
            $sql = "SELECT company_id,company_name from company";
        //echo"$sql"; exit();
          $result = mysqli_query($conn,$sql);
          
          $output = '';
         while ($row = mysqli_fetch_assoc($result)) {
             # code...
            $output.= '<option value = "'.$row['company_id'].'">';
             $output.=$row['company_name'];
             $output.='</option>';
         }

           $sql = "SELECT product_id,product_name from product";
        //echo"$sql"; exit();
          $result = mysqli_query($conn,$sql);
          
          $out = '';
         while ($row = mysqli_fetch_assoc($result)) {
             # code...
            $out.= '<option value = "'.$row['product_id'].'">';
             $out.=$row['product_name'];
             $out.='</option>';
         }
          echo "<script>
            $(document).ready(function(){
                $('select[name=of_company]').append('".$output."');
                $('select[name=of_product]').append('".$out."');
            });
         </script>";
        

          mysqli_close($conn);
        ?>
		
		<?php include'../footer.php'; ?>

   