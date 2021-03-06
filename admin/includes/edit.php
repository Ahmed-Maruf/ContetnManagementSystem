<?php



if(isset($_GET['p_id'])) {

	$p_id = $_GET['p_id'];
}
	$query = "SELECT * FROM posts WHERE post_id = $p_id";
	$selec_post_id = mysqli_query($connection, $query);

	if(!$selec_post_id){
		die("I am dying". mysqli_error($connection));
	}

	while($row = mysqli_fetch_assoc($selec_post_id)) {
		$post_id = $row['post_id'];
		$post_title = $row['post_title'];
		$post_author = $row['post_author'];
		$post_category_id = $row['post_category_id'];
		$post_status = $row['post_status'];
		$post_image = $row['post_image'];
		$post_tags = $row['post_tags'];
		$post_comment_count = $row['post_comment_count'];
		$post_date = $row['post_date'];
		$post_content = $row['post_content'];
	}

	if(isset($_POST['update_post'])){
		$post_title = $_POST['title'];
		$post_author = $_POST['author'];
		$post_category_id = $_POST['post_category'];
		$post_status = $_POST['post_status'];
		$post_image = $_FILES['image']['name'];
		$post_image_temp = $_FILES['image']['tmp_name'];
		$post_tags = $_POST['post_tags'];
		$post_content = $_POST['post_content'];
		$post_date = date('d-m-y');
		$post_comment_count = 4;

		move_uploaded_file($post_image_temp,"../images/$post_image");

		if(empty($post_image)){
			$query = "SELECT * FROM posts WHERE post_id = $p_id";
			$selct_image = mysqli_query($connection,$query);
			while($row = mysqli_fetch_assoc($selct_image)){
				$post_image = $row['post_image'];
			}
		}
		$query = "UPDATE posts SET post_title = '{$post_title}', post_category_id = '{$post_category_id}', post_date = now(),
	post_author = '{$post_author}', post_status = '{$post_status}', post_tags = '{$post_tags}', post_content = '{$post_content}',
	post_title = '{$post_title}', post_image = '{$post_image}' WHERE post_id = '{$p_id}'";

		$update_post = mysqli_query($connection,$query);

		if(!$update_post){
			die("FAILED UPDATING" . mysqli_error($connection));
		}
	}

?>

<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="title">Post Title</label>
		<input value="<?php echo $post_title; ?>"type="text" class="form-control" name="title">
	</div>

	<div class="form-group">
		<label for="post_category">Post Category</label><br>

		<select name="post_category" id="">

			<?php
			$query = "SELECT * FROM categories";
			$selec_categories = mysqli_query($connection, $query);

			while($row = mysqli_fetch_assoc($selec_categories)) {
				$cat_id = $row['cat_id'];
				$cat_title = $row['cat_title'];
				echo "<option value='$cat_id'>{$cat_title}</option>";
			}
			?>

		</select>
	</div>

	<div class="form-group">
		<label for="title">Post Author</label>
		<input value="<?php echo $post_author; ?>" type="text" class="form-control" name="author">
	</div>

	<div class="form-group">
		<label for="post_status">Post Status</label>
		<input value="<?php echo $post_status; ?>"type="text" class="form-control" name="post_status">
	</div>

	<!--<div class="form-group">
		<label for="image">Post Image</label><br>
		<img width="100" src="../images/<?php /*echo $post_image*/?>">
	</div>-->

	<div class="form-group">
		<label for="post_image">Post Image</label>
		<img width="100" src="../images/<?php echo $post_image?>">
		<input type="file" name="image">
	</div>

	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input value="<?php echo $post_tags; ?>"type="text" class="form-control" name="post_tags">
	</div>

	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo $post_content;?></textarea>
	</div>

	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
	</div>

</form>