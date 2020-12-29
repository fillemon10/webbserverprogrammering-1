<?php include('../config.php'); ?>
<?php include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
<?php include(ROOT_PATH . '/admin/includes/review_functions.php');
$titles = "Reviews" ?>
<?php include(ROOT_PATH . '/admin/includes/head.php'); ?>

<?php
// Get all admin reviews from DB
$reviews = getAllreviews();

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

            <?php if (empty($reviews)) : ?>
                <h1 style="text-align: center; margin-top: 20px;">No reviews in the database.</h1>
            <?php else : ?>
                <table class="table table-hover table-bordered">
                    <tr>
                        <thead>
                            <th>N</th>
                            <th>Author</th>

                            <th>Cinemania Rating</th>
                            <th>Title Of</th>
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
                        <?php foreach ($reviews as $key => $review) : ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $review['author']; ?></td>
                                <td><?php echo $review['our_rating']; ?></td>
                                <td><?php echo $review['title_of']; ?></td>
                                <td>
                                    <a class="red" target="_blank" href="<?php echo BASE_URL . 'single_review?review-slug=' . $review['slug'] ?>">
                                        <?php echo $review['title']; ?>
                                    </a>
                                </td>
                                <td><?php echo $review['views']; ?></td>
                                <td>
                                    <?php
                                    if ($review['published'] == true) : ?>
                                        <a class="publish  btn btn-success" href="reviews?publish=<?php echo $review['id'] ?>">
                                            <i class="lni lni-checkmark"></i> </a>
                                    <?php else : ?>
                                        <a class="unpublish btn btn-danger" href="reviews?unpublish=<?php echo $review['id'] ?>">
                                            <i class="lni lni-close"></i> </a>
                                    <?php endif ?>
                                </td>
                                <td>
                                    <a class="edit btn btn-primary" href="create_review?edit-review=<?php echo $review['id'] ?>">
                                        <i class="lni lni-pencil"></i>
                                    </a>
                                </td>
                                <?php if (in_array($_SESSION['user']['role'], ["Admin"])) { ?>
                                    <td>
                                        <a class="delete btn btn-danger" href="create_review?delete-review=<?php echo $review['id'] ?>">
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