<?php include('../config.php'); ?>
<?php include(ROOT_PATH . '/admin/includes/admin_functions.php');
$titles = "Topics" ?>

<?php include(ROOT_PATH . '/admin/includes/head.php'); ?>

<?php
// Get all topics from DB
$topics = getAllTopics();
?>

<body>

	<!-- admin navbar -->
	<?php include(ROOT_PATH . '/admin/includes/navbar.php') ?>
	<?php include(ROOT_PATH . '/admin/includes/banner.php') ?>


	<div class="container mt-20">
		<!-- to create and edit -->
		<h1 class="page-title">Create/Edit Topics</h1>
		<div class="row">
			<div class="col">
				<form class="form-form" method="post" action="">

					<!-- validation errors for the form -->
					<?php include(ROOT_PATH . '/includes/errors.php') ?>

					<!-- if editing topic, the id is required to identify that topic -->
					<?php if ($isEditingTopic === true) : ?>
						<input class="form-control mb-20" type="hidden" name="topic_id" value="<?php echo $topic_id; ?>">
					<?php endif ?>

					<input class="form-control mb-20 mt-20" type="text" name="topic_name" value="<?php echo $topic_name; ?>" placeholder="Topic">


					<!-- if editing topic, display the update button instead of create button -->
					<?php if ($isEditingTopic === true) : ?>
						<button type="submit" class=" btn btn-primary float-right" name="update_topic">UPDATE</button>
					<?php else : ?>
						<button type="submit" class=" btn btn-primary float-right" name="create_topic">Save Topic</button>
					<?php endif ?>

				</form>
				<!-- // to create and edit -->
			</div>
			<div class="col">
				<!-- Display records from DB-->
				<div class="table-div">

					<!-- Display notification message -->
					<?php include(ROOT_PATH . '/includes/messages.php') ?>
					<?php include(ROOT_PATH . '/includes/errors.php') ?>


					<?php if (empty($topics)) : ?>
						<h1>No topics in the database.</h1>
					<?php else : ?>
						<table class="table table-hover">
							<thead>
								<th>N</th>
								<th>Topic Name</th>
								<?php if (in_array($_SESSION['user']['role'], ["Admin"])) { ?>
									<th colspan="2">Action</th>
								<?php } ?>
							</thead>
							<tbody>
								<?php foreach ($topics as $key => $topic) : ?>
									<tr>
										<td><?php echo $key + 1; ?></td>
										<td><?php echo $topic['name']; ?></td>
										<?php if (in_array($_SESSION['user']['role'], ["Admin"])) { ?>

											<td>
												<a class=" btn btn-primary" href="topics.php?edit-topic=<?php echo $topic['id'] ?>">
													<i class=" lni lni-pencil"></i>
												</a>
											</td>

											<td>
												<a class=" btn btn-danger" href="topics.php?delete-topic=<?php echo $topic['id'] ?>">
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
		</div>






	</div>

</body>

</html>