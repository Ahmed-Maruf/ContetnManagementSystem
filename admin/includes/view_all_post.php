
<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<th>Id</th>
			<th>Author</th>
			<th>Title</th>
			<th>Category</th>
			<th>Status</th>
			<th>Image</th>
			<th>Tags</th>
			<th>Comments</th>
			<th>Date</th>
		</tr>
	</thead>

	<tbody>
		<?php
		$query = "SELECT * FROM posts";
		$selec_post = mysqli_query($connection,$query);

		while($row = mysqli_fetch_assoc($selec_post)){
			$post_id = $row['post_id'];
			$post_title = $row['post_title'];
			$post_author = $row['post_author'];
			$post_category_id = $row['post_category_id'];
			$post_status = $row['post_status'];
			$post_image = $row['post_image'];
			$post_tags = $row['post_tags'];
			$post_comment_count = $row['post_comment_count'];
			$post_date = $row['post_date'];

			echo "<tr>";
			echo "<td>$post_id</td>";
			echo "<td>$post_author</td>";
			echo "<td>$post_title</td>";

				$query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
				$selec_categories = mysqli_query($connection, $query);

				while($row = mysqli_fetch_assoc($selec_categories)) {
					$cat_id = $row['cat_id'];
					$cat_title = $row['cat_title'];
					echo "<td>{$cat_title}</td>";
				}
			echo "<td>$post_status</td>";
			echo "<td><img width='100' class='img-responsive' src='../images/$post_image'></td>";
			echo "<td>$post_tags</td>";
			echo "<td>$post_comment_count</td>";
			echo "<td>$post_date</td>";
			echo "<td><a href='post.php?source=edit_post&p_id={$post_id}'>UPDATE</a></td>";
			echo "<td><a href='post.php?delete={$post_id}'>DELETE</a></td>";
			echo "</tr>";
		}
		?>
	</tbody>


</table>

<?php

if(isset($_GET['delete'])){

	$Thepost_id = $_GET['delete'];
	$query = "DELETE FROM posts WHERE post_id = {$Thepost_id}";

	$delte_query = mysqli_query($connection,$query);

	if(!$delte_query){
		die("QUERY FAILED" . mysqli_error($connection));
	}

	header("Location: post.php");
}
?>