<?php include('../config.php');
if (!in_array($_SESSION['user']['role'], ["Admin", "Moderator"])) {
    header("location: dashboard");
}
?>

<?php include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
<?php include(ROOT_PATH . '/admin/includes/comment_functions.php');
$titles = "Comments" ?>
<?php include(ROOT_PATH . '/admin/includes/head.php'); ?>

<?php
// Get all admin posts from DB
$review_comments = getReviewComments();
$post_comments = getPostComments();

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

            <h2 class="mb-10">Review Comments</h2>
            <?php if (empty($review_comments)) : ?>
                <h2 style="text-align: center; margin-top: 20px;">No review comments in the database.</h2>
            <?php else : ?>
                <table class="table table-hover table-bordered">
                    <tr>
                        <thead>
                            <th>N</th>
                            <th>Username</th>
                            <th>Text</th>
                            <th>Review/Reply to</th>
                            <th><small>Published</small></th>
                            <?php if (in_array($_SESSION['user']['role'], ["Admin"])) { ?>
                                <th><small>Delete</small></th>
                            <?php } ?>
                        </thead>
                    </tr>
                    <tbody>
                        <?php foreach ($review_comments as $key => $comment) : ?>
                            <?php $replies = GetReviewReplies($comment['id']); ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $comment['username']; ?></td>
                                <td><?php echo $comment['text']; ?></td>

                                <td>
                                    <a class="red" target="_blank" href="<?php echo BASE_URL . 'single_review?review-slug=' . $comment['slug'] ?>">
                                        '<?php echo $comment['title_of']; ?>' review:
                                        <?php echo $comment['title']; ?>

                                    </a>
                                </td>
                                <td>
                                    <?php if ($comment['published'] == true) : ?>
                                        <a class="publish  btn btn-success" href="comments?publish_review=<?php echo $comment['id'] ?>">
                                            <i class="fas fa-check"></i> </a>
                                    <?php else : ?>

                                        <a class="unpublish btn btn-danger" href="comments?unpublish_review=<?php echo $comment['id'] ?>">
                                            <i class="fas fa-times"></i> </a>
                                    <?php endif ?>
                                </td>

                                <?php if (in_array($_SESSION['user']['role'], ["Admin"])) { ?>
                                    <td>
                                        <a class="delete btn btn-danger" href="comments?delete-review-comment=<?php echo $comment['id'] ?>">
                                            <i class=" fas fa-trash"></i>
                                        </a>
                                    </td>
                                <?php } ?>
                            </tr>
                            <?php foreach ($replies as $value => $reply) { ?>
                                <tr>
                                    <td><?php echo $key + 1 ?></td>
                                    <td><?php echo $reply['username']; ?></td>
                                    <td><?php echo $reply['text']; ?></td>
                                    <td>
                                        <?php echo $reply['reply-to']; ?>
                                        </a>
                                    </td>
                                    <td>
                                        <?php if ($reply['published'] == true) : ?>
                                            <a class="publish  btn btn-success" href="comments?publish_review_reply=<?php echo $reply['id'] ?>">
                                                <i class="fas fa-check"></i> </a>
                                        <?php else : ?>

                                            <a class="unpublish btn btn-danger" href="comments?unpublish_review_reply=<?php echo $reply['id'] ?>">
                                                <i class="fas fa-times"></i> </a>
                                        <?php endif ?>
                                    </td>

                                    <?php if (in_array($_SESSION['user']['role'], ["Admin"])) { ?>
                                        <td>
                                            <a class="delete btn btn-danger" href="comments?delete-review-reply=<?php echo $reply['id'] ?>">
                                                <i class=" fas fa-trash"></i>
                                            </a>
                                        </td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
            <?php endif ?>
        </div>
        <!-- // Display records from DB -->


    </div>
    <div class="container mt-20">

        <!-- Display records from DB-->
        <div class="table-div">

            <!-- Display notification message -->
            <?php include(ROOT_PATH . '/includes/messages.php') ?>
            <?php include(ROOT_PATH . '/includes/errors.php') ?>

            <h2 class="mb-10">Blog Comments</h2>
            <?php if (empty($post_comments)) : ?>
                <h2 style="text-align: center; margin-top: 20px;">No post comments in the database.</h2>
            <?php else : ?>
                <table class="table table-hover table-bordered">
                    <tr>
                        <thead>
                            <th>N</th>
                            <th>Username</th>
                            <th>Text</th>
                            <th>post</th>
                            <th><small>Published</small></th>
                            <?php if (in_array($_SESSION['user']['role'], ["Admin"])) { ?>
                                <th><small>Delete</small></th>
                            <?php } ?>
                        </thead>
                    </tr>
                    <tbody>
                        <?php foreach ($post_comments as $key => $post_comment) : ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $post_comment['username']; ?></td>
                                <td><?php echo $post_comment['text']; ?></td>

                                <td>
                                    <a class="red" target="_blank" href="<?php echo BASE_URL . 'single_post?post-slug=' . $post_comment['slug'] ?>">
                                        <?php echo $post_comment['title']; ?>

                                    </a>
                                </td>
                                <td>
                                    <?php if ($post_comment['published'] == true) : ?>
                                        <a class="publish  btn btn-success" href="comments?publish_post=<?php echo $post_comment['id'] ?>">
                                            <i class="fas fa-check"></i> </a>
                                    <?php else : ?>

                                        <a class="unpublish btn btn-danger" href="comments?unpublish_post=<?php echo $post_comment['id'] ?>">
                                            <i class="fas fa-times"></i> </a>
                                    <?php endif ?>
                                </td>

                                <?php if (in_array($_SESSION['user']['role'], ["Admin"])) { ?>
                                    <td>
                                        <a class="delete btn btn-danger" href="comments?delete-post=<?php echo $post_comment['id'] ?>">
                                            <i class=" fas fa-trash"></i>
                                        </a>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            <?php endif ?>
        </div>

</body>

</html>
