<?php include'../header.php';?>
<?php  if(isset ($_POST['submit']))
{
	$title 	= 	$_POST['title'];
    $sub_title = $_POST['sub_title'];
    $source = $_POST['source'];
    $post_date = date("l jS \of F Y h:i:s A");
    $post_type = $_POST['post_type'];
    $related_by = $_POST['related_by'];
    $brief_description = $_POST['brief_description'];
    $content = $_POST['content'];
    $post_tag = $_POST['post_tag'];
    $keywords = $_POST['keywords'];
	
	$sql = "INSERT INTO posts(post_id,title,sub_title,source,post_date,post_type,related_by,brief_description,content,post_tag,keywords) VALUES(null,'$title','$sub_title'
    ,'$source','$post_date','$post_type','$related_by','$brief_description','$content','$post_tag','$keywords')";
	//echo"$sql"; exit();
	 mysqli_query($conn,$sql);
	 mysqli_close($conn);	
	echo "<script>window.location='posts.php';</script>"; 
}
?>

	<div id="page-wrapper">
        <a href="<?php echo $baseurl; ?>">Home</a> / <a href="<?php echo $baseurl; ?>posts/posts.php">Details</a> / Add Posts Details 
            <div class="row">
                <div class="col-lg-12">
                <h1 class="page-header">Add Post details</h1>
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
                                            <input required="" class="form-control" type="text" name="title">
									                     	</div>

                                        <div class="form-group">
                                            <label>Sub Title</label>
                                            <input required="" class="form-control" type="text" name="sub_title">
                                        </div>
                                        <div class="form-group">
                                            <label>Source</label>
                                            <input required="" class="form-control" type="text" name="source">
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
                                            <input required="" class="form-control" type="text" name="brief_description">
                                        </div>
                                         <div class="form-group">
                                            <label>Content</label>
                                            <!-- <input required="" class="form-control" type="textarea" name="content" style="min-height:80px"> -->
                                            <textarea required="" class="form-control" type="textarea" name="content" style="min-height:80px"></textarea>
                                            <script type="text/javascript">
                                              CKEDITOR.replace( 'content' );
                                            </script>
                                          </div>
                                         
                                         <div class="form-group">
                                            <label>Tag</label>
                                            <input required="" class="form-control" type="text" name="post_tag">
                                        </div>
                                         <div class="form-group">
                                            <label>Keywords</label>
                                            <input required="" class="form-control" type="text" name="keywords">
                                        </div>
                                      
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

   