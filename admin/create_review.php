<?php include('../config.php'); ?>
<?php include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
<?php include(ROOT_PATH . '/admin/review_functions.php');
$titles = "Create Review" ?>

<?php include(ROOT_PATH . '/admin/includes/head.php'); ?>

<body>

    <!-- admin navbar -->
    <?php include(ROOT_PATH . '/admin/includes/navbar.php') ?>
    <?php include(ROOT_PATH . '/admin/includes/banner.php') ?>


    <div class="container mt-20">

        <!-- Middle form - to create and edit  -->
        <div class="action create-review-div">
            <h2>Create/Edit Review</h2>

            <form method="post" enctype="multipart/form-data" action="">
                <!-- validation errors for the form -->
                <?php include(ROOT_PATH . '/includes/errors.php') ?>

                <!-- if editing review, the id is required to identify that review -->
                <?php if ($isEditingReview === true) : ?>
                    <input type="hidden" name="review_id" value="<?php echo $review_id; ?>">
                <?php endif ?>

                <input class="form-control mt-20 mb-20" type="text" name="title" value="<?php echo $title; ?>" placeholder="Title">

                <input class="form-control mb-20" type="text" name="imdb_id" value="<?php echo $imdb_id; ?>" placeholder="IMDb ID">

                <input class="form-control mb-20" type="text" name="our_rating" value="<?php echo $our_rating; ?>" placeholder="Our Rating">

                <textarea class="form-control" name="body" id="body" cols="30" rows="10"><?php echo $body; ?></textarea>

                <!-- if editing review, display the update button instead of create button -->
                <?php if ($isEditingReview === true) : ?>
                    <button type="submit" class="btn btn-primary mt-10 float-right mb-20" name="update_review">Update Review</button>
                <?php else : ?>
                    <button type="submit" class="btn btn-primary mt-10 float-right mb-20" name="create_review">Create Review</button>
                <?php endif ?>

            </form>
        </div>
        <!-- // Middle form - to create and edit -->

    </div>

</body>

</html>

<script>
        ClassicEditor
        .create(document.querySelector('#body'))
        .catch(error => {
            console.error(error);
        });
</script>