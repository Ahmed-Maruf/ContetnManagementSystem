
<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<th>Id</th>
			<th>Author</th>
			<th>Comments</th>
			<th>Email</th>
			<th>Status</th>
			<th>In Response to</th>
			<th>Date</th>
			<th>Approve</th>
			<th>Unapprove</th>
			<th>Delete</th>
		</tr>
	</thead>

	<tbody>
		<?php
		$query = "SELECT * FROM comments";
		$selec_comments = mysqli_query($connection,$query);

		while($row = mysqli_fetch_assoc($selec_comments)){
			$comment_id = $row['comment_id'];
			$comment_post_id = $row['comment_post_id'];
			$comment_author = $row['comment_author'];
			$comment_email = $row['comment_email'];
			$comment_status = $row['comment_status'];
			$comment_date = $row['comment_date'];
			$comment_content = $row['comment_content'];
			echo "<tr>";
			echo "<td>$comment_id</td>";
			echo "<td>$comment_author</td>";
			echo "<td>$comment_content</td>";

/*
			$query = "SELECT * FROM categories WHERE cat_id = $comment_post_id";
			$selec_categories = mysqli_query($connection, $query);

			while($row = mysqli_fetch_assoc($selec_categories)) {
				$cat_id = $row['cat_id'];
				$cat_title = $row['cat_title'];
				echo "<td>{$cat_title}</td>";
			}*/
			echo "<td>$comment_email</td>";
			echo "<td>$comment_status</td>";

			$query = "SELECT * FROM posts WHERE post_id = $comment_post_id";

			$select_post_id_query = mysqli_query($connection,$query);

			if(!$select_post_id_query){
				die("QUERY FAILED" . mysqli_error($connection));
			}
			while($row = mysqli_fetch_assoc($select_post_id_query)){
				$post_id = $row['post_id'];
				$post_title = $row['post_title'];
				echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
			}
			echo "<td>$comment_date</td>";
			echo "<td><a href='comments.php?approve={$comment_id}&p_id={$post_id}'>Approve</a></td>";
			echo "<td><a href='comments.php?unapprove={$comment_id}'>Unapprove</a></td>";
			echo "<td><a href='comments.php?delete={$comment_id}'>DELETE</a></td>";
			echo "</tr>";
		}
		?>
	</tbody>


</table>

<?php

if(isset($_GET['delete'])){

	$the_comment_id = $_GET['delete'];
	$query = "DELETE FROM comments WHERE comment_id = {$the_comment_id}";

	$delte_query = mysqli_query($connection,$query);

	if(!$delte_query){
		die("QUERY FAILED" . mysqli_error($connection));
	}

	header("Location: comments.php");
}

if(isset($_GET['unapprove'])){

	$the_comment_id = $_GET['unapprove'];
	$query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = {$the_comment_id}";

	$unapprove_query = mysqli_query($connection,$query);

	if(!$unapprove_query){
		die("QUERY FAILED" . mysqli_error($connection));
	}

	header("Location: comments.php");
}

if(isset($_GET['approve'])){

	$the_comment_id = $_GET['approve'];
	$the_comment_post_id = $_GET['p_id'];
	$query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = {$the_comment_id}";

	$approve_query = mysqli_query($connection,$query);

	if(!$approve_query){
		die("QUERY FAILED" . mysqli_error($connection));
	}

	$query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = {$the_comment_post_id}";

	$incrementcomment = mysqli_query($connection,$query);

	if(!$incrementcomment){
		die("QUERY FAILED" . mysqli_error($connection));
	}

	header("Location: comments.php");
}
?>