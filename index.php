
<!--All Header files -->
<?php include "includes/header.php";
include "includes/db.php"; ?>


<!-- Navigation -->
<?php include "includes/navigation.php"; ?>


<!-- Page Content -->
<div class="container">

	<div class="row">

		<!-- Blog Entries Column -->
		<div class="col-md-8">

			<?php
			//Query for selecting from post_row in the database!!!
			$query = "SELECT * FROM posts";

			//Connecting the query to the database!!!
			$selectAllPost = mysqli_query($connection, $query);

			if(!$selectAllPost) {
				echo mysqli_error($connection);
			}
			//Fetching all the data into an associate array from the database!!!
			while($row = mysqli_fetch_assoc($selectAllPost)) {

				$post_id = $row['post_id']; //'post_id' is the attributes given in the database table
				$post_title = $row['post_title'];
				$post_author = $row['post_author'];
				$post_date = $row['post_date'];
				$post_image = $row['post_image'];
				$post_content = substr($row['post_content'],0,100). "....";
				?>

				<h1 class="page-header">
					Page Heading
					<small>Secondary Text</small>
				</h1>

				<!-- First Blog Post -->
				<h2>
					<a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a> <!-- ?p_id is the key source for getting the url
					by global $_GET['p_id']-->
				</h2>

				<p class="lead">
					by <a href="index.php"><?php echo $post_author; ?></a>
				</p>
				<p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?> </p>
				<hr>
				<img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
				<hr>
				<p><?php echo $post_content ?></p>
				<a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

				<hr>

				<?php
			}
			?>

		</div>

		<!-- Blog Sidebar Widgets Column -->
		<?php
		include "includes/sidebar.php";
		?>

	</div>
	<!-- /.row -->

	<hr>

<?php
include "includes/footer.php";
?>