<form action="" method="post">

	<div class="form-group">
		<label for="cat-title">Update Category</label>

		<?php
		request_An_Update_Input();
		?>

		<?php
		update_A_Category();
		?>

	</div>

	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="update" value="update">
	</div>

</form>