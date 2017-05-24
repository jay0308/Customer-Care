<?php include"header.php" ;
	$sql = "SELECT * from posts";
	$result  = mysqli_query($conn,$sql);
	$total_record = mysqli_num_rows($result);
	$data_per_page = 5;
	$total_page = ceil($total_record/$data_per_page);
	$page =1;
	$start=0;
	if (isset($_GET['page'])) {
		# code...
		$page = $_GET['page'];
	}

	if ($page==1) {
		# code...
		$start = 0;
	}
	else{
		$start = $page * $data_per_page - $data_per_page;
	}
	
?>
<body>

	<div class="w3-row">	
		<div class="w3-col l12">
			<div class="banner-image">
				<h1 class="header">
					Customer news
				</h1>
			</div>
		</div>
	</div>
	<div class="page-center">
		<div class="w3-row">
			<div class="w3-col l12">
				<?php
					$sql = "SELECT * from posts limit ".$start.",".$data_per_page;
					$run  = mysqli_query($conn,$sql);
					while ($row = mysqli_fetch_assoc($run)) {
						# code...
						echo "<div class='post-header'><h2><a href='post-page.php?post-id=".$row['post_id']."'>".$row['title']."</a></h2></div>";
						echo "<div class='post-byline'>".$row['post_date']."</div>";
						echo "<div class='post-body'>".$row['brief_description']."</div>";
					}
					echo "<div class='pagination'>";
					if ($page!=1) {
						# code...

						echo "<a class='previous-link' href='news.php?page=".($page-1)."'>Previous</a>";
					}
					for ($i=1; $i <= $total_page  ; $i++) { 
						# code...
						if ($i==$page) {
						# code...
							echo "<a class='active' href='news.php?page=".$i."' style='text-decoration:none;'>".$i."</a>";
						}
						else
							echo "<a href='news.php?page=".$i."' style='text-decoration:none;'>".$i."</a>";
					}
					if ($page!=$total_page) {
						# code...
						echo "<a  class='next-link' href='news.php?page=".($page+1)."'>Next</a>";
					}
					echo "</div>";
				?>
			</div>
		</div>	
	</div>
	

</body>
<?php include"footer.php" ;?>