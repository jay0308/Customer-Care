<!doctype html>
<html>
<head>
    <?php include'header.php'; ?>
    <?php 
       
        
        if(isset($_GET['comp_name']))
        {
           $compname = $_GET['comp_name'];
        }
        if(isset($_GET['subcat_name']))
        {
           $subcatname = $_GET['subcat_name'];
        }
        
        $sql = "SELECT GROUP_CONCAT(DISTINCT contact_type.contact_key SEPARATOR ',') AS contact_key,GROUP_CONCAT(DISTINCT contact_type.contact_value SEPARATOR ':') AS contact_value, details.location FROM details INNER JOIN contact_type ON contact_type.details_id = details.details_id where details.sub_cat_name='$subcatname' and details.company_name='$compname' GROUP BY details.location"; 
      // echo $sql;exit; 
        $output =   mysqli_query($conn, $sql); 
        
    
    
    ?>

  <!--search box start-->
    <form class=" w3-center" style="margin-top:40px;">
        <h3 class="w3-text-blue"><?php echo $compname." ".$subcatname; ?></h3>
        <input type="text" placeholder="enter the location" name="find" style="width:300px;" class="w3-margin-bottom">
        <input type="submit" value="Search" name="search">
    </form>
  
	 <!--search box end-->


	
 
 <div class="w3-content" style="margin-top: 100px;"> <!--main container start-->


<div class="w3-row"><!--grid view start-->
 
	
<div class="w3-margin-bottom w3-threequarter" style="padding-right:15px;"> <!--left coloum start-->
<div class="w3-card-2 w3-container w3-padding-64">
<?php while($row=mysqli_fetch_assoc($output)) {
    $contact = explode(',',$row['contact_key']);
    $keycount = count($contact);
    //echo"<pre>";print_r($contact);exit;
    $contactvalue   =  explode(':',$row['contact_value']);
    //echo "<pre>";print_r($contactvalue);exit;
    
    $i = 0;
    ?>
    <div class="w3-container w3-responsive"> <!-- table container start-->
    <h1 class="w3-center" style="color:#2196F3;"><?php echo $row['location'];?></h1>
    <table class="w3-table-all">
    <tr class="w3-orange w3-text-white">
        <th>Contact Type</th>
        <th>Details</th>
        
    </tr>
        <?php for($i=0;$i<$keycount;$i++){?>
    <tr class="w3-white w3-text-black">
        
        <th><?php echo $contact[$i];?></th>
        <td><?php echo $contactvalue[$i]; ?></td>
       
    </tr>
        <?php }?>
        
    </table>
	
	</div> <!-- table container end here--> 
<?php } ?>	
    </div> 
	</div> <!--left coloum end here-->
	<div class="w3-margin-bottom w3-quarter "> <!-- right coloumn start-->

		<div class="w3-card-2 w3-padding-64">
			<div class="w3-center">
			<img src="assets/css/advertise.png" style="width:200px; height: 600px;" class="w3-border w3-border-blue-gray">
			</div>
		
		</div>
		</div> <!-- right coloumn end here-->
	</div> <!--grid view end here-->
	</div> <!--main container start-->
    
    
    
    <!--footer start-->
    
    <?php include 'footer.php';?>
    
	 <!--footer end here-->


	






