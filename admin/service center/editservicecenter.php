	<?php include'../header.php';?>
	<?php 
	   $id ="";
	   $result = "";
	if(isset ($_GET['id']))
	{
	   $id = $_GET['id'];
	   $query = "SELECT * FROM service_center WHERE s_c_id = '$id'";
	   //print_r ($query); exit();
	   $run = mysqli_query($conn,$query);
	   $result = mysqli_fetch_assoc($run);
	   //echo "<pre>";print_r($result); exit;
	
	}
	if(isset($_POST['submit']))
	{
        //echo "<pre>"; print_r($_POST); exit;    
        $of_company  =   $_POST['of_company'];
        $of_product = $_POST['of_product'];
        $state = $_POST['state'];
        $full_address =$_POST['full_address'];
        $contact = $_POST['contact'];
        $open_time = $_POST['open_time'];
         //update query
        $sql = "UPDATE service_center SET company_id ='$of_company',product_id='$of_product', state = '$state' ,full_address = '$full_address' ,contact = '$contact' ,open_time = '$open_time'  WHERE s_c_id = '$id'";
        echo "<script>window.location='servicecenter.php';</script>"; 
        $run =  mysqli_query($conn,$sql);
        $output = "SELECT * FROM service_center WHERE s_c_id = '$id'";
        $showdata = mysqli_query($conn,$output);
        $result = mysqli_fetch_assoc($showdata);    
	}
	
 

	?>


	<div id="page-wrapper">
        <a href="<?php echo $baseurl; ?>">Home</a> / <a href="<?php echo $baseurl; ?>service center/servicecenter.php">Details</a> / Edit Service Center 
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Service Center</h1>
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
                                            <select name="of_company" class="form-control" value="<?php echo $result['company_id'];?>">
                                                <option> - Select Company - </option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Of Product</label>
                                            <select name="of_product" class="form-control" value="<?php echo $result['product_id'];?>">
                                                <option> - Select Product - </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>State</label>
                                            <input required="" class="form-control" type="text" name="state" value="<?php echo $result['state'];?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Full Address</label>
                                            <input required="" class="form-control" type="text" name="full_address" value="<?php echo $result['full_address'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Contact</label>
                                            <input required="" class="form-control" type="text" name="contact" value="<?php echo $result['contact'];?>">
                                        </div>
                                      
                                         <div class="form-group">
                                            <label>Open Time</label>
                                            <input required="" class="form-control" type="text" name="open_time" value="<?php echo $result['open_time'];?>">
                                        </div>
                                         <div class="form-group">
                                   
								                    <input required="" type ="hidden" name="id" value="<?php echo $result['s_c_id'];?>">
                                      
                                    <input required="" type="submit" value="Update" class="btn btn-default" name="submit" style="margin-top:20px;">
                                    <input required="" type="reset" class="btn btn-default"  value="Reset" name="reset"style="margin-top:20px;">
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

   