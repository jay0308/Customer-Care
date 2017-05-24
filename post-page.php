
<?php include"header.php" ;
	
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
					$pId = $_GET['post-id'];
					$sql = "SELECT * from posts where post_id = '$pId' ";
					$run  = mysqli_query($conn,$sql);
					while ($row = mysqli_fetch_assoc($run)) {
						# code...
						echo "<div class='post-header'><h1>".$row['title']."</h1></div>";
						echo "<div class='post-body'>".$row['content']."</div>";
					}
				?>
			</div>
		</div>	
	</div>
	

</body>
<?php include"footer.php" ;?>