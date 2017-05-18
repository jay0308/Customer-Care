 

<?php include 'header.php';?>          <!--include header.php file-->
<?php 
        
   /* $sql = "SELECT category.cat_name, group_concat(distinct sub_category.sub_cat_id SEPARATOR ',') as subCatId, group_concat(distinct sub_category.sub_cat_name SEPARATOR ',') as subCatName, group_concat(distinct (select group_concat(distinct company_name SEPARATOR ',') from company where company_sub_cat_id=sub_category.sub_cat_id) SEPARATOR ';') as companyName, group_concat(distinct (select group_concat(distinct company_id SEPARATOR ',') from company where company_sub_cat_id=sub_category.sub_cat_id) SEPARATOR ';') as company_id FROM category LEFT JOIN sub_category ON category.cat_id=sub_category.cat_id LEFT JOIN company ON sub_category.sub_cat_id= company.company_sub_cat_id group by category.cat_id ";*/

    $sql = "SELECT category.cat_id, group_concat(DISTINCT sub_category.sub_cat_id SEPARATOR ',') AS subCatId, category.cat_name, group_concat(DISTINCT sub_category.sub_cat_name SEPARATOR ',') AS subCatName FROM category INNER JOIN sub_category ON category.cat_id = sub_category.cat_id group by category.cat_id ";
    $query = mysqli_query($conn,$sql);
//echo $sql; exit;

    if(isset($_POST['searchbox']))
    {
        $searchq        =  $_POST['searchbox'];
        $search_query   =  "";
    }
    
?>





  <!--search box start-->
  
	<div class="w3-row" style="margin-top: 80px;">
		<div class="w3-col w3-container" style="width: 20%"></div>
		<div class="w3-col w3-container" style="width: 60%;">
			<h2 class="w3-center w3-text-blue">Customer Care Search</h2>
			<form action="" method="post" class="w3-margin-top" id="search">
			<input type="text" placeholder="ICICI Credit card Delhi" class="w3-margin-bottom w3-card-2 w3-input" id="search_box" name="searchbox">
			</form>
		</div>
		<div class="w3-col w3-container" style="width: 20%"></div>
		
	</div> <!--searchbox end-->


	
 
 <div style="margin-top: 100px;"> <!--main container start-->
<!--grid view-->

<div class="w3-row-padding">
 
	
<div class="w3-margin-bottom w3-twothird">  <!--left coloumn start-->
    <div class="title-subtitle">
    <h3 class="widget-title">
        <span class="w3-large"><b>Top Most</b></span>
    <a href="#" class="w3-large w3-hover-green w3-btn w3-red" id="view_all">View All</a>
    </h3>
    </div>
    
        
        <div class="w3-row" style="margin-top:20px;">
            <?php 
            
            $top_most_query   = "select * from details where status = '1' and top_most = '1'";
            $top_most_run = mysqli_query($conn,$top_most_query);
            //$count        = mysqli_num_rows($top_most_run);
            $top_most_row = array();
            while($merge_data=mysqli_fetch_assoc($top_most_run)){
                $top_most_row[] = $merge_data;
            }
            
            for($i=0;$i<count($top_most_row); $i++){
               // echo "<pre>";print_r($top_most_row);
                $comp_name   =   $top_most_row[$i]['company_name'];
                $prod_name   =   $top_most_row[$i]['product_name'];
                $details_id  =   $top_most_row[$i]['details_id'];
                ?>
                
            <div class="w3-third w3-margin-bottom top_most">
                <div class="w3-card-2 w3-container">
                <h6 class="w3-text-blue"><b><?php echo $comp_name." ".$prod_name;?></b></h6>
                  
                  <?php $top_sql = " select * from contact_type where details_id = '$details_id'";
                    $run = mysqli_query($conn,$top_sql);
                while($row=mysqli_fetch_assoc($run)){
                    
                
                    ?>  
                <p><?php echo $row['contact_value'];?></p>
                    <?php }?>
                
               
            </div>
            </div>
            
                         
        <?php 
            } 
        ?>
        </div>
        
    
    
   
        
    
        
    
    <div class="w3-card-4" id="main_catageory_list"> <!--main catagory list container start-->
     <div class="title-subtitle"> 
    <h5 class="widget-title w3-center">
       <b> Contact Details by Companies</b>
    
    </h5>
    </div>
   
        
        <?php       
            while($row = mysqli_fetch_assoc($query)) { 
               //echo "<pre>"; print_r($row);exit;
            $subcategory    =     explode(',',$row['subCatName']);
            $subCatId       =     explode(',',$row['subCatId']); 
                //echo "<pre>";print_r($subCatId);exit;
            $sub_cat_count  =     count($subcategory); 
                //echo $sub_cat_count;
               
        ?>
        <div class="w3-content w3-margin-bottom"><h3 class="w3-center"><?php echo $row['cat_name']; ?></h3>
         
        <div class="w3-row"> <!--main catagory start-->
            <?php for($i=0;$i<$sub_cat_count;$i++){ 
            $querys = "select company_id, company_name from company where company_sub_cat_id like '%$subCatId[$i]%' ";
            //echo $querys;exit;
             $results = mysqli_query($conn,$querys);
            
            ?>    
            
            <div class="w3-half">
               
       
        <ul>
             <h5 class="w3-text-blue w3-medium"><b><?php echo $subcategory[$i];?></b></h5>
            
          <?php  while($company = mysqli_fetch_assoc($results)) { 
           // echo "<pre>"; print_r($company);
            ?>
            <li><a href="details1.php?subcat_name=<?php echo $subcategory[$i];?> &comp_name=<?php echo $company['company_name'];?>"><?php echo $company['company_name'] ;?></a></li> <?php } ?>
           
            <li><a href="#" class="w3-btn w3-margin-top w3-red w3-hover-green">View all</a></li>
            
        </ul>
            </div>
            <?php } ?>  
            </div>
          
        </div>
           
       
  
        
     <?php } ?> 
    <?php mysqli_close($conn); ?>
        
        
    </div><!--main catagory end-->
        
    </div><!--left column end-->
    

 
    
    
    <!-- right coloumn start-->
    
    <?php  include 'rightsidenavigation.php';?><!--include rightsidenavigation.php file-->
    
	 <!-- right column end-->
    </div>
    
	</div><!--main container end-->
	 
   

    <!--footer start-->

<?php include 'footer.php';?> <!--include footer.php file-->

	<!--footer end-->
