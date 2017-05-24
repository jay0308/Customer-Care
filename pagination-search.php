<!doctype html>
<html>
<head>
<?php include'header.php'; ?>
<div class="body-container-wrapper">
<?php
	// pagination function 
	function createPagination($query,$total_data,$data_per_page){
		include 'config/connection.php';
			$search    =   $_GET['search'];    
		$total_page = ceil($total_data/$data_per_page);
			$page=1;
			if (isset($_GET['page'])) {
				# code...
				$page = $_GET['page'];

			
			}
			$start=0;
			if ($page==1) {
				# code...
				$start=0;


			}
			else{

				$start = $page * $data_per_page - $data_per_page;


			}


			$query = $query." limit ".$start.",".$data_per_page ;
			/*$query = "SELECT * from details where company_name ="."'".$search."'";*/

			$result  = mysqli_query($conn,$query);
			if (mysqli_num_rows($result)>0) {
			# code...
				echo "<div class='result-header'>
							<span class='col-company'>Company Name</span>
							<span class='col-product'>Product Name</span>
							<span class='col-location'>Location</span>
							<span class='col-contact'>Contact Type</span>
							<span class='col-details'>Details</span>
					</div>";
				while ($row = mysqli_fetch_array($result)) {
					# code...
					
					echo "<div class='section-wrapper'>"."<span class='col-company'>".$row['company_name']."</span><span class='col-product'>".$row['sub_cat_name']."</span><span class='col-location'>".$row['location']."</span><span class='col-contact'>".$row['contact_key']."</span><span class='col-details'>".$row['contact_value']."</div>";

				}
			}
			else{
				echo "<div class='section-wrapper' style='margin-top:30px;'>No Results Found</div>";
			}
			

			echo "<div class='pagination' style='text-align:center'>";
			if ($page!=1) {
				# code...

				echo "<a class='previous-link' href='pagination-search.php?search=".$search."&page=".($page-1)."'>Previous</a>";
			}	
				for($i=1;$i<=$total_page;$i++){
					if ($i==$page) {
						# code...
						echo "<a class='active' href='pagination-search.php?search=".$search."&page=".$i."' style='text-decoration:none;'>".$i."</a>";
					}
					else
						echo "<a href='pagination-search.php?search=".$search."&page=".$i."' style='text-decoration:none;'>".$i."</a>";
				}
			if ($page!=$total_page) {
				# code...
				echo "<a  class='next-link' href='pagination-search.php?search=".$search."&page=".($page+1)."'>Next</a>";
			}
			
			echo "</div>";
	}
	/*end of pagination function*/
	if(isset($_GET['search'])){

		$search    =   $_GET['search'];            
		
		
		if(substr_count($search,"~")==0){
			echo '<form class=" w3-center" style="margin-top:40px;">
						<!-- <h3 class="w3-text-blue"><?php echo $compname." ".$subcatname; ?></h3> -->
						<input autocomplete="off" type="text" placeholder="enter the product" name="search-product" id="search-product" style="width:300px;" class="w3-margin-bottom">
						<div id="productList"></div>
						<input autocomplete="off" type="text" placeholder="enter the location" name="search-location" id="search-location" style="width:300px;" class="w3-margin-bottom">
						<div id="locationList"></div>
					</form>';
			$query = "SELECT details.company_name, details.sub_cat_name, details.location, contact_type.contact_key, contact_type.contact_value from details Inner Join contact_type on details.details_id = contact_type.details_id where details.company_name = "."'".$search."'" ;
			/*$query = "SELECT * from details where company_name ="."'".$search."'";*/

			$result  = mysqli_query($conn,$query);
			$total_data = mysqli_num_rows($result);
			$data_per_page = 10;		
			createPagination($query,$total_data,$data_per_page);
			
		}

		if(substr_count($search,"~")==1){
			$splitted = split("~",$search);
			echo '<form class=" w3-center" style="margin-top:40px;">
						<!-- <h3 class="w3-text-blue"><?php echo $compname." ".$subcatname; ?></h3> -->
						<input autocomplete="off" type="text" placeholder="enter the location" name="search-location" id="search-location" style="width:300px;" class="w3-margin-bottom">
						<div id="locationList"></div>
					</form>';

					$query = "SELECT details.company_name, details.product_name, details.sub_cat_name, details.location, contact_type.contact_key, contact_type.contact_value from details Inner Join contact_type on details.details_id = contact_type.details_id where details.company_name = "."'".$splitted[0]."'"." && details.sub_cat_name = "."'".$splitted[1]."'";

			$result  = mysqli_query($conn,$query);
			$result  = mysqli_query($conn,$query);
			$total_data = mysqli_num_rows($result);
			$data_per_page = 10;		
			createPagination($query,$total_data,$data_per_page);
			
		}

		if(substr_count($search,"~")==2){
			$splitted = split("~",$search);
		
					$query = "SELECT details.company_name, details.product_name, details.sub_cat_name, details.location, contact_type.contact_key, contact_type.contact_value from details Inner Join contact_type on details.details_id = contact_type.details_id where details.company_name = "."'".$splitted[0]."'"." && details.sub_cat_name = "."'".$splitted[1]."'"." && details.location = "."'".$splitted[2]."'";

			$result  = mysqli_query($conn,$query);
			$result  = mysqli_query($conn,$query);
			$total_data = mysqli_num_rows($result);
			$data_per_page = 10;		
			createPagination($query,$total_data,$data_per_page);
		}
	}
?>

</div>
<script type="text/javascript">
	$(document).ready(function(){
		// for location name

				$( "#search-location" ).keyup(function(){
					var query = $(this).val();
					if(query!=''){
						$.ajax({
							url:"ajax-location-search.php",
							method:"POST",
							data:{query:query},
							success:function(data){
									$("#locationList").fadeIn();
									$("#locationList").html(data);
								}
						});
					}
				});

				$(document).on('click','#locationList li',function(){
					$('#search-location').val($(this).text());
					$('#locationList').fadeOut();
				});
				// end for location name

				// for product name
				$( "#search-product" ).keyup(function(){
					var query = $(this).val();
					if(query!=''){
						$.ajax({
							url:"ajax-product-search.php",
							method:"POST",
							data:{query:query},
							success:function(data){
									$("#productList").fadeIn();
									$("#productList").html(data);
								}
						});
					}
				});

				$(document).on('click','#productList li',function(){
					$('#search-product').val($(this).text());
					$('#productList').fadeOut();
				});
				// end for product name

				// submit form
				$(document).keypress(function(event) {
					  if (event.which == 13) {
					  	var returnParent = false;
					  	$('form input').each(function(){
					  		if($(this).val()==''){
					  			alert('Please fill all search query here...');
					  			returnParent = true;
				  				return false;
					  		}
					  	});
					  	if(returnParent){
					  		return false;
					  	}
					  	$('#productList').fadeOut();
					  	$('#locationList').fadeOut();
					  	$('form').fadeOut();
				    	var pName = $('#search-product').val();
						var lName = $('#search-location').val();
						$('.section-wrapper').each(function(){
							
							if(!($(this).find('.col-product').html()==pName && $(this).find('.col-location').html()==lName ) && pName===!"undefined")
								$(this).remove();

							if(!($(this).find('.col-location').html()==lName ))
								$(this).remove();
						});

						if($('.section-wrapper').length==0){
							$('.result-header').remove();
							$('.pagination').remove();
							$('.body-container-wrapper').append("<div class='section-wrapper' style='margin-top:30px;'>No Results Found</div>");
						}

				    }
				    
				});
				// end of submit form


	});
</script>    
<!--footer start-->
<?php include 'footer.php';?>
 <!--footer end here-->