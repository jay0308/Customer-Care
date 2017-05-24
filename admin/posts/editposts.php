	<?php include'../header.php';?>
	<?php 
	   $id ="";
	   $result = "";
	if(isset ($_GET['id']))
	{
	   $id = $_GET['id'];
	   $query = "SELECT * FROM posts WHERE post_id = '$id'";
	   //print_r ($query); exit();
	   $run = mysqli_query($conn,$query);
	   $result = mysqli_fetch_assoc($run);
	   //echo "<pre>";print_r($result); exit;
	
	}
	if(isset($_POST['submit']))
	{
        //echo "<pre>"; print_r($_POST); exit;    
        $title  =   $_POST['title'];
        $sub_title = $_POST['sub_title'];
        $source = $_POST['source'];
       /* $post_type = $_POST['post_type'];
        $related_by = $_POST['related_by'];*/
        $brief_description = $_POST['brief_description'];
        $content = $_POST['content'];
        $post_tag = $_POST['post_tag'];
        $keywords = $_POST['keywords'];
         //update query
        $sql = "UPDATE posts SET title ='$title',sub_title='$sub_title', source = '$source' ,post_type = '$post-type' ,related_by = '$related_by' ,brief_description = '$brief_description' ,content = '$content' ,post_tag = '$post_tag' ,keywords = '$keywords' WHERE post_id = '$id'";
        echo "<script>window.location='posts.php';</script>"; 
        $run =  mysqli_query($conn,$sql);
        $output = "SELECT * FROM posts WHERE post_id = '$id'";
        $showdata = mysqli_query($conn,$output);
        $result = mysqli_fetch_assoc($showdata);    
	}
	
 

	?>


	<div id="page-wrapper">
        <a href="<?php echo $baseurl; ?>">Home</a> / <a href="<?php echo $baseurl; ?>posts/posts.php">Details</a> / Edit Posts 
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Posts</h1>
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
                                            <label>Title</label>
                                            <input required="" class="form-control" type="text" name="title" value="<?php echo $result['title'] ?>">
                                                            </div>

                                        <div class="form-group">
                                            <label>Sub Title</label>
                                            <input required="" class="form-control" type="text" name="sub_title" value="<?php echo $result['sub_title'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Source</label>
                                            <input required="" class="form-control" type="text" name="source" value="<?php echo $result['source'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Post Type</label>
                                            <select name="post_type" class="form-control">
                                                <option> - Select post type - </option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Related By</label>
                                            <select name="related_by" class="form-control">
                                                <option> - Related Company - </option>
                                            </select>
                                        </div>
                                         <div class="form-group">
                                            <label>Brief Description</label>
                                            <input required="" class="form-control" type="text" name="brief_description" value="<?php echo $result['brief_description'] ?>">
                                        </div>
                                         <div class="form-group">
                                            <label>Content</label>
                                            <input required="" class="form-control" type="textarea" name="content" style="min-height:80px" value="<?php echo $result['content'] ?>">
                                        </div>
                                         
                                         <div class="form-group">
                                            <label>Tag</label>
                                            <input required="" class="form-control" type="text" name="post_tag" value="<?php echo $result['post_tag'] ?>">
                                        </div>
                                         <div class="form-group">
                                            <label>Keywords</label> 
                                            <input required="" class="form-control" type="text" name="keywords" value="<?php echo $result['keywords'] ?>">
                                        </div>
                                   
								<input required="" type ="hidden" name="id" value="<?php echo $result['post_id'];?>">
                                      
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

           $sql = "SELECT post_type_id,post_type_name from post_type";
        //echo"$sql"; exit();
          $result = mysqli_query($conn,$sql);
          
          $out = '';
         while ($row = mysqli_fetch_assoc($result)) {
             # code...
            $out.= '<option value = "'.$row['post_type_id'].'">';
             $out.=$row['post_type_name'];
             $out.='</option>';
         }
          echo "<script>
            $(document).ready(function(){
                $('select[name=related_by]').append('".$output."');
                $('select[name=post_type]').append('".$out."');
            });
         </script>";
        

          mysqli_close($conn);
        ?>
		
		<?php include'../footer.php'; ?>

   