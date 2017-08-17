<?php
include "includes/header.php";
?>
	<div id="wrapper">

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


					<?php
					if(isset($_GET['source'])){
						$source = $_GET['source'];
					}
					else{
						$source = '';
					}
					switch($source){
						case 'add_post':
							include "includes/add_post.php";
							break;
						case 'edit_post':
							include "includes/edit.php";
							break;
						case '10':
							echo "NICE 10";
							break;
						default:
							include "includes/view_all_post.php";
							break;

					}
					?>


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