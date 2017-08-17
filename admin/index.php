<?php
include "includes/header.php";
?>


	<div id="wrapper">


<?php
///Why this ??????
if(!$connection) {
	die("Connection Failed" . mysqli_error($connection));
}
?>

	<!-- Navigation -->
<?php
include "includes/navigation.php";
?>


	<div id="page-wrapper">

		<div class="container-fluid">

			<!-- Page Heading -->
			<div class="row">
				<div class="col-lg-12">


					<h1 class="page-header">
						Welcome to admin
						<small>Author</small>
					</h1>

				</div>
			</div>
			<!-- /.row -->

		</div>
		<!-- /.container-fluid -->

	</div>
	<!-- /#page-wrapper -->
<?php
include "includes/footer.php";
?>