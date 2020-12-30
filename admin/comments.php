<?php include('../config.php');
if (!in_array($_SESSION['user']['role'], ["Admin", "Moderator"])) {
    header("location: dashboard");
}
?>

<?php include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
<?php include(ROOT_PATH . '/admin/includes/comment_functions.php');
$titles = "Comments";
$title = ""; ?>
<?php include(ROOT_PATH . '/admin/includes/head.php'); ?>

<?php
// Get all comments from DB
$review_comments = getComments("review");
$post_comments = getComments("post"); ?>

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
                <h2 style="text-align: center; margin-top: 20px;">No unpublished review comments in the database.</h2>
            <?php else : ?>
                <?php $review_or_post = "review"; ?>
                <?php foreach ($review_comments as $key => $comment) : ?>
                    <?php if ($title != $comment['title']) : ?>
                        <div class="box-style">
                            <h3>"<?php echo $comment['title_of'] ?> Review: <?php echo $comment['title'];
                                                                                $title = $comment['title']; ?>" comments:</h3>
                        <?php endif ?>
                        <?php $replies = GetReplies($comment['id'], "review"); ?>
                        <?php include("includes/comment.php") ?>
                    <?php endforeach ?>
                        </div>
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
            <?php if (empty($post_comments)) : ?> <h2 style="text-align: center; margin-top: 20px;">No unpublished post comments in the database.</h2>
            <?php else : ?>
                <?php $review_or_post = "post"; ?>
                <?php foreach ($post_comments as $key => $comment) : ?>
                    <?php $replies = GetReplies($comment['id'], "post"); ?>
                    <?php if ($title != $comment['title']) : ?>¨
                    <div class="box-style">

                        <h3>"<?php echo $comment['title'];
                                $title = $comment['title']; ?>" comments:</h3>
                    <?php endif ?> <?php include("includes/comment.php") ?>
                <?php endforeach ?>
                    </div>
                <?php endif ?>
        </div>
        <?php include('../includes/js.php'); ?>

</body>

</html>
