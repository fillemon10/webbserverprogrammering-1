<?php include('../config.php'); ?>

<?php $titles = "Dashboard";
include(ROOT_PATH . '/admin/includes/head.php');
include(ROOT_PATH . '/admin/includes/dashboard_functions.php')
?>

<body>
	<!-- admin navbar -->
	<?php include(ROOT_PATH . '/admin/includes/navbar.php') ?>

	<?php include(ROOT_PATH . '/admin/includes/banner.php') ?>

	<section class="feature-section pt-50 pb-20">
		<div class="container">
			<!-- Display notification message -->
			<?php include(ROOT_PATH . '/includes/messages.php') ?>
			<?php include(ROOT_PATH . '/includes/errors.php') ?>
			<div class="row">
				<div class="col-xl-4 col-lg-7 col-md-9 mx-auto">
					<div class=" box-style">
						<h3>New Users</h3>
						<p class="display-4"><?php echo countNewUsers() ?></p>
					</div>
				</div>
				<div class="col-xl-4 col-lg-7 col-md-9 mx-auto">
					<div class=" box-style">
						<h3>Published Reviews</h3>
						<p class="display-4"><?php echo countPublishedReviews() ?></p>
					</div>
				</div>
				<div class="col-xl-4 col-lg-7 col-md-9 mx-auto">
					<div class=" box-style">
						<h3>Published Posts</h3>
						<p class="display-4"><?php echo countPublishedPosts() ?></p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-4 col-lg-7 col-md-9 mx-auto">
					<div class=" box-style">
						<h3>Total Users</h3>
						<p class="display-4"><?php echo countUsers() ?></p>
					</div>
				</div>
				<div class="col-xl-4 col-lg-7 col-md-9 mx-auto">
					<div class=" box-style">
						<h3>Total Comments</h3>
						<p class="display-4"><?php echo countComments() ?></p>
					</div>
				</div>
				<div class="col-xl-4 col-lg-7 col-md-9 mx-auto">
					<div class=" box-style">
						<h3>Admin Users</h3>
						<p class="display-4"><?php echo countAdminUsers() ?></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php include('../includes/js.php'); ?>



</body>

</html>
