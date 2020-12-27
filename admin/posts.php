<?php include('../config.php'); ?>
<?php include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
<?php include(ROOT_PATH . '/admin/post_functions.php');
$titles = "Posts" ?>
<?php include(ROOT_PATH . '/admin/includes/head.php'); ?>

<?php
// Get all admin posts from DB
$posts = getAllPosts();

?>

<body>

	<!-- admin navbar -->
	<?php include(ROOT_PATH . '/admin/includes/navbar.php') ?>
	<?php include(ROOT_PATH . '/admin/includes/banner.php') ?>


	<div class="container mt-20">

		<!-- Display records from DB-->
		<div class="table-div">

			<!-- Display notification message -->
			<?php include(ROOT_PATH . '/includes/messages.php') ?>
			<?php include(ROOT_PATH . '/includes/errors.php') ?>


			<?php if (empty($posts)) : ?>
				<h1 style="text-align: center; margin-top: 20px;">No posts in the database.</h1>
			<?php else : ?>
				<table class="table table-hover">
					<tr>
						<thead>
							<th>N</th>
							<th>Author</th>
							<th>Title</th>
							<th>Views</th>
							<th><small>Published</small></th>
							<th><small>Edit</small></th>
							<?php if (in_array($_SESSION['user']['role'], ["Admin"])) { ?>
								<th><small>Delete</small></th>
							<?php } ?>
						</thead>
					</tr>
					<tbody>
						<?php foreach ($posts as $key => $post) : ?>
							<tr>
								<td><?php echo $key + 1; ?></td>
								<td><?php echo $post['author']; ?></td>
								<td>
									<a class="red" target="_blank" href="<?php echo BASE_URL . 'single_post.php?post-slug=' . $post['slug'] ?>">
										<?php echo $post['title']; ?>
									</a>
								</td>
								<td><?php echo $post['views']; ?></td>
								<td>
									<?php if ($post['published'] == true) : ?>
										<a class="publish  btn btn-success" href="posts.php?publish=<?php echo $post['id'] ?>">
											<i class="lni lni-checkmark"></i> </a>
									<?php else : ?>

										<a class="unpublish btn btn-danger" href="posts.php?unpublish=<?php echo $post['id'] ?>">
											<i class="lni lni-close"></i> </a>
									<?php endif ?>
								</td>
								<td>
									<a class="edit btn btn-primary" href="create_post.php?edit-post=<?php echo $post['id'] ?>">
										<i class="lni lni-pencil"></i>
									</a>
								</td>
								<?php if (in_array($_SESSION['user']['role'], ["Admin"])) { ?>
								<td>
									<a class="delete btn btn-danger" href="create_post.php?delete-post=<?php echo $post['id'] ?>">
										<i class=" lni lni-trash"></i>
									</a>
								</td>
								<?php } ?>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			<?php endif ?>
		</div>
		<!-- // Display records from DB -->

	</div>

</body>

</html>