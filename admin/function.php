<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 8/9/2017
 * Time: 8:29 PM
 */

function insert_categories() {

	global $connection;
	if(isset($_POST['submit'])) {
		$cat_title = $_POST['cat_title'];

		if($cat_title == "" || empty($cat_title)) {
			echo "This field should not be empty";
		} else {
			$query = "INSERT INTO categories(cat_title) VALUES ('$cat_title')";

			$create_Category = mysqli_query($connection, $query);

			if(!$create_Category) {
				die("Query Failed" . mysqli_error($connection));
			}
		}
	}
}

function findAllCategories() {
	global $connection;
	$query = "SELECT * FROM categories";
	$selec_categories = mysqli_query($connection, $query);

	while($row = mysqli_fetch_assoc($selec_categories)) {
		$cat_id = $row['cat_id'];
		$cat_title = $row['cat_title'];
		echo "<tr></tr>";
		echo "<td>{$cat_id}</td>";
		echo "<td>{$cat_title}</td>";
		echo "<td><a href='categories.php?delete={$cat_id}'>DELETE</a></td>";
		echo "<td><a href='categories.php?update={$cat_id}'>UPDATE</a></td>";
		echo "<tr></tr>";
	}
}

function delete_A_Category() {
	global $connection;
	if(isset($_GET['delete'])) {
		$cat_id_delete = $_GET['delete'];
		$query = "DELETE FROM categories WHERE cat_id = {$cat_id_delete}";
		$delete_query = mysqli_query($connection, $query);

		if(!$delete_query) {
			die("QUERY FAILED" . mysqli_error($connection));
		}
		header("Location: categories.php");
	}
}


function update_A_Category() {
	global $connection;
	if(isset($_POST['update'])) {
		$cat_id = $_GET['update'];
		$the_cat_title = $_POST['cat_title'];
		$query = "UPDATE categories SET cat_title = '$the_cat_title' WHERE cat_id = $cat_id";
		$update_query = mysqli_query($connection, $query);

		if(!$update_query) {
			die("Query Failed" . mysqli_error($connection));
		}
		header("Location: categories.php");
	}

}


//After clicking the update link an input level is generated for taking input!!!
function request_An_Update_Input() {
	global $connection;
	if(isset($_GET['update'])) {
		$cat_id = $_GET['update'];

		$query = "SELECT * FROM categories WHERE cat_id = $cat_id";
		$selec_categories = mysqli_query($connection, $query);

		while($row = mysqli_fetch_assoc($selec_categories)) {
			$cat_id = $row['cat_id'];
			$cat_title = $row['cat_title'];

			?>
			<input value="<?php if(isset($cat_title)) {
				echo $cat_title;
			} ?>" class="form-control" type="text" name="cat_title">
			<?php
		}
	}
	?>
	<?php
}

?>