<?php include 'header.php';?>

    <?php

        if(isset($_GET['viewallComp'])){
            $viewallid    =   $_GET['viewallComp'];
            $sub_cat_query  =   "select * from sub_category where sub_cat_id = '$viewallid'";
            $sub_cat_query_run = mysqli_query($conn,$sub_cat_query);
            $sub_cat_row    =   mysqli_fetch_assoc($sub_cat_query_run);
            $subCatName     =   $sub_cat_row['sub_cat_name'];
        }
    ?>

  <!--search box start-->
    <form class=" w3-center" style="margin-top:40px;">
        <h3 class="w3-text-blue"><?php echo $subCatName;?></h3>
        <input type="text" placeholder="company" style="width:300px;" class="w3-margin-bottom">
        <input type="submit" value="Search" name="search">
    </form>  
  <!--search box end here-->
 
 <div class="w3-content" style="margin-top: 100px;">
<!--grid view-->

<div class="w3-row-padding">
	
<div class="w3-margin-bottom w3-twothird"><!--left coloum start--> 
<div class="w3-card-2 w3-container w3-padding-64">
    <div class="w3-container">
    <div class="w3-row-padding">
        <div class="w3-half">
            <?php 
            //$allCompQuery   =   " select * from company where company_sub_cat_id like  '%$viewallid%' and company_status = '1'";
			$allCompQuery = "select * from company where FIND_IN_SET(".$viewallid.", company_sub_cat_id) AND company_status='1'";
            //echo $allCompQuery;
            $allResult  =   mysqli_query($conn,$allCompQuery);
            if(mysqli_num_rows($allResult)>0){
                $count = 2;
                while($row=mysqli_fetch_assoc($allResult))
                {
                    $count = $count+1;
                    $companyName = $row['company_name'];
                    if(($count % 2) == 1){ ?>
                 
            <p><a href="details1.php?subcat_name=<?php echo $subCatName; ?>&comp_name=<?php echo $companyName ?>" class="w3-btn w3-teal"><?php echo $companyName;?></a></p>
            <?php }}}?>
        
        </div>
        <div class="w3-half">
            <?php 
            $allCompQuery = "select * from company where FIND_IN_SET(".$viewallid.", company_sub_cat_id) AND company_status='1'";
            //echo $allCompQuery;
            $allResult  =   mysqli_query($conn,$allCompQuery);
            if(mysqli_num_rows($allResult)>0){
                $count = 2;
                while($row=mysqli_fetch_assoc($allResult))
                {
                    $count = $count+1;
                    $companyName = $row['company_name'];
                    if(($count % 2) == 0){ ?>
               
            <p><a href="details1.php?subcat_name=<?php echo $subCatName; ?>&comp_name=<?php echo $companyName; ?>" class="w3-btn w3-teal"><?php echo $companyName;?></a></p>
            <?php }}}?>
            
        
        </div>
    
    
    </div>
        </div>
	</div>
	</div> <!--left column end here-->
	<div class="w3-margin-bottom w3-third"> <!--right column start-->

		<div class="w3-card-2 w3-container w3-padding-64">
			<div class="w3-container">
			<img src="assets/css/advertise.png" style="width:250px; height: 600px;" class="w3-border w3-border-blue-gray">
			</div>
		
		</div>
		</div> <!--right coloumn end here-->
	</div>
	</div>
	
    <?php include 'footer.php';?>
