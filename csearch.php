<?php include 'header.php';?>

    <?php

        if(isset($_GET['search'])){
            $search    =   $_GET['search'];            
            $search_query   =  "select c.company_id, c.company_name, prd.product_id, prd.product_name from company c INNER JOIN product prd on prd.company_id=c.company_id where c.company_name='$search'";
			$results = mysqli_query($conn,$search_query);
        }
    ?>

  <!--search box start-->
    <form class=" w3-center" style="margin-top:40px;">
        <h3 class="w3-text-blue"><?php echo $search;?></h3>
        <input type="text" placeholder="Product" style="width:300px;" class="w3-margin-bottom">
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
            if(mysqli_num_rows($results)>0){
                while($row=mysqli_fetch_assoc($results))
                {
                    $count = $count+1;
                    $companyName = $row['company_name'];
                    $product_name = $row['product_name'];
                ?>   
            <p><a href="details1.php?subcat_name=<?php echo $product_name; ?>&comp_name=<?php echo $companyName ?>" class="w3-btn w3-teal"><?php echo $product_name;?></a></p>
            <?php }}?>
        
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
